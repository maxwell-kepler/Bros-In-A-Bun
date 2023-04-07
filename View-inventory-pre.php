<?php include '../inc/header.php'; ?>

<?php 
if (!isset($_SESSION)) {
    session_start();
}

if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ". You will find your restaurant inventory information below.";
}

$sql  = 'SELECT * FROM  ingredients NATURAL JOIN inventory';
$result = mysqli_query($con, $sql);
$Fitems = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<br></br>
<h2>Ingredients</h2>
<?php 
    if(mysqli_num_rows($result) == 0){ ?>
        <p class="lead mt3">There are no items</p>
<?php } ?>

<?php
if(isset($_POST['submitOrderIng'])){
    $x = 0;
    foreach($Fitems as $item):
        $ingArr = $_POST['ing'];
        if($ingArr[$x] != 0){
            echo $item["Item_name"] . ': ' . $ingArr[$x] . '<br>';
            $newLevel = $item["Stock_level"] + $ingArr[$x];
            $iName = $item["Item_name"];
            $sql = "UPDATE inventory SET Stock_level = '$newLevel' WHERE Item_name = '$iName'";
            $queryresult = mysqli_query($con, $sql);
        }
        $x++;
    endforeach;
    header('location: View-inventory.php');
}
?>



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <table >
        <tr>
            <td><b>Ingredient Name</b></td>
            <td><b>Unit Cost</b></td>
            <td><b>Stock</b></td>
            <td><b>Warning Level</b></td>
            <td><b>Expiration Date</b></td>
            <td><b>Distributor Email</b></td>
            <td><b>Quantitiy To Order</b></td>
        </tr>
        <?php foreach($Fitems as $item): ?>
            <tr>
                <td><?php echo $item["Item_name"];?></td>
                <td><?php echo $item["Unit_cost"];?></td>
                <td><?php echo $item["Stock_level"];?></td>
                <td><?php echo $item["Warning_level"];?></td>
                <td><?php echo $item["Expiration"];?></td>
                <td><?php echo $item["Distributor_email"];?></td>
                <td><input type="number" name="ing[]" value="0"></td>
            </tr>
        <?php endforeach;?>
    </table>
    <input type="submit" value="Order Ingredients" name="submitOrderIng">
</form>



<?php 
    /*;}
    else{ //Ingredients table

        echo '<table border= "1" width = "900" cellspacing = "0" cellpadding = "2" colspan  = "2" >';
        echo '<tr>';
            echo '<td> <b><font face = "Arial">Ingredient Name</font> </b></td>';
            echo '<td> <b><font face = "Arial">Unit Cost</font> </b></td>';
            echo '<td> <b><font face = "Arial">Stock</font></b> </td>';
            echo '<td> <b><font face = "Arial">Warning Level</font></b> </td>';
            echo '<td> <b><font face = "Arial">Expiration Date</font></b> </td>';
            echo '<td> <b><font face = "Arial">Distributor Email</font></b> </td>';
            echo '<td> <b><font face = "Arial">Quantitiy To Order</font></b> </td>';

        echo '</tr>';

        while($row = mysqli_fetch_assoc($result)){
            $field1name = $row["Item_name"];
            $field2name = $row["Unit_cost"];
            $field3name = $row["Stock_level"];
            $field4name = $row["Warning_level"];
            $field5name = $row["Expiration"];
            $field6name = $row["Distributor_email"];

            echo '<tr>
            <td>'.$field1name.'</td>
            <td>'.$field2name.'</td>
            <td>'.$field3name.'</td>
            <td>'.$field4name.'</td>
            <td>'.$field5name.'</td>
            <td>'.$field6name.'</td>
            <td> <select>
                <option value="0">0</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                </select></td>
            </tr><br>';
        }
        echo '</table><br>';
        //echo '<button class = "nicebutton">Order Ingredients</button>';
        
    }*/
?>
   

<?php
$sql  = 'SELECT * FROM  sides NATURAL JOIN inventory';
$result = mysqli_query($con, $sql);
$Sitems = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<br></br>
<h2>Sides</h2>
<?php if(mysqli_num_rows($result) == 0){ ?>
    <p class="lead mt3">There are no items</p>

<?php ;} ?>

<?php
if(isset($_POST['submitOrderSide'])){
    $x = 0;
    foreach($Sitems as $item):
        $ingArr = $_POST['side'];
        if($ingArr[$x] != 0){
            echo $item["Item_name"] . ': ' . $ingArr[$x] . '<br>';
            $newLevel = $item["Stock_level"] + $ingArr[$x];
            $iName = $item["Item_name"];
            $sql = "UPDATE inventory SET Stock_level = '$newLevel' WHERE Item_name = '$iName'";
            $queryresult = mysqli_query($con, $sql);
        }
        $x++;
    endforeach;
    header('location: View-inventory.php');
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <table >
        <tr>
            <td><b>Side Nam</b></td>
            <td><b>Unit Cost</b></td>
            <td><b>Stock</b></td>
            <td><b>Warning Level</b></td>
            <td><b>Preparation Date</b></td>
            <td><b>Quantitiy To Order</b></td>
        </tr>
        <?php foreach($Sitems as $item): ?>
            <tr>
                <td><?php echo $item["Item_name"];?></td>
                <td><?php echo $item["Unit_cost"];?></td>
                <td><?php echo $item["Stock_level"];?></td>
                <td><?php echo $item["Warning_level"];?></td>
                <td><?php echo $item["Time Prepared"];?></td>
                <td><input type="number" name="side[]" value="0"></td>
            </tr>
        <?php endforeach;?>
    </table>
    <input type="submit" value="Order Sides" name="submitOrderSide">
</form>


<?php /*else{ //Sides table

            echo '<table border= "1" width = "900" cellspacing = "0" cellpadding = "2" colspan  = "2" >';
            echo '<tr>';
                echo '<td> <b> <font face = "Arial">Side Name</font> </b></td>';
                echo '<td> <b><font face = "Arial">Unit Cost</font> </b></td>';
                echo '<td> <b><font face = "Arial">Stock</font></b> </td>';
                echo '<td> <b><font face = "Arial">Warning Level</font></b> </td>';
                echo '<td> <b><font face = "Arial">Preparation Date</font></b> </td>';
                echo '<td> <b><font face = "Arial">Quantitiy To Order</font></b> </td>';

            echo '</tr>';

            while($row = mysqli_fetch_assoc($result)){
                $field1name = $row["Item_name"];
                $field2name = $row["Unit_cost"];
                $field3name = $row["Stock_level"];
                $field4name = $row["Warning_level"];
                $field5name = $row["Time Prepared"];

                echo '<tr>
                <td>'.$field1name.'</td>
                <td>'.$field2name.'</td>
                <td>'.$field3name.'</td>
                <td>'.$field4name.'</td>
                <td>'.$field5name.'</td>
                <td> <select>
                    <option value="0">0</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    </select></td>
                </tr><br>';
            }
            echo '</table><br>';
            echo '<button class="nicebutton">Order Sides</button>';

            

        }*/?>

<?php



$sql  = 'SELECT * FROM  drinks NATURAL JOIN inventory';
$result = mysqli_query($con, $sql);?>
<br></br>
<h2>Drinks</h2>
<?php if(mysqli_num_rows($result) == 0){ ?>
    <p class="lead mt3">There are no items</p>

<?php ;}else{ //Drinks table

            echo '<table border= "1" width = "900" cellspacing = "0" cellpadding = "2" colspan  = "2" >';
            echo '<tr>';
                echo '<td> <b> <font face = "Arial">Drink Name</font> </b></td>';
                echo '<td> <b><font face = "Arial">Unit Cost</font> </b></td>';
                echo '<td> <b><font face = "Arial">Stock</font></b> </td>';
                echo '<td> <b><font face = "Arial">Warning Level</font></b> </td>';
                echo '<td> <b><font face = "Arial">Quantitiy To Order</font></b> </td>';

            echo '</tr>';

            while($row = mysqli_fetch_assoc($result)){
                $field1name = $row["Item_name"];
                $field2name = $row["Unit_cost"];
                $field3name = $row["Stock_level"];
                $field4name = $row["Warning_level"];
                

                echo '<tr>
                <td>'.$field1name.'</td>
                <td>'.$field2name.'</td>
                <td>'.$field3name.'</td>
                <td>'.$field4name.'</td>
                <td> <select>
                    <option value="0">0</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    </select></td>
                </tr><br>';
            }
            echo '</table><br>';
            echo '<button class="nicebutton">Order Drinks</button>';

            

        }?>

<?php include '../inc/footer.php'; ?>
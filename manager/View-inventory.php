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
// $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<style>
button.nicebutton{
    border-radius: 12px;
    border-width: thin thin;
    background-color: rgb(245, 245, 245);
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}


</style>
<style>
td{
    border:1px solid black;
    border-collapse: collapse;
    text-align: center;
} </style>

<br></br>
<h2>Ingredients</h2>
<?php if(mysqli_num_rows($result) == 0){ ?>
    <p class="lead mt3">There are no items</p>

<?php ;}else{ //Ingredients table

            echo '<table border= "1" width = "900" cellspacing = "0" cellpadding = "2" colspan  = "2" >';
            echo '<tr>';
                echo '<td> <b> <font face = "Arial">Ingredient Name</font> </b></td>';
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
            echo '<button class = "nicebutton">Order Ingredients</button>';
            

        }?>

<?php



$sql  = 'SELECT * FROM  sides NATURAL JOIN inventory';
$result = mysqli_query($con, $sql);?>
<br></br>
<h2>Sides</h2>
<?php if(mysqli_num_rows($result) == 0){ ?>
    <p class="lead mt3">There are no items</p>

<?php ;}else{ //Sides table

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

            

        }?>

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
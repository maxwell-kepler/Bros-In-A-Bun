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

<?php
if(isset($_POST['submitOrderIng']) || isset($_POST['submitOrderSide']) || isset($_POST['submitOrderDrink'])){
    header("Refresh:0");
}
?>

<br></br>
<h2>Ingredients</h2>
<?php if(mysqli_num_rows($result) == 0): ?>
    <p class="lead mt3">There are no items</p>
<?php endif; ?>

<?php
if(isset($_POST['submitOrderIng'])){
    $x = 0;
    $ingArr = $_POST['ing'];
    foreach($Fitems as $item):
        if($ingArr[$x] != 0){
            $newLevel = $item["Stock_level"] + $ingArr[$x];
            $iName = $item["Item_name"];
            $sql = "UPDATE inventory SET Stock_level = '$newLevel' WHERE Item_name = '$iName'";
            $queryresult = mysqli_query($con, $sql);
        }
        $x++;
    endforeach;
}?>

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
$sql  = 'SELECT * FROM  sides NATURAL JOIN inventory';
$result = mysqli_query($con, $sql);
$Sitems = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<br></br>
<h2>Sides</h2>
<?php if(mysqli_num_rows($result) == 0): ?>
    <p class="lead mt3">There are no items</p>
<?php endif; ?>

<?php
if(isset($_POST['submitOrderSide'])){
    $x = 0;
    $ingArr = $_POST['side'];
    foreach($Sitems as $item):
        if($ingArr[$x] != 0){
            $newLevel = $item["Stock_level"] + $ingArr[$x];
            $iName = $item["Item_name"];
            $sql = "UPDATE inventory SET Stock_level = '$newLevel' WHERE Item_name = '$iName'";
            $queryresult = mysqli_query($con, $sql);
        }
        $x++;
    endforeach;
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <table >
        <tr>
            <td><b>Side Name</b></td>
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




<?php
$sql  = 'SELECT * FROM  drinks NATURAL JOIN inventory';
$result = mysqli_query($con, $sql);
$Ditems = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<br></br>
<h2>Drinks</h2>
<?php if(mysqli_num_rows($result) == 0): ?>
    <p class="lead mt3">There are no items</p>
<?php endif;?>

<?php
if(isset($_POST['submitOrderDrink'])){
    $x = 0;
    $ingArr = $_POST['drink'];
    foreach($Ditems as $item):
        if($ingArr[$x] != 0){
            $newLevel = $item["Stock_level"] + $ingArr[$x];
            $iName = $item["Item_name"];
            $sql = "UPDATE inventory SET Stock_level = '$newLevel' WHERE Item_name = '$iName'";
            $queryresult = mysqli_query($con, $sql);
        }
        $x++;
    endforeach;
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <table >
        <tr>
            <td><b>Drink Name</b></td>
            <td><b>Unit Cost</b></td>
            <td><b>Stock</b></td>
            <td><b>Warning Level</b></td>
            <td><b>Quantitiy To Order</b></td>
        </tr>
        <?php foreach($Ditems as $item): ?>
            <tr>
                <td><?php echo $item["Item_name"];?></td>
                <td><?php echo $item["Unit_cost"];?></td>
                <td><?php echo $item["Stock_level"];?></td>
                <td><?php echo $item["Warning_level"];?></td>
                <td><input type="number" name="drink[]" value="0"></td>
            </tr>
        <?php endforeach;?>
    </table>
    <input type="submit" value="Order Drinks" name="submitOrderDrink">
</form>

<?php include '../inc/footer.php'; ?>
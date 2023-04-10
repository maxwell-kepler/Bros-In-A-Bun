<?php include '../inc/header.php'; ?>

<?php 
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", please look at your completed order" . '<br><br>';
}

$id = $_SESSION['ID'];
$sql = "SELECT `OrderID` FROM `order` WHERE `CustomerID`='$id' AND `Completed`='1'";
$result = mysqli_query($con, $sql);
$orderID = 0;
while($row = mysqli_fetch_array($result)){
    //Have it in a while loop to get the customer's most recent order
    $orderID = $row['OrderID'];
}

$allSandwichItems;
$allSideItems;
$allDrinkItems;

$sql = "SELECT Item_name, Quantity FROM `orderitem` NATURAL JOIN ingredients WHERE Order_Num = '$orderID'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)){
    $item_name = $row['Item_name'];
    $item_quantity = $row['Quantity'];
    $allSandwichItems[$item_name] = $item_quantity;
}

$sql = "SELECT Item_name, Quantity FROM `orderitem` NATURAL JOIN sides WHERE Order_Num = '$orderID'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)){
    $item_name = $row['Item_name'];
    $item_quantity = $row['Quantity'];
    $allSideItems[$item_name] = $item_quantity;
}

$sql = "SELECT Item_name, Quantity FROM `orderitem` NATURAL JOIN drinks WHERE Order_Num = '$orderID'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)){
    $item_name = $row['Item_name'];
    $item_quantity = $row['Quantity'];
    $allDrinkItems[$item_name] = $item_quantity;
}

if(!empty($allSandwichItems)){
    echo "Here are your selected sandwich ingredients<br>";
    foreach(array_keys($allSandwichItems) as $item){
        if(!strcmp($item, 'Brown Bread') || !strcmp($item, 'White Bread')){
            echo "- Bread type: " . $item;
        } else {
            echo "- " . $item;
        }
        echo "<br>";
    }
}
echo '<br>';

if(!empty($allSideItems)){
    echo "Here are your selected sides<br>";
    foreach(array_keys($allSideItems) as $item){
        echo "- " . $item . ": " . $allSideItems[$item];
        echo "<br>";
    }
}
echo '<br>';

if(!empty($allDrinkItems)){
    echo "Here are your selected drinks<br>";
    foreach(array_keys($allDrinkItems) as $item){
        echo "- " . $item . ": " . $allDrinkItems[$item];
        echo "<br>";
    }
}
echo '<br>';

echo "Your total comes to: $" . $_SESSION['total'];
echo '<br>';

?>

<?php include '../inc/footer.php'; ?>
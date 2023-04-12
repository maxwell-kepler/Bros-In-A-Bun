<?php include '../inc/header.php'; ?>

<?php 
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", please confirm your order" . '<br>';
}

if(!isset($_SESSION['ing']) && !isset($_SESSION['ing']) && !isset($_SESSION['ing'])){
    //This is to prevent being here accidentally
    header("location: Create-order.php");
}

$ingArr = $_SESSION['ing'];
$sideArr = $_SESSION['side'];
$drinkArr = $_SESSION['drink'];

$missingIngArr;
$missingSideArr;
$missingDrinkArr;
$priceArr = [0, 0, 0];

if(!empty($ingArr)){
    echo '<br>Here are your selected sandwich toppings:<br>';
} else {
    echo '<br>You did not select any sandwich toppings<br>';
}
foreach(array_keys($ingArr) as $item){
    $sandTopping = $item;
    $expecetedQuantity = 1;
    if(!strcmp($item, 'type')){
        echo 'Selected bread type: ' . $ingArr[$item];
        $sandTopping = $ingArr[$item];
    } else {
        echo '- ' . $item;
    }
    
    $sql = "SELECT Stock_level, Unit_cost FROM ingredients NATURAL JOIN inventory WHERE Item_name = '$sandTopping'";
    $result = mysqli_query($con, $sql);
    $actualQuantity = 0;
    while($row = mysqli_fetch_array($result)){
        $actualQuantity = $row['Stock_level'];
        $priceArr[0] += $row['Unit_cost']; 
    }
    if($expecetedQuantity > $actualQuantity){
        $missingIngArr[] = $sandTopping;
    }
    echo '<br>';
}
if(!empty($ingArr)){
    echo "<br>Your selected sandwich price comes to: $$priceArr[0]<br>";
}

if(!empty($sideArr)){
    echo '<br>Here are your selected sides:<br>';
} else {
    echo '<br>You did not select any sides<br>';
}
foreach(array_keys($sideArr) as $item){
    echo '- ' . $item . ': ' . $sideArr[$item];
    $sideItem = $item;
    $sideQuantity = $sideArr[$item];
    $sql = "SELECT Stock_level, Unit_cost FROM sides NATURAL JOIN inventory WHERE Item_name = '$sideItem'";
    $result = mysqli_query($con, $sql);
    $actualQuantity = 0;
    while($row = mysqli_fetch_array($result)){
        $actualQuantity = $row['Stock_level'];
        $priceArr[1] += ($row['Unit_cost'] * $sideQuantity); 
    }
    if($sideQuantity > $actualQuantity){
        $missingSideArr[$sideItem] = $sideArr[$sideItem];
    }
    echo '<br>';
}
if(!empty($sideArr)){
    echo "<br>Your selected sides price comes to: $$priceArr[1]<br>";
}

if(!empty($drinkArr)){
    echo '<br>Here are your selected drinks:<br>';
} else {
    echo '<br>You did not select any drinks<br>';
}
foreach(array_keys($drinkArr) as $item){
    echo '- ' . $item . ': ' . $drinkArr[$item];
    $drinkItem = $item;
    $drinkQuantity = $drinkArr[$item];
    $sql = "SELECT Stock_level, Unit_cost FROM drinks NATURAL JOIN inventory WHERE Item_name = '$drinkItem'";
    $result = mysqli_query($con, $sql);
    $actualQuantity = 0;
    while($row = mysqli_fetch_array($result)){
        $actualQuantity = $row['Stock_level'];
        $priceArr[2] += ($row['Unit_cost'] * $drinkQuantity); 
    }
    if($drinkQuantity > $actualQuantity){
        $missingDrinkArr[$drinkItem] = $drinkArr[$drinkItem];
    }
    echo '<br>';
}
if(!empty($drinkArr)){
    echo "<br>Your selected drinks price comes to: $$priceArr[2]<br>";
}
$total = $priceArr[0] + $priceArr[1] + $priceArr[2];
$_SESSION['total'] = $total;
echo "<br>Your total price comes to: $$total<br>";
?>



<?php  
if(!empty($missingIngArr) || !empty($missingSideArr) || !empty($missingDrinkArr)){
    echo "<br>Warning, we are missing certain items to complete your order. Missing items:<br>";
    if(!empty($missingIngArr)){
        foreach($missingIngArr as $item){
            echo "  - " . $item . '<br>';
        }
    }
    if(!empty($missingSideArr)){
        foreach(array_keys($missingSideArr) as $item){
            echo '- ' . $item . ': ' . $missingSideArr[$item] . '<br>';
        }
    }
    if(!empty($missingDrinkArr)){
        foreach(array_keys($missingDrinkArr) as $item){
            echo '- ' . $item . ': ' . $missingDrinkArr[$item] . '<br>';
        }
    }
    echo "<br>Would you like to remove the minimal number of missing items from the order? <br>";
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="submit" value="Remove missing items" name="submitMissing">
    </form>
    <?php
    echo "<br>If not, you can go back and change it<br>";
} else {
    echo "<br>Your order looks complete, would you like to submit it?";
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="submit" value="Submit order" name="submitComplete">
    </form>
    <?php
    echo "<br>If not, you can go back and change it<br>";
}
?>

<?php
if(isset($_POST['submitMissing'])){
    if(!empty($missingIngArr)){
        foreach($missingIngArr as $item){
            if(!strcmp($item, 'Brown Bread') || !strcmp($item, 'White Bread')){
                unset($ingArr['type']);
            }
            unset($ingArr[$item]);
        }
        unset($_SESSION['ing']);
        $_SESSION['ing'] = $ingArr;
    }
    if(!empty($missingSideArr)){
        foreach(array_keys($missingSideArr) as $item){
            $sideItem = $item;
            $sideQuantity = $missingSideArr[$item];
            $sql = "SELECT Stock_level FROM sides NATURAL JOIN inventory WHERE Item_name = '$sideItem'";
            $result = mysqli_query($con, $sql);
            $actualQuantity = 0;
            while($row = mysqli_fetch_array($result)){
                $actualQuantity = $row['Stock_level'];
            }
            if($actualQuantity != 0){
                $sideArr[$item] = $actualQuantity;
            } else {
                unset($sideArr[$item]);
            }
        }
        unset($_SESSION['side']);
        $_SESSION['side'] = $sideArr;
    }
    if(!empty($missingDrinkArr)){
        foreach(array_keys($missingDrinkArr) as $item){
            $drinkItem = $item;
            $drinkQuantity = $drinkArr[$item];
            $sql = "SELECT Stock_level FROM drinks NATURAL JOIN inventory WHERE Item_name = '$drinkItem'";
            $result = mysqli_query($con, $sql);
            $actualQuantity = 0;
            while($row = mysqli_fetch_array($result)){
                $actualQuantity = $row['Stock_level'];
            }
            if($actualQuantity != 0){
                $drinkArr[$item] = $actualQuantity;
            } else {
                unset($drinkArr[$item]);
            }
        }
        unset($_SESSION['drink']);
        $_SESSION['drink'] = $drinkArr;
    }
    header('Refresh:0');
}
?>

<?php
if(isset($_POST['submitChange'])){
    $_SESSION['return'] = true;
    header('location: Create-order.php');
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <input type="submit" value="Change order" name="submitChange">
</form>


<?php
if(isset($_POST['submitComplete'])){
    //Start by confirming all items still exist in db, if not go to submit missing
    $orderStillValid = true;
    foreach(array_keys($ingArr) as $item){
        $sandTopping = $item;
        $expecetedQuantity = 1;
        if(!strcmp($item, 'type')){
            $sandTopping = $ingArr[$item];
        }
        $sql = "SELECT Stock_level FROM ingredients NATURAL JOIN inventory WHERE Item_name = '$sandTopping'";
        $result = mysqli_query($con, $sql);
        $actualQuantity = 0;
        while($row = mysqli_fetch_array($result)){
            $actualQuantity = $row['Stock_level'];
        }
        if($expecetedQuantity > $actualQuantity){
            $orderStillValid = false;
        }
    }
    foreach(array_keys($sideArr) as $item){
        $sideItem = $item;
        $sideQuantity = $sideArr[$item];
        $sql = "SELECT Stock_level FROM sides NATURAL JOIN inventory WHERE Item_name = '$sideItem'";
        $result = mysqli_query($con, $sql);
        $actualQuantity = 0;
        while($row = mysqli_fetch_array($result)){
            $actualQuantity = $row['Stock_level'];
        }
        if($sideQuantity > $actualQuantity){
            $orderStillValid = false;
        }
    }
    foreach(array_keys($drinkArr) as $item){
        $drinkItem = $item;
        $drinkQuantity = $drinkArr[$item];
        $sql = "SELECT Stock_level FROM drinks NATURAL JOIN inventory WHERE Item_name = '$drinkItem'";
        $result = mysqli_query($con, $sql);
        $actualQuantity = 0;
        while($row = mysqli_fetch_array($result)){
            $actualQuantity = $row['Stock_level'];
        }
        if($drinkQuantity > $actualQuantity){
            $orderStillValid = false;
        }
    }
    if($orderStillValid == false){
        header("Refresh:0");
    } else {
        //At this point, the order is valid
        //Create an order
        $id = $_SESSION['ID'];
        $sql = "INSERT INTO `order` (`OrderID`, `Completed`, `CustomerID`) VALUES (NULL, '0', '$id')";
        if(!mysqli_query($con, $sql)){
            echo 'INVALID<br>';
            header("Refresh:0");
        }
        $sql = "SELECT `OrderID` FROM `order` WHERE `CustomerID`='$id' AND `Completed`='0'";
        $result = mysqli_query($con, $sql);
        $orderID = 0;
        while($row = mysqli_fetch_array($result)){
            //Have it in a while loop to get the customer's most recent order
            $orderID = $row['OrderID'];
        }
        
        //Add orderItems to it
        foreach(array_keys($ingArr) as $item){
            $sandTopping = $item;
            $expecetedQuantity = 1;
            if(!strcmp($item, 'type')){
                $sandTopping = $ingArr[$item];
            }
            $sql = "SELECT Unit_cost FROM ingredients NATURAL JOIN inventory WHERE Item_name = '$sandTopping'";
            $result = mysqli_query($con, $sql);
            $price = 0;
            while($row = mysqli_fetch_array($result)){
                $price = $row['Unit_cost'];
            }
            $sql = "INSERT INTO `orderitem` (`Order_Item_Num`, `Item_name`, `Price`, `Quantity`, `Order_Num`) VALUES (NULL, '$sandTopping', '$price', '1', '$orderID')";
            $result = mysqli_query($con, $sql);
        }
        foreach(array_keys($sideArr) as $item){
            $sideItem = $item;
            $sideQuantity = $sideArr[$item];
            $sql = "SELECT Unit_cost FROM sides NATURAL JOIN inventory WHERE Item_name = '$sideItem'";
            $result = mysqli_query($con, $sql);
            $price = 0;
            while($row = mysqli_fetch_array($result)){
                $price = $row['Unit_cost'];
            }
            $sql = "INSERT INTO `orderitem` (`Order_Item_Num`, `Item_name`, `Price`, `Quantity`, `Order_Num`) VALUES (NULL, '$sideItem', '$price', '$sideQuantity', '$orderID')";
            $result = mysqli_query($con, $sql);
        }
        foreach(array_keys($drinkArr) as $item){
            $drinkItem = $item;
            $drinkQuantity = $drinkArr[$item];
            $sql = "SELECT Unit_cost FROM drinks NATURAL JOIN inventory WHERE Item_name = '$drinkItem'";
            $result = mysqli_query($con, $sql);
            $price = 0;
            while($row = mysqli_fetch_array($result)){
                $price = $row['Unit_cost'];
            }
            $sql = "INSERT INTO `orderitem` (`Order_Item_Num`, `Item_name`, `Price`, `Quantity`, `Order_Num`) VALUES (NULL, '$drinkItem', '$price', '$drinkQuantity', '$orderID')";
            $result = mysqli_query($con, $sql);
        }
        //At this point, both order and orderitem are created and populated

        //Decrement the database to match
        $sql = "SELECT Item_name, Quantity FROM `orderitem` WHERE Order_Num = '$orderID'";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($result)){
            $item_name = $row['Item_name'];
            $item_quantity = $row['Quantity'];
            $sql = "SELECT Stock_level FROM inventory WHERE Item_name = '$item_name'";
            $curr_result = mysqli_query($con, $sql);
            $curr_stock = 0;
            while($curr_row = mysqli_fetch_array($curr_result)){
                $curr_stock = $curr_row['Stock_level'];
            }
            $new_stock = $curr_stock - $item_quantity;
            $sql = "UPDATE inventory SET Stock_level = '$new_stock' WHERE Item_name = '$item_name'";
            $final_result = mysqli_query($con, $sql);
        }
        //At this point, the items have been removed successfully from the inventory

        //Complete the order and send them to a new page
        $sql = "UPDATE `order` SET `Completed`='1' WHERE `OrderID`='$orderID'";
        $final_result = mysqli_query($con, $sql);
        
        unset($_SESSION['ing']);
        unset($_SESSION['side']);
        unset($_SESSION['drink']);

        header('location: receipt.php');
    }
}
?>

<?php include '../inc/footer.php'; ?>
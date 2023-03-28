<?php include 'inc/header.php'; ?>

<?php 
if (!isset($_SESSION)) {
    session_start();
}

if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", please create your order";
}

//Please select from the following
//Sandwiches, try to have graphical implementation of them
//Sides, drinks
//Checks to see if the items are in the inventory
//Do it one at a time, to be able to create a list of missing items
//Items will be in a list, drop down + increment decrement buttons

//Check to see how order_item_number and orderID differ
?>


<?php
if(isset($_POST['submitOrder'])){
    $sideArr = [
        "fries" => 0,
        "chips" => 0,
        "salad" => 0
    ];
    $drinkArr = [
        "soda" => 0,
        "tea" => 0,
        "beer" => 0
    ];
    $sideArr['fries'] = (filter_input(INPUT_POST, 'fries', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'fries', FILTER_SANITIZE_NUMBER_INT) : 0;
    $sideArr['chips'] = (filter_input(INPUT_POST, 'chips', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'chips', FILTER_SANITIZE_NUMBER_INT) : 0;
    $sideArr['salad'] = (filter_input(INPUT_POST, 'salad', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'salad', FILTER_SANITIZE_NUMBER_INT) : 0;

    $drinkArr['soda'] = (filter_input(INPUT_POST, 'soda', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'soda', FILTER_SANITIZE_NUMBER_INT) : 0;
    $drinkArr['tea'] = (filter_input(INPUT_POST, 'tea', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'tea', FILTER_SANITIZE_NUMBER_INT) : 0;
    $drinkArr['beer'] = (filter_input(INPUT_POST, 'beer', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'beer', FILTER_SANITIZE_NUMBER_INT) : 0;
    

    $sandArr = [
        "tomato" => 0,
        "lettuce" => 0,
        "cheese" => 0
    ];
    
    $sandArr["tomato"] = isset($_POST['tomato']) ? 1 : 0;
    $sandArr["lettuce"] = isset($_POST['lettuce']) ? 1 : 0;
    $sandArr["cheese"] = isset($_POST['cheese']) ? 1 : 0;  
    
    echo '<br>';
    var_dump(json_encode($sandArr));
    echo '  ';
    var_dump(json_encode($sideArr));
    echo '  ';
    var_dump(json_encode($drinkArr));
}
?>



<link rel="stylesheet" href="mystyle.css">


<section style="height: 500px">    
    <img class="imgBase" src="img/Sandwich/slice-of-bread.png" />
    <img class="imgLettuce" src="img/Sandwich/lettuce.png" hidden/>
    <img class="imgTomato1" src="img/Sandwich/tomato.png" hidden>
    <img class="imgTomato2" src="img/Sandwich/tomato.png" hidden>
    <img class="imgCheese" src="img/Sandwich/cheese.png" hidden>
    <?php
    if (isset($_POST['submit'])){
        if(isset($_POST['tomato'])){
            ?>
            <img class="imgTomato1" src="img/Sandwich/tomato.png">
            <img class="imgTomato2" src="img/Sandwich/tomato.png">
        <?php
        } 
        if(isset($_POST['cheese'])){
            ?>
            <img class="imgCheese" src="img/Sandwich/cheese.png">
        <?php
        }
        if(isset($_POST['lettuce'])){
            ?>
            <img class="imgLettuce" src="img/Sandwich/lettuce.png">
        <?php
        }
    }  
?>
</section>    
<section>
    <div class="card" style="width: 70rem;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="card-header">
                Sandwich Toppings
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="lettuce">Lettuce</label>
                    <label class="switch">
                        <input type="checkbox" name="lettuce" <?php if(isset($_POST['lettuce'])) echo "checked='checked'"; ?>>
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item">
                <label for="tomato">Tomato</label>
                    <label class="switch">
                        <input type="checkbox" name="tomato" <?php if(isset($_POST['tomato'])) echo "checked='checked'"; ?>>
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="cheese">Cheese</label>
                    <label class="switch">
                        <input type="checkbox" name="cheese" <?php if(isset($_POST['cheese'])) echo "checked='checked'"; ?>>
                        <span class="slider round"></span>
                    </label>
                </li>
            </ul>
            <div class="card-body text-center">
                <input type="submit" value="Update Image" name="submit">
            </div>
        
            <div class="card-header">
                Side Selection
            </div>
            
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    
                        <label for="fries">Fries</label>                                          
                        <input type="number" name="fries" value="<?php echo isset($_POST['fries']) ? $_POST['fries'] : 0 ?>">
                    
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="chips">Chips</label>                                          
                    <input type="number" name="chips" value="<?php echo isset($_POST['chips']) ? $_POST['chips'] : 0 ?>">
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="salad">Salad</label>                                          
                    <input type="number" name="salad" value="<?php echo isset($_POST['salad']) ? $_POST['salad'] : 0 ?>">
                </li>
            </ul>

            <div class="card-header">
                Drink Selection
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="soda">Soda</label>                                          
                    <input type="number" name="soda" value="<?php echo isset($_POST['soda']) ? $_POST['soda'] : 0 ?>">
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="tea">Tea</label>                                          
                    <input type="number" name="tea" value="<?php echo isset($_POST['tea']) ? $_POST['tea'] : 0 ?>">
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="beer">Beer</label>                                          
                    <input type="number" name="beer" value="<?php echo isset($_POST['beer']) ? $_POST['beer'] : 0 ?>">
                </li>
            </ul>

            <div class="card-body text-center">
                <input type="submit" value="Submit Order" name="submitOrder">
            </div>
        </form>
    </div>    
</section> 
   
<?php include 'inc/footer.php'; ?>
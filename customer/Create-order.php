<?php include '../inc/header.php'; ?>

<?php 
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", please create your order" . '<br>';
}
?>

<?php
if(!(isset($_POST['submit']) || isset($_POST['submitOrder']))){
    ?>
        <img class="imgBaseBrown" src="../img/Sandwich/brown-bread.jpg"/>
    <?php } else { ?>
        <img class="imgBaseBrown" src="../img/Sandwich/brown-bread.jpg" hidden/>
<?php
}
?>

<?php
if(isset($_POST['submitOrder'])){
    $sandArr = [
        "type" => 0, 
        "Bacon" => 0,
        "Ham" => 0,
        "Turkey" => 0,
        "Cheese" => 0,
        "Onion" => 0,
        "Pickle" => 0,
        "Tomato" => 0, 
        "Lettuce" => 0
    ];
    $sideArr = ["Fries" => 0, "Chips" => 0, "Salad" => 0];
    $drinkArr = ["Soda" => 0, "Tea" => 0, "Beer" => 0];

    $sandArr["type"] = isset($_POST['white']) ? "White Bread" : "Brown Bread";
    $sandArr["Bacon"] = isset($_POST['Bacon']) ? 1 : 0; 
    $sandArr["Ham"] = isset($_POST['Ham']) ? 1 : 0; 
    $sandArr["Turkey"] = isset($_POST['Turkey']) ? 1 : 0; 
    $sandArr["Cheese"] = isset($_POST['Cheese']) ? 1 : 0;  
    $sandArr["Onion"] = isset($_POST['Onion']) ? 1 : 0; 
    $sandArr["Pickle"] = isset($_POST['Pickle']) ? 1 : 0; 
    $sandArr["Tomato"] = isset($_POST['Tomato']) ? 1 : 0;
    $sandArr["Lettuce"] = isset($_POST['Lettuce']) ? 1 : 0;
    
    $sideArr['Fries'] = (filter_input(INPUT_POST, 'Fries', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'Fries', FILTER_SANITIZE_NUMBER_INT) : $_POST['Fries'] = 0;
    $sideArr['Chips'] = (filter_input(INPUT_POST, 'Chips', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'Chips', FILTER_SANITIZE_NUMBER_INT) : $_POST['Chips'] = 0;
    $sideArr['Salad'] = (filter_input(INPUT_POST, 'Salad', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'Salad', FILTER_SANITIZE_NUMBER_INT) : $_POST['Salad'] = 0;

    $drinkArr['Soda'] = (filter_input(INPUT_POST, 'Soda', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'Soda', FILTER_SANITIZE_NUMBER_INT) : $_POST['Soda'] = 0;
    $drinkArr['Tea'] = (filter_input(INPUT_POST, 'Tea', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'Tea', FILTER_SANITIZE_NUMBER_INT) : $_POST['Tea'] = 0;
    $drinkArr['Beer'] = (filter_input(INPUT_POST, 'Beer', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'Beer', FILTER_SANITIZE_NUMBER_INT) : $_POST['Beer'] = 0;
    
    foreach(array_keys($sandArr) as $item){
        if($sandArr[$item] == 0){
            unset($sandArr[$item]);
        }
    }

    foreach(array_keys($sideArr) as $item){
        if($sideArr[$item] == 0){
            unset($sideArr[$item]);
        }
    }
    
    foreach(array_keys($drinkArr) as $item){
        if($drinkArr[$item] == 0){
            unset($drinkArr[$item]);
        }
    }

    $_SESSION['ing'] = $sandArr;
    $_SESSION['side'] = $sideArr;
    $_SESSION['drink'] = $drinkArr;
    header('location: confirm.php');
}
?>

<?php
if(isset($_SESSION['return'])){
    unset($_SESSION['return']);
    $_SESSION['update'] = true;

    unset($_POST['white']);
    unset($_POST['Bacon']);
    unset($_POST['Ham']);
    unset($_POST['Turkey']);
    unset($_POST['Cheese']);  
    unset($_POST['Onion']); 
    unset($_POST['Pickle']); 
    unset($_POST['Tomato']);
    unset($_POST['Lettuce']);
    $sandArr = $_SESSION['ing'];
    if(!isset($sandArr["type"])){
        $sandArr["type"] = "Brown Bread";
    }
    if(!strcmp($sandArr["type"], "White Bread")){
        $_POST['white'] = 1;
    }
    foreach(array_keys($sandArr) as $item){
        if(strcmp($item, 'type')){
            $_POST[$item] = 1;
        }
    }
    unset($_POST['Fries']);
    unset($_POST['Chips']);
    unset($_POST['Salad']);
    $sideArr = $_SESSION['side'];
    foreach(array_keys($sideArr) as $item){
        $_POST[$item] = $sideArr[$item];
    }

    unset($_POST['Soda']);
    unset($_POST['Tea']);
    unset($_POST['Beer']);
    $drinkArr = $_SESSION['drink'];
    foreach(array_keys($drinkArr) as $item){
        $_POST[$item] = $drinkArr[$item];
    }
}
?>

<?php
if(isset($_POST['submitBLT'])){
    $_POST['white'] = 1;
    
    $_POST['Bacon'] = 1;
    unset($_POST['Ham']);
    unset($_POST['Turkey']);

    unset($_POST['Cheese']);
    $_POST['Lettuce'] = 1;
    unset($_POST['Onion']);
    unset($_POST['Pickle']);
    $_POST['Tomato'] = 1;
}
?>

<?php
if(isset($_POST['submitHC'])){
    unset($_POST['white']);

    unset($_POST['Bacon']);
    $_POST['Ham'] = 1;
    unset($_POST['Turkey']);

    $_POST['Cheese'] = 1;
    unset($_POST['Lettuce']);
    unset($_POST['Onion']);
    unset($_POST['Pickle']);
    unset($_POST['Tomato']);
}
?>

<section style="height: 500px">    
    <img class="imgBaseBrown" src="../img/Sandwich/brown-bread.jpg" hidden/>
    <img class="imgBaseWhite" src="../img/Sandwich/white-bread.png" hidden/>

    <img class="imgBacon" src="../img/Sandwich/bacon.png" hidden/>
    <img class="imgHam" src="../img/Sandwich/ham.png" hidden/>
    <img class="imgTurkey" src="../img/Sandwich/turkey.png" hidden/>

    <img class="imgCheese" src="../img/Sandwich/cheese.png" hidden>
    <img class="imgLettuce" src="../img/Sandwich/lettuce.png" hidden/>
    <img class="imgOnion" src="../img/Sandwich/onion.png" hidden/>
    <img class="imgPickle1" src="../img/Sandwich/pickle.png" hidden/>
    <img class="imgPickle2" src="../img/Sandwich/pickle.png" hidden/>
    <img class="imgTomato1" src="../img/Sandwich/tomato.png" hidden>
    <img class="imgTomato2" src="../img/Sandwich/tomato.png" hidden>
    
    <?php
    if (isset($_POST['submit']) || isset($_POST['submitOrder']) || isset($_POST['submitBLT']) || isset($_POST['submitHC']) || isset($_SESSION['update'])){
        if(isset($_POST['white'])){
            ?>
            <img class="imgBaseWhite" src="../img/Sandwich/white-bread.png" />
        <?php
        } else {
            ?>
            <img class="imgBaseBrown" src="../img/Sandwich/brown-bread.jpg" />
        <?php
        }
        if(isset($_POST['Tomato'])){
            ?>
            <img class="imgTomato1" src="../img/Sandwich/tomato.png">
            <img class="imgTomato2" src="../img/Sandwich/tomato.png">
        <?php
        } 
        if(isset($_POST['Cheese'])){
            ?>
            <img class="imgCheese" src="../img/Sandwich/cheese.png">
        <?php
        }
        if(isset($_POST['Lettuce'])){
            ?>
            <img class="imgLettuce" src="../img/Sandwich/lettuce.png">
        <?php
        }
        if(isset($_POST['Bacon'])){
            ?>
            <img class="imgBacon" src="../img/Sandwich/bacon.png">
        <?php
        }
        if(isset($_POST['Ham'])){
            ?>
            <img class="imgHam" src="../img/Sandwich/ham.png">
        <?php
        }
        if(isset($_POST['Turkey'])){
            ?>
            <img class="imgTurkey" src="../img/Sandwich/turkey.png">
        <?php
        }
        if(isset($_POST['Onion'])){
            ?>
            <img class="imgOnion" src="../img/Sandwich/onion.png">
        <?php
        }
        if(isset($_POST['Pickle'])){
            ?>
            <img class="imgPickle1" src="../img/Sandwich/pickle.png"/>
            <img class="imgPickle2" src="../img/Sandwich/pickle.png"/>
        <?php
        }
    }  
?>
</section>    

<section>
    <div class="card" style="width: 70rem;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="card-header">
                Sandwich Bread
            </div>
            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <label for="brown">Brown</label>
                        <label class="switch">
                            <input type="checkbox" name="white" <?php if(isset($_POST['white'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                        <label for="white">White</label>
                    </li>
                </ul>
            </div>
            <div class="card-header">
                Sandwich Toppings
            </div>
            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <label for="Bacon">Bacon</label>
                        <label class="switch">
                            <input type="checkbox" name="Bacon" <?php if(isset($_POST['Bacon'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="Ham">Ham</label>
                        <label class="switch">
                            <input type="checkbox" name="Ham" <?php if(isset($_POST['Ham'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="Turkey">Turkey</label>
                        <label class="switch">
                            <input type="checkbox" name="Turkey" <?php if(isset($_POST['Turkey'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="Lettuce">Lettuce</label>
                        <label class="switch">
                            <input type="checkbox" name="Lettuce" <?php if(isset($_POST['Lettuce'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="Tomato">Tomato</label>
                        <label class="switch">
                            <input type="checkbox" name="Tomato" <?php if(isset($_POST['Tomato'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="Onion">Onion</label>
                        <label class="switch">
                            <input type="checkbox" name="Onion" <?php if(isset($_POST['Onion'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="Pickle">Pickle</label>
                        <label class="switch">
                            <input type="checkbox" name="Pickle" <?php if(isset($_POST['Pickle'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="Cheese">Cheese</label>
                        <label class="switch">
                            <input type="checkbox" name="Cheese" <?php if(isset($_POST['Cheese'])) echo "checked='checked'"; ?>>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item text-center">
                        <input type="submit" value="Update Image" name="submit">
                    </li>
                </ul>
            </div>
            <div class="card-header">
                Side Selection
            </div>
            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">                  
                        <label for="Fries">Fries</label>                                          
                        <input type="number" name="Fries" value="<?php echo isset($_POST['Fries']) ? $_POST['Fries'] : 0 ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="Chips">Chips</label>                                          
                        <input type="number" name="Chips" value="<?php echo isset($_POST['Chips']) ? $_POST['Chips'] : 0 ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="Salad">Salad</label>                                          
                        <input type="number" name="Salad" value="<?php echo isset($_POST['Salad']) ? $_POST['Salad'] : 0 ?>">
                    </li>
                </ul>
            </div>
            <div class="card-header">
                Drink Selection
            </div>
            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <label for="Soda">Soda</label>                                          
                        <input type="number" name="Soda" value="<?php echo isset($_POST['Soda']) ? $_POST['Soda'] : 0 ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="Tea">Tea</label>                                          
                        <input type="number" name="Tea" value="<?php echo isset($_POST['Tea']) ? $_POST['Tea'] : 0 ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="Beer">Beer</label>                                          
                        <input type="number" name="Beer" value="<?php echo isset($_POST['Beer']) ? $_POST['Beer'] : 0 ?>">
                    </li>
                    <li class="list-group-item text-center">
                        <input type="submit" value="Submit Order" name="submitOrder">
                    </li>
                </ul>
            </div>
            <div class="card-header">
                Preset Sandwiches
            </div>
            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">                                     
                        <input type="submit" value="  BLT  " name="submitBLT">
                    </li>
                </ul>
            </div>
            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">                                        
                        <input type="submit" value="  Ham & Cheese  " name="submitHC">
                    </li>
                </ul>
            </div>
        </form>
    </div>    
</section> 
   
<?php include '../inc/footer.php'; ?>
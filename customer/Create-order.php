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
    $sandArr = ["type" => 0, "tomato" => 0, "lettuce" => 0, "cheese" => 0];
    $sideArr = ["fries" => 0, "chips" => 0, "salad" => 0];
    $drinkArr = ["soda" => 0, "tea" => 0, "beer" => 0];

    $sandArr["type"] = isset($_POST['white']) ? "white" : "brown";
    $sandArr["tomato"] = isset($_POST['tomato']) ? 1 : 0;
    $sandArr["lettuce"] = isset($_POST['lettuce']) ? 1 : 0;
    $sandArr["cheese"] = isset($_POST['cheese']) ? 1 : 0;  

    $sideArr['fries'] = (filter_input(INPUT_POST, 'fries', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'fries', FILTER_SANITIZE_NUMBER_INT) : $_POST['fries'] = 0;
    $sideArr['chips'] = (filter_input(INPUT_POST, 'chips', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'chips', FILTER_SANITIZE_NUMBER_INT) : $_POST['chips'] = 0;
    $sideArr['salad'] = (filter_input(INPUT_POST, 'salad', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'salad', FILTER_SANITIZE_NUMBER_INT) : $_POST['salad'] = 0;

    $drinkArr['soda'] = (filter_input(INPUT_POST, 'soda', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'soda', FILTER_SANITIZE_NUMBER_INT) : $_POST['soda'] = 0;
    $drinkArr['tea'] = (filter_input(INPUT_POST, 'tea', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'tea', FILTER_SANITIZE_NUMBER_INT) : $_POST['tea'] = 0;
    $drinkArr['beer'] = (filter_input(INPUT_POST, 'beer', FILTER_SANITIZE_NUMBER_INT) > 0) ? filter_input(INPUT_POST, 'beer', FILTER_SANITIZE_NUMBER_INT) : $_POST['beer'] = 0;
    
    //$orderArr = [[],[],[]];
    $orderArr = [$sandArr, $sideArr,$drinkArr];
    foreach(array_keys($orderArr) as $index){
        foreach(array_keys($orderArr[$index]) as $item){
            if($orderArr[$index][$item] == 0){
                unset($orderArr[$index][$item]);
            }
        }
    }
    $_SESSION['order'] = $orderArr;
    header('location: confirm.php');
}
?>

<section style="height: 500px">    
    <img class="imgBaseBrown" src="../img/Sandwich/brown-bread.jpg" hidden/>
    <img class="imgBaseWhite" src="../img/Sandwich/white-bread.png" hidden/>
    <img class="imgLettuce" src="../img/Sandwich/lettuce.png" hidden/>
    <img class="imgTomato1" src="../img/Sandwich/tomato.png" hidden>
    <img class="imgTomato2" src="../img/Sandwich/tomato.png" hidden>
    <img class="imgCheese" src="../img/Sandwich/cheese.png" hidden>
    <?php
    if (isset($_POST['submit']) || isset($_POST['submitOrder'])){
        if(isset($_POST['white'])){
            ?>
            <img class="imgBaseWhite" src="../img/Sandwich/white-bread.png" />
        <?php
        } else {
            ?>
            <img class="imgBaseBrown" src="../img/Sandwich/brown-bread.jpg" />
        <?php
        }
        if(isset($_POST['tomato'])){
            ?>
            <img class="imgTomato1" src="../img/Sandwich/tomato.png">
            <img class="imgTomato2" src="../img/Sandwich/tomato.png">
        <?php
        } 
        if(isset($_POST['cheese'])){
            ?>
            <img class="imgCheese" src="../img/Sandwich/cheese.png">
        <?php
        }
        if(isset($_POST['lettuce'])){
            ?>
            <img class="imgLettuce" src="../img/Sandwich/lettuce.png">
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
                        <label for="fries">Fries</label>                                          
                        <input type="number" name="fries" value="<?php echo isset($_POST['fries']) ? $_POST['fries'] : 0 ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="chips">Chips</label>                                          
                        <input type="number" name="chips" value="<?php echo isset($_POST['chips']) ? $_POST['chips'] : 0 ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="salad">Salad</label>                                          
                        <input type="number" name="salad" value="<?php echo isset($_POST['salad']) ? $_POST['salad'] : 0 ?>">
                    </li>
                </ul>
            </div>
            <div class="card-header">
                Drink Selection
            </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <label for="soda">Soda</label>                                          
                        <input type="number" name="soda" value="<?php echo isset($_POST['soda']) ? $_POST['soda'] : 0 ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="tea">Tea</label>                                          
                        <input type="number" name="tea" value="<?php echo isset($_POST['tea']) ? $_POST['tea'] : 0 ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="beer">Beer</label>                                          
                        <input type="number" name="beer" value="<?php echo isset($_POST['beer']) ? $_POST['beer'] : 0 ?>">
                    </li>
                    <li class="list-group-item text-center">
                        <input type="submit" value="Submit Order" name="submitOrder">
                    </li>
                </ul>
            </div>
        </form>
    </div>    
</section> 
   
<?php include '../inc/footer.php'; ?>
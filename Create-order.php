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




<link rel="stylesheet" href="mystyle.css">


<section style="height: 500px">    
    <img class="imgBase" src="img/Sandwich/slice-of-bread.png" />
    <img class="imgLettuce" src="img/Sandwich/lettuce.png" hidden/>
    <img class="imgTomato1" src="img/Sandwich/tomato.png" hidden>
    <img class="imgTomato2" src="img/Sandwich/tomato.png" hidden>
    <img class="imgCheese" src="img/Sandwich/cheese.png" hidden>
    <?php
    //https://stackoverflow.com/questions/18421988/getting-checkbox-values-on-submit
        if (isset($_POST['sub'])){
            $name = $_POST['sub'];
            foreach ($name as $sub){ 
                if(!strcmp($sub, "tomato")){
                    ?>
                    <img class="imgTomato1" src="img/Sandwich/tomato.png">
                    <img class="imgTomato2" src="img/Sandwich/tomato.png">
                <?php
                } else if(!strcmp($sub, "cheese")){
                    ?>
                    <img class="imgCheese" src="img/Sandwich/cheese.png">
                <?php
                }
                else if(!strcmp($sub, "lettuce")){
                    ?>
                    <img class="imgLettuce" src="img/Sandwich/lettuce.png">
                <?php
                }
            }
        }
    ?>
</section>    
<section>
    <div class="card" style="width: 70rem;">
        <div class="card-body">
        <form action="Create-order.php" method="post">
            <div class="card-header">
                Sandwich Toppings
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="lettuce">Lettuce</label>
                    <label class="switch">
                        <!--https://stackoverflow.com/questions/12541419/php-keep-checkbox-checked-after-submitting-form-->
                        <input type="checkbox" value="lettuce" name="sub[]" <?php if(isset($_POST['sub']) && in_array("lettuce", $_POST['sub'])) echo "checked='checked'"; ?>>
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item">
                <label for="tomato">Tomato</label>
                    <label class="switch">
                        <input type="checkbox" value="tomato" name="sub[]" <?php if(isset($_POST['sub']) && in_array("tomato", $_POST['sub'])) echo "checked='checked'"; ?>>
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="tomato">Cheese</label>
                    <label class="switch">
                        <input type="checkbox" value="cheese" name="sub[]" <?php if(isset($_POST['sub']) && in_array("cheese", $_POST['sub'])) echo "checked='checked'"; ?>>
                        <span class="slider round"></span>
                    </label>
                </li>
            </ul>
            <div class="card-body">
                <input type="submit" value="submit">
            </div>
        </form>
    </div>    
</section> 
   
<?php include 'inc/footer.php'; ?>
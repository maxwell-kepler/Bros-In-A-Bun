<?php include '../inc/header.php'; ?>


<?php 
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", here you can edit your accound information"  . '<br>';
}
?>


<?php
if(isset($_POST['submitEmail'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    if(strpos($email, '@') == 0 || strpos($email, '.') == 0){?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Valid email was not provided.
        </div>
    <?php } else {
        $id = $_SESSION['ID'];
        $sql = "UPDATE customer SET Email = '$email' WHERE UserID = '$id'";
        $queryresult = mysqli_query($con, $sql);
        if($queryresult == 1){
            $_SESSION['Email'] = $email;
            //https://www.w3schools.com/howto/howto_js_alert.asp
        ?>
        <div class="alertP">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Updated email succesfully.
        </div>
        <?php } else { ?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Email was not updated succesfully.
        </div>    
<?php
        }
    }
}
?>

<?php
if(isset($_POST['submitPassword'])){
    $Password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!strcmp($Password, "")){?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Valid password was not provided.
        </div>    
    <?php } else {
        $Password = hash('ripemd256', $Password);
        $id = $_SESSION['ID'];
        $sql = "UPDATE customer SET Password = '$Password' WHERE UserID = '$id'";
        $queryresult = mysqli_query($con, $sql);
        if($queryresult == 1){
        ?>
        <div class="alertP">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Updated password succesfully.
        </div>
        <?php } else { ?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Password was not updated succesfully.
        </div>    
<?php 
        }
    }
}
?>

<?php
if(isset($_POST['submitName'])){
    $Name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!strcmp($Name, "")){?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Valid names was not provided.
        </div> 
    <?php } else {
        $id = $_SESSION['ID'];
        $sql = "UPDATE customer SET Name = '$Name' WHERE UserID = '$id'";
        $queryresult = mysqli_query($con, $sql);
        if($queryresult == 1){
            $_SESSION['Name'] = $Name;
        ?>
        <div class="alertP">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Updated name succesfully.
        </div>
        <?php } else { ?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Name was not updated succesfully.
        </div>    
<?php
        }   
    }
}
?>

<?php
if(isset($_POST['submitPhone'])){
    $Phone = filter_input(INPUT_POST, 'Phone', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!strcmp($Phone, "")){?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Valid phone number was not provided.
        </div> 
    <?php } else {
        $id = $_SESSION['ID'];
        $sql = "UPDATE customer SET Phone = '$Phone' WHERE UserID = '$id'";
        $queryresult = mysqli_query($con, $sql);
        if($queryresult == 1){?>
        <div class="alertP">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Updated phone number succesfully.
        </div>
        <?php } else { ?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Phone number was not updated succesfully.
        </div>    
<?php
        }   
    }
}
?>

<?php
if(isset($_POST['submitCC_Num'])){
    $CC_Num = filter_input(INPUT_POST, 'CC_Num', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!strcmp($CC_Num, "")){?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Valid credit card number was not provided.
        </div> 
    <?php } else {
        $id = $_SESSION['ID'];
        $sql = "UPDATE customer SET CC_Num = '$CC_Num' WHERE UserID = '$id'";
        $queryresult = mysqli_query($con, $sql);
        if($queryresult == 1){?>
        <div class="alertP">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Updated credit card number succesfully.
        </div>
        <?php } else { ?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Credit card number was not updated succesfully.
        </div>    
<?php
        }   
    }
}
?>

<?php
if(isset($_POST['submitCC_Num'])){
    $CC_Num = filter_input(INPUT_POST, 'CC_Num', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!strcmp($CC_Num, "")){?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Valid credit card number was not provided.
        </div> 
    <?php } else {
        $id = $_SESSION['ID'];
        $sql = "UPDATE customer SET CC_Num = '$CC_Num' WHERE UserID = '$id'";
        $queryresult = mysqli_query($con, $sql);
        if($queryresult == 1){?>
        <div class="alertP">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Updated credit card number succesfully.
        </div>
        <?php } else { ?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Credit card number was not updated succesfully.
        </div>    
<?php
        }   
    }
}
?>

<?php
if(isset($_POST['submitCC_CVC'])){
    $CC_CVC = filter_input(INPUT_POST, 'CC_CVC', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!strcmp($CC_CVC, "")){?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Valid credit card CVC was not provided.
        </div> 
    <?php } else {
        $id = $_SESSION['ID'];
        $sql = "UPDATE customer SET CC_CVC = '$CC_CVC' WHERE UserID = '$id'";
        $queryresult = mysqli_query($con, $sql);
        if($queryresult == 1){?>
        <div class="alertP">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Updated credit card CVC succesfully.
        </div>
        <?php } else { ?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Credit card CVC was not updated succesfully.
        </div>    
<?php
        }   
    }
}
?>

<?php
if(isset($_POST['submitCC_Exp'])){
    $CC_Exp = filter_input(INPUT_POST, 'CC_Exp', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!strcmp($CC_Exp, "")){?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Valid credit card expiry date was not provided.
        </div> 
    <?php } else {
        $id = $_SESSION['ID'];
        $sql = "UPDATE customer SET CC_Exp = '$CC_Exp' WHERE UserID = '$id'";
        $queryresult = mysqli_query($con, $sql);
        if($queryresult == 1){?>
        <div class="alertP">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Updated credit card expiry date succesfully.
        </div>
        <?php } else { ?>
        <div class="alertN">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            Credit card expiry date was not updated succesfully.
        </div>    
<?php
        }   
    }
}
?>

<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="email">Email: </label>
                    <input type="email" name="email">
                    <input type="submit" value="  Submit  " name="submitEmail">
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="Password">Password: </label>
                    <input type="password" name="Password">
                    <input type="submit" value="  Submit  " name="submitPassword">
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="Name">Name: </label>
                    <input type="text" name="Name">
                    <input type="submit" value="  Submit  " name="submitName">
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="Phone">Phone: (format: xxx-xxx-xxxx)</label>
                    <input type="tel" name="Phone">
                    <input type="submit" value="  Submit  " name="submitPhone">
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                <label for="CC_Num">Credit Card Number: (format: xxxx xxxx xxxx xxxx)</label>
            <input type="text" name="CC_Num">
                    <input type="submit" value="  Submit  " name="submitCC_Num">
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="CC_CVC">CVC: </label>
                    <input type="text" name="CC_CVC">
                    <input type="submit" value="  Submit  " name="submitCC_CVC">
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="CC_Exp">Credit Card Expiry Date: </label>
                    <input type="date" name="CC_Exp">
                    <input type="submit" value="  Submit  " name="submitCC_Exp">
                </div>
            </form>
        </li>
    </ul>
</div>
   
<?php include '../inc/footer.php'; ?>
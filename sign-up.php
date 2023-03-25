<?php include 'inc/header.php'; 

?>

<?php
if (!isset($_SESSION)) {
    session_start();
}

function createCustomer($Email, $Password, $Name, $Phone, $CC_Num, $CC_CVC, $CC_Exp){
    //Codes: true is success, email is invalid email, false is someother failure
    global $con;
    $sql = "SELECT UserID FROM customer WHERE Email= '$Email'";
    $queryresult = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($queryresult);
    if(!empty($result)){
        return 'email';
    }
    $sql = "INSERT INTO customer (Email, Password, Name, Phone, CC_Num, CC_CVC, CC_Exp) VALUES ('$Email', '$Password', '$Name', '$Phone', '$CC_Num', '$CC_CVC', '$CC_Exp')";
    if(mysqli_query($con, $sql)){
        return true;
    } else {
        echo 'Error:' . mysqli_error($con);
        return false;
    }
}

function setSession($Email){
    global $con;
    $sql = "SELECT * FROM customer WHERE Email = '$Email'";
    $queryresult = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($queryresult);
    $_SESSION['ID'] = $result['UserID'];
    $_SESSION['Email'] = $result['Email'];
    $_SESSION['Role'] = 'C';
    $_SESSION['Name'] = $result['Name'];
}

if(isset($_POST['submit'])){
    $Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_SPECIAL_CHARS);
    $Password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_SPECIAL_CHARS);
    $Name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_SPECIAL_CHARS);
    $Phone = filter_input(INPUT_POST, 'Phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $CC_Num = filter_input(INPUT_POST, 'CC_Num', FILTER_SANITIZE_SPECIAL_CHARS);
    $CC_CVC = filter_input(INPUT_POST, 'CC_CVC', FILTER_SANITIZE_SPECIAL_CHARS);
    $CC_Exp = filter_input(INPUT_POST, 'CC_Exp', FILTER_SANITIZE_SPECIAL_CHARS);
    $result = createCustomer($Email, $Password, $Name, $Phone, $CC_Num, $CC_CVC, $CC_Exp);
    if(!strcmp($result, 'email')){
        echo 'Please try a different email, there is already an account associated with that email.';
    } else if ($result == true){
        //echo 'Account created succesfully';
        setSession($Email);
        header('Location: home.php');
    } else {
        echo 'Something went wront, please try again';
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="card my-2 w-150">
        <div class="card-body text-center"> 
            <label for="Email">Email: </label>
            <input type="email" name="Email">
        </div>
        <div class="card-body text-center"> 
            <label for="Password">Password: </label>
            <input type="password" name="Password">
        </div>
        <div class="card-body text-center"> 
            <label for="Name">Name: </label>
            <input type="text" name="Name">
        </div>
        <div class="card-body text-center"> 
            <label for="Phone">Phone: </label>
            <input type="tel" name="Phone">
        </div>
        <div class="card-body text-center"> 
            <label for="CC_Num">Credit Card Number: </label>
            <input type="text" name="CC_Num">
        </div>
        <div class="card-body text-center"> 
            <label for="CC_CVC">CVC: </label>
            <input type="text" name="CC_CVC">
        </div>
        <div class="card-body text-center"> 
            <label for="CC_Exp">Credit Card Expiry Date: </label>
            <input type="date" name="CC_Exp">
        </div>
    </div>
    <input type="submit" value="Submit" name="submit">
</form>


<?php include 'inc/footer.php'; ?>
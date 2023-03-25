<?php include 'inc/header.php' ?>

<?php
if (!isset($_SESSION)) {
    session_start();
}

function validUser($email, $password){
    global $con;
    $sql = "SELECT Email, Password, UserID FROM users";
    $queryresult = mysqli_query($con, $sql);
    $foundID = false;
    while($row = mysqli_fetch_array($queryresult)){
        if($email == $row['Email'] && $password == $row['Password']){
            $foundID = $row['UserID'];
            break;
        }
    }
    //mysqli_close($con);
    return $foundID;
}
  
function setSession($userID){
    global $con;
    $sql = "SELECT * FROM users WHERE UserID = '$userID'";
    $queryresult = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($queryresult);
    $_SESSION['UserID'] = $result['UserID'];
    $_SESSION['Email'] = $result['Email'];
    $_SESSION['Role'] = $result['Role'];
    $_SESSION['Name'] = $result['Name'];
}

if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $userID = validUser($email, $password);
    if($userID != false){
        setSession($userID);
        if($_SESSION['Role'] == 'C'){
            header('Location: home.php');
        } else {
            header('Location: home.php');
        }
    } else {
        echo 'Incorrect login';
    }
}

if(isset($_POST['newUser'])){
    header('Location: sign-up.php');
}

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="card my-3 w-75">
        <div class="card-body text-center">
            <div>
                <label for="email">Email: </label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="password">Password: </label>
                <input type="password" name="password">
            </div>
        </div>
    </div>
    <input type="submit" value="Submit" name="submit">
    <input type="submit" value="Sign up" name="newUser">
</form>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    
</form>



<?php include 'inc/footer.php'; ?>
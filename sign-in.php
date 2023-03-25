<?php include 'inc/header.php' ?>

<?php
if (!isset($_SESSION)) {
    session_start();
}

function validUser($email, $password){
    global $con;
    $sql = "SELECT Email, Password, UserID FROM customer";
    $queryresult = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($queryresult)){
        if($email == $row['Email'] && $password == $row['Password']){
            setSession_C($row['UserID']);
            return;
        }
    }
    $sql = "SELECT Email, Password, ManagerID FROM manager";
    $queryresult = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($queryresult)){
        if($email == $row['Email'] && $password == $row['Password']){
            setSession_M($row['ManagerID']);
            return;
        }
    }
    $_SESSION['Role'] = '';
    return;
}
  
function setSession_C($userID){
    global $con;
    $sql = "SELECT * FROM customer WHERE UserID = '$userID'";
    $queryresult = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($queryresult);
    $_SESSION['Role'] = 'C';
    $_SESSION['ID'] = $result['UserID'];
    $_SESSION['Email'] = $result['Email'];
    $_SESSION['Name'] = $result['Name'];
}

function setSession_M($ManagerID){
    global $con;
    $sql = "SELECT * FROM manager WHERE ManagerID = '$ManagerID'";
    $queryresult = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($queryresult);
    $_SESSION['Role'] = 'M';
    $_SESSION['ID'] = $result['ManagerID'];
    $_SESSION['Email'] = $result['Email'];
    $_SESSION['Name'] = $result['Name'];
}

if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    validUser($email, $password);
    if($_SESSION['Role'] == 'C'){
        header('Location: home.php');
    } else if($_SESSION['Role'] == 'M'){
        header('Location: home.php');
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
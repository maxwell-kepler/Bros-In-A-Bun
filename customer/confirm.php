<?php include '../inc/header.php'; ?>

<?php 
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", please confirm your order" . '<br>';
}

var_dump(json_encode($_SESSION['order']));

//As it arrives, check that the ingredients exists
//unset missing ingredients, warning
//Go back button + warning
//Confirm order
//--> decrements
//Go home or order another
?>


<?php include '../inc/footer.php'; ?>
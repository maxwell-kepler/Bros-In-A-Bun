<?php include '../inc/header.php'; ?>

<?php 
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", please confirm your order" . '<br>';
}

var_dump(json_encode($_SESSION['order']));
?>


<?php include '../inc/footer.php'; ?>
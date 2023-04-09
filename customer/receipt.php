<?php include '../inc/header.php'; ?>

<?php 
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", please look at your completed order" . '<br>';
}
?>

<?php include '../inc/footer.php'; ?>
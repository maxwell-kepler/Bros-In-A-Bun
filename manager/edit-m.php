<?php include '../inc/header.php'; ?>


<?php 
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", here you can edit your accound information"  . '<br>';
}
?>

<?php include '../inc/footer.php'; ?>
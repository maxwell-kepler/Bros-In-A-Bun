<?php include '../inc/header.php'; ?>

<?php 
if (!isset($_SESSION)) {
    session_start();
}

if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ". You will find your restaurant inventory information below.";
}

$sql  = 'SELECT * FROM Inventory';
$result = mysqli_query($con, $sql);
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<br></br>
<h2>Inventory</h2>
<?php if(empty($items)): ?>
    <p class="lead mt3">There are no items</p>
<?php endif; ?>

<?php include '../inc/footer.php'; ?>
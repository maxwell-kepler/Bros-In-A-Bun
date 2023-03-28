<?php include 'inc/header.php'; 
//echo '<br><br><br>'. $_SERVER['DOCUMENT_ROOT']. '<br><br><br>';
?>

<?php 
if (!isset($_SESSION)) {
    session_start();
}
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", you're a ";
    if($_SESSION['Role'] == 'C'){
        echo 'customer';
    } else {
        echo 'manager';
    }
} else {
    echo 'Welcome guest';
}
?>

<h2>View Your Restaurant</h2>
<section>
    
    <p>Welcome to the View Restaraunt page. From here, you can both view and update current inventory levels of your restaraunt.</p>
    <p>Simply follow the tabs in the navigation bar above.</p>
    <div style = "position:relative; left:-590px;top:00px;">
        <img src="img/icon.png" alt="Bros In a Bun">
    </div>
        
</section>


<?php include 'inc/footer.php'; ?>
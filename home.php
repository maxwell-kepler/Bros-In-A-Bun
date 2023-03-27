<?php include 'inc/header.php'; ?>

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

<?php
if(!empty($_SESSION['Role'])){
    if($_SESSION['Role'] == 'C'){
?>
<a class="nav-link" href="Create-order.php">Create order</a>
<?php
    }
} 
?>
<h2>About</h2>
<p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore impedit totam porro iure reiciendis autem possimus sapiente, optio, exercitationem ipsum assumenda mollitia, recusandae expedita culpa ratione voluptatem esse quos quam?</p>
    
<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>

<?php 
if (!isset($_SESSION)) {
    session_start();
}
if(!empty($_SESSION['Name'])){
    echo 'Welcome ' . $_SESSION['Name'] . ", you're a " . $_SESSION['Role'];
} else {
    echo 'Welcome guest';
}
?>

<h2>About</h2>
<p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore impedit totam porro iure reiciendis autem possimus sapiente, optio, exercitationem ipsum assumenda mollitia, recusandae expedita culpa ratione voluptatem esse quos quam?</p>
    
<?php include 'inc/footer.php'; ?>
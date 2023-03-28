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

<h2>About Our Restaurant</h2>
<section>
    <p>Bros In A Bun is a bustling sandwich shop that caters to sandwich lovers of all kinds. Located in the heart of a vibrant downtown area, this sandwich shop offers a unique and delicious menu that is sure to satisfy any appetite.</p>
    <p>As you step inside Bros In A Bun, you are greeted by the warm and inviting aroma of freshly baked bread and savory meats. The shop's decor is modern and clean, with a welcoming atmosphere that makes you feel right at home.</p>
    <p>The menu at Bros In A Bun features a wide variety of sandwich options, each with its own unique flavor and twist. From classic deli-style sandwiches to creative concoctions that push the boundaries of traditional sandwich making, there is something for everyone at this sandwich shop.</p>
    <p>The ingredients used at Bros In A Bun are carefully sourced from local and sustainable farms, ensuring that every sandwich is made with the freshest and highest-quality ingredients possible. The bread is baked fresh daily, and the meats and cheeses are sliced to order, ensuring that each sandwich is as fresh and delicious as possible.</p>
    <p>In addition to sandwiches, Bros In A Bun also offers a variety of sides, including crispy fries, homemade potato chips, and freshly made salads. The shop also offers a selection of craft beers and artisanal sodas to wash down your sandwich.</p>
    <p>Whether you're looking for a quick lunch on the go or a leisurely meal with friends, Bros In A Bun is the perfect spot to satisfy your sandwich cravings. With its welcoming atmosphere, friendly staff, and delicious menu, this sandwich shop is a must-visit for sandwich lovers of all kinds.</p>    
</section>


<?php include 'inc/footer.php'; ?>
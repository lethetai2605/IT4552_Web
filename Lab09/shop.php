<?php
// Start the session
if (session_id() === '')
session_start();
//session_destroy();
if(!isset($_SESSION['id'])){
    //array_push($_SESSION['id'],$id);
    $_SESSION['id'] = array();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = strval($id);
    // $_SESSION['id'] = $id;
    array_push($_SESSION['id'],$id);
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Shopping Cart</title>
</head>

<body>
    <ul>
        <li>Word
            <?php if (!in_array('1',$_SESSION['id'])) {
                echo '<a href="?id=1">Add</a>';
            } ?>

        </li>
        <li>PowerPoints<?php if (!in_array('2',$_SESSION['id'])) {
                            echo '<a href="?id=2">Add</a>';
                        } ?></li>
        <li>Access<?php if (!in_array('3',$_SESSION['id'])){
                        echo '<a href="?id=3">Add</a>';
                    } ?></li>
        <li>Excel<?php if (!in_array('4',$_SESSION['id'])) {
                        echo '<a href="?id=4">Add</a>';
                    } ?></li>
        <li>OneDrive<?php if (!in_array('5',$_SESSION['id'])) {
                        echo '<a href="?id=5">Add</a>';
                    } ?></li>
    </ul>
    <a href="cart.php">Cart</a>
</body>
</html>
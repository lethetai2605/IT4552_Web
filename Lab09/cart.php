<?php
    session_start();

    if(isset($_GET['id']) && in_array($_GET['id'],$_SESSION['id'])){
        $arr = $_SESSION['id'];
        $key = array_search($_GET['id'],$arr);
        unset($arr[$key]);
        $_SESSION['id'] = $arr;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <ul>
    <?php
        if(isset($_SESSION['id'])){
            foreach($_SESSION['id'] as $id){
               // print ("<br>");
                print("<li>$id</li>");
                print('<a href="?id='.$id.'">Delete</a>');
            }
        }
    ?>
    </ul>
    <a href="shop.php">Back to shop</a>
</body>
</html>
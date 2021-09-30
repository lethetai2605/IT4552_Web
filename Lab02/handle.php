<?php
if (isset($_POST['name'])) {
   $name = $_POST['name'];
   $class = $_POST['class'];
   $university = $_POST['university'];
   $email = $_POST['email'];
   $tele = $_POST['tele'];
   $address = $_POST['address'];
   $register = $_POST['register'];
   $hobby = $_POST['hobby'];

    echo 'Hello, '.$name.'<br/>';
    echo 'You are studying at '.$class.', '.$university.'<br/>';
    echo "Your hobby is <br/>";

    if ( !empty($hobby)) {
    $N = count($hobby);
    for ($i=0; $i < count($hobby); $i++) { 
        $a = $i + 1;
        echo $a.". ".$hobby[$i]."<br/>";
    }
    }
    echo $register;
}
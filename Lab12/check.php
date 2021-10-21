<html>
<head><title>Date Check</title></head>
<body>
<?php
$email = $_POST["email"];
$url = $_POST["url"];
$phone = $_POST["phonenumber"];

$regex_mail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
if (preg_match($regex_mail, $email)) {
    echo "Valid email, email = $email<br/>";
}else{
    echo "Invalid email: $email<br/>";
}

$regex_url = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
if ( preg_match($regex_url, $url) ) {
    echo "Valid URL, URL = $url <br>";
} else {
    echo "Invalid URL: $url <br>";
}

$regex_phone = '/^[0-9]{10}+$/';
if(preg_match($regex_phone, $phone)){
    echo "Valid phone number, phone number = $phone<br/>";
}else{
    echo "Invalid phone number: $phone<br/>";
}

?>

</body>
</html>
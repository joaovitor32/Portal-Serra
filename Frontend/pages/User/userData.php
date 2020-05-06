<!DOCTYPE html>
<html>

<head>
    <title>Portal Transparência</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='../../components/UI/Modal/Modal.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/LoadingSpinner/LoadingSpinner.css'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../components/UI/footer/footer.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/header-sistema/header-sistema.css'>
    <!--<link rel='stylesheet' type='text/css' href='../../components/UI/form/styles.css'>--->
    <!---<link rel='stylesheet' type='text/css' href='../../components/UI/barra-de-navegacao/barra-de-navegacao.css'>-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='./userData.css'>
</head>

<body style="background-color:rgba(169,169,169,0.7)">
    <div id="box-loading-spinner"></div>
    <div id="box-content">
        <?php
        require("../../components/UI/header-sistema/header-sistema.php")
        ?>
        <div id="full-wrapper">
            <div  id="content-user">
                <div class="section" >
                    <img id="logo-user-content" src="../../components/icons/men.svg" />
                    <div class="user-data">
                        <p>Nome:</p>
                        <p id="name"></p>
                    </div>
                    <div class="user-data">
                        <p>Entrada:</p>
                        <p id="entrada"></p>
                    </div>
                    <div class="user-data">
                        <p>Cargo:</p>
                        <p id="cargo"></p>
                    </div>
                </div>
                <div class="section" id="update-user">
                    update-user
                </div>
                <div class="section" id="new-user">
                    new user
                </div>
            </div>
            <div id="box-actions">
                <div id="wrapper-actions">
                    <img onclick="display(0)" src="../../components/icons/exchanging.svg" />
                    <img onclick="display(1)" src="../../components/icons/new.svg" />
                    <img onclick="display(2)" src="../../components/icons/eye.svg" />
                </div>
            </div>
        </div>
        <?php
        require("../../components/UI/footer/footer.php")
        ?>

        <?php
        require("../../components/UI/Modal/Modal.html")
        ?>
        <script type="text/javascript" src="../../components/UI/Modal/Modal.js"></script>
        <script type="text/javascript" src="../GeneralJavascript/GlobalVariables.js"></script>
        <script type="text/javascript" src="../GeneralJavascript/CheckValidity.js"></script>
        <script type="text/javascript" src="./userData.js"></script>
        <script type="text/javascript" src="../../components/UI/header-sistema/header-sistema.js"></script>
</body>

</html>
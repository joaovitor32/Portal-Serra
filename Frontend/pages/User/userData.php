<!DOCTYPE html>
<html>

<head>
    <title>Portal Transparência</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='../../components/UI/Modal/Modal.css'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../components/UI/footer/footer.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/header-sistema/header-sistema.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/LoadingSpinner/LoadingSpinner.css'>
    <!--<link rel='stylesheet' type='text/css' href='../../components/UI/form/styles.css'>--->
    <!---<link rel='stylesheet' type='text/css' href='../../components/UI/barra-de-navegacao/barra-de-navegacao.css'>-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='./userData.css'>
</head>

<body style="background-color:rgba(169,169,169,0.7)">
    <div id="box-loading-spinner"></div>
    <?php
    require("../../components/UI/Modal/Modal.html")
    ?>
    <div id="box-content">
        <?php
        require("../../components/UI/header-sistema/header-sistema.php")
        ?>

        <?php
        require("../../components/UI/footer/footer.php")
        ?>
    </div>
    <script type="text/javascript" src="../../components/UI/Modal/Modal.js"></script>
    <script type="text/javascript" src="../GeneralJavascript/CheckValidity.js"></script>
    <script type="text/javascript" src="../../components/UI/header-sistema/header-sistema.js"></script>
    <script type="text/javascript" src="../GeneralJavascript/GlobalVariables.js"></script>
    <script type="text/javascript" src="./userData.js"></script>
</body>

</html>
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='./userList.css'>
</head>

<body style="background-color:rgba(169,169,169,0.7)">
    <div id="box-loading-spinner"></div>
    <div id="box-content">
        <?php
        require("../../components/UI/header-sistema/header-sistema.php")
        ?>
        <div id="box-cursos-item">
            <?php
            require("../../components/UI/footer/footer.php")
            ?>
        </div>
        <?php
        require("../../components/UI/footer/footer.php")
        ?>
        <?php
        require("../../components/UI/Modal/Modal.html")
        ?>
    </div>
    <script type="text/javascript" src="../../components/UI/Modal/Modal.js"></script>
    <script type="text/javascript" src="../GeneralJavascript/GlobalVariables.js"></script>
    <script type="text/javascript" src="../../components/UI/header-sistema/header-sistema.js"></script>
    <script type="text/javascript" src="./userList.js"></script>
    <script type="text/javascript" src="../GeneralJavascript/CheckValidity.js"></script>
</body>

</html>
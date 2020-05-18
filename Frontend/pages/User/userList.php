<!DOCTYPE html>
<html>

<head>
    <title>Portal Transparência</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='../../components/UI/LoadingSpinner/LoadingSpinner.css'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../components/UI/footer/footer.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/header-sistema/header-sistema.css'>
    <link rel='stylesheet' type='text/css' href='./userList.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/Modal/Modal.css'>

</head>

<body style="background-color:rgba(169,169,169,0.7)">
    <div id="box-loading-spinner"></div>
    <div id="box-content">
        <?php
        require("../../components/UI/header-sistema/header-sistema.php")
        ?>
        <div id="box-input">
            <form autocomplete="off">
                <label>Usuário a ser procurado: </label><input onkeyup="searchName(event)" >
            </form>
        </div>
        <div id="box-cursos-item">

        </div>
        <?php
        require("../../components/UI/footer/footer.php")
        ?>
    </div>
    <?php
    require("../../components/UI/Modal/Modal.html")
    ?>
    <script type="text/javascript" src="../GeneralJavascript/GlobalVariables.js"></script>
    <script type="module" src="./userList.js"></script>
</body>

</html>
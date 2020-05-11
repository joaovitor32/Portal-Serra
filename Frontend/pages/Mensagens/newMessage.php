<!DOCTYPE html>
<html>

<head>
    <title>Portal Transparência</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='../../components/UI/Modal/Modal.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/LoadingSpinner/LoadingSpinner.css'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../components/UI/footer/footer.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/header-sistema/header-sistema.css'>
    <link rel='stylesheet' type='text/css' href='./newMessage.css'>
</head>

<body style="background-color:rgba(169,169,169,0.7)">
    <div id="box-loading-spinner"></div>
    <div id="box-content">
        <?php
        require("../../components/UI/header-sistema/header-sistema.php")
        ?>
        <div id="box-content">
        <a href="./messageList.php"><img id="list-button" src="../../components/icons/list.svg" /></a>
            <div class="card">
                <div class="container-card">
                    <img src="../../components/icons/message.svg" />
                    <form id="new-message" onsubmit="newMessage(event)"> 
                        <div class="form-div">
                            <label>Mensagem:</label><textarea name="mensagem" type="text"></textarea>
                        </div>
                        <div class="form-div">
                            <label>Texto:</label><textarea name="texto" type="text"></textarea>
                        </div>
                        <div class="form-div">
                            <label>Data:</label><input name="data" type="date" />
                        </div>
                        <button type="submit">Salvar</button>
                    </form>
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
        <script type="text/javascript" src="../GeneralJavascript/FormFunctions.js"></script>
        <script type="text/javascript" src="../../components/UI/header-sistema/header-sistema.js"></script>
        <script type="text/javascript" src="./newMessage.js"></script>
</body>

</html>
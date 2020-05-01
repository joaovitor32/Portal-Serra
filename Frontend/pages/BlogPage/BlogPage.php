<!DOCTYPE html>
<html>

<head>
    <title>Portal Transparência</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <!--Chamando css do Header e fonts aqui-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../components/UI/header/header.css'>
    
    <link rel='stylesheet' type='text/css' href='../../components/UI/Modal/Modal.css'>
    <link rel='stylesheet' type='text/css' href='./BlogPage.css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body style="background-color:rgba(220,220,220,0.3)">
    <?php
<<<<<<< HEAD
    require("../../components/UI/header/header.php")
=======
    require("../../components/UI/header/header.html")
>>>>>>> 0e845ca00b454b7a40c9b42361d77e2e71212adb
    ?>
    <div class="major-box">
        <div class="box-tags-title">
            <p>Bem Vindo ao Blog!</p>
            <h4>Notícias recentes da Serra Jr!</h4>
        </div>
    </div>
    <div class="second-major-box">
        <div class="search-box">
            <input id="input-search"/>
            <button id="btn-seach">Procurar</button>
        </div>
    </div>
    <!----- Modal ------>
    <?php
    require("../../components/UI/Modal/Modal.html")
    ?>
    <script type="text/javascript" src="../../components/UI/Modal/Modal.js"></script>
    <script type="text/javascript" src="./BlogPage.js"></script>
</body>

</html>

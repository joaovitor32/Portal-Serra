<!DOCTYPE html>
<html>

<head>
    <title>Portal Transparência</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='../../components/footer/footer.css'>
    <link rel='stylesheet' type='text/css' href='../../components/form/styles.css'>
    <link rel='stylesheet' type='text/css' href='../../components/barra-de-navegacao/barra-de-navegacao.css'>
    <link rel='stylesheet' type='text/css' href='./Index.css'>
    <link rel='stylesheet' type='text/css' href='./Modal.css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <div class="box-login">
        <div class="box-form">
            <img id="img-logo" src="../../components/icons/serra.png" />
            <form id="form-login" class="form-login">
                <div id="box-input">
                    <label>
                        <input type="text" placeholder=" " required>
                        <span>Nome</span>
                    </label>
                </div>
                <div id="box-input">
                    <label>
                        <input type="password" placeholder=" " required>
                        <span>Senha</span>
                    </label>
                </div>
                <button onclick="submitLogin()" type="submit" id="login-btn">Login</button>
            </form>
        </div>
    </div>
    <div id="myModal" class="modal">

        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-content"></p>
        </div>

    </div>
    <script type="text/javascript" src="./Modal.js"></script>
    <script type="text/javascript" src="./Index.js"></script>
</body>

</html>
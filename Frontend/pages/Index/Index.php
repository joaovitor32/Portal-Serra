<!DOCTYPE html>
<html>

<head>
    <title>Portal Transparência</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='../../components/UI/footer/footer.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/form/styles.css'>
    <link rel='stylesheet' type='text/css' href='../../components/UI/Modal/Modal.css'>
    <link rel='stylesheet' type='text/css' href='./Index.css'>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body style="background-color:rgba(169,169,169,0.7)">
    <div class="box-login">
        <div class="box-form">
            <img id="img-logo" src="../../components/icons/serra.png" />
            <form id="form-login" class="form-login" onsubmit="submitLogin(event)">
                <div class="major-box-input">
                    <div id="box-input">
                        <label>
                            <input type="text" placeholder=" ">
                            <span>Nome</span>
                        </label>
                    </div>
                    <div id="box-input">
                        <label>
                            <input type="password" placeholder=" ">
                            <span>Senha</span>
                        </label>
                    </div>
                    <button type="submit" id="login-btn">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!----- Modal ------>
    <?php
    require("../../components/UI/Modal/Modal.html")
    ?>
    <script type="module" src="./Index.js"></script>
</body>

</html>
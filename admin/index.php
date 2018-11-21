<?php
    require_once '../components/resources.php';

    require_once 'functions/session.php';

    // var_dump($database->login('weyenriah@gmail.com', 'password'));

    if(isset($_POST['email']) && isset($_POST['password'])) {
       $email = htmlentities(trim($_POST['email']));
       $password = htmlentities(trim($_POST['password']));

       $login = $database->login($email, $password);

       if($login !== NULL) {
           $_SESSION['user'] = $login;
       }
    }

     if(isset($_SESSION['user'])) {
        header('Location: ' . BASE_URL . 'admin/home.php');

        die();
    }

?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/admin/components/admin-head.php') ?>

<body class="login-grid">
    <header>
        <a href="index.php" class="header-title"> Administratör </a>
    </header>

    <section class="login-box">
        <form method="post">
            <label class="login-label" for="email"> E-postadress </label>
            <input class="login-input" type="text" placeholder="Skriv in e-postadress..." name="email" required>

            <label class="login-label" for="password"> Lösenord </label>
            <input class="login-input" type="password" placeholder="Skriv in lösenord..." name="password" required>

            <button class="login-button" type="submit"> Logga in </button>
        </form>
    </section>
</body>
</html>


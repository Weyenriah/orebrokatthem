<?php
    require_once '../../functions/load.php';

    require_once '../../functions/session.php';

    if(isset($_POST['email']) && isset($_POST['password'])) {
       $email = htmlentities(trim($_POST['email']));
       $password = $_POST['password'];

       $login = $database->login($email, $password . PASSWORD_SALT);

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
<?php include(APP_FOLDER . '/includes/admin/admin-head.php') ?>

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


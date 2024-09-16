<?php
session_start();
require 'includes/config.php';
unset($_SESSION['status']);

session_destroy();

?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Выход из аккаунта | CinemaPark</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section class="hero curtain is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <div class="box">
            <h3 class="title">Выход из аккаунта</h3>
            <p class="subtitle">Вы вышли из аккаунта. <a class="darklink" href="index.php">Вернуться на начальную
                страницу.</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
<?php
dbDisconnect($connection);
?>
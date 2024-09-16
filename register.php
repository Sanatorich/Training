<?php
require 'includes/config.php';
require 'includes/functions.php';

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

register($connection);
?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Register | CinemaPark</title>
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
            <p class="title">
              Sign Up
            </p>
            <p class="subtitle">
              Пожалуйста, заполните эту форму чтобы создать аккаунт.
            </p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="field <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label class="label">Username</label>
                <div class="control has-icons-left">
                  <input type="text" class="input is-medium" name="username" value="<?php echo $username; ?>"
                    placeholder="Username" required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                </div>
                <span class="help is-danger">
                  <?php echo $username_err; ?>
                </span>
              </div>
              <div class="field <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label class="label">Password</label>
                <div class="control has-icons-left">
                  <input type="password" class="input is-medium" name="password" value="<?php echo $password; ?>"
                    placeholder="Password" required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </div>
                <span class="help is-danger">
                  <?php echo $password_err; ?>
                </span>
              </div>
              <div class="field <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label class="label">Confirm Password</label>
                <div class="control has-icons-left">
                  <input type="password" class="input is-medium" name="confirm_password"
                    value="<?php echo $confirm_password; ?>" placeholder="Confirm Password" required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </div>
                <span class="help is-danger">
                  <?php echo $confirm_password_err; ?>
                </span>
              </div>
              <input type="submit" class="button is-medium" value="Submit">
              <input type="reset" class="button is-medium" value="Reset">
              <br><br>
              <p>Уже есть аккаунт? <a class="darklink" href="login.php">Войти в аккаунт</a>.</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
<?php dbDisconnect($connection); ?>
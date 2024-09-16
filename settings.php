<?php
session_start();

include 'header.php';

checkLogin();

$info = "";
$info_err = "";
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if (isset($_POST['ispass']) && $_POST['ispass'] == 1) {
  $new_password_err = changePassword($connection);
}

if (isset($_POST['isinfo']) && $_POST['isinfo'] == 1) {
  $info_err = changeInfo($connection);
}

$page = "settings";
?>

<section class="hero is-fullheight curtain">
  <div class="hero-body">
    <div class="container">
      <div class='columns'>
        <div class='container profile'>
          <div class='section profile-heading'>
            <div class='columns profile-info is-mobile is-multiline'>
              <div class='column is-2'>
                <figure class="image is-1by1">
                  <img alt='' src='<?php echo ($_SESSION["userImg"]); ?>'>
                </figure>
              </div>
              <div class='column is-4-tablet is-10-mobile name'>
                <ul>
                  <li>
                    <p>
                      <span class='title is-bold'>
                        <?php echo ucfirst($_SESSION["username"]); ?>
                      </span>
                    </p>
                  </li>
                  <li>
                    <p>
                      <strong>Зарегистрирован:</strong>
                      <?php echo htmlspecialchars($_SESSION["userCreated"]); ?>
                    </p>
                  </li>
                  <li>
                    <p>
                      <strong>о пользователе:</strong>
                      <?php echo htmlspecialchars($_SESSION["userDesc"]); ?>
                    </p>
                  </li>
                </ul>
              </div>
              <div class='column is-6-tablet is-4-mobile has-text-centered'>
                <?php checkUserGroup(); ?>
              </div>
            </div>
          </div>
          <div class='box' style='border-radius: 0px;'>
            <ul class="profile-menu">
              <li class="<?php echo ($page == "profile" ? "active" : "") ?>"><a href="profile.php">My Profile</a></li>
              <li class="<?php echo ($page == "settings" ? "active" : "") ?>"><a href="settings.php">Settings</a></li>
            </ul><br>
            <h3 class="title">Настройки</h3>
            <p class="subtitle">Изменить ваш пароль, картинку пользователя или информацию.</p>
            <div class="column is-half">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="ispass" id="ispass" value="1">
                <div class="field <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                  <label class="label">Новый пароль</label>
                  <div class="control has-icons-left">
                    <input class="input is-medium" type="username" name="new_password" placeholder="New Password"
                      value="<?php echo $new_password; ?>">
                    <span class="icon is-small is-left">
                      <i class="fas fa-lock"></i>
                    </span>
                    <span class="help is-danger">
                      <?php echo $new_password_err; ?>
                    </span>
                  </div>
                </div>
                <div class="field <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                  <label class="label">Подтвердить пароль</label>
                  <div class="control has-icons-left">
                    <input class="input is-medium" type="password" name="confirm_password"
                      placeholder="Confirm Password">
                    <span class="icon is-small is-left">
                      <i class="fas fa-lock"></i>
                    </span>
                    <span class="help is-danger">
                      <?php echo $confirm_password_err; ?>
                    </span>
                  </div>
                </div>
                <input class="button" type="submit" name="submit" value="Изменить пароль">
              </form>
            </div>
            <div class="column is-half">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="isinfo" id="isinfo" value="1">
                <div class="field <?php echo (!empty($info_err)) ? 'has-error' : ''; ?>">
                  <label class="label">About</label>
                  <div class="control has-icons-left">
                    <textarea class="textarea is-medium" type="username" name="info" placeholder="Your Information..."
                      value="<?php echo $info; ?>"><?php echo $info; ?></textarea>
                    <span class="help is-danger">
                      <?php echo $info_err; ?>
                    </span>
                  </div>
                </div>
                <input class="button" type="submit" name="submit" value="Изменить информацию">
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php' ?>
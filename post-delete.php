<?php
session_start();

include 'header.php';

checkAdmin();

if (isset($_GET['deleteid']) && $_GET['deleteid'] > 0) {
  $isDeleteid = $_GET['deleteid'];
}

if (isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0) {
  deletePost($connection, $_POST['isdeleteid']);

  header("Location: index.php");
}
?>

<section class="hero is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-half has-text-centered">
          <form action="post-delete.php" method="post">
            <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteid; ?>">
            <input class="button is-large" type="submit" value="Удалить">
          </form>
          <br>
          <a href="index.php">Вернуться на начальную страницу</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php' ?>
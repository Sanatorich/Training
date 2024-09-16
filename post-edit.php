<?php
session_start();

include 'header.php';

checkAdmin();

if (isset($_GET['editid']) && $_GET['editid'] > 0) {
  $customerData = getPostInfo($connection, $_GET['editid']);
}

if (isset($_POST['updateid']) && $_POST['updateid'] > 0) {
  updatePost($connection);
  header("Location: index.php?editid=" . $_POST['updateid']);
}
?>

<section class="hero is-fullheight" style="background-color: #fff;">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column booking-col">
          <p class="title">
            Изменить отзыв '
            <?php echo $customerData['postTitle']; ?>'
          </p>
          <a class="darklink" href="index.php">Вернуться</a>
          <br><br>
          <form action="post-edit.php" method="post">
            <input type="hidden" name="updateid" value="<?php echo $customerData['postID']; ?>">
            <div class="field">
              <label class="label">Название:</label>
              <div class="control has-icons-left">
                <input class="input is-medium" type="text" placeholder="Ваше название" name="postTitle"
                  value="<?php echo $customerData['postTitle']; ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-pen"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <label class="label">Текст:</label>
              <textarea class="textarea" rows="12" placeholder="Your text.."
                name="postComment"><?php echo $customerData['postComment']; ?></textarea>
            </div>
            <input style="margin-top: 20px;" class="button is-medium" type="submit" value="Сохранить изменения">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php' ?>
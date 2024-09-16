<?php
session_start();

include 'header.php';

if (isset($_GET['id']) && $_GET['id'] > 0) {
  $postData = getPostInfo($connection, $_GET['id']);
}
?>

<section class="hero">
  <div class="hero-body">
    <div class="container">
      <div class="content">
        <h2 class="title">
          <?php echo $postData['postTitle']; ?>
          </a>
        </h2><i class="date">
          <?php echo ucfirst($postData['userName']); ?> |
          <?php echo date('Y-m-d H:i', strtotime($postData['postDate'])); ?>
        </i><br>
        <p class="post-comment">
          <?php echo $postData['postComment']; ?>
        </p><br>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php' ?>
<?php
session_start();

include 'header.php';

$allMovies = getMovies($connection);
$recMovie = getRecMovie($connection, 3);

require 'includes/Customer.php';
require 'includes/Adult.php';
require 'includes/Child.php';

$adult = new Adult('18', '15', 'Gold');
$child = new Child('0 - 17', '8', $recMovie);
?>

<section class="hero is-fullheight curtain">
  <div class="hero-body">
    <div class="container">
      <div class='columns is-multiline is-centered'>
        <?php while ($row = mysqli_fetch_array($allMovies)) { ?>
          <div class='column is-3'>
            <div class='card movie-card'>
              <div class='card-image'>
                <figure class='image is-4by3'>
                  <img src='<?php echo $row['movieImg']; ?>'>
                </figure>
              </div>
              <div class='card-content'>
                <div class='content'>
                  <h2 class="movie-title">
                    <?php echo $row['movieTitle']; ?>
                  </h2>
                  <?php $getCategories = getCategories($connection, $row['movieID']) ?>
                  <?php while ($rowCat = mysqli_fetch_array($getCategories)) { ?>
                    <span class='tag subtitle'>
                      <?php echo $rowCat['catName']; ?>
                    </span>
                  <?php } ?>
                  <p>
                    <?php echo $row['movieInfo']; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php' ?>
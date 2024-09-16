<?php
session_start();

include 'header.php';
checkLogin();

// Database connection and fetching movies
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema";


require_once 'includes/functions.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to fetch movies for dropdown
if (!function_exists('getMovies')) {
  function getMovies($connection)
  {
    function getMovies($connection)
    {
      $movie_query = "SELECT movieID, movieTitle FROM movies";
      return $connection->query($movie_query);
    }
  }
}
$movies = getMovies($conn);

function getSeatStatus($connection, $row, $seatNumber)
{
  $query = "SELECT `status` FROM `seats` WHERE `row` = ? AND `seatNumber` = ?"; // Убедитесь, что имена столбцов и таблицы верны
  $stmt = $connection->prepare($query);

  if (!$stmt) {
    die("Prepare failed: " . $connection->error); // Выводит ошибку, если запрос не может быть подготовлен
  }

  $stmt->bind_param("ii", $row, $seatNumber);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $seat = $result->fetch_assoc();
    return $seat['status'];
  } else {
    return 'available';
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Бронирование билетов на фильм</title>
</head>

<body>
  <div class="movie-container">
    <h2>Выберите фильм:</h2>
    <form action='' method='post'>
      <select id='movie'>
        <?php while ($movie = $movies->fetch_assoc()) { ?>
          <option value='<?php echo $movie['movieCost']; ?>' data-movie-cost='<?php echo $movie['movieCost']; ?>'>
            <?php echo $movie['movieTitle']; ?>
          </option>
        <?php } ?>
      </select>
    </form>
  </div>

  <div class='container'>
    <div class="screen"></div>
    <div class='seating-layout'></div>
    <?php
    for ($row = 1; $row <= 15; $row++) {
      echo "<div class='row'>";
      $seatCount = $row == 2 ? 10 : 10; // Количество мест в каждом ряду
      for ($seatNumber = 1; $seatNumber <= $seatCount; $seatNumber++) {
        $seatStatus = getSeatStatus($conn, $row, $seatNumber);
        $seatClass = $seatStatus == 'sold' ? 'seat sold' : 'seat';
        echo "<div class='$seatClass' data-row='$row' data-seat='$seatNumber'></div>";
      }
      echo "</div>";
    }
    ?>
  </div>
  </div>

  <div class="info">
    <p>Selected Seats: <span id='count'>0</span></p>
    <p>Total Price: <span id='total'>0</span>₽</p>
  </div>

  <script src="script.js"></script>
  <?php include 'footer.php'; ?>
</body>

</html>
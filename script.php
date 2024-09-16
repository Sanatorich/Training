<?php
$servername = "localhost";
$username = "root"; // Замените на ваше имя пользователя
$password = ""; // Ваш пароль
$dbname = "cinema"; // Имя вашей базы данных

// Создание подключения к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение списка ID фильмов
$result = $conn->query("SELECT `movieID` FROM `movies`");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $movieID = $row["movieID"];

        for ($rowNumber = 1; $rowNumber <= 20; $rowNumber++) {
            for ($seatNumber = 1; $seatNumber <= 10; $seatNumber++) {
                $sql = "INSERT INTO `seats` (`movieID`, `row`, `seatNumber`, `status`) VALUES ($movieID, $rowNumber, $seatNumber, 'available')";
                if (!$conn->query($sql)) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
} else {
    echo "0 results";
}

$conn->close();
?>
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";
$port = 3309;

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch book_id along with details
$sql = "SELECT book_id, book_title AS title, author, issue_date, due_date FROM issued_books";
$result = $conn->query($sql);

$books = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($books);

$conn->close();
?>

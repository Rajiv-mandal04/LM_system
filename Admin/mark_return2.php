<?php
$id = $_GET['id'] ?? 0;

$conn = new mysqli("localhost", "root", "11232743", "library_db");

if ($conn->connect_error) {
    die("Connection failed");
}

$today = date('Y-m-d');

$sql = "UPDATE issued_books SET return_date = '$today' WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Return marked successfully.";
} else {
    echo "Error updating record.";
}

$conn->close();
?>

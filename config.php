<?php
$conn = new mysqli("localhost", "root", "", "sansilcolor_db");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>
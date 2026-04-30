<?php
include 'config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM cores WHERE id = $id");
header("Location: gerenciamento.php");
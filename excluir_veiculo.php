<?php
include 'config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM veiculos WHERE id = $id");
header("Location: gerenciamento.php");
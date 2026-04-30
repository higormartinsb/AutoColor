<?php
include 'config.php';
$nome = $_POST['nome'];
$conn->query("INSERT INTO montadoras (nome) VALUES ('$nome')");
header("Location: gerenciamento.php");
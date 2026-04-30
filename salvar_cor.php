<?php
include 'config.php';

$nome = $_POST['nome'];
$codigo = $_POST['codigo'];

$conn->query("INSERT INTO cores (nome, codigo) VALUES ('$nome','$codigo')");

header("Location: gerenciamento.php");
<?php
include 'config.php';

$cor = $_POST['cor'];
$nome = $_POST['nome'];

$conn->query("INSERT INTO cor_codigos (cor_id, nome) VALUES ('$cor','$nome')");

header("Location: gerenciamento.php");
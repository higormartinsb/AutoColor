<?php
include 'config.php';

$nome = $_POST['nome'];
$montadora = $_POST['montadora'];

$conn->query("INSERT INTO veiculos (nome, montadora_id) 
VALUES ('$nome','$montadora')");

header("Location: gerenciamento.php");
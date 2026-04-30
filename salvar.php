<?php
include 'config.php';

$montadora = $_POST['montadora'];
$veiculo = $_POST['veiculo'];
$cor_codigo = $_POST['cor_codigo'];
$codigo_universal = $_POST['codigo_universal'];
$ano_inicio = $_POST['ano_inicio'];
$ano_fim = $_POST['ano_fim'];

$conn->query("INSERT INTO veiculo_cores 
(montadora_id, veiculo_id, cor_codigo_id, codigo_universal, ano_inicio, ano_fim)
VALUES
('$montadora','$veiculo','$cor_codigo','$codigo_universal','$ano_inicio','$ano_fim')");

echo "Cadastrado com sucesso!";
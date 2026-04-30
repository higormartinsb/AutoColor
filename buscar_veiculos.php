<?php
include 'config.php';

$id = $_GET['id'];

$res = $conn->query("SELECT * FROM veiculos WHERE montadora_id = $id");

echo "<option value=''>Selecione</option>";

while($v = $res->fetch_assoc()){
    echo "<option value='{$v['id']}'>{$v['nome']}</option>";
}
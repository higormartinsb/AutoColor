<?php
include 'config.php';

$montadora = $_GET['montadora'];
$veiculo = $_GET['veiculo'];
$cor = $_GET['cor'];

$sql = "
SELECT 
m.nome as montadora,
v.nome as veiculo,
c.nome as cor,
cc.nome as codigo,
vc.codigo_universal,
vc.ano_inicio,
vc.ano_fim

FROM veiculo_cores vc

JOIN montadoras m ON vc.montadora_id = m.id
JOIN veiculos v ON vc.veiculo_id = v.id
JOIN cor_codigos cc ON vc.cor_codigo_id = cc.id
JOIN cores c ON cc.cor_id = c.id

WHERE 1=1
";

if($montadora != ''){
    $sql .= " AND vc.montadora_id = '$montadora'";
}

if($veiculo != ''){
    $sql .= " AND vc.veiculo_id = '$veiculo'";
}

if($cor != ''){
    $sql .= " AND vc.cor_codigo_id = '$cor'";
}

$res = $conn->query($sql);

if($res->num_rows > 0){

    while($row = $res->fetch_assoc()){
        echo "
        <div class='card mb-3 p-3'>
            <strong>{$row['montadora']} - {$row['veiculo']}</strong><br>
            Cor: {$row['cor']}<br>
            Código: {$row['codigo']}<br>
            Universal: {$row['codigo_universal']}<br>
            Ano: {$row['ano_inicio']} até {$row['ano_fim']}
        </div>
        ";
    }

}else{
    echo "<p>Nenhum resultado encontrado</p>";
}
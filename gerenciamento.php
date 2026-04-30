<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gerenciamento</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    background:linear-gradient(135deg,#e2e8f0,#f8fafc);
    font-family:'Segoe UI', sans-serif;
}
.container-box{
    max-width:1100px;
    margin:auto;
    margin-top:50px;
}
.card{
    border:none;
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
}
input, select{
    border-radius:14px !important;
    padding:12px;
    border:1px solid #e2e8f0;
}
.btn-modern{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    border:none;
    border-radius:14px;
    padding:12px;
    font-weight:600;
}
.list-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:12px;
    border-bottom:1px solid #e2e8f0;
}
</style>
</head>

<body>

<div class="container container-box">

<h4 class="mb-4 fw-bold">Gerenciamento</h4>

<!-- CADASTROS -->
<div class="row g-3 mb-4">

<!-- MONTADORA -->
<div class="col-md-3">
<div class="card p-3">
<h6>Montadora</h6>
<form method="POST" action="salvar_montadora.php">
<input name="nome" class="form-control mb-2" required>
<button class="btn btn-modern w-100">Cadastrar</button>
</form>
</div>
</div>

<!-- VEICULO -->
<div class="col-md-3">
<div class="card p-3">
<h6>Veículo</h6>

<form method="POST" action="salvar_veiculo.php">

<select name="montadora" class="form-select mb-2" required>
<option value="">Montadora</option>

<?php
$res = $conn->query("SELECT * FROM montadoras");
while($m = $res->fetch_assoc()){
echo "<option value='{$m['id']}'>{$m['nome']}</option>";
}
?>

</select>

<input name="nome" class="form-control mb-2" placeholder="Ex: Palio" required>

<button class="btn btn-modern w-100">Cadastrar</button>

</form>

</div>
</div>

<!-- COR BASE -->
<div class="col-md-3">
<div class="card p-3">
<h6>Cor</h6>

<form method="POST" action="salvar_cor.php">
<input name="nome" class="form-control mb-2" placeholder="Ex: Branco" required>
<button class="btn btn-modern w-100">Cadastrar</button>
</form>

</div>
</div>

<!-- CODIGO DA COR -->
<div class="col-md-3">
<div class="card p-3">
<h6>Código da Cor</h6>

<form method="POST" action="salvar_codigo_cor.php">

<select name="cor" class="form-select mb-2" required>
<option value="">Cor base</option>

<?php
$res = $conn->query("SELECT * FROM cores");
while($c = $res->fetch_assoc()){
echo "<option value='{$c['id']}'>{$c['nome']}</option>";
}
?>

</select>

<input name="nome" class="form-control mb-2" placeholder="Ex: Branco Banchisa" required>

<button class="btn btn-modern w-100">Cadastrar</button>

</form>

</div>
</div>

</div>

<!-- LISTA MONTADORAS -->
<div class="card p-4 mb-4">
<h5>Montadoras</h5>

<?php
$res = $conn->query("SELECT * FROM montadoras");
while($m = $res->fetch_assoc()){
echo "<div class='list-item'>{$m['nome']}</div>";
}
?>

</div>

<!-- LISTA VEICULOS -->
<div class="card p-4 mb-4">
<h5>Veículos</h5>

<?php
$res = $conn->query("
SELECT v.nome, m.nome as montadora
FROM veiculos v
JOIN montadoras m ON v.montadora_id = m.id
");

while($v = $res->fetch_assoc()){
echo "<div class='list-item'>{$v['nome']} ({$v['montadora']})</div>";
}
?>

</div>

<!-- LISTA CORES -->
<div class="card p-4 mb-4">
<h5>Cores</h5>

<?php
$res = $conn->query("SELECT * FROM cores");
while($c = $res->fetch_assoc()){
echo "<div class='list-item'>{$c['nome']}</div>";
}
?>

</div>

<!-- LISTA CODIGOS -->
<div class="card p-4">
<h5>Códigos de Cor</h5>

<?php
$res = $conn->query("
SELECT cc.nome, c.nome as cor
FROM cor_codigos cc
JOIN cores c ON cc.cor_id = c.id
");

while($c = $res->fetch_assoc()){
echo "<div class='list-item'>{$c['cor']} - {$c['nome']}</div>";
}
?>

</div>

</div>

</body>
</html>
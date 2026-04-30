<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastrar Veículo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    background:linear-gradient(135deg,#e2e8f0,#f8fafc);
    font-family:'Segoe UI', sans-serif;
}
.container-box{
    max-width:1000px;
    margin:auto;
    margin-top:50px;
}
.card{
    border:none;
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
}
.form-select, input{
    border-radius:14px !important;
    padding:12px;
    border:1px solid #e2e8f0;
}
.form-select:focus, input:focus{
    border-color:#3b82f6;
    box-shadow:0 0 0 2px rgba(59,130,246,0.2);
}
.btn-modern{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    border:none;
    border-radius:14px;
    padding:14px;
    font-weight:600;
    font-size:16px;
    transition:0.3s;
}
.btn-modern:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(37,99,235,0.3);
}
.label{
    font-size:13px;
    font-weight:600;
    margin-bottom:5px;
    display:block;
}
</style>
</head>

<body>

<div class="container container-box">

<div class="card p-4 p-md-5">

<h4 class="mb-4 fw-bold">Cadastrar Veículo</h4>

<form method="POST" action="salvar.php">
<div class="row g-3">

<div class="col-12 col-md-4">
<label class="label">Montadora</label>
<select name="montadora" id="montadora" class="form-select">
<option value="">Selecione</option>

<?php
$res = $conn->query("SELECT * FROM montadoras");
while($m = $res->fetch_assoc()){
    echo "<option value='{$m['id']}'>{$m['nome']}</option>";
}
?>

</select>
</div>

<div class="col-12 col-md-4">
<label class="label">Veículo</label>
<select name="veiculo" id="veiculo" class="form-select">
<option value="">Selecione</option>
</select>
</div>

<div class="col-12 col-md-4">
<label class="label">Cor</label>
<select name="cor" id="cor" class="form-select">

<option value="">Selecione</option>

<?php
$res = $conn->query("SELECT * FROM cores");
while($c = $res->fetch_assoc()){
    echo "<option value='{$c['id']}'>{$c['nome']}</option>";
}
?>

</select>
</div>

<div class="col-12 col-md-6">
<label class="label">Código da Cor</label>
<select name="cor_codigo" id="cor_codigo" class="form-select">

<option value="">Selecione</option>

<?php
$res = $conn->query("
SELECT cc.id, cc.nome, c.nome as cor
FROM cor_codigos cc
JOIN cores c ON cc.cor_id = c.id
");

while($c = $res->fetch_assoc()){
    echo "<option value='{$c['id']}'>{$c['cor']} - {$c['nome']}</option>";
}
?>

</select>
</div>

<div class="col-12 col-md-6">
<label class="label">Código Universal</label>
<input name="codigo_universal" class="form-control">
</div>

<div class="col-6 col-md-3">
<label class="label">Ano Início</label>
<input name="ano_inicio" class="form-control">
</div>

<div class="col-6 col-md-3">
<label class="label">Ano Fim</label>
<input name="ano_fim" class="form-control">
</div>

<div class="col-12 mt-3">
<button type="submit" class="btn btn-modern w-100">
<i class="bi bi-check-circle"></i> Cadastrar Veículo
</button>
</div>

</div>
</form>

</div>

</div>

<script>
document.getElementById('montadora').addEventListener('change', function(){

    let id = this.value;

    fetch('buscar_veiculos.php?id=' + id)
    .then(res => res.text())
    .then(data => {
        document.getElementById('veiculo').innerHTML = data;
    });

});
</script>

</body>
</html>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Busca de Cores</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    background:linear-gradient(135deg,#e2e8f0,#f8fafc);
    font-family:'Segoe UI', sans-serif;
}
.container-box{
    max-width:950px;
    margin:auto;
    margin-top:60px;
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

<h4 class="mb-4 fw-bold">Consulta de Cor Automotiva</h4>

<div class="row g-3">

<!-- MONTADORA -->
<div class="col-12 col-md-6">
<label class="label">Montadora</label>
<select id="montadora" class="form-select">
<option value="">Selecione</option>

<?php
$res = $conn->query("SELECT * FROM montadoras");
while($m = $res->fetch_assoc()){
    echo "<option value='{$m['id']}'>{$m['nome']}</option>";
}
?>

</select>
</div>

<!-- VEICULO -->
<div class="col-12 col-md-6">
<label class="label">Veículo</label>
<select id="veiculo" class="form-select">
<option value="">Selecione</option>
</select>
</div>

<!-- COR -->
<div class="col-12 col-md-6">
<label class="label">Cor</label>
<select id="cor" class="form-select">
<option value="">Selecione</option>

<?php
$res = $conn->query("SELECT * FROM cores");
while($c = $res->fetch_assoc()){
    echo "<option value='{$c['id']}'>{$c['nome']}</option>";
}
?>

</select>
</div>

<!-- ANOS -->
<div class="col-6 col-md-3">
<label class="label">Ano início</label>
<input id="ano_inicio" class="form-control" placeholder="Ex: 2015">
</div>

<div class="col-6 col-md-3">
<label class="label">Ano fim</label>
<input id="ano_fim" class="form-control" placeholder="Ex: 2020">
</div>

<!-- BOTÃO -->
<div class="col-12 mt-3">
<button type="button" class="btn btn-modern w-100" onclick="buscar()">
Buscar
</button>
</div>

</div>
</div>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalResultado">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Resultado</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" id="resultado"></div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>

<!-- JS VEICULO DINAMICO -->
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

<!-- JS BUSCA -->
<script>
function buscar(){

    let montadora = document.getElementById('montadora').value;
    let veiculo = document.getElementById('veiculo').value;
    let cor = document.getElementById('cor').value;

    fetch(`buscar_resultado.php?montadora=${montadora}&veiculo=${veiculo}&cor=${cor}`)
    .then(res => res.text())
    .then(data => {
        document.getElementById('resultado').innerHTML = data;

        var modal = new bootstrap.Modal(document.getElementById('modalResultado'));
        modal.show();
    });

}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
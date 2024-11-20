<?php
if (isset($_GET["fun"])) {
    $_SESSION["funcao"] = $_GET["fun"];
}
?>
<script>
    function envia() {
        var nomePaciente = document.getElementsByName('nome')[0].value;
        var leito = document.getElementsByName('le')[0].value;

        var url = 'apiPacientes.php?nome=' + nomePaciente + '&le=' + leito;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.resposta == true) {
                    document.getElementById('saida').innerHTML = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso</div>";
                } else {
                    document.getElementById('saida').innerHTML = "<div class='alert alert-success' role='alert'>Não cadastrado</div>";
                }
            });
    }
</script>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro enfermeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include("navbar2.php"); ?>
    <div class="container-sm">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Insira o nome:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome" name="nome">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Insira o leito:</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Leito" name="le">
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" onclick='envia()'>Cadastre-se</button>
        </div>
        <div class="mb-3">
            <label id="saida"></label>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
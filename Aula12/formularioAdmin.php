<?php
include("navbar2.php");
if (isset($_GET["id"])) {
    $_SESSION["id"] = $_GET["id"];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Receita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function envia() {
            var nomePaciente = document.getElementsByName('pa')[0].value;
            var medicamento = document.getElementsByName('med')[0].value;
            var data = document.getElementsByName('dt')[0].value;
            var hora = document.getElementsByName('hr')[0].value;
            var dose = document.getElementsByName('ds')[0].value;

            var url = 'apiAdminReceitas.php?pa=' + nomePaciente + '&med=' + medicamento + '&dt=' + data + '&hr=' + hora + '&ds=' + dose;

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
</head>

<body>

    <div class="container-sm">

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Insira o nome do paciente:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome do paciente" name="pa">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Nome do medicamento:</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Medicamento" name="med">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Data da administração:</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Data" name="dt">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Hora da administração:</label>
            <input type="time" class="form-control" id="formGroupExampleInput2" placeholder="Hora" name="hr">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Dose:</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Dose" name="ds">
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" onclick="envia()">Cadastre-se</button>
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
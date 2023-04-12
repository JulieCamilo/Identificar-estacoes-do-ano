<html>
    <head>
        <meta charset="UTF-8">
        <title>Identificar estação do ano</title>
    </head>
    <body>
        <h1>Identificar estações do ano</h1>
        <form method="GET">
            <label for="data">Digite a data:</label>
            <input type="date" name="data" id="data">
            <input type="submit" value="Enviar">
        </form>

        <?php
        if (isset($_GET['data'])) {
            $data = $_GET['data'];
            if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $data, $matches)) {
                $ano = $matches[1];
                $mes = $matches[2];
                $dia = $matches[3];
                $data = strtotime("$ano-$mes-$dia");
                $estacao = '';

                if ($data >= strtotime("$ano-03-20") && $data < strtotime("$ano-06-21")) {
                    $estacao = 'outono';
                } elseif ($data >= strtotime("$ano-06-21") && $data < strtotime("$ano-09-23")) {
                    $estacao = 'inverno';
                } elseif ($data >= strtotime("$ano-09-23") && $data < strtotime("$ano-12-22")) {
                    $estacao = 'primavera';
                } else {
                    $estacao = 'verão';
                }

                echo("<p>A data $dia/$mes/$ano está na estação $estacao.</p>");
            } else {
                echo("<p>A data fornecida é inválida. Por favor, digite uma data no formato AAAA-MM-DD.</p>");
            }
        }
        ?>
    </body>
</html>


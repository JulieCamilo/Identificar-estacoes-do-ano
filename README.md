# Identificar estações do ano

***Status: <font color="green">Desenvolvido***</font> <br>
<br>

**Este é um código em PHP, feito por mim, que te mostra qual é a estação de acordo com a data que você coloca.**<br>
<br>
<br>
## Requisitos
Para rodar a aplicação, é necessário:<br>

* Ter instalado o Xampp;
* (opcional) Ter instalada a extensão "Open PHP/HTML/JS In Browser";
* Se certificar de que haja uma pasta para receber esse arquivo, no "htdocs" do "xampp" localizado no disco local do computador;

Baixado esses aplicativos, para abri-lo:<br>

* Acesse o arquivo pelo VSCODE, e se certifique de que o "APACHE" do Xampp esteja ligado e funcionando corretamente;
* Logo após isso, clique no código com o botão direito e clique em "Open PHP/HTML/JS In Browser"
(De acordo com sua configuração, o navegador indicado na extensão será aberto e o código será aberto);<br>
<br>
<br>
## Como o código funciona?<br>
<br>
O código é uma página HTML que contém um formulário e um bloco PHP embutido. O objetivo dessa página é identificar a estação do ano com base na data inserida pelo usuário no formulário.<BR>
<BR>
<BR>

<font color="blue">

### **HTML**
</font>


O código é uma página HTML que contém um formulário e um bloco PHP embutido. O objetivo dessa página é identificar a estação do ano com base na data inserida pelo usuário no formulário.

A estrutura HTML começa com uma tag <font color="red">**(html)**</font> que contém a tag <font color="red">**(head)**</font> e a tag <font color="red">**(body)**</font>. A tag <font color="red">**(head)**</font> contém informações sobre a página, como o título da página e o conjunto de caracteres usados na codificação. Já a tag <font color="red">**(body)**</font> contém o conteúdo visível na página, como o título "Identificar estações do ano" e um formulário.

O formulário HTML é definido pela tag <font color="red">**(form)**</font>, que possui um atributo method com valor "GET", indicando que os dados inseridos no formulário serão enviados para o servidor via URL. Dentro do formulário, há um rótulo HTML <font color="red">**(label)**</font> e um campo de entrada <font color="red">**(input)**</font> para o usuário inserir a data: <br>
<br>
```
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
``` 
<br>

<font color="blue">

### **PHP** </font>

Em seguida, o código PHP começa com um bloco if que verifica se foi recebido algum valor através do método GET, ou seja, se o formulário foi enviado pelo usuário. Se a condição for verdadeira, a data inserida pelo usuário é armazenada na variável $data.<br>
<br>
```
 <?php
        if (isset($_GET['data'])) {
            $data = $_GET['data'];

```
Logo após, o código verifica se a data inserida está no formato correto AAAA-MM-DD, usando a função preg_match(). Se a data for válida, as informações sobre o ano, mês e dia são extraídas da data e armazenadas nas variáveis $ano, $mes e $dia, respectivamente. <br>
<br>

```   
if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $data, $matches)) {
                $ano = $matches[1];
                $mes = $matches[2];
                $dia = $matches[3];
                $data = strtotime("$ano-$mes-$dia");
                $estacao = '';

```

Depois, a data inserida pelo usuário é convertida em um formato de tempo UNIX usando a função strtotime(), para que possa ser comparada com outras datas mais facilmente. Em seguida, uma série de condicionais if-elseif-else é usada para determinar a estação do ano com base na data inserida. Se a data estiver dentro do intervalo de 20 de março a 20 de junho, a estação será "outono"; se estiver dentro do intervalo de 21 de junho a 22 de setembro, a estação será "inverno"; se estiver dentro do intervalo de 23 de setembro a 21 de dezembro, a estação será "primavera"; caso contrário, a estação será "verão".<br>
<br>
```

                if ($data >= strtotime("$ano-03-20") && $data < strtotime("$ano-06-21")) {
                    $estacao = 'outono';
                } elseif ($data >= strtotime("$ano-06-21") && $data < strtotime("$ano-09-23")) {
                    $estacao = 'inverno';
                } elseif ($data >= strtotime("$ano-09-23") && $data < strtotime("$ano-12-22")) {
                    $estacao = 'primavera';
                } else {
                    $estacao = 'verão';
                }
```

Por fim, o código exibe uma mensagem ao usuário na tela informando a estação do ano com base na data inserida. Se a data inserida não estiver no formato correto AAAA-MM-DD, o código exibirá uma mensagem de erro informando que a data inserida é inválida e deve estar no formato AAAA-MM-DD.<br>
<br>
```
     echo("<p>A data $dia/$mes/$ano está na estação $estacao.</p>");
            } else {
                echo("<p>A data fornecida é inválida. Por favor, digite uma data no formato AAAA-MM-DD.</p>");
            }
        }
```



<?php
    $file = file ("log.txt");

    if (isset($_GET['cadastrar']) && isset($_GET['texto'])) {
        $arquivo = fopen('log.txt', 'a');
        $texto = $_GET['texto'] . "\n";
        fwrite($arquivo, $texto);
        fclose($arquivo);
        header('Location: index.php?');
    }

    if ( isset($_GET['alterar']) && isset($_GET['novoTexto']) && isset($_GET['linha']) ) {
        $linha = $_GET['linha'];
        $texto = $_GET['novoTexto'];
        $file[$linha-1] = $texto;
        file_put_contents('log.txt',$file);
        header('Location: index.php?');
    }

    if (isset($_GET['remover']) && isset($_GET['linha'])) {
        $linha = $_GET['linha'];
        unset($file[$linha-1]);
        file_put_contents('log.txt',$file);
        header('Location: index.php?');
    }
?>

Listagem de linhas <br><br>
<?php
    $cont = 0;
    foreach($file as $line) {
        $cont ++;
        echo $line. "<br>";
    }
?><br><br><br><br><br><br>

Cadastro de linhas <br><br>
<form method="get">
    <input type="text" name="texto" placeholder="Texto">
    <input type="submit" name="cadastrar" value="salvar">
</form>

Alteração de linhas <br><br>
<form method="get">
    <input type="integer" name="linha" placeholder="Linha a alterar">
    <input type="integer" name="novoTexto" placeholder="Novo texto">
    <input type="submit" name="alterar" value="alterar">
</form>

Remoção de linhas <br><br>
<form method="get">
    <input type="integer" name="linha" placeholder="Linha a remover">
    <input type="submit" name="remover" value="remover">
</form>
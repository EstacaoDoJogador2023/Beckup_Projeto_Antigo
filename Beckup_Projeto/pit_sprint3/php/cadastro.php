<?php
session_start();
$BancoDeDados = new PDO("mysql:host=localhost;dbname=pit_julio", "root", "");

if (isset($_POST['enviar'])) {
    $NomeAtleta = $_POST['nome'];
    $DataNascimento = $_POST['datanasc'];
    $EsportesAtuacao = $_POST['esportesAtuacao'];
    $Email = $_POST['emailAtleta'];
    $Telefone = $_POST['telefoneAtleta'];
    $Senha = $_POST['senha'];
    $SenhaConfirmacao = $_POST['senhaconf'];
 
    $INSERT = $BancoDeDados->prepare("INSERT INTO atleta VALUES(null, :nome, :data_nasc, :esporte, :email, :telefone, :senha)");

    if ($Senha == $SenhaConfirmacao) {
        $INSERT->bindParam(':nome', $NomeAtleta);
        $INSERT->bindParam(':data_nasc', $DataNascimento);
        $INSERT->bindParam(':esporte', $EsportesAtuacao);
        $INSERT->bindParam(':email', $Email);
        $INSERT->bindParam(':telefone', $Telefone);
        $INSERT->bindParam(':senha', $Senha);

        if($INSERT->execute()){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Cadastro feito com sucesso </div>";
            header("Location: exibicoes.php");

        }
        else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro no cadastro </div>";
            header("Location: exibicoes.php");
        }
    }
    else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Digite senhas iguais<br> 
                            <a href='../Cadastro.html'>Voltar para cadastro</a></div>";
            header("Location: exibicoes.php");
    }
}


?>
<?php

if(isset($_POST['enviar-empresario'])){
     $NomeEmpresa = $_POST['empresa'];
     $EmailComercial = $_POST['emailEmpresa'];
     $TelefoneComercial = $_POST['telefone'];
     $Cnpj = $_POST['cnpj'];
     $Patrocinador = $_POST['patrocinador'];

     $INSERT = $BancoDeDados->prepare("INSERT INTO Empresas VALUES (null, :nome, :email, :telefoneComercial, :cnpj, :patrocinador)");
    
    $INSERT->bindParam(':nome', $NomeEmpresa);
     $INSERT->bindParam(':email', $EmailComercial);
     $INSERT->bindParam(':telefoneComercial', $TelefoneComercial);
     $INSERT->bindParam(':cnpj', $Cnpj);
    $INSERT->bindParam(':patrocinador', $Patrocinador);

     if($INSERT->execute()){
         $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados cadastratos com sucesso <br>
                                 <a href='../login.html'>Clique aqui para fazer login</a></div>";
             header("Location: exibicoes.php");
    }
     else{
         $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro no cadastro </div>";
         header("Location: exibicoes.php");
     }
}

?>
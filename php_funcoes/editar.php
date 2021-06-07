<?php
session_start();
require_once 'db_connect.php';
        if(isset($_POST['editar'])):
            $nome = mysqli_escape_string($connect, $_POST['Nome']);
            $fabricante = mysqli_escape_string($connect, $_POST['Fabricante']);
            $categoria = mysqli_escape_string($connect, $_POST['Categoria']);
            $quantidade = mysqli_escape_string($connect, $_POST['Quantidade']);
            $preco = mysqli_escape_string($connect, $_POST['Preco']);
            $id_produto = mysqli_escape_string($connect, $_POST['idProd']);
            $sql = "UPDATE produtos SET Nome = '$nome' , Fabricante = '$fabricante' , Categoria = '$categoria', Quantidade = '$quantidade', Preco = '$preco'  WHERE idProd = '$id_produto' ";               
            if(mysqli_query($connect, $sql)):
                $_SESSION['mensagem'] = "Atualizado com Sucesso!";
                header('location: ../index.php?sucesso');
                mysqli_close($connect); 
            else:
                $_SESSION['mensagem'] = "Erro ao Atualizar!";
                header('location: ../index.php?erro');
                mysqli_close($connect);
        endif;
    endif;
?>
<?php
    session_start();
    require_once 'db_connect.php';


        
        if(isset($_POST['apagar'])):

            $id_produto = mysqli_escape_string($connect, $_POST['idProd']);
            $sql = "DELETE FROM produtos WHERE idProd = '$id_produto' ";
                
            if(mysqli_query($connect, $sql)):
                $_SESSION['mensagem'] = "Deletado com Sucesso!";
                header('location: ../index.php?sucesso');
                mysqli_close($connect); 
            else:
                $_SESSION['mensagem'] = "Erro ao Deletar!";
                header('location: ../index.php?erro');
                mysqli_close($connect);
        endif;
    endif;
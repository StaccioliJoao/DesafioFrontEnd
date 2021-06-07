<?php // Cadastra um novo produto no banco de dados
    require_once 'db_connect.php';
    session_start();    
        if(isset($_POST['cadastrar'])):
            $nome = mysqli_escape_string($connect, $_POST['nome']);
            $fabricante = mysqli_escape_string($connect, $_POST['fabricante']);
            $categoria = mysqli_escape_string($connect, $_POST['categoria']);
            $quantidade = mysqli_escape_string($connect, $_POST['quantidade']);
            $preco = mysqli_escape_string($connect, $_POST['preco']);

            switch ($fabricante) {
                case 0:
                    $fabricante = "Não Selecionou";
                    break;
                case 1:
                    $fabricante = "Coca-Cola";
                    break;
                case 2:
                    $fabricante = "Nestle";
                    break;     
                case 3:
                    $fabricante = "Pepsi";
                    break;     
                }
            switch ($categoria) {
                case 0:
                    $categoria = "Não Selecionou";
                    break;
                case 11:
                    $categoria = "Coca";
                    break;
                case 22:
                    $categoria = "Fanta";
                    break;     
                case 111:
                    $categoria = "Nescau";
                    break;     
                case 222:
                    $categoria = "Caixa de Bombom";
                    break;     
                case 1111:
                    $categoria = "Pepsi";
                    break;     
                case 2222:
                    $categoria = "Kuat";
                    break;     
                }
            $sql = "INSERT INTO produtos (nome, fabricante, categoria, quantidade, preco ) VALUES ('$nome',
            '$fabricante', '$categoria', '$quantidade', '$preco')";
            
            if(mysqli_query($connect, $sql)):
                $_SESSION['mensagem'] = "Cadastrado com Sucesso!";
                header('location: ../index.php?sucesso');
                mysqli_close($connect);
            else:
                $_SESSION['mensagem'] = "Erro ao Cadastrar!";
                header('location: ../index.php?erro');
                mysqli_close($connect);
        endif;
    endif;
?>
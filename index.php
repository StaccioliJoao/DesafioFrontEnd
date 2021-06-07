<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/a67f130521.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <?php include_once 'php_funcoes/db_connect.php';?>
    <title>Desafio Front-end</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="col">
            <h4 class="mt-5">Cadastrar produto</h4>
            <form action="php_funcoes/cadastrar.php" method="POST">
                
                <div class="form-group col-md-4">
                  <label for="nomeProd">Nome Do Produto</label>
                  <input value="" type="text" name="nome" class="form-control" id="nomeProd" placeholder="Digite nome do produto:">
                </div>
                    <label for="fabProd">Fabricante do Produto</label>
                    <select id="fabProd" name="fabricante" id="fabricante" class="w-auto form-select">
                        <option selected value="0">Selecione um Fabricante</option>
                        <option value="1">Coca Cola</option>
                        <option value="2">Nestle</option>
                        <option value="3">Pepsi</option>
                      </select>
                      <label for="CatProd">Categoria do Produto</label>
                      <select id="CatProd" class="w-auto form-select" name="categoria" id="categoria">
                          <option selected value="0">Selecione uma Categoria</option>
                        </select>
                      <div class="form-group col-md-3">
                        <label for="quantProd">Quantidade</label>
                        <input type="number" value="" name="quantidade"class="form-control" id="quantProd" placeholder="Quantidade">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="preco">Preço</label>
                        <input type="number" value="" name="preco" class="form-control" id="preco" placeholder="Preço">
                      </div>
                <button type="submit" name="cadastrar" class="btn btn-primary mt-2">Adicionar Produto</button>
              </form>

          </div>
          <div class="col">
            <h4 class="mt-5">Produtos cadastrados</h4>
            <table class="table dataTable my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Fabrica</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                <?php   
                       $sql = "SELECT * FROM produtos";    //cria string de consulta e joga na variavel sql
                       $resultado = mysqli_query($connect, $sql); // resultado recebe consulta do banco de dados
                       mysqli_close($connect); //fecha conecao com banco de dados
                        $var6 = 0;
                        $var7 = 0;
                       while($dados = mysqli_fetch_array($resultado)): // repete resultado equanto existir e joga na variavel dados
                           $varID = $dados['idProd']; //Pegar ID da tabela - super importante
   
                       $var1 = $dados['Nome']; // joga os valores que vieram do bd em variaveis genericas
                       $var2 = $dados['Fabricante'];
                       $var3 = $dados['Categoria'];
                       $var4 = $dados['Quantidade'];
                       $var5 = $dados['Preco'];
                       $var6 += $var4;
                       $var7 += $var5;
                        ?>
                    <tr>
                        <td><?php echo $var1; ?></td>
                        <td><?php echo $var2 ?></td>
                        <td><?php echo $var3 ?></td>
                        <td><?php echo $var4 ?></td>
                        <td><?php echo $var5 ?></td>
                        <td><button class="btn btn-success btn-circle ml-1" type="button" data-bs-toggle="modal" data-bs-target="#modal-edit<?php echo $varID; ?>"><i class="fas fa-pencil-alt text-white"></i></button></td>
                        <td><form action="php_funcoes/apagar.php" method="POST">
                        <input type="hidden" name="idProd" value="<?php echo $varID; ?> "> 
                        <button class="btn btn-danger btn-circle ml-1" type="submit" name="apagar" > <i class="fas fa-trash text-white"></i></button></form></td>
                    </tr>
                    <!-- Inicio Modal Editar -->
                    <div class="modal fade" role="dialog" tabindex="-1" id="modal-edit<?php echo $varID; ?>">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <div class="col">
                                        <h4 class="modal-title text-success">Editar Produto</h4>
                                <div class="modal-body">
                                
                    <!-- Inicio Formulario que manda informaçoes pro bd-->
                    <form action="php_funcoes/editar.php" method="POST">
                            <input type="hidden" name="idProd" value="<?php echo $varID; ?>">
                            <div class="form-group w-auto"><label>Nome do Produto</label><input class="form-control" value=" <?php echo $var1; ?>" type="text" name="Nome" required="" maxlength="32"></div>
                            <div class="form-group w-auto"><label>Fabricante do Produto</label><input class="form-control"  value="<?php echo $var2; ?>" type="text" name="Fabricante" maxlength="300"></div>
                            <div class="form-group w-auto"><label>Categoria do Produto</label><input class="form-control" value="<?php echo $var3; ?>" type="text" name="Categoria" required=""></div>
                            <div class="form-group w-auto"><label>Quantidade</label><input class="form-control" value="<?php echo $var4; ?>" type="number" name="Quantidade" required=""></div>
                            <div class="form-group w-auto"><label>Preço</label><input class="form-control" value="<?php echo $var5; ?>" type="number" name="Preco" required=""></div>
                            <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-success" name="editar" type="submit">Editar</button>
                        </div>
                    </form>
                    <!-- Fim Formulario que manda informaçoes pro bd-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim  Modal Editar-->
                    

                        <?php endwhile; ?>
                </tbody>
                <tfoot>
                                    <tr>
                                    <td>Total:</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $var6?></td>
                                    <td><?php echo $var7?></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                </tfoot>
                


          </div>
        </div>


        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

        $("#fabProd").change(function() {
             var val = $(this).val();
                 if (val == "1") {
                        $("#CatProd").html("<option value='11'>Coca</option><option value='22'>Fanta</option>");
                    } else if (val == "2") {
                        $("#CatProd").html("<option value='111'>Nescau</option><option value='222'>Caixa de Bombom</option>");

                    } else if (val == "3") {
                        $("#CatProd").html("<option value='1111'>Pepsi</option><option value='2222'>Kuat</option>");

                    }
});


});
    </script>
  </body>
</html>
<?php
    require 'banco.php';

    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $nomeErro = null;
        $descricaoErro = null;
        $valorErro = null;
 

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];

        //Validaçao dos campos:
        $validacao = true;
        if(empty($nome))
        {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = false;
        }

        if(empty($descricao))
        {
            $descricaoErro = 'Por favor digite sua descricao!';
            $validacao = false;
        }

        if(empty($valor))
        {
            $valorErro = 'Por favor digite o valor!';
            $validacao = false;
        }

        

        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO produto (nome, descricao, valor) VALUES(?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$descricao,$valor));
            Banco::desconectar();
            header("Location:index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Adicionar Contato</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
            <div class="card">
                <div class="card-header">
                    <h3 class="well"> Adicionar Produto </h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="cadastrarproduto.php" method="post">

                        <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input size="50" class="form-control" name="nome" type="text" placeholder="Nome"
                                    required="" value="<?php echo !empty($nome)?$nome: '';?>">
                                <?php if(!empty($nomeErro)): ?>
                                <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="control-group <?php echo !empty($descricaoErro)?'error ': '';?>">
                            <label class="control-label">Descricao</label>
                            <div class="controls">
                                <input size="80" class="form-control" name="descricao" type="text" placeholder="descricao"
                                    required="" value="<?php echo !empty($descricao)?$descricao: '';?>">
                                <?php if(!empty($descricaoErro)): ?>
                                <span class="help-inline"><?php echo $descricaoErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="control-group <?php echo !empty($valorErro)?'error ': '';?>">
                            <label class="control-label">Valor</label>
                            <div class="controls">
                                <input type="number_format" size="35" class="form-control" name="valor"
                                    placeholder="R$20.00" required=""
                                    value="<?php echo !empty($valor)?$valor: '';?>">
                                <?php if(!empty($valorErro)): ?>
                                <span class="help-inline"><?php echo $valorErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>

                        
                        
                        <div class="form-actions">
                            <br />

                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
<?php
    require 'banco.php';
    $id = null;
    if(!empty($_GET['id']))
    {
        $id = $_REQUEST['id'];
    }

    if(null==$id)
    {
        header("Location: index.php");
    }
    else
    {
       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM cliente where id = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($id));
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Informações do Contato</title>
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="card">
                <div class="card-header">
                    <h3 class="well">Informações do Contato</h3>
                </div>
                <div class="container">
                    <div class="form-horizontal">

                        <div class="control-group">
                            <label class="control-label">
                                <h3> <span class="badge badge-light">Nome:</span> <?php echo $data['nome'];?></h2>
                            </label>
                        </div>

                        <div class="control-group">
                            <label class="control-label">
                            <h3> <span class="badge badge-light">Endereco:</span> <?php echo $data['endereco'];?></h2>
                        </div>

                        <div class="control-group">
                            <label class="control-label">
                                <h3> <span class="badge badge-light">Telefone:</span> <?php echo $data['telefone'];?></h2>
                            </label>
                        </div>

                        <div class="control-group">
                            <label class="control-label">
                                <h3> <span class="badge badge-light">Email:</span> <?php echo $data['email'];?></h2>
                            </label>
                        </div>

                        <div class="control-group">
                            <label class="control-label">
                                <h3> <span class="badge badge-light">Sexo:</span> <?php echo $data['sexo'];?></h2>
                            </label>
                        </div>

                        <br />
                        <div class="form-actions">
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
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
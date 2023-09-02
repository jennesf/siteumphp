<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacina</title>
    <link rel="stylesheet" href="css/styleJ.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="imagens/logo.png" alt="Logo"></a>
        <nav>
            <a href="index.php">HOME</a>
            <a href="tabelas.php">TABELAS</a>
            <a href="contato.php">CONTATO</a>
        </nav>
    </header>
    <section><img src="imagens/fundo2.png"></section>
<h1 class="titulo1">Tabela Postos de Saúde</h1>
            <!-- Início do PHP -->
           <?php
            $c = mysqli_connect("localhost", "root", "", "p_vacinacao");
            if (mysqli_connect_errno() <> 0) {
                $msg = mysqli_error($c);
                echo "<br>" . "Erro na conexão com o banco de dados" . $msg;
            }

            else {
              $result = mysqli_query($c, "INSERT INTO
            posto (cod_posto, endereco, nome)
            VALUES (001, 'Av. Serra da Mantiqueira', 'UBS Vila Carmela'),
            (002, 'R. Tapiramuta', 'UBS Nova Bonsucesso'),
            (003, 'Rua Catharina Mariana de Jesus', 'PA Bonsucesso'),
            (004, 'R. Serra Verde', 'Posto de Saúde');");

            if($result){
                echo "<br>" . "Registro incluido com sucesso!";
               } else{
                $result = mysqli_query($c,$sql);
                echo "<br>" . "Registro não incluido!" . $msg;
               } 

              $sql = "UPDATE posto SET nome ='Posto Vila Carmela' WHERE cod_posto = 001;";
                $result = mysqli_query($c,$sql);
                if($result==true){
                    echo "<br>" . "Alteração ok!";
                }else{
                    $msg = mysqli_connect_error($c);
                    echo "<br>" . "Registro não incluido!" . $msg;
                } 
    
            $sql = "DELETE FROM posto WHERE cod_posto = 003;";
            $result = mysqli_query($c,$sql);
            if($result == true){
                echo "<br>" . "Exclusão ok!";
             } else{
                $msg = mysqli_connect_error($c);
                echo "<br>" . "Exclusão nok!" . $msg;
             }  
            }
                $sql = "SELECT * FROM posto";
                $consulta = mysqli_query($c, $sql);
                $n = mysqli_num_rows($consulta);
                    echo "<section class='tabela'>";
                        echo "<table class='table'>";
                        echo "<tr class='tabelajenni2'>";
                            echo "<th>Código do posto</th>";
                            echo "<th>Endereço</th>";
                            echo "<th>Nome</th>";
                        echo "</tr>";
                        for ($i=0; $i < $n; $i++) {
                            $linha = mysqli_fetch_assoc($consulta);
                            echo "<tr>";
                                echo "<td class='td'>".$linha['cod_posto']."</td>";
                                echo "<td class='td'>".$linha['endereco']."</td>";
                                echo "<td class='td'>".$linha['nome']."</td>";}
                            echo "</tr>";
                            echo "</table>";
                        echo "</section>";

                    $sql = "SELECT endereco FROM posto WHERE cod_posto = 004";
                    $consulta = mysqli_query($c, $sql);
                    $n = mysqli_num_rows($consulta);
                    echo "<section class='tabela'>";
                        echo "<table class='table'>";
                        echo "<tr class='tabelajenni2'>";
                        echo "<th>Endereço</th>";
                        echo "</tr>";
                    if (mysqli_num_rows($consulta)<>0){
                        // echo "<h3 class = h3>" .  "Resultado do select com chave cod_cart da Carteira de Vacinação" . "</h3>" ;
                            $linha = mysqli_fetch_assoc($consulta);
                            echo "<tr>";
                            echo "<td class='td'>" . $linha ['endereco']."</td>";
                            echo "</tr>";
                            echo "</table>";
                        echo "</section>";
                        } 
            
                    $sql = "SELECT cod_posto FROM posto WHERE endereco = 'R. Tapiramuta' and nome = 'UBS Nova Bonsucesso'";
                    $consulta = mysqli_query($c,$sql);
                    $n = mysqli_num_rows($consulta);
                    echo "<section class='tabela'>";
                        echo "<table class='table'>";
                        echo "<tr class='tabelajenni2'>";
                        echo "<th>Codigo do  Posto</th>";
                        echo "</tr>";
                        if (mysqli_num_rows($consulta)<>0){
                            // echo "<h3 class = h3>" . "Resultado do Select sem chave da carteira de vacinação (endereço e nome)" . "</h3>";
                            $linha = mysqli_fetch_assoc($consulta);
                            echo "<tr>";
                            echo "<td class='td'>" . $linha ['cod_posto']."</td>";
                            echo "</tr>";
                            echo "</table>";
                        echo "</section>";

                        }

            ?>
    <footer class="rodape">
        <small>&copy; Se Liga Na Vacina 2023</small>
    </footer>
    </body>
    </html>
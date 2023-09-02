<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_e.css">
    <title>Se liga na vacina</title>
</head>

<body>
    <header>
        <a href="#home"><img src="imagens/logo.png" alt="Logo"></a>
        <nav>
            <a href="index.php">HOME</a>
            <a href="tabelas.php">TABELAS</a>
            <a href="contato.php">CONTATO</a>
        </nav>
    </header>
    <section>
            <!-- Início do PHP -->
           <?php
           $c = mysqli_connect("localhost", "root", "", "p_vacinacao");

           if (mysqli_connect_errno() <> 0) {
               $msg = mysqli_error($c);
               echo "<br>" . "Erro na conexão com o banco de dados" . $msg;
            } else {
                // Inserindo os dados

               /* $result = mysqli_query($c, "INSERT INTO
               atendimento (cod_func, rg, cod_vacina, senha, cod_posto)
               VALUES (001, '10.119.204-3', 003, 135, 4),
               (002, '14.182.965-7', 002, 421, 2),
               (003, '19.041.918-2', 001, 535, 2),
               (004, '27.101.872-8', 004, 221, 1),
               (005, '21.180.619-0', 005, 454, 4),
               (001, '92.189.078-4', 004, 234, 3);");
               */
              
                // Fazendo update de acordo com os outros bancos
            
                $sql = "UPDATE atendimento SET senha = '125' WHERE cod_func = 002;";
                $result = mysqli_query($c, $sql);

            if ($result == true){
                    echo "Alteração ok"."<br>";
                }
            else {
                    $msg = mysqli_error($c);
                    echo "Alteração não ok" ."<br>" . $msg;
                }

                // Deletando informações que foram deletadas nos outros bancos

                $sql = "DELETE FROM atendimento WHERE senha IN (125,535,234,454);";
                $result = mysqli_query($c, $sql);
                if ($result == true) {
                    echo "Exclusão ok"."<br>";
                } else {
                    $msg = mysqli_error($c);
                    echo "Exclusão não ok" ."<br>" . $msg;
                }
                }
                ?>

                <?php
                $c = mysqli_connect("localhost", "root", "", "p_vacinacao");
                if (mysqli_connect_errno() <> 0) {
                    $msg = mysqli_error($c);
                    echo "<br>" . "Erro na conexão com o banco de dados" . $msg;
                } else {
                 $sql = "SELECT * FROM atendimento";
                 $consulta = mysqli_query($c, $sql);
                 $n = mysqli_num_rows($consulta);
                 echo "<section>";
                    echo "<section id='atendimento'>";
                        echo "<article>";
                        echo "<h1>Atendimento</h1>";
                        echo "<p>Os nossos funcionários são qualificados e dedicados ao trabalho.<br> Todos estão cumprindo suas tarefas para a saúde e qualidade de vida da região.<br> Visualize abaixo os dados de nossos funcionários de todos os nossos postos.</p>";
                        echo "</article>";
                    echo "</section>";
                     echo "<section class='tabela'>";
                         echo "<table class='table'>";
                         echo "<tr>";
                             echo "<th>Funcinário</th>";
                             echo "<th>Rg Paciente</th>";
                             echo "<th>Vacina</th>";
                             echo "<th>Senha</th>";
                             echo "<th>Posto</th>";
                         echo "</tr>";
                         for ($i=0; $i < $n; $i++){
                             $linha = mysqli_fetch_assoc($consulta);
                             echo "<tr>";
                                 echo "<td class='td'>".$linha['cod_func']."</td>";
                                 echo "<td class='td'>".$linha['rg']."</td>";
                                 echo "<td class='td'>".$linha['cod_vacina']."</td>";
                                 echo "<td class='td'>".$linha['senha']."</td>";
                                 echo "<td class='td'>".$linha['cod_posto']."</td>";}
                             echo "</tr>";
                             echo "</table>";
                         echo "</section>";}
                    ?>
                    <section>
                        <?php
                            $sql = "SELECT * FROM atendimento WHERE senha=221"; 
                            $consulta = mysqli_query($c, $sql);
                            if (mysqli_num_rows($consulta) <> 0){
                         echo "<section class='tabela'>";
                             echo "<table class='table'>";
                             echo "<tr>";
                                 echo "<th>Funcinário</th>";
                                 echo "<th>Rg Paciente</th>";
                                 echo "<th>Vacina</th>";
                                 echo "<th>Senha</th>";
                                 echo "<th>Posto</th>";
                             echo "</tr>";

                                 $linha = mysqli_fetch_assoc($consulta);
                                 echo "<tr>";
                                     echo "<td class='td'>".$linha['cod_func']."</td>";
                                     echo "<td class='td'>".$linha['rg']."</td>";
                                     echo "<td class='td'>".$linha['cod_vacina']."</td>";
                                     echo "<td class='td'>".$linha['senha']."</td>";
                                     echo "<td class='td'>".$linha['cod_posto']."</td>";}
                                 echo "</tr>";
                                 echo "</table>";
                        ?>
                    </section>
                    <section>
                        <?php
                            $sql = "SELECT * FROM atendimento WHERE cod_vacina=003 AND cod_posto=4"; 
                            $consulta = mysqli_query($c, $sql);
                            if (mysqli_num_rows($consulta) <> 0){
                         echo "<section class='tabela'>";
                             echo "<table class='table'>";
                             echo "<tr>";
                                 echo "<th>Funcinário</th>";
                                 echo "<th>Rg Paciente</th>";
                                 echo "<th>Vacina</th>";
                                 echo "<th>Senha</th>";
                                 echo "<th>Posto</th>";
                             echo "</tr>";

                                 $linha = mysqli_fetch_assoc($consulta);
                                 echo "<tr>";
                                     echo "<td class='td'>".$linha['cod_func']."</td>";
                                     echo "<td class='td'>".$linha['rg']."</td>";
                                     echo "<td class='td'>".$linha['cod_vacina']."</td>";
                                     echo "<td class='td'>".$linha['senha']."</td>";
                                     echo "<td class='td'>".$linha['cod_posto']."</td>";}
                                 echo "</tr>";
                                 echo "</table>";
                        ?>
                    </section>
    </section>
    <br>
    <footer class="rodape">
        <small>&copy; Se Liga Na Vacina 2023</small>
    </footer>
</body>
</html>
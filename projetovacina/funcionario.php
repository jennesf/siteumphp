<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacina</title>
    <link rel="stylesheet" href="css/style_e.css">
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

            <!-- Início do PHP -->

           <?php
            $c = mysqli_connect("localhost", "root", "", "p_vacinacao");
            if (mysqli_connect_errno() <> 0) {
                $msg = mysqli_error($c);
                echo "<br>" . "Erro na conexão com o banco de dados" . $msg;
            } 
                // Inserindo os dados

                else {
               /* $result = mysqli_query($c, "INSERT INTO
               funcionario (nome, rg, cod_func, sexo)
               VALUES ('Ana Maria', '13.555.454-8', 001, 'f'),
               ('Júlio', '14.523.454-7', 002, 'm'),
               ('Marcos José', '55.654.433-2', 003, 'm'),
               ('Márcia Gomes', '83.643.324-8', 004, 'f'),
               ('Joana Glória', '13.343.454-8', 005, 'f');");
 */
                // Fazendo update

                $sql = "UPDATE funcionario SET rg = '14.624.431-2' WHERE cod_func = 002;";
                $result = mysqli_query($c, $sql);

                if ($result == true){
                    echo "Alteração ok"."<br>";
                } else {
                    echo "Alteração não ok"."<br>";
                } 
            }

                // Deletando informações


                $sql = "DELETE FROM funcionario WHERE cod_func = 005;";
                $result = mysqli_query($c, $sql);
                if ($result == true) {
                    echo "Exclusão ok"."<br>";
                } else {
                    echo "Exclusão não ok"."<br>";
                }

                // Criando a tabela no html
                $sql = "SELECT * FROM funcionario";
                $consulta = mysqli_query($c, $sql);
                $n = mysqli_num_rows($consulta);
                    echo "<section id='funcionario'>";
                        echo "<article>";
                        echo "<h1>Funcionários</h1>";
                        echo "<p>Os nossos funcionários são qualificados e dedicados ao trabalho.<br> Todos estão cumprindo suas tarefas para a saúde e qualidade de vida da região.<br> Visualize abaixo os dados de nossos funcionários de todos os nossos postos.</p>";
                        echo "</article>";
                    echo "</section>";
                        echo "<section class='tabela'>";
                            echo "<table class='table'>";
                            echo "<tr>";
                                echo "<th>Nome</th>";
                                echo "<th>RG</th>";
                                echo "<th>Código</th>";
                                echo "<th>Sexo</th>";
                            echo "</tr>";
                            for ($i=0; $i < $n; $i++) {
                                $linha = mysqli_fetch_assoc($consulta);
                                echo "<tr>";
                                    echo "<td class='td'>".$linha['nome']."</td>";
                                    echo "<td class='td'>".$linha['rg']."</td>";
                                    echo "<td class='td'>".$linha['cod_func']."</td>";
                                    echo "<td class='td'>".$linha['sexo']."</td>";}
                                echo "</tr>";
                                echo "</table>";
                            echo "</section>";
                        echo "</section>";

            ?>
            <section class="teste">
                <?php
                    $sql = "SELECT * FROM funcionario where cod_func=002";
                    $consulta = mysqli_query($c, $sql);
                    if (mysqli_num_rows($consulta) <> 0){
                            echo "<section class='tabela'>";
                                echo "<table class='table'>";
                                echo "<tr>";
                                    echo "<th>Nome</th>";
                                    echo "<th>RG</th>";
                                    echo "<th>Código</th>";
                                    echo "<th>Sexo</th>";
                                echo "</tr>";

                                    $linha = mysqli_fetch_assoc($consulta);
                                    echo "<tr>";
                                        echo "<td class='td'>".$linha['nome']."</td>";
                                        echo "<td class='td'>".$linha['rg']."</td>";
                                        echo "<td class='td'>".$linha['cod_func']."</td>";
                                        echo "<td class='td'>".$linha['sexo']."</td>";}
                                    echo "</tr>";
                                    echo "</table>";
                                echo "</section>";
                            echo "</section>";
                ?>
            </section>
            <section>
                <?php
                    $sql = "SELECT * FROM funcionario where sexo='f' AND rg='83.643.324-8'";
                    $consulta = mysqli_query($c, $sql);
                    if (mysqli_num_rows($consulta) <> 0){
                            echo "<section class='tabela'>";
                                echo "<table class='table'>";
                                echo "<tr>";
                                    echo "<th>Nome</th>";
                                    echo "<th>RG</th>";
                                    echo "<th>Código</th>";
                                    echo "<th>Sexo</th>";
                                echo "</tr>";
                                
                                    $linha = mysqli_fetch_assoc($consulta);
                                    echo "<tr>";
                                        echo "<td class='td'>".$linha['nome']."</td>";
                                        echo "<td class='td'>".$linha['rg']."</td>";
                                        echo "<td class='td'>".$linha['cod_func']."</td>";
                                        echo "<td class='td'>".$linha['sexo']."</td>";}
                                    echo "</tr>";
                                    echo "</table>";
                                echo "</section>";
                            echo "</section>";
                ?>
            </section>

        </section>
        <br>
        <footer class="rodape">
            <small>&copy; Se Liga Na Vacina 2023</small>
        </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paciente teste</title>
        <link href="css/estilos-g.css" rel="stylesheet">
        <!-- Página teste para colocar no script do site oficial, feito de modo autoral! --> 
    </head>
    <body>
        <div id = "principal">

            <header class = "header-principal">
                <a href="index.php"><img src="imagens/logo.png" alt="Logo"></a>
                <nav>
                    <a href="index.php">HOME</a>
                    <a href="tabelas.php">TABELAS</a>
                    <a href="contato.php">CONTATO</a>
                </nav>
            </header>

            <section class="banner banner-pac"></section>
            <div class = "title">
                <h1>Tabela dos pacientes</h1>
            </div>

            <main>

                <section class = "content-section">
                    <header><h2>Pacientes</h2></header> 
                    
                    <?php
                            $c = mysqli_connect("localhost", "root", "", "p_vacinacao");

                            if (mysqli_connect_errno() <> 0) {
                                $msg = mysqli_error($c);
                                echo "<br>" . "Erro na conexão com o banco de dados" . $msg;
                            }  /* else {
                               $result = mysqli_query($c, "INSERT INTO
                                paciente (nome, cod_cart, idade, sexo, rg)
                                VALUES ('José Martim Araújo', 132, 32, 'M', '14.182.965-7'),
                                ('Lygia Faria Tales', 534, 55, 'F', '19.041.918-2'),
                                ('Maria Carolina Neves', 563, 19, 'F', '92.189.078-4'),
                                ('Joaquim Macedo Amaral', 765, 24, 'M', '21.180.619-0'),
                                ('Graciliano Rubens de Outeiro', 954, 48, 'M', '27.101.872-8'),
                                ('Clarice Lisboa', 356, 41, 'F', '10.119.204-3');");
                                if($result) {
                                    echo "<br>" . "Registro incluido com sucesso!";
                                } else {
                                    $msg =  mysqli_connect_error($c);
                                    echo "<br>" . "Registro não incluido".$msg;
                                } 
                            }
                            
                            $sql = "UPDATE paciente SET nome ='Clarice Lispector' WHERE cod_cart = 356;";
                            $result = mysqli_query($c, $sql);

                            if ($result == true){
                                echo "Alteração ok"."<br>";
                            } else {
                                $msg =  mysqli_connect_error($c);
                                echo "<br>" . "Alteração não feita ".$msg;
                            }  
                            
                            $sql = "DELETE FROM paciente WHERE rg = '21.180.619-0';";
                            $result = mysqli_query($c, $sql);
                            if ($result == true) {
                                echo "Exclusão ok"."<br>";
                            } else {
                                $msg =  mysqli_connect_error($c);
                                echo "<br>" . "Exclusão não feita ".$msg;
                            }  */
                        
                        ?>
                    
                    <article class = "tabela">
                        
                            <?php
                                $sql = "SELECT * FROM paciente";
                                $consulta = mysqli_query($c, $sql);
                                $n = mysqli_num_rows($consulta);
                                echo "<table class = 'table-vp'>";
                                    echo "<tr>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Código da carteirinha</th>";
                                        echo "<th>Idade</th>";
                                        echo "<th>Sexo</th>";
                                        echo "<th>RG</th>";
                                    echo "</tr>";
                                    for ($i=0; $i < $n; $i++){
                                        $linha = mysqli_fetch_assoc($consulta);
                                        echo "<tr>";
                                            echo "<td class='linha'>".$linha['nome']."</td>";
                                            echo "<td class='linha'>".$linha['cod_cart']."</td>";
                                            echo "<td class='linha'>".$linha['idade']."</td>";
                                            echo "<td class='linha'>".$linha['sexo']."</td>";
                                            echo "<td class='linha'>".$linha['rg']."</td>";
                                    }
                                        echo "</tr>";
                                echo "</table>";
                            ?>
                    </article>
                    </br>
                    <article class = "tabela">
                            <?php
                                $sql = "SELECT nome, idade FROM paciente WHERE rg = '92.189.078-4'";
                                $consulta = mysqli_query($c, $sql);
                                if (mysqli_num_rows($consulta) <> 0){

                                    echo "<table class = 'table-vp'>";
                                        echo "<tr>";
                                            echo "<th>Nome</th>";
                                            echo "<th>Idade</th>";
                                        echo "</tr>";

                                    //echo "<br>". "Resultado do select com chave rg de paciente". "<br>";
                                    $linha = mysqli_fetch_assoc($consulta);
                                        echo "<tr>";
                                            echo "<td class='linha'>". $linha['nome']. "</td>";
                                            echo "<td class='linha'>". $linha['idade']. "</td>";
                                }
                                        echo "</tr>";
                                    echo "</table>";
                            ?>
                    </article>
                    <br>
                    <article class = "tabela">
                            <?php    
                                $sql = "SELECT nome, sexo FROM paciente WHERE nome = 'Graciliano Rubens de Outeiro' and sexo = 'M' ";
                                $consulta = mysqli_query($c, $sql);
                                if (mysqli_num_rows($consulta) <> 0) {

                                    echo "<table class = 'table-vp'>";
                                    echo "<tr>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Sexo</th>";
                                    echo "</tr>";

                                    //echo "<br>" . "Resultado do select sem a chave de vacina";
                                    $linha = mysqli_fetch_assoc($consulta);
                                        echo "<tr>";
                                            echo "<td class='linha'>" . $linha['nome'] . "</td>";
                                            echo "<td class='linha'>". $linha['sexo'] . "</td>";
                                }
                                        echo "</tr>";
                                    echo "</table>";
                            ?>  
                    </article>

                </section>
                <section class = "content-section">
                    <div class = "bloco-paciente">
                        <img src="imagens/paciente.png" alt="Paciente">
                        <article class = "info-pac">
                            <h2>SEJA NOSSO PACIENTE!</h2>
                            <p>O Se Liga na Vacina é um site perfeito para você que quer obter informações sobre as vacinas mais importantes, além do mais você pode acessar todos os dados que você quiser, em qualquer momento! E é tudo liberado <b>gratuitamente</b>, fora que é fácil e rápido de encontrar qualquer dado que você esteje procurando. Tenha acesso às informações das vacinas mais importantes, sobre os postos mais próximos de você, sobre nossos funcionários, entre muito mais. <i>Se você é nosso cliente, acesse todos os seus dados de atendimentos no link abaixo.</i></p>
                            <p><a href="atendimento.php">SAIBA MAIS...</a></p>
                        </article>
                    </div>
                </section>

            </main>
            <footer class = "rodape">
                <small>&copy; Se liga na Vacina 2023</small>
            </footer>
        </div>
    </body>
</html>
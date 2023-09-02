<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estilos-g.css" rel="stylesheet">
        <title>Vacina teste</title>
        <!-- Página teste para colocar no script do site oficial, feito de modo autoral! --> 
    </head>
    <body>
        <div id = "principal">

            <header class="header-principal">
                <a href="index.php"><img src="imagens/logo.png" alt="Logo"></a>
                <nav>
                    <a href="index.php">HOME</a>
                    <a href="tabelas.php">TABELAS</a>
                    <a href="contato.php">CONTATO</a>
                </nav>
            </header>

            <section class="banner banner-vac"></section>
                <div class = "title">
                    <h1>Tabela das vacinas</h1>
                </div>

            <main class = "vac">

                <section class = "content-section">
                    <header><h2>Vacinas</h2></header> 
                    
                    <?php
                        $c = mysqli_connect("localhost", "root", "", "p_vacinacao");

                         if (mysqli_connect_errno() <> 0) {
                            $msg = mysqli_error($c);
                            echo "<br>" . "Erro na conexão com o banco de dados" . $msg;
                        }  /*else {
                            $result = mysqli_query($c, "INSERT INTO
                            vacina (cod_vacina, nome_vacina, lote)
                            VALUES (001, 'Pfizer', 1311),
                            (002, 'Febre Amarela', 1788),
                            (003, 'Hepatite B', 2651),
                            (004, 'Varicela', 2140),
                            (005, 'Tríplice viral', 1115),
                            (006, 'DTP', 2140);"); 
                        }
                        if($result) {
                                echo "<br>" . "Registro incluido com sucesso!";
                            } 
                        else {
                                $msg =  mysqli_connect_error($c);
                                echo "<br>" . "Registro não incluido".$msg; 
                        } 
                        $sql = "UPDATE vacina SET lote = 1785 WHERE cod_vacina = 003;";
                        $result = mysqli_query($c, $sql);

                        if ($result == true){
                            echo "Alteração ok"."<br>";
                        } else {
                             $msg =  mysqli_connect_error($c);
                            echo "<br>" . "Alteração não feita ".$msg;
                        } 

                        $sql = "DELETE FROM vacina WHERE cod_vacina = 001;";
                        $result = mysqli_query($c, $sql);
                        if ($result == true) {
                            echo "Exclusão ok"."<br>";
                        } else {
                           $msg =  mysqli_connect_error($c);
                            echo "<br>" . "Exclusão não feita ".$msg;
                        } */
                    
                    ?> 
                    
                    <article class = "tabela">
                         
                        <?php
                            $sql = "SELECT * FROM vacina";
                            $consulta = mysqli_query($c, $sql);
                            $n = mysqli_num_rows($consulta);
                            echo "<table class = 'table-vp'>";
                                echo "<tr>";
                                    echo "<th>Codigo da vacina</th>";
                                    echo "<th>Nome da vacina</th>";
                                    echo "<th>Lote</th>";
                                echo "</tr>";
                            for ($i=0; $i < $n; $i++){
                                $linha = mysqli_fetch_assoc($consulta);
                                    echo "<tr>";
                                        echo "<td class='linha'>".$linha['cod_vacina']."</td>";
                                        echo "<td class='linha'>".$linha['nome_vacina']."</td>";
                                        echo "<td class='linha'>".$linha['lote']."</td>";
                                }
                                    echo "</tr>";
                            echo "</table>";
                        ?>
                    </article>
                    <br>
                    <article class = "tabela">
                        <?php
                            $sql = "SELECT nome_vacina, lote FROM vacina WHERE cod_vacina = 002";
                            $consulta = mysqli_query($c, $sql);
                            if (mysqli_num_rows($consulta) <> 0){

                                echo "<table class = 'table-vp'>";
                                    echo "<tr>";
                                        echo "<th>Nome da vacina</th>";
                                        echo "<th>Lote</th>";
                                    echo "</tr>";

                                //echo "<br>". "Resultado do select com chave cod_vacina de vacina". "<br>";
                                $linha = mysqli_fetch_assoc($consulta);
                                    echo "<tr>";
                                        echo "<td>". $linha['nome_vacina']. "</td>";
                                        echo "<td>". $linha['lote']. "</td>";
                            }
                                    echo "</tr>";
                                echo "</table>";    
                        ?>
                    </article>
                    <br>
                    <article class = "tabela">
                        <?php
                            $sql = "SELECT nome_vacina, lote FROM vacina WHERE nome_vacina = 'Varicela' and lote = 2140 ";
                            $consulta = mysqli_query($c, $sql);
                            if (mysqli_num_rows($consulta) <> 0) {

                                echo "<table class = 'table-vp'>";
                                    echo "<tr>";
                                        echo "<th>Nome da vacina</th>";
                                        echo "<th>Lote</th>";
                                    echo "</tr>";

                                //echo "<br>" . "Resultado do select sem a chave de vacina";
                                $linha = mysqli_fetch_assoc($consulta);
                                    echo "<tr>";
                                        echo "<td>" . $linha['nome_vacina'] . "</td>";
                                        echo "<td>" . $linha['lote'] . "</td>";
                            }
                                    echo "</tr>";
                                echo "</table>";
                        ?> 
                        
                    </article>

                </section>

                <section class = "content-section content-section-v">

                    <div class = "square square-1">
                        <img src="imagens/pfizer1.png" alt="Pfizer">
                        <p>A vacina Pfizer-BioNTech atua no combate contra a COVID-19, vírus que gerou a pandemia em 2020, sendo uma forma segura e eficiente de se proteger contra o vírus. Desenvolvida a partir de uma tecnologia de RNA mensageiro que faz com que o corpo humano se defendam do coronavírus.</p>
                    </div>

                    <div class = "square square-2">
                        <img src="imagens/tripliceviral.png" alt="Tríplice Viral">
                        <p>A vacina da Tríplice Viral previne o Sarampo, Rubéola e Caxumba. É uma vacina atenuada, isto é, o vírus continua ativo, mas não pode desencadear a doença. Pode ser tomada em Unidades Básicas de Saúde e está disponível para pessoas de 12 meses a 59 anos de idade.</p>
                    </div>

                    <div class = "square square-3">
                        <img src="imagens/varicela.png" alt="Varicela">
                        <p>Mais conhecida como Catapora, a varicela é uma doença contagiosa e infecciosa que atinge, geralmente, crianças e causa coceiras e machucados. O vírus, uma vez adquirido, não retorna, mas se a pessoa nunca teve, uma forma de prevenir é tomando a vacina.</p>
                    </div>

                </section> 

                <section class = "content-section content-section-v">

                    <div class = "square square-4">
                        <img src="imagens/febreamarela.png" alt="Febre Amarela">
                        <p>A Febre Amarela é uma doença infecciosa grave que é transmitida por mosquitos a indivíduos que não foram vacinados. É bastante comum em áreas de mata, por isso pessoas que moram em regiões assim devem se vacinar. Uma vez tomada, não há necessidade de uma outra dose.</p>
                    </div>

                    <div class = "square square-5">
                        <img src="imagens/hepatiteb.png" alt="Hepatite B">
                        <p>Doença infecciosa causada pelo vírus da hepatite (HBV), presente nas secreções e no sangue, também sendo considerada uma IST. Ela atinge o fígado, mas pode não vir a apresentar sintomas. Resulta em um grande números de mortos, considerando outras hepatites virais.</p>
                    </div>

                    <div class = "square square-6">
                        <img src="imagens/dtp.png" alt="DTP">
                        <p>A DTP protege contra três doenças, sendo elas: difteria, tétano e coqueluche. É produzida com bactérias mortas e toxinas. Essa vacina pode ser combinada com outras e, desse modo, permite que a pessoa se previna contra outras doenças também.</p>
                    </div>

                </section>

            </main>
            <footer class = "rodape">
                <small>&copy; Se liga na Vacina 2023</small>
            </footer>
        </div>
    </body>
</html>
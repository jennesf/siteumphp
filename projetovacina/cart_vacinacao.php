<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styleJ.css">
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
        <section class="fundo"><img src="imagens/fundo3.png"></section>
        <h1 class="titulo2">Carteira de vacinação</h1>
        
    <main>
    <?php
        $c = mysqli_connect("localhost", "root", "", "p_vacinacao");

        if (mysqli_connect_errno() <> 0) {
            $msg = mysqli_error($c);
            echo "<br>" . "Erro na conexão com o banco de dados" . $msg;
        } 
        
         else {
             $result = mysqli_query($c, "INSERT INTO
            cart_vacinacao (cod_cart, dose, data)
            VALUES (132, 1, '12-03-2023'),
            (534, 2, '20-02-2023'),
            (563, 1, '16-04-2023'),
            (765, 2, '16-04-2023'),
            (954, 3, '16-04-2023'),
            (356, 1, '26-01-2023');");
           
           if($result){
            echo "<br>" . "Registro incluido com sucesso!";
           } else{
            $result = mysqli_query($c,$sql);
            echo "<br>" . "Registro não incluido!" . $msg;
           } 

              $sql = "UPDATE cart_vacinacao SET dose ='3' WHERE cod_cart = 534;";
             $result = mysqli_query($c,$sql);
             if($result==true){
                echo "<br>" . "Alteração ok!";
             } else{
                $msg = mysqli_connect_error($c);
                echo "<br>" . "Registro não incluido!" . $msg;
             } 
            

             $sql = "DELETE FROM cart_vacinacao WHERE cod_cart = 132;";
             $result = mysqli_query($c,$sql);
             if($result == true){
                echo "<br>" . "Exclusão ok!";
             } else{
                $msg = mysqli_connect_error($c);
                echo "<br>" . "Exclusão nok!" . $msg;
             }  
            }

                    
            $sql = "SELECT * FROM cart_vacinacao";
            $consulta = mysqli_query($c, $sql);
            $n = mysqli_num_rows($consulta);
                echo "<section class='tabela'>";
                    echo "<table class='table'>";
                    echo "<tr class='tabelajenni'>";
                        echo "<th>Código da Vacina</th>";
                        echo "<th>Dose</th>";
                        echo "<th>Data</th>";
                    echo "</tr>";
                    for ($i=0; $i < $n; $i++) {
                        $linha = mysqli_fetch_assoc($consulta);
                        echo "<tr>";
                            echo "<td class='td'>".$linha['cod_cart']."</td>";
                            echo "<td class='td'>".$linha['dose']."</td>";
                            echo "<td class='td'>".$linha['data']."</td>";}
                        echo "</tr>";
                        echo "</table>";
                    echo "</section>";

             $sql = "SELECT dose FROM cart_vacinacao WHERE cod_cart = 954";
            $consulta = mysqli_query($c, $sql);
            $n = mysqli_num_rows($consulta);
                    echo "<section class='tabela'>";
                        echo "<table class='table'>";
                        echo "<tr class='tabelajenni'>";
                        echo "<th>Dose</th>";
                        echo "</tr>";
            if (mysqli_num_rows($consulta)<>0){
                // echo "<h3 class = h3>" .  "Resultado do select com chave cod_cart da Carteira de vacinação" . "</h3>";
                $linha = mysqli_fetch_assoc($consulta);
                echo "<tr>";
                echo "<td class='td'>" . $linha['dose'] . "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</section>";
            } 

            $sql = "SELECT cod_cart, data FROM cart_vacinacao WHERE dose = 2 and data = '16-04-2023'";
            $consulta = mysqli_query($c,$sql);
            $n = mysqli_num_rows($consulta);
                    echo "<section class='tabela'>";
                        echo "<table class='table'>";
                        echo "<tr class='tabelajenni'>";
                        echo "<th>Código da Carteirinha</th>";
                        echo "</tr>";
            if (mysqli_num_rows($consulta)<>0){
                // echo "<h3 class = h3>" . "Resultado do Select sem chave da carteira de vacinação (dose e data):" . "</h3>";
                $linha = mysqli_fetch_assoc($consulta);
                echo "<tr>";
                echo "<td class='td'>" . $linha ['cod_cart']. "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</section>";
            }
            




                    ?>        
    </main>
        <footer class="rodape">
            <small>&copy; Se Liga Na Vacina 2023</small>
        </footer>
        
        </body>
    </html>
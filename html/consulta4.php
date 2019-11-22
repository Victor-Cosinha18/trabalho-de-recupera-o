<?php
$host='localhost';
$usuario='raimysql';
$senha='13172413,rss';
$banco='world';

$link=mysqli_connect($host, $usuario, $senha);
if(!$link){
    echo mysqli_error($link);
    die();
}
if(!mysqli_select_db($link, $banco)){
    echo mysqli_error($link);
    die();
}
 $resposta=mysqli_query($link,  'SELECT country.name, country.population, GNP, lifeExpectancy FROM city, country WHERE Continent=\'Africa\' order by GNP desc');
 if($resposta){
    $linha=mysqli_fetch_assoc($resposta);

    echo "<div>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>População</th>";
    echo "<th>Expectativa de Vida</th>";
    echo "<th>PIB</th>";
    echo "</tr>";

    while($linha){
        echo "<tr>";
        echo "<td>$linha[name]</td>";
        echo "<td>$linha[population]</td>";
        echo "<td>$linha[lifeExpectancy]</td>";
        echo "<td>$linha[GNP]</td>";
        echo"</tr>";
        $linha=mysqli_fetch_assoc($resposta); 
    }
    echo "</table>";
    echo "</div>";
}else {
    echo "Erro ";
}
?>
<?php
$host='localhost';
$usuario='raimysql';
$senha='13172413,rss';
$banco='world';

$link=mysqli_connect($host, $usuario, $senha);
if(!$link){
    echo myslqli_error($link);
    die();
}
if(!mysqli_select_db($link, $banco)){
    echo mysqli_error($link);
    die();
}
 $resposta=mysqli_query($link, 'SELECT country.name, country.population, lifeExpectancy, GNP FROM city, country WHERE Continent=\'South America\' order by lifeExpectancy desc ');
 if($resposta){
    $linha=mysqli_fetch_assoc($resposta);

    echo "<div>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>População </th>";
    echo "<th>Expectativa de Vida </th>";
    echo "<th>PIB </th>";
    echo "</th>";


    while($linha){
        echo "<tr>";
        echo "<td>$linha[name]</td>";
        echo "<td>$linha[population]</td>";
        echo "<td>$linha[lifeExpectancy]</td>";
        echo "<td>$linha[GNP]</td>";
        echo "</tr>";
        $linha=mysqli_fetch_assoc($resposta); 
    }
    echo "</table>";
    echo "/div";
}
?>
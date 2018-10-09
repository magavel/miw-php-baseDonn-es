<?php
/**
 * Created by PhpStorm.
 * User: MIW
 * Date: 09/10/2018
 * Time: 11:18
 */


/*
1/ Sur l'index afficher dans un tableau tous les pays en base, afficher le nom, la population et le nombre de villes.
**Le tableau devra être triable sur les trois colonnes, dans l'ordre croissant/décroissant**
Un lien sur le nom du pays enverra sur le détail du pays avec toutes les infos en base et un tableau des 10 villes les plus peuplée.

*/



try{
    $bdd = new PDO(
        'mysql:host=localhost;dbname=miw;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING)
    );
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$res = $bdd->query('SELECT p.name, p.population, v.name as ville
FROM city v
       inner join country p on v.countrycode = p.code');
echo '<table>';
while ($row = $res->fetch()) {
    echo '<tr> <td>pays: '.$row['name'] .' population: '.$row['population'].$row['ville']. '<br />';
}

echo '</table>';







$res->closeCursor();
<form action="" method="get">
    <input type="text" name="toto" id="">
    <button type="submit">soumet toi</button>
</form>



<?php
//On va anlyser l'url sur trois champs
// - filter_intervention
// - filter_step
// - filter_date
//premiere chose à faire. Créer deux tableaux vides qui par la suite vont accueillir des données
$req = array();
$value = array();
   //Maintant on va analyser l'url
   //Si filter_intervention n'est pas vide alors :
    if (!empty($_GET['filter_intervention'])) {
        //On ajoute dans le tableau $req la requete textuelle comme elle va etre ecrite en SQL
        array_push($req, 'AND type_intervention = ""?""');
        //On ajoute dans le tableau $value, la valeur du champ filter_intervention de l'url
        array_push($value, $_GET['filter_intervention']);
    }

    if (!empty($_GET['filter_step'])) {
        array_push($req, 'AND step_intervention = ""?""');
        array_push($value, $_GET['filter_step']);
    }

    if (!empty($_GET['filter_date'])) {
        array_push($req, 'AND date_intervention = ""?""');
        array_push($value, $_GET['filter_date']);
    }

    var_dump($req);
    var_dump($value);

// Maintenant on rassemble tous les éléments du tableau $req en une chaîne de caractères. Pour ce faire on utilise la méthode implode 
    echo "<br/>ma requete va ressembler à ceci : ".implode(" ", $req);
    // $request = implode(" ", $req);
    // $search = connect()->prepare('SELECT * FROM interventions WHERE 1  ' . $request . '');

// $search = connect()->prepare('SELECT * FROM interventions WHERE 1 AND step_intervention = ""?"" AND date_intervention = ""?""');

    // $search->execute($value);
    //$search->execute(['666', '66/66/666']);
    // //$search->debugDumpParams();
    // $resultSearch = $search->fetchAll();
    // return $resultSearch;



?>
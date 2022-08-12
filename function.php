

<?php
session_start();


// echo password_hash('magellan',  PASSWORD_DEFAULT);


function connect(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=conciergerie', 'root', 'root');
        return $db;
        }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}


function login(){
    $findUser = connect()->prepare('SELECT * FROM user WHERE login_user = :login_user');
    $findUser->bindParam(':login_user', $_POST['username'], PDO::PARAM_STR);
    $findUser->execute();
    $user = $findUser->fetch();  
    if ($user && password_verify($_POST['password'], $user['password_user'])) {
        $_SESSION['nom_user'] = $user; 
        header('Location: ./index.php');  
        
    } else {
        echo 'Invalid username or password';
    }


}

//INTERVENTION TYPE

function addType(){


    $ajouter = connect()->prepare('INSERT INTO type_intervention (name_type) VALUES (:name_type)');
    $ajouter->bindParam(':name_type', $_POST['type'], 
    PDO::PARAM_STR);
    $estceok = $ajouter->execute();
    $ajouter->debugDumpParams();
        if($estceok){
            header('Location: ./index.php');   
        } else {
            echo 'Error';
        }
    }

//ADDING INTEVENTION

function addIntervention(){
    $theIdIntervention = getIdTypeIntervention();
    echo $theIdIntervention;
    $ajouter = connect()->prepare('INSERT INTO interventions (type_intervention, step_intervention, date_intervention ) VALUES (:type_intervention, :step_intervention, :date_intervention )');
    $ajouter->bindParam(':type_intervention', $theIdIntervention);
    $ajouter->bindParam(':step_intervention', $_POST['step']);
    $ajouter->bindParam(':date_intervention', $_POST['date']);
    $estceok = $ajouter->execute();
    $ajouter->debugDumpParams();

        if($estceok){
            header('Location: ./index.php');   
        } else {
            echo 'Error';
        }
    }

// GET ALL INTERVENTION

function getAllIntervention(){
    $interventions = connect()->query('SELECT * FROM interventions');
    $interventions = $interventions->fetchAll();
    return $interventions;
}


//GET ALL INTERVENTION TYPE

function getTypeIntervention(){
    $type = connect()->query('SELECT * FROM type_intervention');
    $typeArray = $type->fetchAll();
    var_dump(    $typeArray );
    return $typeArray;
}

// GET ID INTERVENTION TYPE

function getIdTypeIntervention(){
    $what = $_POST['interventionType'];
    $idIntervention = connect()->prepare('SELECT * FROM type_intervention WHERE name_type = :name_type');
    $idIntervention->bindParam(':name_type', $what, PDO::PARAM_STR);
    $idIntervention->execute();
    $idIntervention->debugDumpParams();
    $theIdIntervention = $idIntervention->fetch();  
    var_dump($theIdIntervention);
    return $theIdIntervention['id_type'];
}

function getNameTypeIntervention($id){
    $nameIntervention = connect()->prepare('SELECT * FROM type_intervention WHERE id_type = :id_type');
    $nameIntervention->bindParam(':id_type', $id, PDO::PARAM_STR);
    $nameIntervention->execute();
    //$nameIntervention->debugDumpParams();
    $theNameIntervention = $nameIntervention->fetch();  
    return $theNameIntervention['name_type'];
}


if(isset($_POST['interventionType']) && $_POST['interventionType'] == "ajouter"){
    addType();
}

if(isset($_POST['intervention']) && $_POST['intervention'] == "ajouter"){
    addIntervention();
}



if(isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action']=="register"){
    register();
}

if(isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action']=="login"){
    login();
}
   







?>



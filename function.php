

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


if($_POST['interventionType'] == "ajouter"){
    addType();
}

if(isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action']=="register"){
    register();
}

if(isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action']=="login"){
    login();
}
   







?>



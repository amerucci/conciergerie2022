<?php $pageTitle = "DashBoard - Le Magellan"; ?>
<?php include("./part/header.php"); ?>
<?php include("./function.php"); ?>
<?php



if (isset($_SESSION['nom_user'])) { ?>


    <div class="sidebar">
        <div class="userInfo">

            <img id="avatar" width="100" class="uk-border-circle" src="./img/dominique.jpeg">
            <div class="uk-margin-top"></div>
            <div id="name" class="uk-text-truncate">
                <?php echo $_SESSION['nom_user']['first_name'] . " " . $_SESSION['nom_user']['last_name']; ?></div>

            <a href="./logout.php" class="uk-button uk-button-secondary">Déconnection</a>




            


        </div>
        <form action="" method="get" class="uk-margin">
            <?php $fillIntervention = getfillInterventions(); ?></php>

            <div class="uk-margin">
                <select class="uk-select" name="filter_intervention">
                    <option value="" disabled selected>Intervention</option>
                    <?php
                    for ($i = 0; $i < count($fillIntervention); $i++) {
                        echo "<option value='" . $fillIntervention[$i]['id_type'] . "'>" . $fillIntervention[$i]['name_type'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        
            <div class="uk-margin">

                <input class="uk-input" type="number" min="0" max="5" placeholder="Etage" name="filter_step" >
            </div>
            <div class="uk-margin">
                <input class="uk-input" type="date" placeholder="Date d'intevention" name="filter_date">

            </div>

            <button type="submit" name="action" value="filter" class="uk-button uk-button-primary">Filtrer</button>
        </form>
    </div>

    <div class="uk-container">

        <!-- This is the modal with the default close button -->
        <div id="modal-close-default" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <h2 class="uk-modal-title">Ajouter une intervention</h2>
                <form action="function.php" method="post">
                    <div class="uk-margin">
                        <input class="uk-input" type="number" min="0" max="5" placeholder="Etage" name="step" required>
                    </div>
                    <div class="uk-margin">
                        <input list="navigateurs" id="monNavigateur" name="interventionType" class="uk-input" placeholder="Type d'intervention" />
                        <datalist id="navigateurs">
                            <?php $types =  getTypeIntervention();
                            for ($i = 0; $i < count($types); $i++) {
                                echo ' <option value="' . $types[$i]["name_type"] . '">';
                            }


                            ?>

                        </datalist>
                    </div>

                    <div class="uk-margin">
                        <input class="uk-input" type="date" placeholder="Date d'intevention" name="date" required>

                    </div>



                    <button type="submit" name="intervention" value="ajouter" class="uk-button uk-button-primary">Ajouter</button>
                </form>
            </div>
        </div>

        <div id="modal-close-default-type" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <h2 class="uk-modal-title">Ajouter une type d'intervention</h2>
                <form action="function.php" method="post">
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Type d'intevention" name="type" required>
                    </div>
                    <button type="submit" name="interventionType" value="ajouter" class="uk-button uk-button-primary">Ajouter</button>
                </form>
            </div>
        </div>

        <div class="uk-section-small uk-section-default header">

            <h1><span class="ion-speedometer"></span> Dashboard</h1>
            <p>
                Bienvenue <?php echo $_SESSION['nom_user']['first_name']; ?>
            </p>

        </div>


        <h2><span class="ion-speedometer"></span> Les interventions réalisées au <?php
        
    
// Date en français
$jour = getdate();

$semaine = array(" Dimanche "," Lundi "," Mardi "," Mercredi "," Jeudi ",
" vendredi "," samedi ");
$mois =array(1=>" janvier "," février "," mars "," avril "," mai "," juin ",
" juillet "," août "," septembre "," octobre "," novembre "," décembre ");
// Avec getdate()
echo $semaine[$jour['wday']]
,$jour['mday'], $mois[$jour['mon']], $jour['year'],"
";


        
        ?> </h2>
        <p>
        <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal-close-default">Ajouter une intervention</button>

        <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal-close-default-type">Ajouter type d'intervention</button>
        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th>Type intervention</th>
                    <th>Etage intervention</th>
                    <th>Date intervention</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for ($i = 0; $i < count($intervention); $i++) {
                    echo "<tr>
                <td>" . getNameTypeIntervention($intervention[$i]['type_intervention']) . "</td>
                <td>" . $intervention[$i]['step_intervention'] . "</td>
                <td>" . rearrangeDate($intervention[$i]['date_intervention'] ). "</td>
                <td></td>
                </tr>";
                }



                ?>
            </tbody>
        </table>
    </div>
<?php
} else {
    header('Location: ./login.php');
}

?>
<?php include("./part/footer.php"); ?>
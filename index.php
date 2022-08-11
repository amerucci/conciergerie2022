<?php $pageTitle = "DashBoard - Le Magellan"; ?>
<?php include("./part/header.php"); ?>
<?php
session_start();


if (isset($_SESSION['nom_user'])) { ?>


    <div class="sidebar">
        <div class="userInfo">

            <img id="avatar" width="100" class="uk-border-circle" src="./img/dominique.jpeg">
            <div class="uk-margin-top"></div>
            <div id="name" class="uk-text-truncate">
                <?php echo $_SESSION['nom_user']['first_name'] . " " . $_SESSION['nom_user']['last_name']; ?></div>

            <a href="./logout.php" class="uk-button uk-button-secondary">Déconnection</a>

            <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal-close-default">Ajouter</button>

            <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal-close-default-type">Ajouter type</button>

        </div>
    </div>

    <div class="uk-container">

        <!-- This is the modal with the default close button -->
        <div id="modal-close-default" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <h2 class="uk-modal-title">Ajouter une intervention</h2>
                <form action="function.php" method="post">
                    <div class="uk-margin">
                        <input class="uk-input" type="number" min="0" placeholder="Etage" name="step" required>
                    </div>
                    <div class="uk-margin">
                        <input list="navigateurs" id="monNavigateur" name="monNavigateur" class="uk-input" placeholder="Type d'intervention" />
                        <datalist id="navigateurs">
                            <option value="Chrome">
                            <option value="Firefox">
                            <option value="Internet Explorer">
                            <option value="Opera">
                            <option value="Safari">
                            <option value="Microsoft Edge">
                        </datalist>
                    </div>

                    <div class="uk-margin">
                        <input class="uk-input" type="date" placeholder="Date d'intevention" name="step" required>

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


        <h2><span class="ion-speedometer"></span> Dashboard</h2>
        <p>
        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th>Type intervention</th>
                    <th>Etage intervention</th>
                    <th>Date intervention</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                </tr>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                </tr>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
} else {
    header('Location: ./login.php');
}

?>
<?php include("./part/footer.php"); ?>
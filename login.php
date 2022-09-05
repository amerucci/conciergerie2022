<?php $pageTitle = "Login - Le Magellan";?>
<?php include("./part/header.php"); ?>
<div class="container">
    <div class="login">
        <h1>Se connecter</h1>
        <form action="function.php" method="post">
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="identifiant" name="username" value="dmenard" required>
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="password" placeholder="Mot de passe"  name="password" value="magellan" required>
        </div>
        <button type="submit" name="action" value="login" class="uk-button uk-button-primary">Se connecter</button>
        </form>
    </div>
</div>
    <?php include("./part/footer.php"); ?>

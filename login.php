<?php $pageTitle = "Login - Le Magellan";?>
<?php include("./part/header.php"); ?>
<div class="container">
    <div class="login">
        <form action="function.php" method="post">
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="identifiant">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="password" placeholder="Mot de passe">
        </div>
        <input type="submit" name="action" value="se connecter" class="uk-button uk-button-primary">
        </form>
    </div>
</div>
    <?php include("./part/footer.php"); ?>

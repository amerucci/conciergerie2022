<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard - Le Magellan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.2/dist/css/uikit.min.css">
</head>

<body>
    <?php
    session_start();
    
    if (isset($_SESSION['nom_user'])) { ?>
        <div class="uk-container">
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
</body>

</html>
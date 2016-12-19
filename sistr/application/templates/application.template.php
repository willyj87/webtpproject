<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:36
 */
namespace Sistr;
use F3il\Authentication;
use F3il\NavigationHelper;

defined('SISTR') or die('Acces Denied');
?>
<?php $auth = Authentication::getInstance();
$user = $auth->getLoggedUser();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Application Sistr</title>
    </body>
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/appli.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans | Roboto:100,100i,400,400i">
</head>
<body>
<header>
</header>
<nav class="nav navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" id="images" href="#">
                <img alt="images-menu" src="images/logo-blanc.png">
            </a>
        </div>
        <div class="collapse navbar-collapse">
           <?php NavigationHelper::render();?>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user['nom'].' '.$user['prenom']?><span class="caret"></span></a>
                    <ul class="dropdown-menu" >
                        <li ><a href="?controller=utilisateur&action=deconnecter" class="test">Se déconnecter</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h1>
                    Sujets
                </h1>
                <table>
                    <tr>
                        <th>
                            <a href="#" class="liste">Tous les sujets <span class="badge">6</span></a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <a href="#" class="liste">Non affectés <span class="badge">2</span></a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <a href="#" class="liste">En cours <span class="badge">2</span></a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <a href="#" class="liste">Terminés <span class="badge">2</span></a>
                        </th>
                    </tr>
                </table>
            </div>
           [%VIEW%]
        </div>

    </div>
</main>
<footer>
    <div class="container">
    </div>
</footer>
<script type="text/javascript" src="js/node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="css/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/appli.js"></script>
</body>
</html>

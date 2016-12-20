<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:23
 */
namespace inews;
defined('3INEWS') or die('Acces Denied');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title></title>
    <link rel="stylesheet" href= "vendors/bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href= "css/3inews.css"/>
</head>
<body>
    <header id="en-tete">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>3INews</h1>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="section" id="accueil">
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-8">
                            [%MESSAGES%]
                        <?php $this->login->render();?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <footer>
    </footer>

<script src="vendors/jquery-3.1.1.js" type="text/javascript"></script>
<script src='vendors/bootstrap/dist/js/bootstrap.min.js' type="text/javascript"></script>
</body>
</html>

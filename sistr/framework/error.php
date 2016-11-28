<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/11/16
 * Time: 16:59
 */

namespace F3il;


class Error extends \Exception
{
    const DEBUG = "debug";
    const PRODUCTION = "production";
    protected  $explanation;
    protected $runMode;

    /**
     * Error constructor.
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
        $conf = Configuration::getInstance();

        if(Configuration::isLoaded() == false){
            $this->runMode = self::PRODUCTION;
        }
        if ($conf->run_mode != self::DEBUG) {
            $this->runMode = self::PRODUCTION;
        }
        else{
            $this->runMode = self::DEBUG;
        }
    }

    public function __toString()
    {
        ob_end_clean();
        // TODO: Implement __toString() method.
        if ($this->runMode == self::DEBUG) {
             $this->debugRender();
        }
        else {
            $this->productionRender();
        }
        die();

    }

    /**
     * Cette méthode appelle le mode Production
     */
    private function productionRender(){
        ?>
        <!DOCTYPE html>
        <html>
            <h1>OUPS</h1>
        </html>
        <?php

    }

    /**
     * Méthode appelé en mode Debug
     */
    public function debugRender(){
        $trace = $this->getTrace();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Erreur dans l'application</title>
            <meta charset='utf-8'>
        </head>
        <body>
        <h1>Erreur</h1>
        <p><?php echo $this->message;?></p>
        <?php if($this->explanation):?>
            <p>Explications : <?php echo $this->explanation;?></p>
        <?php endif;?>
        <p>Fichier : <?php echo $this->file;?></p>
        <p>Ligne : <?php echo $this->line;?></p>
        <p>Fonction : <?php echo $trace[0]['class'].'::'.$trace[0]['function'];?></p>
        <pre><?php echo $this->getTraceAsString();?></pre>
        </body>
        </html>
        <?php
    }
}
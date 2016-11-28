<?php
    defined("SISTR") or die("Access Denied");
    $this->setPageTitle('vue1');
    \F3il\Messages::setMessageRenderer('Sistr\MessagesHelper::messagesRenderer');
?>
<div>
    [%MESSAGES%]
    <h2>Vue 1</h2>
    <p><?php echo __FILE__."</br>";?></p>
    <p><?php echo $this->titre."</br>";?></p>
    <p><?php
                foreach ($this->utilisateurs as $key){
                 echo $key['nom'].'<br>';
                }
        ?></p>
</div>


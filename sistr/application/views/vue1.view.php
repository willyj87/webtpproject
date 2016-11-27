<div>
    <h2>Vue 1</h2>
    <p><?php echo __FILE__."</br>";?></p>
    <p><?php echo $this->titre."</br>";?></p>
    <p><?php
                foreach ($this->utilisateurs as $key){
                 echo $key['nom'];
                }
        ?></p>
</div>


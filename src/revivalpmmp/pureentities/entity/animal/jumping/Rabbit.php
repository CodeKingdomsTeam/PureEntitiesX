<?php

namespace revivalpmmp\pureentities\entity\animal\jumping;

use revivalpmmp\pureentities\entity\animal\WalkingAnimal;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\entity\Creature;
use revivalpmmp\pureentities\data\Data;

class Rabbit extends WalkingAnimal{
  
    const NETWORK_ID = Data::RABBIT;
    public $width = 0.5;
    public $height = 0.5;
    public function getSpeed() : float{
        return 1.2;
    }
    
    public function getName(){
        return "Rabbit";
    }
  
    public function initEntity(){
        parent::initEntity();
        $this->setMaxHealth(3);
        $this->setHealth(3);
    }
  
    public function targetOption(Creature $creature, float $distance) : bool{
        if($creature instanceof Player){
            return $creature->spawned && $creature->isAlive() && !$creature->closed && $creature->getInventory()->getItemInHand()->getId() == Item::SEEDS && $distance <= 49;
        }
        return false;
    }
  
    public function getDrops(){
        return [];
    }
}

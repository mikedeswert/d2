<?php namespace App\Model;

use App\Model\Campaign\Campaign;
use SplObjectStorage;

abstract class ShopItem implements Item {
    private $name;
    private $buyValue;
    private $type;
    private $prerequisites;

    public function __construct() {
        $this->prerequisites = new SplObjectStorage();
        $this->addPrerequisite(new NotYetTaken());
    }

    public abstract function getActName();

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getBuyValue() {
        return $this->buyValue;
    }

    public function setBuyValue($buyValue) {
        $this->buyValue = $buyValue;
    }

    public function getSellValue() {
        return floor($this->buyValue / 2 / 25) * 25;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getPrerequisites() {
        return $this->prerequisites;
    }

    public function addPrerequisite($prerequisite) {
        $this->prerequisites->attach($prerequisite);
    }

    public function isBuyPossible(Campaign $campaign) {
        foreach($this->prerequisites as $prerequisite) {
            if(!$prerequisite->isMet($campaign, $this)) {
                return false;
            }
        }

        return true;
    }

    public function isSellPossible() {
        return true;
    }
}

?>
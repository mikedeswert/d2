<?php namespace App\Model;
    use SplObjectStorage;

    class Party {
        private $heroes;
        private $gold = 0;

        public function __construct() {
            $this->heroes = new SplObjectStorage();
        }

        public function getHeroes() {
            return $this->heroes;
        }

        public function addHero(Hero $hero) {
            $this->heroes->attach($hero);
        }

        public function getGold() {
            return $this->gold;
        }

        public function setGold($gold) {
            $this->gold = $gold;
        }

        public function addGold($gold) {
            $this->gold = $this->gold + $gold;
        }

        public function buy(Equipment $equipment, Hero $hero) {
            if(!$equipment->isBuyPossible() || $this->gold < $equipment->getBuyValue()) {
                return;
            }

            $this->gold = $this->gold - $equipment->getBuyValue();
            $hero->addEquipment($equipment);
        }

        public function sell(Equipment $equipment, Hero $hero) {
            if(!$equipment->isSellPossible() || !$hero->hasEquipment($equipment)) {
                return;
            }

            $this->gold = $this->gold + $equipment->getSellValue();
            $hero->removeEquipment($equipment);
        }
    }
?>
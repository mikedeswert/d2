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

        public function addGold($gold) {
            $this->gold = $this->gold + $gold;
        }

        public function removeGold($gold) {
            if($this->gold < $gold) {
                return;
            }

            $this->gold = $this->gold - $gold;
        }

        public function buy(Item $item, Hero $hero) {
            if($this->gold < $item->getBuyValue()) {
                return;
            }

            $this->gold = $this->gold - $item->getBuyValue();
            $hero->addItem($item);
        }

        public function sell(Item $item, Hero $hero) {
            if(!$hero->hasItem($item)) {
                return;
            }

            $this->gold = $this->gold + $item->getSellValue();
            $hero->removeItem($item);
        }

        public function getAllItems() {
            $allItem = new SplObjectStorage();

            foreach($this->heroes as $hero) {
                $allItem->addAll($hero->getItems());
            }

            return $allItem;
        }
    }
?>
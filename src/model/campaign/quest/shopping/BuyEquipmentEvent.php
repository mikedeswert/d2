<?php namespace App\Model\Campaign\Shopping;
    use App\Model\Campaign\Event;
    use App\Model\Item;
    use App\Model\Hero;

    class BuyItemEvent implements Event {
        private $hero;
        private $item;

        public function __construct(Hero &$hero, Item $item) {
            $this->hero = $hero;
            $this->item = $item;
        }

        public function getCharacterName() {
            return $this->hero->getCharacterName();
        }

        public function getItemName() {
            return $this->item->getName();
        }

        public function getGoldCost() {
            return $this->item->getBuyValue();
        }

        public function undo() {
            $this->hero->removeItem($this->item);
            $this->hero->addGold($this->item->getBuyValue());
        }

        public function isManualUndoAllowed() {
            return true;
        }
    }
?>
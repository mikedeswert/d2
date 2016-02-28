<?php namespace App\Model\Campaign\Shopping;
    use App\Model\Campaign\Event;
    use App\Model\Item;
    use App\Model\Hero;
    use Exception;

    class SellItemEvent implements Event {
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
            return $this->item->getSellValue();
        }

        public function undo() {
            if(!$this->isManualUndoAllowed()) {
                throw new Exception('Undo would result in the party having an insufficient amount of gold.');
            }

            $this->hero->addItem($this->item);
            $this->hero->getParty()->removeGold($this->item->getSellValue());
        }

        public function isManualUndoAllowed() {
            return $this->hero->getParty()->getGold() >= $this->item->getSellValue();
        }
    }
?>
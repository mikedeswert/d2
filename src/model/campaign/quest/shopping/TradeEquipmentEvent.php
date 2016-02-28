<?php namespace App\Model\Campaign\Shopping;
    use App\Model\Campaign\Event;
    use App\Model\Item;
    use App\Model\Player;

    class TradeItemEvent implements Event {
        private $from;
        private $to;
        private $item;

        public function __construct(Player &$from, Player &$to, Item $item) {
            $this->from = $from;
            $this->to = $to;
            $this->item = $item;
        }

        public function getFromCharacterName() {
            return $this->from->getCharacterName();
        }

        public function getToCharacterName() {
            return $this->to->getCharacterName();
        }

        public function getItemName() {
            return $this->item->getName();
        }

        public function undo() {
            $this->to->removeItem($this->item);
            $this->from->addItem($this->item);
        }

        public function isManualUndoAllowed() {
            return $this->getFromCharacterName() != 'Overlord' && $this->getToCharacterName() != 'Overlord';
        }
    }
?>
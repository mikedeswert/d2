<?php namespace App\Model\Campaign\Shopping;
    use App\Model\Campaign\Event;
    use App\Model\Item;
    use App\Model\Hero;
    use App\Model\Player;

    class ReceiveItemEvent implements Event {
        private $player;
        private $item;

        public function __construct(Player &$player, Item $item) {
            $this->player = $player;
            $this->item = $item;
        }

        public function getCharacterName() {
            return $this->player->getCharacterName();
        }

        public function getItemName() {
            return $this->item->getName();
        }

        public function undo() {
            $this->player->removeItem($this->item);
        }

        public function isManualUndoAllowed() {
            return false;
        }
    }
?>
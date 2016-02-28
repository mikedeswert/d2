<?php namespace App\Model\Campaign\Travel;
    use App\Model\Campaign\Event;

    class TravelEvent implements Event {
        private $type;

        public function getType() {
            return $this->type;
        }

        public function setType(TravelEventType $type) {
            $this->type = $type;
        }

        public function undo() {
            return;
        }

        public function isManualUndoAllowed() {
            return true;
        }
    }
?>
<?php namespace App\Model\Campaign\SpendXp;
    use App\Model\Campaign\Event;
    use App\Model\Campaign\Step;
    use SplObjectStorage;

    class SpendXpStep implements Step {
        private $events;
        private $completed = false;

        public function __construct() {
            $this->events = new SplObjectStorage();
        }

        public function getEvents() {
            return $this->events;
        }

        public function addEvent(Event $event) {
            $this->events->attach($event);
        }

        public function undoEvent(Event $event) {
            $event->undo();
            $this->events->detach($event);
        }

        public function isComplete() {
            return $this->completed;
        }

        public function reopen() {
            $this->completed = false;
        }

        public function complete() {
            $this->completed = true;
        }
    }
?>
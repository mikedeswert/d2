<?php namespace App\Model\Campaign;
    interface Event {
        public function undo();
        public function isManualUndoAllowed();
    }
?>
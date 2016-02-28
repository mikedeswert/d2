<?php namespace App\Model\Campaign;
    interface Step {
        public function reopen();
        public function complete();
        public function isComplete();
    }
?>
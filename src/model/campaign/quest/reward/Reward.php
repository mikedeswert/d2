<?php namespace App\Model\Campaign;
    use SplObjectStorage;

    interface Reward {
        public function applyTo(SplObjectStorage $recipients);
    }
?>
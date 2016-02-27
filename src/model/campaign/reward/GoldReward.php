<?php namespace App\Model\Campaign;
    use SplObjectStorage;

    class GoldReward implements Reward {
        private $amount;

        public function __construct($amount) {
            $this->amount = $amount;
        }

        public function getAmount() {
            return $this->amount;
        }

        public function setAmount($amount) {
            $this->amount = $amount;
        }

        public function applyTo(SplObjectStorage $recipients) {
            foreach($recipients as $recipient) {
                $recipient->addGold($this->amount);
            }
        }
    }
?>
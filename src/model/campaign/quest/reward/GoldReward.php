<?php namespace App\Model\Campaign;
    use App\Model\Hero;
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
                if($recipient instanceof Hero) {
                    $recipient->getParty()->addGold($this->amount);
                    return; // We only want to add this amount once, so we exit from the method here.
                }
            }
        }
    }
?>
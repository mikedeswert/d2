<?php namespace App\Model;
    use App\Model\Campaign\Reward;
    use SplObjectStorage;

    class Relic implements Equipment, Reward {
        public function isBuyPossible() {
            return false;
        }

        public function isSellPossible() {
            return false;
        }

        public function getBuyValue() {
            return 0;
        }

        public function getSellValue() {
            return 0;
        }

        public function applyTo(SplObjectStorage $recipients) {
            foreach($recipients as $recipient) {
                $recipient->addEquipment($this);
            }
        }
    }
?>
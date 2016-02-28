<?php namespace App\Model;
    use App\Model\Campaign\Campaign;
    use App\Model\Campaign\Reward;
    use SplObjectStorage;

    class Relic implements Item, Reward {
        private $name;

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function isBuyPossible(Campaign $campaign) {
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
                $recipient->addItem($this);
            }
        }
    }
?>
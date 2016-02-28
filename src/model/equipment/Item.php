<?php namespace App\Model;

    use App\Model\Campaign\Campaign;

    interface Item {
        public function getName();
        public function isBuyPossible(Campaign $campaign);
        public function isSellPossible();
        public function getBuyValue();
        public function getSellValue();
    }
?>
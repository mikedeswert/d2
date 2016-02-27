<?php namespace App\Model;

    interface Equipment {
        public function isBuyPossible();
        public function isSellPossible();
        public function getBuyValue();
        public function getSellValue();
    }
?>
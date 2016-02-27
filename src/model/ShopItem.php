<?php
    class ShopItem implements Equipment {
        private $act;
        private $name;
        private $buyValue;
        private $sellValue;
        private $type;

        public function getAct() {
            return $this->act;
        }

        public function setAct($act) {
            $this->act = $act;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getBuyValue() {
            return $this->buyValue;
        }

        public function setBuyValue($buyValue) {
            $this->buyValue = $buyValue;
        }

        public function getSellValue() {
            return $this->sellValue;
        }

        public function setSellValue($sellValue) {
            $this->sellValue = $sellValue;
        }

        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function isBuyPossible() {
            // TODO: Check whether we can buy the shop items of this shop item's act
        }

        public function isSellPossible() {
            return true;
        }
    }
?>
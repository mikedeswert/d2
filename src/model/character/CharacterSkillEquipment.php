<?php namespace App\Model;
    class CharacterSkillEquipment extends CharacterSkill implements Equipment {
        private $sellValue;

        public function setSellValue($sellValue) {
            $this->sellValue = $sellValue;
        }

        public function isBuyPossible() {
            return false;
        }

        public function isSellPossible() {
            return true;
        }

        public function getBuyValue() {
            return 0;
        }

        public function getSellValue() {
            return $this->sellValue;
        }
    }
?>
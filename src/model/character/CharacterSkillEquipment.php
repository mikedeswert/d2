<?php namespace App\Model;
    use App\Model\Campaign\Campaign;

    class CharacterSkillItem extends CharacterSkill implements Item {
        public function isBasic() {
            return true;
        }

        public function isBuyPossible(Campaign $campaign) {
            return false;
        }

        public function isTradePossible() {
            return false;
        }

        public function isSellPossible() {
            return true;
        }

        public function getBuyValue() {
            return 0;
        }

        public function getSellValue() {
            return 25;
        }
    }
?>
<?php namespace App\Model;
    use SplObjectStorage;

    class CharacterSkill implements Skill {
        private $name = '';
        private $xpCost = 0;
        private $basic = false;

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getXpCost() {
            return $this->xpCost;
        }

        public function setXpCost($xpCost) {
            $this->xpCost = $xpCost;
        }

        public function isBasic() {
            return $this->basic;
        }

        public function setBasic($basic) {
            $this->basic = $basic;
        }

        public function arePrerequisitesMet(SplObjectStorage $skills) {
            return true;
        }
    }
?>
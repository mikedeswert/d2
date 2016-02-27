<?php namespace App\Model;
    use SplObjectStorage;

    class Hero implements Player {
        private $member;
        private $character;
        private $class;
        private $skills;
        private $equipment;
        private $xp;

        function __construct() {
            $this->skills = new SplObjectStorage();
            $this->equipment = new SplObjectStorage();
        }

        public function getMember() {
            return $this->member;
        }

        public function setMember($member) {
            $this->member = $member;
        }

        public function getCharacter() {
            return $this->character;
        }

        public function setCharacter(Character $character) {
            $this->character = $character;
        }

        public function getClass() {
            return $this->class;
        }

        public function setClass(CharacterClass $class) {
            $this->class = $class;
        }

        public function getSkills() {
            return $this->skills;
        }

        public function addSkill(CharacterSkill $skill) {
            if($this->xp < $skill->getXpCost() ||
               !isset($this->class) ||
               $this->class->isSkillInvalid($skill)) {
                return;
            }

            $this->skills->attach($skill);
        }

        public function getEquipment() {
            return $this->equipment;
        }

        public function hasEquipment(Equipment $equipment) {
            return $this->equipment->contains($equipment);
        }

        public function addEquipment(Equipment $equipment) {
            $this->equipment->attach($equipment);
        }

        public function removeEquipment(Equipment $equipment) {
            $this->equipment->detach($equipment);
        }

        public function getXp() {
            return $this->xp;
        }

        public function setXp($xp) {
            $this->xp = $xp;
        }

        public function addXp($xp) {
            $this->xp = $this->xp + $xp;
        }
    }
?>
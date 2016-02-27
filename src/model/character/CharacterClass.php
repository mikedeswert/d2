<?php namespace App\Model;
    use SplObjectStorage;

    class CharacterClass {
        private $name = '';
        private $skills;

        public function __construct() {
            $this->skills = new SplObjectStorage();
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getSkills() {
            return $this->skills;
        }

        public function addSkill(CharacterSkill $skill) {
            $this->skills->attach($skill);
        }

        public function isSkillInvalid(CharacterSkill $skill) {
            return !$this->skills->contains($skill);
        }
    }
?>
<?php namespace App\Model;
    use SplObjectStorage;

    class Hero implements Player {
        private $member;
        private $character;
        private $class;
        private $skills;
        private $items;
        private $party;
        private $xp;

        function __construct(Party &$party) {
            $this->party = $party;
            $this->skills = new SplObjectStorage();
            $this->items = new SplObjectStorage();
        }

        public function getCharacterName() {
            return $this->character->getName();
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

        public function getSelectableSkills() {
            $selectableSkills = new SplObjectStorage();

            foreach($this->class->getSkills() as $skill) {
                if($this->xp >= $skill->getXpCost() && !$this->skills->contains($skill)) {
                    $selectableSkills->attach($skill);
                }
            }

            return $selectableSkills;
        }

        public function addSkill(Skill $skill) {
            if($this->xp < $skill->getXpCost() ||
               !isset($this->class) ||
               $this->class->isSkillInvalid($skill)) {
                return;
            }

            $this->skills->attach($skill);
        }

        public function removeSkill(Skill $skill) {
            if(!$this->skills->contains($skill)) {
                return;
            }

            $this->skills->detach($skill);
        }

        public function getItems() {
            return $this->items;
        }

        public function hasItem(Item $item) {
            return $this->items->contains($item);
        }

        public function addItem(Item $item) {
            $this->items->attach($item);
        }

        public function removeItem(Item $item) {
            if(!$this->items->contains($item)) {
                return;
            }

            $this->items->detach($item);
        }

        public function getParty() {
            return $this->party;
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

        public function addGold($gold) {
            $this->party->addGold($gold);
        }
    }
?>
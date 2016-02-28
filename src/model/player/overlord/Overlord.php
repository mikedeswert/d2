<?php namespace App\Model\Overlord;
    use App\Model\Item;
    use App\Model\Player;
    use App\Model\Skill;
    use SplObjectStorage;
    use App\Model\GameGroupMember;

    class Overlord implements Player {
        private $member;
        private $skills;
        private $xp;
        private $items;

        public function __construct() {
            $this->skills = new SplObjectStorage();
            $this->items = new SplObjectStorage();
        }

        public function getCharacterName() {
            return 'Overlord';
        }

        public function getMember() {
            return $this->member;
        }

        public function setMember(GameGroupMember $member) {
            $this->member = $member;
        }

        public function getSkills() {
            return $this->skills;
        }

        public function addSkill(Skill $skill) {
            if(!$this->xp < $skill->getXpCost() || !$skill->arePrerequisitesMet($this->skills)) {
                return;
            }

            $this->xp -= $skill->getXpCost();
            $this->skills->attach($skill);
        }

        public function removeSkill(Skill $skill) {
            if(!$this->skills->contains($skill)) {
                return;
            }

            $this->skills->detach($skill);
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

        public function getItems() {
            return $this->items;
        }

        public function addItem(Item $item) {
            $this->items->attach($item);
        }

        public function removeItem(Item $item) {
            if (!$this->items->contains($item)) {
                return;
            }

            $this->items->detach($item);
        }
    }
?>
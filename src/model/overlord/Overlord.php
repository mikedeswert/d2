<?php namespace App\Model\Overlord;
    use App\Model\Player;
    use SplObjectStorage;
    use App\Model\GameGroupMember;

    class Overlord implements Player {
        private $member;
        private $skills;
        private $xp;

        public function __construct() {
            $this->skills = new SplObjectStorage();
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

        public function addSkill(OverlordSkill $skill) {
            if(!$this->xp < $skill->getXpCost() || !$skill->isPrerequisiteMet($this->skills)) {
                return;
            }

            $this->xp -= $skill->getXpCost();
            $this->skills->attach($skill);
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
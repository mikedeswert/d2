<?php namespace App\Model\Overlord;
    use SplObjectStorage;
    use App\Model\Skill;

    class OverlordSkill implements Skill {
        private $name;
        private $type;
        private $xpCost;
        private $basic = false;
        private $prerequisite;

        public function __construct() {
            $this->prerequisite = new NotYetTakenPrerequisite();
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function getXpCost() {
            return $this->xpCost;
        }

        public function setXpCost($xpCost) {
            $this->setXpCost($xpCost);
        }

        public function isBasic() {
            return $this->basic;
        }

        public function setBasic($basic) {
            $this->basic = $basic;
        }

        public function getPrerequisite() {
            return $this->prerequisite;
        }

        public function setPrerequisite(OverlordSkillPrerequisite $prerequisite) {
            $this->prerequisite = $prerequisite;
        }

        public function isPrerequisiteMet(SplObjectStorage $skills) {
            $this->prerequisite->isMet($skills, $this);
        }
    }
?>
<?php namespace App\Model\Overlord;
    use SplObjectStorage;

    class LowerLevelSkillsPrerequisite implements OverlordSkillPrerequisite {
        private $xpCost;
        private $amount;

        public function __construct($xpCost, $amount) {
            $this->xpCost = $xpCost;
            $this->amount = $amount;
        }

        public function isMet(SplObjectStorage $obtainedSkills, OverlordSkill $skill) {
            return $this->getRelevantSkills($obtainedSkills, $skill)->count() >= $this->amount;
        }

        private function getRelevantSkills(SplObjectStorage $obtainedSkills, OverlordSkill $skill) {
            $relevantSkills = new SplObjectStorage();

            foreach($obtainedSkills as $obtainedSkill) {
                if($obtainedSkill->getType() == $skill->getType() &&
                   $obtainedSkill->getXpCost() >= $this->xpCost) {
                    $relevantSkills->attach($obtainedSkill);
                }
            }

            return $relevantSkills;
        }

    }

?>
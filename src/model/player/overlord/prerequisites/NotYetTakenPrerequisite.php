<?php namespace App\Model\Overlord;
    use SplObjectStorage;

    class NotYetTakenPrerequisite implements OverlordSkillPrerequisite {
        public function isMet(SplObjectStorage $obtainedSkills, OverlordSkill $skill) {
            return !$obtainedSkills->contains($skill);
        }
    }
?>
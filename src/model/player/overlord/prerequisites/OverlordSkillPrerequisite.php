<?php namespace App\Model\Overlord;
    use SplObjectStorage;

    interface OverlordSkillPrerequisite {
        public function isMet(SplObjectStorage $skills, OverlordSkill $skill);
    }
?>
<?php namespace App\Model;
    use SplObjectStorage;

    interface Skill {
        public function getXpCost();
        public function isBasic();
        public function arePrerequisitesMet(SplObjectStorage $skills);
    }
?>
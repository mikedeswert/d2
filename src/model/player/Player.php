<?php namespace App\Model;
    interface Player {
        public function getCharacterName();
        public function addXp($xp);
        public function removeSkill(Skill $skill);
        public function addSkill(Skill $skill);
        public function addItem(Item $item);
        public function removeItem(Item $item);
    }
?>
<?php namespace App\Model;
    class Game {
        private $gameGroup;

        public function getGameGroup() {
            return $this->gameGroup;
        }

        public function setGameGroup(GameGroup $gameGroup) {
            $this->gameGroup = $gameGroup;
        }
    }
?>
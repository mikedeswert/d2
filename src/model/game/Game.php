<?php namespace App\Model;
    use SplObjectStorage;

    class Game {
        private $gameGroup;
        private $expansions;
        private $campaign;

        public function __construct() {
            $this->expansions = new SplObjectStorage();
        }

        public function getGameGroup() {
            return $this->gameGroup;
        }

        public function setGameGroup(GameGroup $gameGroup) {
            $this->gameGroup = $gameGroup;
        }

        public function getExpansions() {
            return $this->expansions;
        }

        public function addExpansion($expansion) {
            $this->expansions->attach($expansion);
        }

        public function getAllMonsterGroups() {

        }

        public function getAllShopItems() {

        }

        public function getAllPlotAbilities() {

        }
    }
?>
<?php namespace App\Model;
    class Expansion {
        private $name = '';
        private $type;
        private $monsterGroups;
        private $overlordSkills;
        private $characters;
        private $characterClasses;
        private $rumors;
        private $plotAbilities;
        private $searchCards;
        private $shopItems;

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

        public function getMonsterGroups() {
            return $this->monsterGroups;
        }

        public function setMonsterGroups($monsterGroups) {
            $this->monsterGroups = $monsterGroups;
        }

        public function getOverlordSkills() {
            return $this->overlordSkills;
        }

        public function setOverlordSkills($overlordSkills) {
            $this->overlordSkills = $overlordSkills;
        }

        public function getCharacters() {
            return $this->characters;
        }

        public function setCharacters($characters) {
            $this->characters = $characters;
        }

        public function getCharacterClasses() {
            return $this->characterClasses;
        }

        public function setCharacterClasses($characterClasses) {
            $this->characterClasses = $characterClasses;
        }

        public function getRumors() {
            return $this->rumors;
        }

        public function setRumors($rumors) {
            $this->rumors = $rumors;
        }

        public function getPlotAbilities() {
            return $this->plotAbilities;
        }

        public function setPlotAbilities($plotAbilities) {
            $this->plotAbilities = $plotAbilities;
        }

        public function getSearchCards() {
            return $this->searchCards;
        }

        public function setSearchCards($searchCards) {
            $this->searchCards = $searchCards;
        }

        public function getShopItems() {
            return $this->shopItems;
        }

        public function setShopItems($shopItems) {
            $this->shopItems = $shopItems;
        }
    }
?>
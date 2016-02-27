<?php namespace App\Model;
    class Character {
        private $name = '';
        private $stats;
        private $archetype;

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getStats() {
            return $this->stats;
        }

        public function setStats(CharacterStats $stats) {
            $this->stats = $stats;
        }

        public function getArchetype() {
            return $this->archetype;
        }

        public function setArchetype(Archetype $archetype) {
            $this->archetype = $archetype;
        }
    }
?>
<?php namespace App\Model;
    class CharacterStats {
        private $speed;
        private $health;
        private $wisdom;
        private $willpower;
        private $might;
        private $awareness;
        private $defenseDie;

        public function getSpeed() {
            return $this->speed;
        }

        public function setSpeed($speed) {
            $this->speed = $speed;
        }

        public function getHealth() {
            return $this->health;
        }

        public function setHealth($health) {
            $this->health = $health;
        }

        public function getWisdom() {
            return $this->wisdom;
        }

        public function setWisdom($wisdom) {
            $this->wisdom = $wisdom;
        }

        public function getWillpower() {
            return $this->willpower;
        }

        public function setWillpower($willpower) {
            $this->willpower = $willpower;
        }

        public function getMight() {
            return $this->might;
        }

        public function setMight($might) {
            $this->might = $might;
        }

        public function getAwareness() {
            return $this->awareness;
        }

        public function setAwareness($awareness) {
            $this->awareness = $awareness;
        }

        public function getDefenseDie() {
            return $this->defenseDie;
        }

        public function setDefenseDie($defenseDie) {
            $this->defenseDie = $defenseDie;
        }
    }
?>
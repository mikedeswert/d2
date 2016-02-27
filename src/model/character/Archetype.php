<?php namespace App\Model;
    use SplObjectStorage;

    class Archetype {
        private $name = '';
        private $classes;

        public function __construct() {
            $this->classes = new SplObjectStorage();
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getClasses() {
            return $this->classes;
        }

        public function addClass($class) {
            $this->classes->attach($class);
        }
    }
?>
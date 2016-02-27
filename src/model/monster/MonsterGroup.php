<?php namespace App\Model\Monster;
    use SplObjectStorage;

    class MonsterGroup {
        private $name = '';
        private $traits;

        public function __construct() {
            $this->traits = new SplObjectStorage();
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getTraits() {
            return $this->traits;
        }

        public function addTrait(MonsterTrait $trait) {
            $this->traits->attach($trait);
        }
    }
?>
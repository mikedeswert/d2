<?php namespace App\Model\Monster;
    class MonsterTrait {
        private $name;

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }
    }
?>
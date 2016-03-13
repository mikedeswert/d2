<?php namespace App\Model;
    class GameGroupMember {
        private $name;

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }
    }
?>
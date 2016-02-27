<?php namespace App\Model;
    use SplObjectStorage;

    class GameGroup {
        private $name = '';
        private $members;

        public function __construct() {
            $this->members = new SplObjectStorage();
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getMembers() {
            return $this->members;
        }

        public function addMember(GameGroupMember $member) {
            $this->members->attach($member);
        }
    }
?>
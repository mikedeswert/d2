<?php namespace App\Model\Campaign;
    use SplObjectStorage;

    class Campaign {
        private $name = '';
        private $setup; // ex. MiniCampaign, FullCampaign, ActOneCampaign
        private $acts;
        private $party;
        private $overlord;

        public function __construct(Setup $setup) {
            $this->acts = new SplObjectStorage();
            $this->setup = $setup;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getSetup() {
            return $this->setup;
        }

        public function getActs() {
            return $this->acts;
        }

        public function getCurrentAct() {
            foreach ($this->acts as $act) {
                if($act->isCompleted() == false) {
                    return $act;
                }
            }

            return null;
        }

        public function getActByName($actName) {
            foreach ($this->acts as $act) {
                if($act->getName() == $actName) {
                    return $act;
                }
            }

            return null;
        }

        public function addAct($act) {
            $this->acts->attach($act);
        }

        public function getParty() {
            return $this->party;
        }

        public function setParty($party) {
            $this->party = $party;
        }

        public function getOverlord() {
            return $this->overlord;
        }

        public function setOverlord($overlord) {
            $this->overlord = $overlord;
        }

        public function getQuestByName($name) {
            foreach($this->acts as $act) {
                foreach($act->getQuests() as $quest) {
                    if($quest->getName() == $name) {
                        return $quest;
                    }
                }
            }

            return null;
        }

        public function start() {
            $this->setup->applyTo($this);
        }
    }
?>
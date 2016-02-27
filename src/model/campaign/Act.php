<?php namespace App\Model\Campaign;
    use SplObjectStorage;
    use App\Model\Campaign\Quest\Quest;

    class Act {
        private $name = '';
        private $quests;

        public function __construct() {
            $this->quests = new SplObjectStorage();
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getQuests() {
            return $this->quests;
        }

        public function getSelectableQuests() {
            $selectedQuests = new SplObjectStorage();

            foreach($this->quests as $quest) {
                if($quest->arePrerequisitesMet($this)) {
                    $selectedQuests->attach($quest);
                }
            }

            return $selectedQuests;
        }

        public function addQuest(Quest $quest) {
            $this->quests->attach($quest);
        }

        public function isCompleted() {
            return $this->areAllSelectedQuestsComplete() && $this->getSelectableQuests()->count() == 0;
        }

        private function areAllSelectedQuestsComplete() {
            foreach($this->getSelectedQuests() as $selectedQuest) {
                if($selectedQuest->isCompleted() == false) {
                    return false;
                }
            }

            return true;
        }

        private function getSelectedQuests() {
            $selectedQuests = new SplObjectStorage();

            foreach($this->quests as $quest) {
                if($quest->isSelected()) {
                    $selectedQuests->attach($quest);
                }
            }

            return $selectedQuests;
        }
    }
?>
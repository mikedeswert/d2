<?php namespace App\Model\Campaign;
    use SplObjectStorage;
    use App\Model\Campaign\Quest\Quest;

    class Act {
        private $name = '';
        private $quests;
        private $numberOfQuestsToComplete = 1;
        private $shopItemPrerequisites;

        public function __construct() {
            $this->quests = new SplObjectStorage();
            $this->shopItemPrerequisites = new SplObjectStorage();
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

        public function getSelectableQuests(Campaign $campaign) {
            $selectedQuests = new SplObjectStorage();

            foreach($this->quests as $quest) {
                if($quest->arePrerequisitesMet($campaign, $quest)) {
                    $selectedQuests->attach($quest);
                }
            }

            return $selectedQuests;
        }

        public function getSelectedQuests() {
            $selectedQuests = new SplObjectStorage();

            foreach($this->quests as $quest) {
                if($quest->isSelected()) {
                    $selectedQuests->attach($quest);
                }
            }

            return $selectedQuests;
        }

        public function getQuestsWonBy($winner) {
            $questsWonByWinner = new SplObjectStorage();

            foreach($this->quests as $quest) {
                if($quest->getWinner() == $winner) {
                    $questsWonByWinner->attach($quest);
                }
            }

            return $questsWonByWinner;
        }

        public function addQuest(Quest $quest) {
            $this->quests->attach($quest);
        }

        public function getNumberOfQuestsToComplete() {
            return $this->numberOfQuestsToComplete;
        }

        public function setNumberOfQuestsToComplete($numberOfQuestsToComplete) {
            $this->numberOfQuestsToComplete = $numberOfQuestsToComplete;
        }

        public function getShopItemPrerequisites() {
            return $this->shopItemPrerequisites;
        }

        public function addShopItemPrerequisite($shopItemPrerequisite) {
            $this->shopItemPrerequisites->attach($shopItemPrerequisite);
        }

        public function isCompleted() {
            return $this->getCompletedQuests()->count() >= $this->numberOfQuestsToComplete;
        }

        private function getCompletedQuests() {
            $completedQuests = new SplObjectStorage();

            foreach($this->quests as $quest) {
                if($quest->isCompleted()) {
                    $completedQuests->attach($quest);
                }
            }

            return $completedQuests;
        }
    }
?>
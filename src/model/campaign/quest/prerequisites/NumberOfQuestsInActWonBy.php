<?php namespace App\Model\Campaign\Quest;
    use App\Model\Campaign\Campaign;

    class NumberOfQuestInActWonBy implements QuestPrerequisite {
        private $amount;
        private $actName;
        private $winner;

        public function __construct($amount, $actName, $winner) {
            $this->amount = $amount;
            $this->actName = $actName;
            $this->winner = $winner;
        }

        public function isMet(Campaign $campaign, Quest $quest) {
            return $campaign->getActByName($this->actName)->getQuestsWonBy($this->winner)->count() >= $this->amount;
        }
    }
?>
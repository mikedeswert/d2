<?php namespace App\Model\Campaign\Quest;
    use App\Model\Campaign\Campaign;

    class QuestWonBy implements QuestPrerequisite {
        private $questName;
        private $winner;

        public function __construct($questName, $winner) {
            $this->questName = $questName;
            $this->winner = $winner;
        }

        public function isMet(Campaign $campaign, Quest $quest) {
            return $campaign->getQuestByName($this->questName)->getWinner() == $this->winner;
        }
    }
?>
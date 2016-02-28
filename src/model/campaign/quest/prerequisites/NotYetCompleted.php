<?php namespace App\Model\Campaign\Quest;
    use App\Model\Campaign\Campaign;

    class NotYetCompleted implements QuestPrerequisite {
        public function isMet(Campaign $campaign, Quest $quest) {
            return $quest->isCompleted() == false;
        }
    }
?>
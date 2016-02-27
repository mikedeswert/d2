<?php namespace App\Model\Campaign\Quest;
    class NotYetCompletedPrerequisite implements QuestPrerequisite {
        public function isMet(Act $act, Quest $quest) {
            return $quest->isCompleted() == false;
        }
    }
?>
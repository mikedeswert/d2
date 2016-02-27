<?php namespace App\Model\Campaign\Quest;
    use App\Model\Campaign\Act;

    interface QuestPrerequisite {
        public function isMet(Act $act, Quest $quest);
    }
?>
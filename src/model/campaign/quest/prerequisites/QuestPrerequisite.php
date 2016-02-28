<?php namespace App\Model\Campaign\Quest;
    use App\Model\Campaign\Campaign;

    interface QuestPrerequisite {
        public function isMet(Campaign $campaign, Quest $quest);
    }
?>
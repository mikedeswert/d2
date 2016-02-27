<?php namespace App\Model\Campaign\Encounter;
    use App\Model\Campaign\Quest\Quest;

    interface EncounterPrerequisite {
        public function isMet(Quest $quest, Encounter $encounter);
    }
?>
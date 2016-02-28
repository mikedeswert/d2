<?php namespace App\Model\Campaign\Encounter;
    use App\Model\Campaign\Quest\Quest;

    class NotYetCompleted implements EncounterPrerequisite {
        public function isMet(Quest $quest, Encounter $encounter) {
            return $encounter->isComplete() == false;
        }
    }
?>
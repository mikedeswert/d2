<?php namespace App\Model\Campaign\Encounter;
    use App\Model\Campaign\Quest\Quest;

    class NotYetCompletedPrerequisite implements EncounterPrerequisite {
        public function isMet(Quest $quest, Encounter $encounter) {
            return $encounter->isCompleted() == false;
        }
    }
?>
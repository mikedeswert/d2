<?php namespace App\Model\Campaign\Encounter;
    use App\Model\Campaign\Quest\Quest;

    class EncounterCompletedPrerequisite implements EncounterPrerequisite {
        private $encounterName;

        public function __construct($encounterName) {
            $this->encounterName = $encounterName;
        }

        public function isMet(Quest $quest, Encounter $encounter) {
            foreach($quest->getEncounters() as $questEncounter) {
                if($questEncounter->getName() == $this->encounterName) {
                    return $questEncounter->isCompleted();
                }
            }

            return false;
        }
    }
?>
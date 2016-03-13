<?php namespace App\Model\Campaign\Quest;
    use App\Model\Campaign\Encounter\NotYetCompleted;
    use App\Model\Campaign\Shopping\ShoppingStep;
    use App\Model\Campaign\SpendXp\SpendXpStep;
    use App\Model\Campaign\Travel\TravelStep;
    use SplObjectStorage;
    use App\Model\Campaign\Encounter\Encounter;
    use App\Model\Campaign\Act;

    class Quest {
        private $name = '';
        private $encounters;
        private $selected = false;
        private $prerequisites;
        private $winner = 'overlord';
        private $travelStep;
        private $spendXpStep;
        private $shoppingStep;
        private $travelEventTypes;

        public function __construct() {
            $this->encounters = new SplObjectStorage();
            $this->travelEventTypes = array();
            $this->prerequisites = new SplObjectStorage();
            $this->prerequisites->attach(new NotYetCompleted());
            $this->travelStep = new TravelStep();
            $this->spendXpStep = new SpendXpStep();
            $this->shoppingStep = new ShoppingStep();
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getEncounters() {
            return $this->encounters;
        }

        public function getSelectableEncounters() {
            $selectableEncounters = new SplObjectStorage();

            foreach($this->encounters as $encounter) {
                if($encounter->arePrerequisitesMet($this)) {
                    $selectableEncounters->attach($encounter);
                }
            }

            return $selectableEncounters;
        }

        public function addEncounter(Encounter $encounter) {
            $this->encounters->attach($encounter);
        }

        public function isSelected() {
            return $this->selected;
        }

        public function setSelected($selected) {
            $this->selected = $selected;
        }

        public function getPrerequisites() {
            return $this->prerequisites;
        }

        public function addPrerequisite($prerequisite) {
            $this->prerequisites->attach($prerequisite);
        }

        public function arePrerequisitesMet(Act $act) {
            foreach($this->prerequisites as $prerequisite) {
                if(!$prerequisite->isMet($act, $this)) {
                    return false;
                }
            }

            return true;
        }

        public function getWinner() {
            return $this->winner;
        }

        public function setWinner($winner) {
            $this->winner = $winner;
        }

        public function getTravelStep() {
            return $this->travelStep;
        }

        public function getSpendXpStep() {
            return $this->spendXpStep;
        }

        public function getShoppingStep() {
            return $this->shoppingStep;
        }

        public function getTravelEventTypes() {
            return $this->travelEventTypes;
        }

        public function addTravelEventType($travelEventType) {
            $this->travelEventTypes[] = $travelEventType;
        }

        public function isCompleted() {
            foreach($this->getSelectableEncounters() as $encounter) {
                if($encounter->isCompleted() == false) {
                    return false;
                }
            }

            return true;
        }
    }
?>
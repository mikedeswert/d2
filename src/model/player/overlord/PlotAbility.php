<?php namespace App\Model\Overlord;

    class PlotAbility {
        private $name = '';
        private $threatCost = 0;

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getThreatCost() {
            return $this->threatCost;
        }

        public function setThreatCost($threatCost) {
            $this->threatCost = $threatCost;
        }
    }
?>
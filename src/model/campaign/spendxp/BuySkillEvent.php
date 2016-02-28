<?php namespace App\Model\Campaign\SpendXp;
    use App\Model\Campaign\Event;
    use App\Model\CharacterSkill;
    use App\Model\Hero;

    class BuySkillEvent implements Event {
        private $hero;
        private $skill;

        public function __construct(Hero &$hero, CharacterSkill $skill) {
            $this->hero = $hero;
            $this->skill = $skill;
        }

        public function getXpCost() {
            return $this->skill->getXpCost();
        }

        public function getCharacterName() {
            $this->hero->getCharacterName();
        }

        public function undo() {
            $this->hero->removeSkill($this->skill);
            $this->hero->addXp($this->skill->getXpCost());
        }

        public function isManualUndoAllowed() {
            return true;
        }
    }
?>
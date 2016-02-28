<?php namespace App\Model\Campaign\Encounter;

use App\Model\Campaign\Quest\Quest;
use App\Model\Campaign\Reward;
use App\Model\Campaign\Step;
use App\Model\Monster\MonsterGroup;
use App\Model\Monster\MonsterTrait;
use SplObjectStorage;

class Encounter implements Step {
    private $name = '';
    private $monsterTraits;
    private $numberOfOpenGroups = 0;
    private $fixedMonsterGroups;
    private $openMonsterGroups;
    private $winner;
    private $unconditionalRewards;
    private $heroRewards;
    private $overlordRewards;
    private $prerequisites;
    private $completed = false;

    public function __construct() {
        $this->monsterTraits = new SplObjectStorage();
        $this->fixedMonsterGroups = new SplObjectStorage();
        $this->openMonsterGroups = new SplObjectStorage();
        $this->unconditionalRewards = new SplObjectStorage();
        $this->heroRewards = new SplObjectStorage();
        $this->overlordRewards = new SplObjectStorage();
        $this->prerequisites = new SplObjectStorage();
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getMonsterTraits() {
        return $this->monsterTraits;
    }

    public function addMonsterTrait(MonsterTrait $monsterTrait) {
        $this->monsterTraits->attach($monsterTrait);
    }

    public function getNumberOfOpenGroups() {
        return $this->numberOfOpenGroups;
    }

    public function setNumberOfOpenGroups($numberOfOpenGroups) {
        $this->numberOfOpenGroups = $numberOfOpenGroups;
    }

    public function getFixedMonsterGroups() {
        return $this->fixedMonsterGroups;
    }

    public function addFixedMonsterGroup(MonsterGroup $fixedMonsterGroup) {
        $this->fixedMonsterGroups->attach($fixedMonsterGroup);
    }

    public function getOpenMonsterGroups() {
        return $this->openMonsterGroups;
    }

    public function addOpenMonsterGroup(MonsterGroup $openMonsterGroup) {
        $this->openMonsterGroups->attach($openMonsterGroup);
    }

    public function getWinner() {
        return $this->winner;
    }

    public function setWinner($winner) {
        $this->winner = $winner;
    }

    public function getUnconditionalRewards() {
        return $this->unconditionalRewards;
    }

    public function addUnconditionalReward(Reward $unconditionalReward) {
        $this->unconditionalRewards->attach($unconditionalReward);
    }

    public function getHeroRewards() {
        return $this->heroRewards;
    }

    public function addHeroRewards(Reward $heroReward) {
        $this->heroRewards->attach($heroReward);
    }

    public function getOverlordRewards() {
        return $this->overlordRewards;
    }

    public function addOverlordRewards(Reward $overlordReward) {
        $this->overlordRewards->attach($overlordReward);
    }

    public function getPrerequisites() {
        return $this->prerequisites;
    }

    public function addPrerequisites(EncounterPrerequisite $prerequisite) {
        $this->prerequisites->attach($prerequisite);
    }

    public function arePrerequisitesMet(Quest $quest) {
        foreach ($this->prerequisites as $prerequisite) {
            if (!$prerequisite->isMet($quest, $this)) {
                return false;
            }
        }

        return true;
    }


    public function reopen() {
        $this->completed = false;
    }

    public function complete() {
        $this->completed = true;
    }

    public function isComplete() {
        return $this->completed;
    }
}
?>
<?php namespace App\Factories;

use App\Dao\ItemDao;
use App\Dao\MonsterTraitDao;
use App\Dao\MonsterGroupDao;
use App\Dao\TravelEventTypeDao;
use App\Model\Campaign\Act;
use App\Model\Campaign\Campaign;
use App\Model\Campaign\Encounter\Encounter;
use App\Model\Campaign\FullCampaignSetup;
use App\Model\Campaign\GoldPerHeroReward;
use App\Model\Campaign\Quest\NumberOfQuestInActWonBy;
use App\Model\Campaign\Quest\Quest;
use App\Model\Campaign\Quest\QuestWonBy;
use App\Model\Campaign\XpReward;
use App\Model\IsForAct;

class ShadowRuneCampaignFactory {
    private $monsterGroupDao;
    private $monsterTraitDao;
    private $itemDao;
    private $travelEventTypeDao;

    public function __construct(MonsterGroupDao $monsterGroupDao,
                                MonsterTraitDao $monsterTraitDao,
                                ItemDao $itemDao,
                                TravelEventTypeDao $travelEventTypeDao) {
        $this->monsterGroupDao = $monsterGroupDao;
        $this->monsterTraitDao = $monsterTraitDao;
        $this->itemDao = $itemDao;
        $this->travelEventTypeDao = $travelEventTypeDao;
    }

    public function createShadowRuneCampaign() {
        $campaign = new Campaign(new FullCampaignSetup());
        $campaign->addAct($this->createIntroduction());
        $campaign->addAct($this->createActOne());
        $campaign->addAct($this->createInterlude());
        $campaign->addAct($this->createActTwo());
    }

    private function createIntroduction() {
        $introduction = new Act();
        $introduction->setName('Introduction');
        $introduction->addShopItemPrerequisite(new IsForAct('Act I'));
        $introduction->addQuest($this->createFirstBlood());

        return $introduction;
    }

    private function createFirstBlood() {
        $firstBlood = new Quest();
        $firstBlood->setName('First Blood');

        $encounterOne = new Encounter();
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Forest'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Mountain'));
        $encounterOne->addFixedMonsterGroup($this->monsterGroupDao->findByName('Goblin Archers'));
        $encounterOne->addFixedMonsterGroup($this->monsterGroupDao->findByName('Ettins'));
        $encounterOne->addUnconditionalReward(new XpReward(1));
        $firstBlood->addEncounter($encounterOne);

        return $firstBlood;
    }

    private function createActOne() {
        $actOne = new Act();
        $actOne->setName('Act I');
        $actOne->addShopItemPrerequisite(new IsForAct('Act I'));
        $actOne->setNumberOfQuestsToComplete(3);
        $actOne->addQuest($this->createFatGoblin());
        $actOne->addQuest($this->createCastleDaerion());

        return $actOne;
    }

    private function createFatGoblin() {
        $fatGoblin = new Quest();
        $fatGoblin->setName('Fat Goblin');
        $fatGoblin->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $fatGoblin->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $fatGoblin->addTravelEventType($this->travelEventTypeDao->findByName('Plain'));

        $encounterOne = new Encounter();
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Forest'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('City'));
        $encounterOne->addFixedMonsterGroup($this->monsterGroupDao->findByName('Goblin Archers'));
        $encounterOne->setNumberOfOpenGroups(1);
        $fatGoblin->addEncounter($encounterOne);

        $encounterTwo = new Encounter();
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Cave'));
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Dungeon'));
        $encounterTwo->addFixedMonsterGroup($this->monsterGroupDao->findByName('Splig'));
        $encounterTwo->addFixedMonsterGroup($this->monsterGroupDao->findByName('Goblin Archers'));
        $encounterTwo->addFixedMonsterGroup($this->monsterGroupDao->findByName('Cave Spiders'));
        $encounterTwo->setNumberOfOpenGroups(1);
        $encounterTwo->addHeroRewards(new GoldPerHeroReward(25));
        $encounterTwo->addUnconditionalReward(new XpReward(1));
        $encounterTwo->addOverlordRewards(new XpReward(1));
        $fatGoblin->addEncounter($encounterTwo);

        return $fatGoblin;
    }

    private function createCastleDaerion() {
        $castleDaerion = new Quest();
        $castleDaerion->setName('Castle Daerion');
        $castleDaerion->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $castleDaerion->addTravelEventType($this->travelEventTypeDao->findByName('Road'));

        $encounterOne = new Encounter();
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('City'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Water'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Night'));
        $encounterOne->setNumberOfOpenGroups(2);
        $castleDaerion->addEncounter($encounterOne);

        $encounterTwo = new Encounter();
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('City'));
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Dungeon'));
        $encounterTwo->addFixedMonsterGroup($this->monsterGroupDao->findByName('Sir Alric Farrow'));
        $encounterTwo->addFixedMonsterGroup($this->monsterGroupDao->findByName('Ettins'));
        $encounterTwo->addFixedMonsterGroup($this->monsterGroupDao->findByName('Zombies'));
        $encounterTwo->setNumberOfOpenGroups(1);
        $encounterTwo->addHeroRewards(new GoldPerHeroReward(25));
        $encounterTwo->addUnconditionalReward(new XpReward(1));
        $encounterTwo->addOverlordRewards(new XpReward(1));
        $castleDaerion->addEncounter($encounterTwo);

        return $castleDaerion;
    }

    private function createInterlude() {
        $interlude = new Act();
        $interlude->setName('Interlude');
        $interlude->setNumberOfQuestsToComplete(1);
        $interlude->addQuest($this->createTheShadowVault());
        $interlude->addQuest($this->createTheOverlordRevealed());

        return $interlude;
    }

    private function createTheShadowVault() {
        $theShadowVault = new Quest();
        $theShadowVault->setName('The Shadow Vault');
        $theShadowVault->addPrerequisite(new NumberOfQuestInActWonBy(2, 'Act I', 'heroes'));
        $theShadowVault->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $theShadowVault->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $theShadowVault->addTravelEventType($this->travelEventTypeDao->findByName('Plain'));
        $theShadowVault->addTravelEventType($this->travelEventTypeDao->findByName('Forest'));

        $encounterOne = new Encounter();
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Undead'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Night'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Forest'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Water'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Cave'));
        $encounterOne->addFixedMonsterGroup($this->monsterGroupDao->findByName('Baron Zachareth'));
        $encounterOne->setNumberOfOpenGroups(3);
        $encounterOne->addHeroRewards($this->itemDao->findByName('Shadow Rune'));
        $encounterOne->addUnconditionalReward(new XpReward(1));
        $encounterOne->addOverlordRewards($this->itemDao->findByName('Shadow Rune'));
        $theShadowVault->addEncounter($encounterOne);

        return $theShadowVault;
    }

    private function createTheOverlordRevealed() {
        $theOverlordRevealed = new Quest();
        $theOverlordRevealed->setName('The Overlord Revealed');
        $theOverlordRevealed->addPrerequisite(new NumberOfQuestInActWonBy(2, 'Act I', 'overlord'));
        $theOverlordRevealed->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $theOverlordRevealed->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $theOverlordRevealed->addTravelEventType($this->travelEventTypeDao->findByName('Plain'));
        $theOverlordRevealed->addTravelEventType($this->travelEventTypeDao->findByName('Forest'));

        $encounterOne = new Encounter();
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Night'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Undead'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Dungeon'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Cave'));
        $encounterOne->addFixedMonsterGroup($this->monsterGroupDao->findByName('Baron Zachareth'));
        $encounterOne->setNumberOfOpenGroups(3);
        $encounterOne->addHeroRewards($this->itemDao->findByName('Shadow Rune'));
        $encounterOne->addUnconditionalReward(new XpReward(1));
        $encounterOne->addOverlordRewards($this->itemDao->findByName('Shadow Rune'));
        $theOverlordRevealed->addEncounter($encounterOne);

        return $theOverlordRevealed;
    }

    private function createActTwo() {
        $actTwo = new Act();
        $actTwo->setName('Act 2');
        $actTwo->addShopItemPrerequisite(new IsForAct('Act II'));
        $actTwo->setNumberOfQuestsToComplete(3);
        $actTwo->addQuest($this->createMonstersHoard());
        $actTwo->addQuest($this->createFrozenSpire());

        return $actTwo;
    }

    private function createMonstersHoard() {
        $monstersHoard = new Quest();
        $monstersHoard->setName('Monster\'s Hoard');
        $monstersHoard->addPrerequisite(new QuestWonBy('Fat Goblin', 'heroes'));
        $monstersHoard->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $monstersHoard->addTravelEventType($this->travelEventTypeDao->findByName('River'));
        $monstersHoard->addTravelEventType($this->travelEventTypeDao->findByName('Mountain'));
        $monstersHoard->addTravelEventType($this->travelEventTypeDao->findByName('Plain'));
        $monstersHoard->addTravelEventType($this->travelEventTypeDao->findByName('Forest'));
        $monstersHoard->addTravelEventType($this->travelEventTypeDao->findByName('Mountain'));

        $encounterOne = new Encounter();
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Forest'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Mountain'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Water'));
        $encounterOne->addFixedMonsterGroup($this->monsterGroupDao->findByName('Merriods'));
        $encounterOne->setNumberOfOpenGroups(1);
        $monstersHoard->addEncounter($encounterOne);

        $encounterTwo = new Encounter();
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Cave'));
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Fire'));
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Mountain'));
        $encounterTwo->addFixedMonsterGroup($this->monsterGroupDao->findByName('Goblin Archers'));
        $encounterTwo->setNumberOfOpenGroups(2);
        $encounterTwo->addHeroRewards($this->itemDao->findByName('Trueshot'));
        $encounterTwo->addUnconditionalReward(new XpReward(1));
        $encounterTwo->addOverlordRewards($this->itemDao->findByName('Trueshot'));
        $monstersHoard->addEncounter($encounterTwo);

        return $monstersHoard;
    }

    private function createFrozenSpire() {
        $frozenSpire = new Quest();
        $frozenSpire->setName('Frozen Spire');
        $frozenSpire->addPrerequisite(new QuestWonBy('Fat Goblin', 'overlord'));
        $frozenSpire->addTravelEventType($this->travelEventTypeDao->findByName('Road'));
        $frozenSpire->addTravelEventType($this->travelEventTypeDao->findByName('River'));
        $frozenSpire->addTravelEventType($this->travelEventTypeDao->findByName('Mountain'));
        $frozenSpire->addTravelEventType($this->travelEventTypeDao->findByName('Plain'));
        $frozenSpire->addTravelEventType($this->travelEventTypeDao->findByName('Forest'));
        $frozenSpire->addTravelEventType($this->travelEventTypeDao->findByName('Mountain'));

        $encounterOne = new Encounter();
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Water'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Ice'));
        $encounterOne->addMonsterTrait($this->monsterTraitDao->findByName('Mountain'));
        $encounterOne->addFixedMonsterGroup($this->monsterGroupDao->findByName('Shadow Dragons'));
        $encounterOne->setNumberOfOpenGroups(2);
        $frozenSpire->addEncounter($encounterOne);

        $encounterTwo = new Encounter();
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Cave'));
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Ice'));
        $encounterTwo->addMonsterTrait($this->monsterTraitDao->findByName('Mountain'));
        $encounterTwo->addFixedMonsterGroup($this->monsterGroupDao->findByName('Goblin Archers'));
        $encounterTwo->setNumberOfOpenGroups(2);
        $encounterTwo->addHeroRewards(new XpReward(1));
        $encounterTwo->addUnconditionalReward(new XpReward(1));
        $encounterTwo->addOverlordRewards(new XpReward(2));
        $frozenSpire->addEncounter($encounterTwo);

        return $frozenSpire;
    }
}

?>
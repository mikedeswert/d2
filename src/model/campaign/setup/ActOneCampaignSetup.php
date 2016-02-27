<?php namespace App\Model\Campaign;
    class ActOneCampaignSetup implements Setup {
        public function applyTo(Campaign $campaign) {
            foreach($campaign->getParty()->getHeroes() as $hero) {
                $hero->addXp(1);
            }

            $campaign->getOverlord()->addXp(1);
        }
    }
?>
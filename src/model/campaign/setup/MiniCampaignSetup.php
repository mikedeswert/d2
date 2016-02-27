<?php namespace App\Model\Campaign;
    class MiniCampaignSetup implements Setup {
        public function applyTo(Campaign $campaign) {
            foreach($campaign->getParty()->getHeroes() as $hero) {
                $hero->addXp(4);
                $campaign->getParty()->addGold(100);
            }

            $campaign->getOverlord()->addXp(4);
        }
    }
?>
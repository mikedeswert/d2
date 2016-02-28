<?php namespace App\Model;
    use App\Model\Campaign\Campaign;

    class NotYetTaken implements ShopItemPrerequisite {
        public function isMet(Campaign $campaign, ShopItem $shopItem) {
            return !$campaign->getParty()->getAllItems()->contains($shopItem);
        }
    }
?>
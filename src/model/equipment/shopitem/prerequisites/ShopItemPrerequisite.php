<?php namespace App\Model;
    use App\Model\Campaign\Campaign;

    interface ShopItemPrerequisite {
        public function isMet(Campaign $campaign, ShopItem $shopItem);
    }
?>
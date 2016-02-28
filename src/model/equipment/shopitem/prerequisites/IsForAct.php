<?php namespace App\Model;
    use App\Model\Campaign\Campaign;

    class IsForAct implements ShopItemPrerequisite {
        private $actName;

        public function __construct($actName) {
            $this->actName = $actName;
        }

        public function isMet(Campaign $campaign, ShopItem $shopItem) {
            return $shopItem->getActName() == $this->actName;
        }
    }
?>
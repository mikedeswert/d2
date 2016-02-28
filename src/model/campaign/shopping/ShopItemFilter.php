<?php namespace App\Model\Campaign\Shopping;
    use SplObjectStorage;

    class ShopItemFilter {
        private $actNames;

        public function __construct(array $actNames) {
            $this->actNames = $actNames;
        }

        public function filter(SplObjectStorage $shopItems) {
            $filteredShopItems = new SplObjectStorage();

            foreach($shopItems as $shopItem) {
                if(in_array($shopItem->getActName(), $this->actNames)) {
                    $filteredShopItems->attach($shopItem);
                }
            }

            return $filteredShopItems;
        }
    }
?>
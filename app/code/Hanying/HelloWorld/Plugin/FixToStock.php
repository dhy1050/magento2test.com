<?php
namespace Hanying\HelloWorld\Plugin;

use Hanying\HelloWorld\Helper\Data;

class FixToStock extends \Magento\CatalogInventory\Helper\Stock
{
	public function aroundAddIsInStockFilterToCollection($subject, $proced, $collection)
    {
        // Data::$isOverride = false;

        if(true ) {
            $stockFlag = 'has_stock_status_filter';
            if (!$collection->hasFlag($stockFlag)) {
                $isShowOutOfStock = true;
                $resource = $this->getStockStatusResource();
                $resource->addStockDataToCollection(
                    $collection,
                    !$isShowOutOfStock || $collection->getFlag('require_stock_items')
                );
                $collection->setFlag($stockFlag, true);
                
            }
            Data::$isOverride = false;
        } else {
            return $proced;
        }
    }
}
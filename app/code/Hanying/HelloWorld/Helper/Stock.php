<?php
namespace Hanying\HelloWorld\Helper;

class Stock extends \Magento\CatalogInventory\Helper\Stock
{
	public function addIsInStockFilterToCollection($collection)
    {
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
    }
}
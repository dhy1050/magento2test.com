<?php
namespace Hanying\HelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Product extends Template
{    
    protected $productCollect;
    protected $productStock;
    protected $_categoryFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,  
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,      
        array $data = []
    )
    {
        $this->productCollect = $productCollectionFactory;   
        $this->productStock = $stockItemRepository; 
        $this->_categoryFactory = $categoryFactory;

        parent::__construct($context, $data);
    }

    public function getProductCollect()
    {
    	$collection = $this->productCollect->create();

        $collection->addAttributeToSelect('*')->load();

        return $collection;
    }

    public function getProductQty()
    {
        return $this->productStock->get(8);
    }

    public function getCategory($categoryId)
    {
        $category = $this->_categoryFactory->create();
        $category = $category->load($categoryId);

        return $category;
    }

    public function getCategoryProducts($categoryId)
    {
        $category = $this->getCategory($categoryId);


        $products = $category->getProductCollection()->addAttributeToSelect('*');

        return $products;
    }

    public function getProductByObject()
    {
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();

        $productCollectionFactory = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $collection = $productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // selecting only 3 products

        return $collection;
    }

  
}
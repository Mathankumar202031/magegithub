<?php

namespace Pearl\Student\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddRomoveBlock implements ObserverInterface
{
    public function execute(Observer $observer)
    {
//        $layout = $observer->getLayout();
//        if ($observer->getFullActionName() === 'catalog_product_view') {
//            $block = $layout->getBlock('view.addto.wishlist');
//            if($block) {
//                $layout->unsetElement($block->getNameInLayout());
//            }
//        }
    }
}

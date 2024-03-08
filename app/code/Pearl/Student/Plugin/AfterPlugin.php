<?php

namespace Pearl\Student\Plugin;

use Magento\Catalog\Model\Product;

class AfterPlugin
{
    public function afterGetPrice(Product $subject, $result) {
        return  $result + 200;
    }
}

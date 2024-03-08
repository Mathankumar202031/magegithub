<?php

namespace Pearl\Student\Plugin;

use Magento\Quote\Api\Data\CartInterface;

class AroundPlugin
{
    public function aroundAddProduct(CartInterface $subject,
                                     \Closure $proceed,
                                     $productInfo,
                                     $requestInfo = null
    ) {
        $requestInfo['qty'] = 10;
        $result = $proceed($productInfo, $requestInfo);
        return $result;
    }
}

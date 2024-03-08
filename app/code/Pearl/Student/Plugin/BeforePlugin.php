<?php

namespace Pearl\Student\Plugin;

use Magento\Quote\Api\Data\CartInterface;

class BeforePlugin
{
    /**
     * @param CartInterface $subject
     * @param $productInfo
     * @param $requestInfo
     * @return array
     */
    public function beforeAddProduct(CartInterface $subject,
                                                   $productInfo,
                                                   $requestInfo = null
    ) {
        $requestInfo['qty'] = 10;
        return array($productInfo, $requestInfo);
    }
}

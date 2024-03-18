<?php

namespace Pearl\Student\Plugin\Product;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Api\Data\ProductInterface;

class PluginExtension
{
    protected ProductRepositoryInterface $customDataRepository;

    public function __construct(ProductRepositoryInterface $subject)
    {
        $this->customDataRepository = $subject;
    }

    public function afterGet(ProductRepositoryInterface $subject, ProductInterface $result,$sku)
    {
        $ourCustomData = $this->customDataRepository->get($result->getId());

        $extensionAttributes = $result->getExtensionAttributes();
        $extensionAttributes->setOurCustomData($ourCustomData);
        $result->setExtensionAttributes($extensionAttributes);

        return $result;

//        $extensionAttribute = $result->getExtensionAttributes();
//        $extensionAttribute->setCustomfield("hello world");
//        $result->getExtensionAttributes($extensionAttribute);
    }
}

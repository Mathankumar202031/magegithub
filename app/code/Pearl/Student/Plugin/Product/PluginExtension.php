<?php

namespace Pearl\Student\Plugin\Product;

//use Magento\Catalog\Api\Data\ProductInterface;
//use Magento\Catalog\Api\Data\ProductRenderInterface;
//use Pearl\Student\Ui\DataProvider\Product\Listing\Collector\CustomExtension;
//use Magento\Catalog\Api\Data\ProductRenderExtensionFactory;
//use Magento\Catalog\Api\ProductAttributeRepositoryInterface;

class PluginExtension
{
//    /**
//     * @var ProductRenderExtensionFactory
//     */
//    private $productRenderExtensionFactory;
//
//    /**
//     * @var ProductAttributeRepositoryInterface
//     */
//    private $productAttributeRepository;
//
//    public function __construct(
//        ProductRenderExtensionFactory $productRenderExtensionFactory,
//        ProductAttributeRepositoryInterface $productAttributeRepository
//    ) {
//        $this->productRenderExtensionFactory = $productRenderExtensionFactory;
//        $this->productAttributeRepository = $productAttributeRepository;
//    }
//
//    /**
//     * @param CustomExtension $subject
//     * @param ProductInterface $product
//     * @param ProductRenderInterface $productRender
//     */
//    public function afterCollect(
//        CustomExtension $subject,
//        ProductInterface $product,
//        ProductRenderInterface $productRender
//    ) {
//        $extensionAttributes = $productRender->getExtensionAttributes();
//
//        if (!$extensionAttributes) {
//            $extensionAttributes = $this->productRenderExtensionFactory->create();
//        }
//
//        $productField = $product->getData('sale');
//        $productSale = $product->getData('new');
//        $extensionAttributes->setNew($productSale);
//        $extensionAttributes->setSale($productField);
//
//        $productRender->setExtensionAttributes($extensionAttributes);
//    }
}

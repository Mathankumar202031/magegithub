<?php

namespace Pearl\Student\Ui\DataProvider\Product\Listing\Collector;

//use Magento\Catalog\Api\Data\ProductInterface;
//use Magento\Catalog\Api\Data\ProductRenderExtensionFactory;
//use Magento\Catalog\Api\Data\ProductRenderInterface;
//use Magento\Catalog\Ui\DataProvider\Product\ProductRenderCollectorInterface;
//use Magento\Catalog\Api\ProductAttributeRepositoryInterface;


class SaleExtension
//    implements ProductRenderCollectorInterface
{

//    /**
//     * @var ProductRenderExtensionFactory
//     */
//    private $productRenderExtensionFactory;
//
//    /**
//     * @var ProductAttributeRepositoryInterface
//     */
//    protected $productAttributeRepository;
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
//     * @param ProductInterface $product
//     * @param ProductRenderInterface $productRender
//     */
//    public function collect(ProductInterface $product, ProductRenderInterface $productRender)
//    {
//        $extensionAttributes = $productRender->getExtensionAttributes();
//
//        if (!$extensionAttributes) {
//            $extensionAttributes = $this->productRenderExtensionFactory->create();
//        }
//
////        $productNew = $product->getData('new');
//        $productSale = $product->getData('sale');
////        $productNew = 'new';
////        $data = ('new'=> $productNew);
//        $extensionAttributes->setSale($productSale);
//        $productRender->setExtensionAttributes($extensionAttributes);
//    }
}

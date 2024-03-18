<?php
namespace Pearl\Student\Plugin;

//use Pearl\Student\Ui\DataProvider\Product\Listing\Collector\CustomExtension;
//use Magento\Catalog\Api\Data\ProductInterface;
////use Magento\Catalog\Api\Data\ProductRenderExtensionFactory;
//use Magento\Catalog\Api\ProductAttributeRepositoryInterface;


class QuotePlugin
{

//
//    /**
//     * @var ProductAttributeRepositoryInterface
//     */
//    protected $productAttributeRepository;
//
//    protected $customExtrension;
//    protected  $productInterface;
//
//    protected $productCollection;
//
//    public function __construct(
//        CustomExtension $customExtension,
//        ProductInterface $product
//    ) {
//        $this->customExtrension = $customExtension;
//        $this->productInterface = $product;
//    }
//
//    /**
//     * @param \Magento\Catalog\Helper\Product\Configuration $subject
//     * @param callable $proceed
////     * @param CatalogItemInterface $item
//     * @return array
//     */
//    public function aroundGetCustomOptions(
//        \Magento\Catalog\Helper\Product\Configuration $subject,
//        callable $proceed,
//        \Magento\Catalog\Model\Product\Configuration\Item\ItemInterface $item
//    ) {
//        $product = $item->getProduct();
//        $newAttributeValue = $product->getData('new');
//
//        $result = $proceed($item);
//        $result[] = [
////            'label' => 'Product Extension Attribute',
//            'label' => '**New**',
//            'value' => $newAttributeValue
//        ];
//        return $result;
//    }

}

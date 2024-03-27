<?php
namespace Order\Summary\Plugin;

use Pearl\Student\Ui\DataProvider\Product\Listing\Collector\CustomExtension;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductAttributeRepositoryInterface;


class QuotePlugin
{
    /**
     * @var ProductAttributeRepositoryInterface
     */
    protected $productAttributeRepository;

    /**
     * @var CustomExtension
     */
    protected $customExtrension;
    /**
     * @var ProductInterface
     */
    protected  $productInterface;


    public function __construct(
        CustomExtension $customExtension,
        ProductInterface $productInterface
    ) {
        $this->customExtrension = $customExtension;
        $this->productInterface = $productInterface;
    }

    /**
     * @param \Magento\Catalog\Helper\Product\Configuration $subject
     * @param callable $proceed
     * @return array
     */
    public function aroundGetCustomOptions(\Magento\Catalog\Helper\Product\Configuration $subject,
                                           callable $proceed,
                                           \Magento\Catalog\Model\Product\Configuration\Item\ItemInterface $item
    ) {
        $product = $item->getProduct();
        $newAttributeValue = $product->getData('new');
        $result = $proceed($item);

        if (!empty($newAttributeValue)) {
            $result[] = [
                'label' => 'Product Extension Attribute',
                'value' => '**New**'
            ];
            return $result;
        }
        return $result;
    }
}

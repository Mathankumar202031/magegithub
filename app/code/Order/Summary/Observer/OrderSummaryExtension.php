<?php
namespace Order\Summary\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Serialize\Serializer\Json;
use Pearl\Student\Ui\DataProvider\Product\Listing\Collector\CustomExtension;
use Magento\Catalog\Api\Data\ProductInterface;

class OrderSummaryExtension implements ObserverInterface
{
    protected $_request;
    /**
     * @var Json|mixed
     */
    protected $serializer;
    protected  $productInterface;
    protected  $customExtension;
//    protected  $item;

    public function __construct(
        CustomExtension $customExtension,
        ProductInterface $productInterface,
        RequestInterface $request,
        Json $serializer = null
    )
    {
        $this->productInterface = $productInterface;
        $this->customExtension  = $customExtension;
        $this->_request = $request;
        $this->serializer = $serializer ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->get(\Magento\Framework\Serialize\Serializer\Json::class);

    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getProduct();
        if ($this->_request->getFullActionName() == 'checkout_cart_add') {
            if(!empty($observer->getProduct())) {
                $black = $observer->getProduct()->getData('sale');
            }
            $product = $observer->getProduct();
            $additionalOptions = [];
            $additionalOptions[] = array(
                'label' => "Sale",
                'value' => $black
            );
            $product->addCustomOption('additional_options', $this->serializer->serialize($additionalOptions));
        }
    }

}

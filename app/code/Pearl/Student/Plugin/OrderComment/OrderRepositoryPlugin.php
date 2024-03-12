<?php
namespace Pearl\Student\Plugin\OrderComment;

use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\OrderSearchResultInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

class OrderRepositoryPlugin
{
    public const ORDER_COMMENT_FIELD_NAME = 'order_comment';
    public function __construct(protected OrderExtensionFactory $orderExtensionFactory) {
    }
    /**
     * Add "order_comment" extension attribute to order data object to make it accessible in API data of order record
     *
     * @return OrderInterface
     */
    public function afterGet(OrderRepositoryInterface $subject, OrderInterface $order)
    {
        $this->setOrderComment($order);
        return $order;
    }
    /**
     *
     * @return OrderSearchResultInterface
     */
    public function afterGetList(OrderRepositoryInterface $subject, OrderSearchResultInterface $searchResult)
    {
        $orders = $searchResult->getItems();
        foreach ($orders as $order) {
            $this->setOrderComment($order);
        }
        return $searchResult;
    }

    /**
     * @param OrderInterface $order
     * @return void
     */
    public function setOrderComment(OrderInterface $order): void
    {
        $orderComment = $order->getData(self::ORDER_COMMENT_FIELD_NAME);
        $extensionAttributes = $order->getExtensionAttributes();
        $extensionAttributes = $extensionAttributes ?? $this->orderExtensionFactory->create();
        $extensionAttributes->setOrderComment($orderComment);
        $order->setExtensionAttributes($extensionAttributes);
    }
}

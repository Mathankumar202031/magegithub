<?php
namespace Form\Admin\Block;

use Magento\Customer\Model\SessionFactory;

class BlogList extends \Magento\Framework\View\Element\Template
{

    protected $blogCollection;


    protected $customerSession;


    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Form\Admin\Model\ResourceModel\Blog\CollectionFactory $blogCollection,
        SessionFactory $customerSession,
        array $data = []
    ) {
        $this->blogCollection = $blogCollection;
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }


    public function getBlogs()
    {
        $customerId = $this->customerSession->create()->getCustomer()->getId();
        $collection = $this->blogCollection->create();
        $collection->addFieldToFilter('user_id', ['eq'=>$customerId]);
        return $collection;
    }
}

<?php
namespace Pearl\Student\Controller\Manage;

use Magento\Customer\Controller\AccountInterface;
//use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Add implements AccountInterface
{
    /**
     * @var PageFactory
     */
    private $resultPageFactory;
    protected $context;

    /**
     * Dependency Initilization
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->context = $context;
    }

    /**
     * Provides content
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Add Blog'));
        $layout = $resultPage->getLayout();
        return $resultPage;
    }
}

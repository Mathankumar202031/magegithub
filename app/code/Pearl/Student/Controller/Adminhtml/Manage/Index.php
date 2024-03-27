<?php
namespace Pearl\Student\Controller\Adminhtml\Manage;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    protected $context;


    protected $resultPageFactory;

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
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Provides content
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Pearl_Student::manage');
        $resultPage->getConfig()->getTitle()->prepend(__('Student Registration'));
        return $resultPage;
    }


    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Pearl_Student::manage');
    }
}

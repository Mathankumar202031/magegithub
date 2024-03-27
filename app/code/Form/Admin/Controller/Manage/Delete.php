<?php
namespace Form\Admin\Controller\Manage;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Customer\Model\Session;
use Form\Admin\Model\BlogFactory;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Delete implements ActionInterface
{
    protected $blogFactory;
    protected $customerSession;
    protected $jsonData;
    protected $accountManagement;
    protected $jsonResultFactory;
    protected $request;

    public function __construct(
        RequestInterface $request,
        BlogFactory $blogFactory,
        Session $customerSession,
        Json $jsonData,
        AccountManagementInterface $accountManagement,
        JsonFactory $jsonResultFactory
    ) {
        $this->request = $request;
        $this->blogFactory = $blogFactory;
        $this->customerSession = $customerSession;
        $this->jsonData = $jsonData;
        $this->accountManagement = $accountManagement;
        $this->jsonResultFactory = $jsonResultFactory;
    }

    public function execute()
    {
        $blogId = $this->request->getParam('id');
        $customerId = $this->customerSession->getCustomerId();
        $isAuthorised = $this->blogFactory->create()
            ->getCollection()
            ->addFieldToFilter('user_id', $customerId)
            ->addFieldToFilter('entity_id', $blogId)
            ->getSize();

        $resultJson = $this->jsonResultFactory->create();

        if (!$isAuthorised) {
            $msg = __('You are not authorised to delete this blog.');
            $success = 0;
        } else {
            $model = $this->blogFactory->create()->load($blogId);
            $model->delete();
            $msg = __('You have successfully deleted the blog.');
            $success = 1;
        }

        return $resultJson->setData(['success' => $success, 'message' => $msg]);
    }
}

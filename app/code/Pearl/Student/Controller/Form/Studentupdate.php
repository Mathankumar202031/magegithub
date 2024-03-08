<?php

namespace Pearl\Student\Controller\Form;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Pearl\Student\Model\Registration;
use Pearl\Student\Model\ResourceModel\Registration as ResourceModel;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Message\ManagerInterface;
use Pearl\Student\Api\DataRepositoryInterface;
use Pearl\Student\Api\Data\DataInterface;

class Studentupdate implements ActionInterface
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var Registration
     */
    private $extensionFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    /**
     * @var Context
     */
    protected $context;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    protected $dataRepository;

    protected $dataInterface;

    /**
     * @param Registration $extensionFactory
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ResourceModel $resourceModel
     * @param ManagerInterface $messageManager
     */
    public function __construct(Registration     $extensionFactory,
                                Context          $context,
                                PageFactory      $resultPageFactory,
                                ResourceModel    $resourceModel,
                                DataRepositoryInterface $dataRepository,
                                DataInterface $dataInterface,
                                ManagerInterface $messageManager)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->extensionFactory = $extensionFactory;
        $this->resourceModel = $resourceModel;
        $this->context = $context;
        $this->dataRepository = $dataRepository;
        $this->messageManager = $messageManager;
        $this->dataInterface = $dataInterface;
    }

    public function execute()
    {
        if ($this->isCorrectData()) {
            return $this->resultPageFactory->create();
        } else {
            $resultRedirect = $this->context->getResultFactory()->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('student/form/studentlist', ['_secure' => true]);
            return $resultRedirect;
        }
    }

    public function isCorrectData()
    {
        if($id = $this->context->getRequest()->getParam('id')){
            $model = $this->dataInterface;
            $this->dataRepository->getById($id);
           if ($model->getId()) {
               return true;
           }
        }
        return true;
    }
}

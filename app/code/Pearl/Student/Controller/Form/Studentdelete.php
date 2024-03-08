<?php

namespace Pearl\Student\Controller\Form;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Pearl\Student\Model\Registration;
use Pearl\Student\Model\ResourceModel\Registration as ResourceModel;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Message\ManagerInterface;
use Pearl\Student\Api\DataRepositoryInterface;
use Pearl\Student\Api\Data\DataInterface;
use Magento\Framework\UrlInterface;

class Studentdelete  implements  ActionInterface
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var Registration
     */
    protected $extensionFactory;
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

    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    protected $dataRepository;

    protected $dataInterface;

    protected $urlInterface;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Registration $extensionFactory
     * @param ResourceModel $resourceModel
     * @param ManagerInterface $messageManager
     * @param ResultFactory $resultFactory
     */
    public function __construct(Context          $context,
                                PageFactory      $resultPageFactory,
                                Registration     $extensionFactory,
                                ResourceModel    $resourceModel,
                                ManagerInterface $messageManager,
                                ResultFactory    $resultFactory,
                                DataRepositoryInterface $dataRepository,
                                DataInterface $dataInterface,
                                UrlInterface $urlInterface
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->extensionFactory = $extensionFactory;
        $this->resourceModel = $resourceModel;
        $this->context = $context;
        $this->messageManager = $messageManager;
        $this->resultFactory = $resultFactory;
        $this->dataRepository = $dataRepository;
        $this->dataInterface = $dataInterface;
        $this->urlInterface = $urlInterface;
    }

    public function execute()
    {
        $url = $this->urlInterface->getUrl('student/', ['_secure' => true]);
        try {
            $data = $this->context->getRequest()->getParams();
//            $id = $data['id'];
            if ($data) {
//             $this->dataRepository->deleteById($id);
                $message = __('You added <a href="'.$url.'">cart</a>');
                $this->messageManager->addSuccess($message);
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t delete record, Please try again."));
        }
        $resultRedirect = $this->context->getResultFactory()->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('student/form/studentlist', ['_secure' => true]);
        return $resultRedirect;
    }
}

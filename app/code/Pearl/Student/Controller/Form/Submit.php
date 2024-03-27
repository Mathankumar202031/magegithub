<?php

namespace Pearl\Student\Controller\Form;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Message\ManagerInterface;
use Pearl\Student\Api\Data\DataInterface;
use Pearl\Student\Api\DataRepositoryInterface;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\UrlInterface;

class Submit implements ActionInterface
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ManagerInterface
     */
    public $messageManager;

    /**
     * @var DataInterface
     */
    protected  $_registration;

    /**
     * @var DataRepositoryInterface
     */
    protected  $_modelregristration;

    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * @var RedirectInterface
     */
    protected $redirect;
    protected $urlInterface;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param DataInterface $registration
     * @param DataRepositoryInterface $model_reg
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        DataInterface $registration,
        DataRepositoryInterface $model_reg,
        ManagerInterface $messageManager,
        ResultFactory $resultFactory,
        RedirectInterface $redirectInterface,
        UrlInterface $urlInterface


    ) {
        $this->context = $context;
        $this->resultPageFactory = $resultPageFactory;
        $this->_registration = $registration;
        $this->_modelregristration = $model_reg;
        $this->messageManager = $messageManager;
        $this->resultFactory = $resultFactory;
        $this->redirect = $redirectInterface;
        $this->urlInterface = $urlInterface;
    }

    public function execute()
    {

        $data = (array) $this->context->getRequest()->getPost();
        print_r($data);
            $area_of_interest = implode(",", $data['area_of_interest']);
            $data['area_of_interest'] = $area_of_interest;
        if ($data) {
           $this->_registration->setData($data);
        }
        try {
            $url = $this->urlInterface->getUrl('student/form/studentlist', ['_secure' => true]);
            $this->_modelregristration->save($this->_registration);
            $this->messageManager->addComplexSuccessMessage('myexample',
                [
                    'pre_link_text'=>'Data Saved Successfully',
                    'url' => $url,
                    'link_text'=>'Student List'
                ]);
        }catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->redirect->getRefererUrl());
        return $resultRedirect;
    }
}










//
//use Magento\Framework\App\ActionInterface;
//use Magento\Framework\View\Result\PageFactory;
//use Magento\Framework\Controller\ResultFactory;
//use Pearl\Student\Model\Registration as ModelRegistration;
//use Pearl\Student\Model\ResourceModel\Registration;
//use Magento\Framework\Message\ManagerInterface;
//use Magento\Framework\App\Action\Context;
//
//class Submit implements ActionInterface
//{
//    /**
//     * @var Context
//     */
//    protected $context;
//
//    /**
//     * @var PageFactory
//     */
//    protected $resultPageFactory;
//
//    /**
//     * @var Registration
//     */
//    protected $_registration;
//
//    /**
//     * @var ModelRegistration
//     */
//    protected $_modelregristration;
//
//    /**
//     * @var ManagerInterface
//     */
//    public $messageManager;
//
//    public function __construct(
//        Context $context,
//        PageFactory $resultPageFactory,
//        Registration $registration,
//        ModelRegistration $model_reg,
//        ManagerInterface $messageManager
//    ) {
//        $this->context = $context;
//        $this->resultPageFactory = $resultPageFactory;
//        $this->_registration = $registration;
//        $this->_modelregristration = $model_reg;
//        $this->messageManager = $messageManager;
//    }
//
//    public function execute()
//    {
//        try {
//            $data = (array) $this->context->getRequest()->getPost();
//            $area_of_interest = implode(",", $data['area_of_interest']);
//            $data['area_of_interest'] = $area_of_interest;
//
//            if ($data) {
//                $model = $this->_modelregristration->setData($data);
//                $this->_registration->save($model);
//            }
//        } catch (\Exception $e) {
//            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
//        }
//
//        $resultRedirect = $this->context->getResultFactory()->create(ResultFactory::TYPE_REDIRECT);
//        $resultRedirect->setPath('student/form/studentlist', ['_secure' => true]);
//        return $resultRedirect;
//    }
//}







//        $data = (array) $this->context->getRequest()->getPost();
//            $area_of_interest = implode(",", $data['area_of_interest']);
//            $data['area_of_interest'] = $area_of_interest;
//        if ($data) {
//           print_r('success');
//           $value = $this->_registration->setData($data);
//        }

//        $data = $this->_modelregristration->getById(4);
//        print_r($data->getData());

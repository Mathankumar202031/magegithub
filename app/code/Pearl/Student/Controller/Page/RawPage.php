<?php
namespace Pearl\Student\Controller\Page;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\ActionInterface;

class RawPage implements ActionInterface
{
    protected $resultFactory;

    protected $context;

    public function __construct(
        Context $context,
        ResultFactory $resultFactory,
    ) {
        $this->resultFactory = $resultFactory;
        $this->context = $context;
    }

    public function execute()
    {
        $data = [
            'message' => 'This is raw JSON data',
            'timestamp' => time()
        ];
        $jsonContent = json_encode($data);

        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setHeader('Content-Type', 'application/json');
        $result->setContents($jsonContent);
        return $result;
    }
}

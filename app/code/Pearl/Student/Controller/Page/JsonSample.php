<?php

namespace Pearl\Student\Controller\Page;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class JsonSample implements HttpGetActionInterface
{
    protected $jsonFactory;

    public function __construct(JsonFactory $jsonFactory)
    {
        $this->jsonFactory = $jsonFactory;

    }

    public function execute()
    {
        $data = [ 'message' => 'hello'];
        $jsonData = $this->jsonFactory->create();
        $jsonData->setData($data);
        $jsonData->setHeader('Content_Type','application/json', true);
        $jsonData->setJsonData('{"name":"black","age":"20" }');
        return $jsonData;
    }
}

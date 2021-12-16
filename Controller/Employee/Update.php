<?php

namespace Codilar\Employee\Controller\Employee;

use Magento\Framework\App\Action\Action;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Framework\App\Action\Context;

class Update extends Action
{
    /**
     * @var ModelFactory
     */
    protected $modelFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    public function __construct(
        Context $context,
        ModelFactory $modelFactory,
        ResourceModel $resourceModel
    )
    {
        parent::__construct($context);
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }
    public function execute()
    { 
        $modelEmployee = $this->modelFactory->create();
        $data = $this->getRequest()->getParams();
        $modelEmployee->load($data['entity_id']);
        $modelEmployee->setFirstname($data['firstname'] ?? null);
        $modelEmployee->setLastname($data['lastname'] ?? null);
        $modelEmployee->setNumber($data['number'] ?? null);
        $modelEmployee->setEmail($data['email'] ?? null);
        $modelEmployee->setAddress($data['address'] ?? null);
        $this->resourceModel->save($modelEmployee);
        $this->messageManager->addSuccessMessage(__('Employee %1 updated successfully',$modelEmployee->getFirstname()));
        return $this->resultRedirectFactory->create()->setPath('employee/employee/view');
       
    }
} 
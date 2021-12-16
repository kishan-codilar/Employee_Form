<?php

namespace Codilar\Employee\Controller\Employee;

use Magento\Framework\App\Action\Action;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Framework\App\Action\Context;

class Add extends Action
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
        $emptyEmployee = $this->modelFactory->create();
        $data = $this->getRequest()->getParams();
        $emptyEmployee->setFirstname($data['firstname'] ?? null);
        $emptyEmployee->setLastname($data['lastname'] ?? null);
        $emptyEmployee->setNumber($data['number'] ?? null);
        $emptyEmployee->setEmail($data['email'] ?? null);
        $emptyEmployee->setAddress($data['address'] ?? null);
        $this->resourceModel->save($emptyEmployee);
        $this->messageManager->addSuccessMessage(__('Employee %1 saved successfully', $emptyEmployee->getFirstname()));
        return $this->resultRedirectFactory->create()->setPath('employee/employee/view');
    }
}

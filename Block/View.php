<?php

namespace Codilar\Employee\Block;

use Magento\Framework\View\Element\Template;
use Codilar\Employee\Model\Employee;
use Codilar\Employee\Model\ResourceModel\Employee\CollectionFactory;

class View extends Template
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return Brand[]
     */
    public function getAllEmployee()
    {
        $collection = $this->collectionFactory->create();
        // $collection->addFieldToFilter('is_active', ['eq' => 1]);
        return $collection->getItems();
    }
    public function getIndexUrl()
    {
        return $this->getUrl('employee/employee/index');
    }

    public function getAddUrl()
    {
        return $this->getUrl('employee/employee/add');
    }
    public function getDeleteUrl()
    {
        return $this->getUrl('employee/employee/Delete');
    }
    public function getEditUrl()
    {
        return $this->getUrl('employee/employee/Edit');
    }
    public function getUpdateUrl()
    {
        return $this->getUrl('employee/employee/Update');
    }
    public function getUpdate()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $collection = $this->collectionFactory->create();
        return $collection->getItemById($id);
        // return $this->getUrl('employee/employee/Update');
    }
    public function getEmployeeDetail()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $collection = $this->collectionFactory->create();
        return $collection->getItemById($id);
    }
    public function getDetailUrl()
    {
        return $this->getUrl('employee/employee/Detail');
    }
}

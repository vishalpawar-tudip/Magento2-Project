<?php

/**
* Ecommerce Resource Collection
*/
namespace Magento\Contact\Model\ResourceModel\Contact;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
/**
* Resource initialization
*
* @return void
*/
protected function _construct(){
$this->_init(‘Magento\Contact\Model\Contact’, ‘Magento\Contact\Model\ResourceModel\Contact’);
}
}
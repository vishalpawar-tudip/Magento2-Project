<?php
namespace Magento\Contact\Model\ResourceModel;

/**
* Ecommerce Resource Model
*/
class Contact extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
/**
* Initialize resource model
*
* @return void
*/
protected function _construct(){
$this->_init(‘Magento_Contact’, ‘id’);
}
}
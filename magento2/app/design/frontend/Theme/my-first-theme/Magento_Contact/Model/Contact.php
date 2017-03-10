<?php
namespace Magento\Contact\Model;

/**
* Ecommerce Model
*
* @method \Jute\Ecommerce\Model\Resource\Page _getResource()
* @method \Jute\Ecommerce\Model\Resource\Page getResource()
*/
class Contact extends \Magento\Framework\Model\AbstractModel{
/**
* Initialize resource model
*
* @return void
*/
protected function _construct(){
$this->_init(‘Magento\Contact\Model\ResourceModel\Contact’);
}

}
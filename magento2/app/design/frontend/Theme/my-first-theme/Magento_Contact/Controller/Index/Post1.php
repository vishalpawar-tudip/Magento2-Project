<?php
/**
*
* Copyright © 2016 Magento. All rights reserved.
*/
namespace Magento\Contact\Controller\Index;

class Post1 extends \Magento\Framework\App\Action\Action{
/**
* Post user question
*
* @return void
* @throws \Exception
*/
public function execute(){
$post = $this->getRequest()->getPostValue();

if (!$post) {
$this->_redirect(‘'*/*/'’);
return;
}

try {
$postObject = new \Magento\Framework\DataObject();
$postObject->setData($post);

$error = false;

if (!\Zend_Validate::is(trim($post[‘name’]), ‘NotEmpty’)) {
$error = true;
}

if (!\Zend_Validate::is(trim($post[’email’]), ‘EmailAddress’)) {
$error = true;
}
if (\Zend_Validate::is(trim($post[‘hideit’]), ‘NotEmpty’)) {
$error = true;
}
if ($error) {
throw new \Exception();
}

/*$storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
$transport = $this->_transportBuilder
->setTemplateIdentifier($this->scopeConfig->getValue(self::XML_PATH_EMAIL_TEMPLATE, $storeScope))
->setTemplateOptions(
[
‘area’ => \Magento\Backend\App\Area\FrontNameResolver::AREA_CODE,
‘store’ => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
]
)
->setTemplateVars([‘data’ => $postObject])
->setFrom($this->scopeConfig->getValue(self::XML_PATH_EMAIL_SENDER, $storeScope))
->addTo($this->scopeConfig->getValue(self::XML_PATH_EMAIL_RECIPIENT, $storeScope))
->setReplyTo($post[’email’])
->getTransport();

$transport->sendMessage();*/
$cname = $post[‘name’];
$cemail = $post[’email’];
$cmobile = $post[‘mobile’];
$model = $this->_objectManager->create(‘Magento\Contact\Model\Contact’);
$model->setCustomerName($cname);
$model->setEmail($cemail);
$model->setMobileNumber($cmobile);
$model->save();

$this->messageManager->addSuccess(
__(‘Thanks for contacting us with your comments and questions.’)
);
$this->_redirect(‘contact/index’);
return;
} catch (\Exception $e) {
$this->messageManager->addError(
__(‘We can\’t process your request right now. Sorry, that\’s all we know.’)
);
$this->_redirect(‘contact/index’);
return;
}
}
}
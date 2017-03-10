<?php
namespace Mirasvit\Blog\Block;
class Display extends \Magento\Framework\View\Element\Template
{

	//var ImageUrl="Mirasvit\Blog\view\frontend\web\Images\slider_services.png";
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function sayHello()
	{
	//	header('Content-Type: image/jpeg');
      //  readfile('Mirasvit/Blog/view/frontend/web/Images/slider_services.png');

		return __('');
		//return __(readfile('Mirasvit\Blog\view\frontend\web\Images\slider_services.png'));

	}
}
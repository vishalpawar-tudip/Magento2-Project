<?php

namespace Mirasvit\Blog\Controller;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Mirasvit\Blog\Model\CategoryFactory;
use Magento\Framework\Registry;

abstract class Category extends Action
{
    /**
     * @var CategoryFactory
     */
    protected $categoryFactory;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @param CategoryFactory $authorFactory
     * @param Registry        $registry
     * @param Context         $context
     */
    public function __construct(
        CategoryFactory $authorFactory,
        Registry $registry,
        Context $context
    ) {
        $this->categoryFactory = $authorFactory;
        $this->registry = $registry;
        $this->context = $context;
        $this->resultFactory = $context->getResultFactory();

        parent::__construct($context);
    }

    /**
     * @return \Mirasvit\Blog\Model\Category
     */
    protected function initCategory()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $post = $this->categoryFactory->create()->load($id);
            if ($post->getId() > 0) {
                $this->registry->register('current_blog_category', $post);

                return $post;
            }
        }
    }
}

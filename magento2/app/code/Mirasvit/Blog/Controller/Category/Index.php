<?php

namespace Mirasvit\Blog\Controller\Category;

use Magento\Framework\Controller\ResultFactory;
use Mirasvit\Blog\Controller\Category;

class Index extends Category
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        return $resultPage;
    }
}

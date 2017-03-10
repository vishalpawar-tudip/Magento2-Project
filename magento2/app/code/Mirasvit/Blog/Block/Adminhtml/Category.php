<?php

namespace Mirasvit\Blog\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Category extends Container
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_category';
        $this->_blockGroup = 'Mirasvit_Blog';

        parent::_construct();
    }
}

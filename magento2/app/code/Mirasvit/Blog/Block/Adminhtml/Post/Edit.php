<?php

namespace Mirasvit\Blog\Block\Adminhtml\Post;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        parent::_construct();

        $this->_objectId = 'entity_id';
        $this->_controller = 'adminhtml_post';
        $this->_blockGroup = 'Mirasvit_Blog';

        $this->buttonList->remove('save');

        $this->getToolbar()->addChild(
            'save-split-button',
            'Magento\Backend\Block\Widget\Button\SplitButton',
            [
                'id'           => 'save-split-button',
                'label'        => __('Save'),
                'class_name'   => 'Magento\Backend\Block\Widget\Button\SplitButton',
                'button_class' => 'widget-button-update',
                'options'      => [
                    [
                        'id'             => 'save-button',
                        'label'          => __('Save'),
                        'default'        => true,
                        'data_attribute' => [
                            'mage-init' => [
                                'button' => [
                                    'event'  => 'saveAndContinueEdit',
                                    'target' => '#edit_form'
                                ]
                            ]
                        ]
                    ],
                    [
                        'id'             => 'save-continue-button',
                        'label'          => __('Save & Close'),
                        'data_attribute' => [
                            'mage-init' => [
                                'button' => [
                                    'event'  => 'save',
                                    'target' => '#edit_form'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}

<?php

namespace Mirasvit\Blog\Block\Adminhtml\Category\Edit\Tab;

use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;
use Magento\Backend\Block\Widget\Form;
use Magento\Backend\Block\Widget\Context;
use Mirasvit\Blog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;

class General extends Form
{
    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var CategoryCollectionFactory
     */
    protected $categoryCollectionFactory;

    /**
     * @param CategoryCollectionFactory $postCollectionFactory
     * @param FormFactory               $formFactory
     * @param Registry                  $registry
     * @param Context                   $context
     * @param array                     $data
     */
    public function __construct(
        CategoryCollectionFactory $postCollectionFactory,
        FormFactory $formFactory,
        Registry $registry,
        Context $context,
        array $data = []
    ) {
        $this->categoryCollectionFactory = $postCollectionFactory;
        $this->formFactory = $formFactory;
        $this->registry = $registry;

        parent::__construct($context, $data);
    }

    /**
     * @return $this
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $form = $this->formFactory->create();
        $this->setForm($form);

        /** @var \Mirasvit\Blog\Model\Category $category */
        $category = $this->registry->registry('current_model');

        $fieldset = $form->addFieldset('edit_fieldset', [
            'legend' => __('General Information')
        ]);

        if ($category->getId()) {
            $fieldset->addField('entity_id', 'hidden', [
                'name'  => 'entity_id',
                'value' => $category->getId(),
            ]);
        }

        $fieldset->addField('name', 'text', [
            'label'    => __('Title'),
            'name'     => 'name',
            'value'    => $category->getName(),
            'required' => true,
        ]);

        if ($category->getId() != 1) {
            $categories = $this->categoryCollectionFactory->create()
                ->addAttributeToSelect('name')
                ->toOptionArray();

            $fieldset->addField('parent_id', 'radios', [
                'label'    => __('Parent Category'),
                'name'     => 'parent_id',
                'value'    => $category->getParentId() ? $category->getParentId() : 1,
                'values'   => $categories,
                'required' => true,
            ]);
        }

        $fieldset->addField('status', 'select', [
            'label'  => __('Status'),
            'name'   => 'status',
            'value'  => $category->getStatus(),
            'values' => ['0' => __('Disabled'), '1' => __('Enabled')]
        ]);

        return parent::_prepareForm();
    }
}

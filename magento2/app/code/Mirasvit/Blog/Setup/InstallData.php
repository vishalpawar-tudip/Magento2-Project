<?php

namespace Mirasvit\Blog\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Mirasvit\Blog\Setup\InstallData\PostSetupFactory;
use Mirasvit\Blog\Setup\InstallData\CategorySetupFactory;
use Magento\Eav\Model\Config;

class InstallData implements InstallDataInterface
{
    protected $postSetupFactory;

    protected $categorySetupFactory;

    protected $eavConfig;

    /**
     * @param PostSetupFactory     $postSetupFactory
     * @param CategorySetupFactory $categorySetupFactory
     * @param Config               $eavConfig
     */
    public function __construct(
        PostSetupFactory $postSetupFactory,
        CategorySetupFactory $categorySetupFactory,
        Config $eavConfig
    ) {
        $this->postSetupFactory = $postSetupFactory;
        $this->categorySetupFactory = $categorySetupFactory;
        $this->eavConfig = $eavConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $postSetup = $this->postSetupFactory->create(['setup' => $setup]);
        $postSetup->installEntities();

        $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
        $categorySetup->installEntities();

        $setup->endSetup();

        $this->eavConfig->clear();

        $category = $categorySetup->getCategoryFactory()->create();
        $category
            ->setName(__('Blog'))
            ->setParentId(null)
            ->setPath('1')
            ->setLevel(0)
            ->setPosition(0)
            ->setStatus(1)
            ->save();
    }
}
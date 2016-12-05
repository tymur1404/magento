<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:03
 */
class Ainstainer_Blog_Block_Adminhtml_Post_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('post_request');
        $this->setTitle(Mage::helper('blog')->__('Request info'));
    }

    /**
     * Load Wysiwyg on demand and Prepare layout
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('post_request');
        $form = new Varien_Data_Form(
            ['id' => 'edit_form', 'action' => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('post_id')]), 'method' => 'post']
        );

        $form->setHtmlIdPrefix('block_');

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => Mage::helper('blog')->__('General Information'),
            'class' => 'fieldset-wide'
        ]);

        if ($model->getBlockId()) {
            $fieldset->addField('post_id', 'hidden', [
                'name' => 'post_id',
            ]);
        }

        $fieldset->addField('title', 'text', [
            'name'     => 'title',
            'label'    => Mage::helper('blog')->__('Title'),
            'title'    => Mage::helper('blog')->__('Title'),
            'required' => true,
        ]);

        $fieldset->addField('url', 'text', [
            'name'     => 'url',
            'label'    => Mage::helper('blog')->__('Url'),
            'title'    => Mage::helper('blog')->__('Url'),
            'required' => true,
        ]);

        $fieldset->addField('short_descr', 'text', [
            'name'     => 'short_descr',
            'label'    => Mage::helper('blog')->__('Short_descr'),
            'title'    => Mage::helper('blog')->__('Short_descr'),
            'required' => true,
        ]);

        $fieldset->addField('content', 'editor', [
            'name'     => 'content',
            'label'    => Mage::helper('blog')->__('Content'),
            'title'    => Mage::helper('blog')->__('Content'),
            'style'    => 'height:36em',
            'required' => true,
            'config'   => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
        ]);

        $fieldset->addField('published', 'checkbox', [
            'name'     => 'published',
            'label'    => Mage::helper('blog')->__('Published'),
            'title'    => Mage::helper('blog')->__('Published'),
            'checked' => ($model->getApproved() == 1) ? 'true' : '',
            'onclick' => 'this.value = this.checked ? 1 : 0;'
        ]);

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
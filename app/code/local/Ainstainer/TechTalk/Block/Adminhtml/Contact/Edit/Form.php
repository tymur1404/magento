<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:03
 */
class Ainstainer_TechTalk_Block_Adminhtml_Contact_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('contact_request');
        $this->setTitle(Mage::helper('techtalk')->__('Request info'));
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
        $model = Mage::registry('contact_request');

        $form = new Varien_Data_Form(
            ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']
        );

        $form->setHtmlIdPrefix('block_');

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => Mage::helper('techtalk')->__('General Information'),
            'class' => 'fieldset-wide'
        ]);

        if ($model->getBlockId()) {
            $fieldset->addField('request_id', 'hidden', [
                'name' => 'request_id',
            ]);
        }

        $fieldset->addField('name', 'text', [
            'name'     => 'name',
            'label'    => Mage::helper('techtalk')->__('Contact Name'),
            'title'    => Mage::helper('techtalk')->__('Contact Name'),
            'required' => true,
        ]);

        $fieldset->addField('comment', 'editor', [
            'name'     => 'comment',
            'label'    => Mage::helper('techtalk')->__('Comment'),
            'title'    => Mage::helper('techtalk')->__('Comment'),
            'style'    => 'height:36em',
            'required' => true,
            'config'   => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
        ]);

        $fieldset->addField('approved', 'checkbox', [
            'name'     => 'approved',
            'label'    => Mage::helper('techtalk')->__('Approved'),
            'title'    => Mage::helper('techtalk')->__('Approved'),
            'checked' => ($model->getApproved() == 1) ? 'true' : '',
            'onclick' => 'this.value = this.checked ? 1 : 0;'
        ]);

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
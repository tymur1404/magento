<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:03
 */
class Ainstainer_Slider_Block_Adminhtml_Slide_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('slide');
        $this->setTitle(Mage::helper('slider')->__('Slide info'));
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
        $model = Mage::registry('slide');
        $form = new Varien_Data_Form(
            ['id' => 'edit_form', 'action' => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('slide_id')]), 'method' => 'post', 'enctype' => 'multipart/form-data']
        );

        $form->setHtmlIdPrefix('block_');

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => Mage::helper('slider')->__('General Information'),
            'class' => 'fieldset-wide'
        ]);

        if ($model->getBlockId()) {
            $fieldset->addField('slide_id', 'hidden', [
                'name' => 'slide_id',
            ]);
        }

        $fieldset->addField('title', 'text', [
            'name'     => 'title',
            'label'    => Mage::helper('slider')->__('Title'),
            'title'    => Mage::helper('slider')->__('Title'),
            'required' => true,
        ]);

        $fieldset->addField('visible', 'checkbox', [
            'name'     => 'visible',
            'label'    => Mage::helper('slider')->__('Visible'),
            'title'    => Mage::helper('slider')->__('Visible'),
            'checked' => ($model->getVisible() == 1) ? 'true' : '',
            'onclick' => 'this.value = this.checked ? 1 : 0;'
        ]);
        
        $fieldset->addField('descr', 'text', [
            'name'     => 'descr',
            'label'    => Mage::helper('slider')->__('Description'),
            'title'    => Mage::helper('slider')->__('Description'),
            'required' => true
        ]);

        $fieldset->addField('image', 'file', array(
            'label'     => 'Image',
            'required'  => false,
            'name'      => 'image',
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
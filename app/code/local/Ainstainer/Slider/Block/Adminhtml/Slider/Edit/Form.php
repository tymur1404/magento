<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:03
 */
class Ainstainer_Slider_Block_Adminhtml_Slider_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('slider');
        $this->setTitle(Mage::helper('slider')->__('Slider info'));
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
        $model = Mage::registry('slider');
        $form = new Varien_Data_Form(
            ['id' => 'edit_form', 'action' => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('slider_id')]), 'method' => 'post']
        );

        $form->setHtmlIdPrefix('block_');

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => Mage::helper('slider')->__('General Information'),
            'class' => 'fieldset-wide'
        ]);

        if ($model->getBlockId()) {
            $fieldset->addField('slider_id', 'hidden', [
                'name' => 'slider_id',
            ]);
        }
        $fieldset->addField('slide_ids[]', 'multiselect', array(
            'label' => Mage::helper('blog')->__('Name of slides'),
            'name' => 'slide_ids[]',
            'values' => Mage::getResourceModel('slider/slide')->getMultiselectSlide(),
            'required' => true
        ));
        $fieldset->addField('visible', 'checkbox', [
            'name'     => 'visible',
            'label'    => Mage::helper('slider')->__('Visible'),
            'title'    => Mage::helper('slider')->__('Visible'),
            'checked' => ($model->getVisible() == 1) ? 'true' : '',
            'onclick' => 'this.value = this.checked ? 1 : 0;'
        ]);

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:03
 */
class Ainstainer_Blog_Block_Adminhtml_Category_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('category_request');
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
        $model = Mage::registry('category_request');
        $form = new Varien_Data_Form(
            ['id' => 'edit_form', 'action' => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('category_id')]), 'method' => 'post', 'enctype' => 'multipart/form-data']
        );

        $form->setHtmlIdPrefix('block_');

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => Mage::helper('blog')->__('General Information'),
            'class' => 'fieldset-wide'
        ]);

        if ($model->getBlockId()) {
            $fieldset->addField('category_id', 'hidden', [
                'name' => 'category_id',
            ]);
        }

        $fieldset->addField('name', 'text', [
            'name'     => 'name',
            'label'    => Mage::helper('blog')->__('Name'),
            'title'    => Mage::helper('blog')->__('Name'),
            'required' => true
        ]);


        $fieldset->addField('post_ids[]', 'checkboxes', array(
            'label' => Mage::helper('blog')->__('Post IDs'),
            'name' => 'post_ids[]',
            'values' => array(
                array('value'=>'1', 'label'=>'first'),
                array('value'=>'2', 'label'=>'second'),
                array('value'=>'3', 'label'=>'third'),
            ),
            'required' => true
        ));
//        $fieldset->addField('post_ids', 'multiselect', array(
//            'name' => 'post_ids[]',
//            'label' =>  Mage::helper('blog')->__('Field Labels'),
//            'title' =>  Mage::helper('blog')->__('Field Labels'),
//            'class' => 'required-entry',
//            'required' => true,
//            'index' => 'fieldIds',
//            'values' => Mage::getModel('blog/post')->getPosts(),
//        ));


        $fieldset->addField('descr', 'text', [
            'name'     => 'descr',
            'label'    => Mage::helper('blog')->__('Short_descr'),
            'title'    => Mage::helper('blog')->__('Short_descr'),
            'required' => true
        ]);



        $fieldset->addField('image', 'file', array(
            'label'     => 'Small Logo',
            'required'  => false,
            'name'      => 'image',
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:02
 */

class Ainstainer_Blog_Block_Adminhtml_Category_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'category_id';
        $this->_blockGroup = 'blog';
        $this->_controller = 'adminhtml_category';
        $this->_mode = 'edit';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('blog')->__('Save Request'));
        $this->_updateButton('delete', 'label', Mage::helper('blog')->__('Delete Request'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('block_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'block_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'block_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('category_request')->getId()) {
            return Mage::helper('blog')->__("Edit Category # %s", $this->escapeHtml(Mage::registry('category_request')->getId()));
        }
        else {
            return Mage::helper('blog')->__('New Category');
        }
    }

}
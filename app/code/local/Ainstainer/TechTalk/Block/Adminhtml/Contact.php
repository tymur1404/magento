<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:01
 */

class Ainstainer_TechTalk_Block_Adminhtml_Contact extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'techtalk';
        $this->_controller = 'adminhtml_contact';
        $this->_headerText = Mage::helper('techtalk')->__('Contacts requests');

        parent::__construct();
        $this->_removeButton('add');

    }
}
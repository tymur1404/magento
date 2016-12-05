<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:01
 */

class Ainstainer_Slider_Block_Adminhtml_Slide extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'slider';
        $this->_controller = 'adminhtml_slide';
        $this->_headerText = Mage::helper('slider')->__('Slide');

        parent::__construct();
//        $this->_removeButton('add');

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:01
 */

class Ainstainer_Slider_Block_Adminhtml_Slider extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'slider';
        $this->_controller = 'adminhtml_slider';
        $this->_headerText = Mage::helper('slider')->__('Slider');

        parent::__construct();
//        $this->_removeButton('add');

    }
}
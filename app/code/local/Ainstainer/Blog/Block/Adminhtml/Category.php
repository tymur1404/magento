<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 30.11.16
 * Time: 11:13
 */
class Ainstainer_Blog_Block_Adminhtml_Category extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'blog';
        $this->_controller = 'adminhtml_category';
        $this->_headerText = Mage::helper('blog')->__('Category');

        parent::__construct();
        $this->_removeButton('add');

    }
}

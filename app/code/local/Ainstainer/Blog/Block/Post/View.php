<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:35
 */

class Ainstainer_Blog_Block_Post_View extends Mage_Core_Block_Template
{
    public function viewPost()
    {
        $id = $this->getRequest()->getParam('id');
        return Mage::getModel('blog/post')->load($id);
    }
}
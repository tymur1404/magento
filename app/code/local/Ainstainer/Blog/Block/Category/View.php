<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:35
 */

class Ainstainer_Blog_Block_Category_View extends Mage_Core_Block_Template
{

    public function getAllPosts()
    {
        return Mage::getResourceModel('blog/post')->getCategoryPosts();
    }

    public function getAllCategories()
    {
        return Mage::getModel('blog/category')->getCollection();
    }

    public function viewCategory()
    {
        $id = $this->getRequest()->getParam('id');
        return Mage::getModel('blog/category')->load($id);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:35
 */

class Ainstainer_Blog_Block_View extends Mage_Core_Block_Template
{
    public function getRequestRecord()
    {
        return Mage::getModel('blog/post')->load(1);
    }

    public function getAllPosts()
    {
        return Mage::getModel('blog/post')->getCollection();
    }

    public function getAllCategory()
    {
        return Mage::getModel('blog/category')->getCollection();
    }
}
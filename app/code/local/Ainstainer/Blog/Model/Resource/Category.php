<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 30.11.16
 * Time: 11:15
 */

class Ainstainer_Blog_Model_Resource_Category extends  Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/category', 'category_id');
    }


}
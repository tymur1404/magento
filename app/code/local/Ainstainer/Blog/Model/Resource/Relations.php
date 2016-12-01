<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 01.12.16
 * Time: 17:04
 */

class Ainstainer_Blog_Model_Resource_Relations extends  Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/relations', 'category_id');
    }


}
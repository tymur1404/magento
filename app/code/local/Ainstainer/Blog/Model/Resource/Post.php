<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:57
 */

class Ainstainer_Blog_Model_Resource_Post extends  Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/post', 'post_id');
    }

}
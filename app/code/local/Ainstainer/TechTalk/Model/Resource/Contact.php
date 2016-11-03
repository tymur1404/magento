<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 11:29
 */

class Ainstainer_TechTalk_Model_Resource_Contact extends  Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('techtalk/contact', 'request_id');
    }
}
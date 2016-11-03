<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 11:32
 */

class Ainstainer_TechTalk_Model_Resource_Contact_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
//        parent::_construct();
        $this->_init('techtalk/contact');
    }
}
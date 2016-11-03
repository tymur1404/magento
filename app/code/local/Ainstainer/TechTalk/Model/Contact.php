<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 11:22
 */

class Ainstainer_TechTalk_Model_Contact extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
//        parent::_construct();
        $this->_init('techtalk/contact');
    }
}
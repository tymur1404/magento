<?php
/** 
 * Created by PhpStorm.
 * User: timur
 * Date: 28.10.16
 * Time: 12:11
 */
class Ainstainer_TechTalk_Block_View extends Mage_Core_Block_Template
{
    public function getRequestRecord()
    {
        return Mage::getModel('techtalk/contact')->load(1); 
    }

    public function getOtherComments($id)// get all approved comments except one
    {
        return Mage::getModel('techtalk/contact')->getCollection()
                    ->addFieldToFilter('request_id',array("neq" => $id))
                    ->addFieldToFilter('approved',array("eq" => 1));// 1 - TRUE, 0 - FALSE
    }

}
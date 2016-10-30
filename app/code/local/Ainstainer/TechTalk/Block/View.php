<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 28.10.16
 * Time: 12:11
 */
class Ainstainer_TechTalk_Block_View extends Mage_Core_Block_Template
{
    protected function _toHtml()
    {
//        echo "Ainstainer_TechTalk_Block_View_toHtml";
        echo Mage::getModel('techtalk/techLogic')->sayHello();
    }
//    public function myfunction()
//    {
//        return "Hello tuts+ world";
//    }
}
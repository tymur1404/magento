<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 21.11.16
 * Time: 12:49
 */

require_once(Mage::getModuleDir('controllers', 'Mage_Customer')).DS.'AccountController.php';

class Ainstainer_TechTalk_AccountController extends Mage_Customer_AccountController
{
    public function createAction()
    {
        return $this->_redirect('noroute');
    }
    
}
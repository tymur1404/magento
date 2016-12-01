<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:36
 */
class Ainstainer_Blog_IndexController  extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }


}
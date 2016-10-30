<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 28.10.16
 * Time: 12:04
 */
class Ainstainer_TechTalk_IndexController  extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();

        //var_dump($this->getLayout()->getUpdate()->getHandles());
        //die();
//        header('Content-Type: text-xml');
//        die($this->getLayout()->getNode()->asXml());
    }

    public function sayHelloAction()
    {
        echo "sayHelloaction";
    }
}
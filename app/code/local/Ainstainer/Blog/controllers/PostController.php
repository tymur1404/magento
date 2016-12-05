<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 01.12.16
 * Time: 15:23
 */

class Ainstainer_Blog_PostController  extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
//        $pageId = $this->getRequest()
//            ->getParam('post_id', $this->getRequest()->getParam('id', false));
//        if (!Mage::helper('blog/post')->renderPage($this, $pageId)) {
//            $this->_forward('noRoute');
//        }

        $this->loadLayout();
        $this->renderLayout();

    }

}
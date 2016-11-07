<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 06.11.16
 * Time: 19:50
 */

class Ainstainer_TechTalk_ContactController extends  Mage_Adminhtml_Controller_Action
{
    
    
    public function indexAction()
    {
        $this->loadLayout();

        $block = $this->getLayout()
            ->createBlock('core/text', 'example-block')
            ->setText('<h1>This is a text block</h1>');

        $this->_addContent($block);

        $this->renderLayout();
    }

    protected function _addContent(Mage_Core_Block_Abstract $block)
    {
        $this->getLayout()->getBlock('content')->append($block);
        return $this;
    }
}
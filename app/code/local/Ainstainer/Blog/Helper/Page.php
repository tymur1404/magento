<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 29.11.16
 * Time: 8:29
 */
class Ainstainer_Blog_Helper_Page extends Mage_Core_Helper_Abstract
{
    public function renderPage(Mage_Core_Controller_Front_Action $action, $pageId = null)
    {
        return $this->_renderPage($action, $pageId);
    }
}
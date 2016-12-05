<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 11:22
 */

class Ainstainer_Slider_Model_Slide extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('slider/slide');
    }

    public function saveImage()
    {
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            try {
                $uploader = new Varien_File_Uploader('image');
                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
                $uploader->setAllowRenameFiles(false);
                $uploader->setFilesDispersion(false);
                $path = Mage::getBaseDir('media') . DS . 'images' . DS. "slides" . DS;
                $imageName = $_FILES['image']['name'];
                $uploader->save($path, $imageName);

            } catch (Exception $e) {

            }
        }
    }
}
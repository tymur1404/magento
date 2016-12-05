<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 30.11.16
 * Time: 11:14
 */

class Ainstainer_Blog_Model_Category extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/category');
    }
    
    public function saveImage(){
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            try {
                $uploader = new Varien_File_Uploader('image');
                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
                $uploader->setAllowRenameFiles(false);
                $uploader->setFilesDispersion(false);
                $path = Mage::getBaseDir('media') . DS . 'images' . DS;
                $imageName = $_FILES['image']['name'];
                $uploader->save($path, $imageName);

            } catch (Exception $e) {

            }
        }
    }

}
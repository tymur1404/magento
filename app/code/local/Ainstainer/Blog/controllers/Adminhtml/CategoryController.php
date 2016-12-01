<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 30.11.16
 * Time: 11:13
 */


class Ainstainer_Blog_Adminhtml_CategoryController extends  Mage_Adminhtml_Controller_Action
{


    public function indexAction()
    {
        $this->_title($this->__('Category requests'))->_title($this->__('Ain Blog'));
        $this->loadLayout();
        $this->_setActiveMenu('ain_blog');
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_category'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('blog/adminhtml_category_grid')->toHtml()
        );
    }

    public function exportCsvAction()
    {
        $fileName = 'category.csv';
        $grid = $this->getLayout()->createBlock('blog/adminhtml_category_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportExcelAction()
    {
        $fileName = 'category.xml';
        $grid = $this->getLayout()->createBlock('blog/adminhtml_category_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }

    // edit section

    public function newAction()
    {
        // the same form is used to create and edit
        $this->_forward('edit');
    }

    public function editAction()
    {
        //$this->_setActiveMenu('ain_blog');
        $this->_title($this->__('Category'));

        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('category_id');
        $model = Mage::getModel('blog/category');

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (! $model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('blog')->__('This block no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->_title($model->getId() ? $model->getTitle() : $this->__('New Request'));

        // 3. Set entered data if was error when we do save
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (! empty($data)) {
            $model->setData($data);
        }

        // 4. Register model to use later in blocks
        Mage::register('category_request', $model);

        // 5. Build edit form
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_category_edit'));
        $this->_setActiveMenu('ain_blog')
            ->_addBreadcrumb($id ? Mage::helper('blog')->__('Edit Request') : Mage::helper('blog')->__('New Request'), $id ? Mage::helper('blog')->__('Edit Request') : Mage::helper('blog')->__('New Request'))
            ->renderLayout();
    }

    public function saveAction()
    {
        $category = $this->getRequest()->getPost();
        $category_id = Mage::app()->getRequest()->getParam('id');

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

//        Mage::getModel('blog/relations')
//            ->setData(array('category_id' => $category_id,
//                'post_id' => $category['post_id'],
//                'position' => $category['position']))->save();

        Mage::getModel('blog/category')
            ->setData(array('category_id' => $category_id,
                'name' => $category['name'],
                'descr' => $category['descr'],
                'post_ids' => implode(',',$category['post_ids']),
                'image' => $_FILES['image']['name']))->save();
        $storeId    = (int)$this->getRequest()->getParam('store', 0);
        $this->_redirect('*/*/', array('store'=> $storeId));
    }


}
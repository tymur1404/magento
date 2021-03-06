<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 06.11.16
 * Time: 19:50
 */

class Ainstainer_Slider_Adminhtml_SliderController extends  Mage_Adminhtml_Controller_Action
{


    public function indexAction()
    {
        $this->_title($this->__('Slider'))->_title($this->__('Ain Slider'));
        $this->loadLayout();
        $this->_setActiveMenu('ain_slider');
        $this->_addContent($this->getLayout()->createBlock('slider/adminhtml_slider'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('slider/adminhtml_slider_grid')->toHtml()
        );
    }

    public function exportCsvAction()
    {
        $fileName = 'slider.csv';
        $grid = $this->getLayout()->createBlock('slider/adminhtml_slider_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportExcelAction()
    {
        $fileName = 'slider.xml';
        $grid = $this->getLayout()->createBlock('slider/adminhtml_slider_grid');
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
        $this->_title($this->__('Slidert'));

        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('slider_id');
        $model = Mage::getModel('slider/slider');

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (! $model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('slider')->__('This block no longer exists.'));
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
        Mage::register('slider', $model);

        // 5. Build edit form
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('slider/adminhtml_slider_edit'));
        $this->_setActiveMenu('ain_slider')
            ->_addBreadcrumb($id ? Mage::helper('slider')->__('Edit Request') : Mage::helper('slider')->__('New Request'), $id ? Mage::helper('slider')->__('Edit Request') : Mage::helper('slider')->__('New Request'))
            ->renderLayout();
    }

    public function saveAction()
    {
        $post = $this->getRequest()->getPost();
        $slider_id = Mage::app()->getRequest()->getParam('id');
        
        $slider = Mage::getModel('slider/slider')
            ->setData(array('slider_id' => $slider_id,
                            'visible' => isset($post['visible'])  ? $post['visible'] : 0))->save();

        Mage::getResourceModel('slider/slider')
            ->createNewRelations($slider->getId(), $post['slide_ids']);

        $storeId    = (int)$this->getRequest()->getParam('store', 0);
        $this->_redirect('*/*/', array('store'=> $storeId));
    }

    public function massStatusAction(){
        $Ids = $this->getRequest()->getParam('visible');
        $status     = (int)$this->getRequest()->getParam('status');
        $storeId    = (int)$this->getRequest()->getParam('store', 0);
        foreach ($Ids as $id) {
            $model = Mage::getModel('slider/slider')->load($id);
            $model->setVisible($status)
                ->save();
        }

        $this->_redirect('*/*/', array('store'=> $storeId));
    }
}
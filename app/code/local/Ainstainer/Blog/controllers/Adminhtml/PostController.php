<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 06.11.16
 * Time: 19:50
 */

class Ainstainer_Blog_Adminhtml_PostController extends  Mage_Adminhtml_Controller_Action
{


    public function indexAction()
    {
        $this->_title($this->__('Post requests'))->_title($this->__('Ain Blog'));
        $this->loadLayout();
        $this->_setActiveMenu('ain_blog');
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_post'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('blog/adminhtml_post_grid')->toHtml()
        );
    }

    public function exportCsvAction()
    {
        $fileName = 'post.csv';
        $grid = $this->getLayout()->createBlock('blog/adminhtml_post_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportExcelAction()
    {
        $fileName = 'post.xml';
        $grid = $this->getLayout()->createBlock('blog/adminhtml_post_grid');
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
        $this->_title($this->__('Post'));

        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('post_id');
        $model = Mage::getModel('blog/post');

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
        Mage::register('post_request', $model);

        // 5. Build edit form
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_post_edit'));
        $this->_setActiveMenu('ain_blog')
            ->_addBreadcrumb($id ? Mage::helper('blog')->__('Edit Request') : Mage::helper('blog')->__('New Request'), $id ? Mage::helper('blog')->__('Edit Request') : Mage::helper('blog')->__('New Request'))
            ->renderLayout();
    }

    public function saveAction()
    {
        $post = $this->getRequest()->getPost();
        $post_id = Mage::app()->getRequest()->getParam('id');
        $today = Mage::getModel('core/date')->date('Y-m-d H:i:s');
        Mage::getModel('blog/post')
            ->setData(array('post_id' => $post_id,
                            'title' => $post['title'],
                            'url' => $post['url'],
                            'short_descr' => $post['short_descr'],
                            'content' => $post['content'],
                            'create_at' => Mage::getModel('blog/post')->SetTimeCreate_at($post_id),
                            'update_at' => $today,
                            'published' => isset($post['published'])  ? $post['published'] : 0))->save();
        $storeId    = (int)$this->getRequest()->getParam('store', 0);
        $this->_redirect('*/*/', array('store'=> $storeId));
    }

        public function massStatusAction(){
            $Ids = $this->getRequest()->getParam('published');
            $status     = (int)$this->getRequest()->getParam('status');
            $storeId    = (int)$this->getRequest()->getParam('store', 0);
            foreach ($Ids as $id) {
                $model = Mage::getModel('blog/post')->load($id);
                $model->setPublished($status)
                    ->save();
            }

            $this->_redirect('*/*/', array('store'=> $storeId));
        }
}
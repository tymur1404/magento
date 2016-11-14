<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:02
 */


class Ainstainer_TechTalk_Block_Adminhtml_Contact_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('ain_contact_grid');
        $this->setDefaultSort('request_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('techtalk/contact_collection');

        $this->setCollection($collection);
        parent::_prepareCollection();

        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('techtalk');

        $this->addColumn('request_id', [
            'header' => $helper->__('Request #'),
            'index'  => 'request_id',
        ]);

        $this->addColumn('name', [
            'header' => $helper->__('Contact Name'),
            'type'   => 'text',
            'index'  => 'name',
        ]);

        $this->addColumn('approved', [
            'header' => $helper->__('Approved'),
            'type'   => 'checkbox',
            'index'  => 'approved',
            'name' => 'approved',
            'align' => 'center',
            'value'      =>  '1'
        ]);

        $this->addColumn('date_add', [
            'header' => $helper->__('Date add'),
            'type'   => 'text',
            'index'  => 'date_add',
        ]);
        $this->addExportType('*/*/exportCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportExcel', $helper->__('Excel XML'));

        return parent::_prepareColumns();
    }

    /**
     * Row click url
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['request_id' => $row->getId()]);
    }

    public function getGridUrl($params = [])
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

//    public function massUpdateStatusAction(){
//        $reviewsIds = $this->getRequest()->getParam('approved');
//        $session    = Mage::getSingleton('techtalk/contact');
//
//        foreach ($reviewsIds as $reviewId) {
//            $model = Mage::getModel('tschtalk/contact')->load(15);
//            $model->setApproved(1)
//                ->save()
//                ->aggregate();
//        }
//        $session->addSuccess(
//            Mage::helper('adminhtml')->__('Total of %d record(s) have been updated.', count($reviewsIds))
//        );
//    }

//    protected function _prepareMassaction()
//    {
//        $this->setMassactionIdField('approved');
//        $this->getMassactionBlock()->setFormFieldName('approved');
//
//        $this->getMassactionBlock()->addItem('approve', array(
//            'label'=> Mage::helper('techtalk')->__('Change approve'),
//            'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
//            'index' => 'approved',
//            'value' => '1',
//            'additional' => array(
//                'visibility' => array(
//                    'name' => 'status',
//                    'type' => 'select',
//                    'class' => 'required-entry',
//                    'label' => Mage::helper('techtalk')->__('Approved'),
//                )
//            )
//        ));
//        return $this;
//    }
}
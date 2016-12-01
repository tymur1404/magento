<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:02
 */


class Ainstainer_Blog_Block_Adminhtml_Post_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('ain_blog_post_grid');
        $this->setDefaultSort('post_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('blog/post_collection');

        $this->setCollection($collection);
        parent::_prepareCollection();

        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('blog');

        $this->addColumn('post_id', [
            'header' => $helper->__('Request #'),
            'index'  => 'post_id',
        ]);

        $this->addColumn('title', [
            'header' => $helper->__('Title'),
            'type'   => 'text',
            'index'  => 'title',
        ]);

        $this->addColumn('url', [
            'header' => $helper->__('Url'),
            'type'   => 'text',
            'index'  => 'url',
        ]);

        $this->addColumn('short_descr', [
            'header' => $helper->__('Short Description'),
            'type'   => 'text',
            'index'  => 'short_descr',
        ]);

        $this->addColumn('published', [
            'header' => $helper->__('Published'),
            'type'   => 'text',
            'index'  => 'published',
            'align' => 'center',
        ]);

        $this->addColumn('create_at', [
            'header' => $helper->__('Create_at'),
            'type'   => 'text',
            'index'  => 'create_at',
        ]);
        $this->addColumn('update_at', [
            'header' => $helper->__('Update_at'),
            'type'   => 'text',
            'index'  => 'update_at',
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
        return $this->getUrl('*/*/edit', ['post_id' => $row->getId()]);
    }

    public function getGridUrl($params = [])
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

//    protected function _prepareMassaction()
//    {
//        $this->setMassactionIdField('approved');
//        $this->getMassactionBlock()->setFormFieldName('approved');
//
//        $this->getMassactionBlock()->addItem('approve', array(
//            'label'=> Mage::helper('blog')->__('Change approve'),
//            'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
//            'index' => 'approved',
//            'value' => '1',
//            'additional' => array(
//                'visibility' => array(
//                    'name' => 'status',
//                    'type' => 'select',
//                    'class' => 'required-entry',
//                    'label' => Mage::helper('blog')->__('Approved'),
//                    'values' => array('Disabled', 'Enabled')
//                )
//            )
//        ));
//        return $this;
//    }
}
<?php
/* @var $this KunjunganTindakanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kunjungan Tindakans',
);

$this->menu=array(
	array('label'=>'Create KunjunganTindakan', 'url'=>array('create')),
	array('label'=>'Manage KunjunganTindakan', 'url'=>array('admin')),
);
?>

<h1>Kunjungan Tindakans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

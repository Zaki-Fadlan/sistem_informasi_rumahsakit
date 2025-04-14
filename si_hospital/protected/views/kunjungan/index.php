<?php
/* @var $this KunjunganController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kunjungans',
);

$this->menu=array(
	array('label'=>'Create Kunjungan', 'url'=>array('create')),
	array('label'=>'Manage Kunjungan', 'url'=>array('admin')),
);
?>

<h1>Kunjungans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this KaryawanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Datamaster' => array('/site/page', 'view'=>'Datamaster'), // atau sesuaikan dengan controller/aksi yang sesuai
    'Karyawan',
);

$this->menu=array(
	array('label'=>'Create Karyawan', 'url'=>array('create')),
	array('label'=>'Manage Karyawan', 'url'=>array('admin')),
);
?>

<h1>Karyawans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

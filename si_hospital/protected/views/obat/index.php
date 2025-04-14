<?php
/* @var $this ObatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Datamaster' => array('/site/page', 'view'=>'Datamaster'), // atau sesuaikan dengan controller/aksi yang sesuai
	'Obat',
);

$this->menu=array(
	array('label'=>'Create Obat', 'url'=>array('create')),
	array('label'=>'Manage Obat', 'url'=>array('admin')),
);
?>

<h1>Obats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

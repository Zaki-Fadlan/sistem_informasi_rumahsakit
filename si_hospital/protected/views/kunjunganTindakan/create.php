<?php
/* @var $this KunjunganTindakanController */
/* @var $model KunjunganTindakan */

$this->breadcrumbs=array(
	'Kunjungan Tindakans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KunjunganTindakan', 'url'=>array('index')),
	array('label'=>'Manage KunjunganTindakan', 'url'=>array('admin')),
);
?>

<h1>Create KunjunganTindakan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this KunjunganController */
/* @var $model Kunjungan */

$this->breadcrumbs=array(
	'Kunjungans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Kunjungan', 'url'=>array('admin')),
);
?>

<h1>Kunjungan Baru</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasien'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Pasien', 'url'=>array('admin')),
);
?>

<h1>Tambah Pasien Baru</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
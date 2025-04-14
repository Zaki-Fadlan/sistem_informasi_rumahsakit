<?php
/* @var $this KunjunganController */
/* @var $model Kunjungan */

$this->breadcrumbs=array(
	'Kunjungans'=>array('index'),
	$model->id_kunjungan=>array('view','id'=>$model->id_kunjungan),
	'Update',
);

$this->menu=array(
array('label'=>'Daftar Kunjungan', 'url'=>array('admin')),
);
?>

<h1>Update Kunjungan <?php echo $model->id_kunjungan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
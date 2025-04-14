<?php
/* @var $this KunjunganController */
/* @var $model Kunjungan */

$this->breadcrumbs=array(
	'Kunjungans'=>array('index'),
	$model->id_kunjungan,
);

$this->menu=array(
	array('label'=>'Daftar Kunjungan', 'url'=>array('admin')),
);
?>

<h1>View Kunjungan #<?php echo $model->id_kunjungan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_kunjungan',
		'id_petugas',
		'id_pasien',
		'tanggal_kunjungan',
		'id_jenis_kunjungan',
		'keluhan',
	),
)); ?>

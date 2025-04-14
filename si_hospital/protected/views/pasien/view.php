<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasien'=>array('index'),
	$model->id_pasien,
);

$this->menu=array(
	// array('label'=>'List Pasien', 'url'=>array('index')),
	array('label'=>'Tambah Pasien Baru', 'url'=>array('create')),
	array('label'=>'Daftar Pasien', 'url'=>array('admin')),
);
?>

<h1>View Pasien #<?php echo $model->id_pasien; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pasien',
		'nama_lengkap',
		'nik',
		'dob',
		'jenis_kelamin',
		'alamat',
		'Kabupaten.nama_kabupaten',
		'no_hp',
		'tanggal_daftar',
	),
)); ?>

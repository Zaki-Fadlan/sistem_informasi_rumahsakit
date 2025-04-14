<?php
/* @var $this KunjunganTindakanController */
/* @var $model KunjunganTindakan */

$this->breadcrumbs=array(
	'Kunjungan Tindakans'=>array('index'),
	'Manage',
);

// $this->menu=array(
// 	array('label'=>'List KunjunganTindakan', 'url'=>array('index')),
// 	array('label'=>'Create KunjunganTindakan', 'url'=>array('create')),
// );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kunjungan-tindakan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Tindak Kunjungan Pasien', 'url'=>array('/kunjunganTindakan/tabel_kunjungan')),
	),
)); ?>
<h1>Riwayat Tindakan Pengunjung</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kunjungan-tindakan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
'columns'=>array(
	array(
		'name'=>'id_dokter',
		'header'=>'Nama Dokter',
		'value'=>'isset($data->Dokter->Karyawan) ? $data->Dokter->Karyawan->nama : "-"',
	),
	array(
		'name'=>'id_kunjungan',
		'header'=>'Nama Pasien',
		'value'=>'isset($data->Pasien) ? $data->Pasien->nama_lengkap : "-"',
	),
	array(
		'header'=>'NIK',
		'value'=>'isset($data->Pasien) ? $data->Pasien->nik : "-"',
	),
	array(
		'name'=>'id_kunjungan',
		'header'=>'Jenis Kunjungan',
		'value'=>'isset($data->JenisKunjungan) ? $data->JenisKunjungan->nama_jenis : "-"',
	),
	'catatan',
	'biaya',
	array(
		'class'=>'CButtonColumn',
	),
),

)); ?>


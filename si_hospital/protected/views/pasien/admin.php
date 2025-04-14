<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasien',
);

$this->menu=array(
	array('label'=>'Tambah Pasien Baru', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pasien-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Daftar Pasien</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pasien-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model, 
	'columns'=>array(
		array(
			'name' => 'nama_lengkap',
			'filter' => CHtml::activeTextField($model, 'nama_lengkap'),
		),
		array(
			'name' => 'nik',
			'filter' => CHtml::activeTextField($model, 'nik'),
		),
		array(
			'name' => 'dob',
			'filter' => false, 
		),
		array(
			'name' => 'jenis_kelamin',
			'filter' => false,
		),
		array(
			'name' => 'alamat',
			'filter' => false,
		),
		array(
			'name' => 'Kabupaten.nama_kabupaten',
			'header' => 'Kabupaten',
			'value' => '$data->Kabupaten->nama_kabupaten',
			'filter' => false,
		),
		array(
			'name' => 'no_hp',
			'filter' => false,
		),
		array(
			'name' => 'tanggal_daftar',
			'filter' => false,
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

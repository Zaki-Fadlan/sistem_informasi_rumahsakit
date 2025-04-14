<?php
/* @var $this KaryawanController */
/* @var $model Karyawan */

$this->breadcrumbs=array(
	'Datamaster'=>array('/site/page', 'view'=>'datamaster'),
	'Pegawai',
);

$this->menu=array(
	array('label'=>'List Karyawan', 'url'=>array('index')),
	array('label'=>'Create Karyawan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#karyawan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pegawai</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'karyawan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id_karyawan',
		'nama',
		'nip',
		'jenis_kelamin',
		'dob',
		'kontak',
		/*
		'id_kabupaten',
		*/
		array(
			'name' => 'nama_kabupaten',
            'header' => 'Kabupaten',
            'value' => '$data->Kabupaten ? $data->Kabupaten->nama_kabupaten : "N/A"',
			
        ),
		'alamat',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

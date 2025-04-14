<?php
/* @var $this JenisKunjunganController */
/* @var $model JenisKunjungan */

$this->breadcrumbs=array(
	'Datamaster'=>array('/site/page', 'view'=>'datamaster'),
	'Jenis Kunjungans',
);

$this->menu=array(
	array('label'=>'List JenisKunjungan', 'url'=>array('index')),
	array('label'=>'Create JenisKunjungan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jenis-kunjungan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Jenis Kunjungan</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jenis-kunjungan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id_jenis_kunjungan',
		'nama_jenis',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

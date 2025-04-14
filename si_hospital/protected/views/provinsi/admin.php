<?php
/* @var $this ProvinsiController */
/* @var $model Provinsi */

$this->breadcrumbs=array(
	'Datamaster'=>array('/site/page', 'view'=>'datamaster'),
	'Wilayah'=>array('/site/page', 'view'=>'wilayah'),
	'Provinsi',
);

$this->menu=array(
	array('label'=>'List Provinsi', 'url'=>array('index')),
	array('label'=>'Create Provinsi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#provinsi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Wilayah</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'provinsi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nama_provinsi',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

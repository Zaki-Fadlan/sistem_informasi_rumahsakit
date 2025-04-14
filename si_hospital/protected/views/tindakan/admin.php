<?php
/* @var $this TindakanController */
/* @var $model Tindakan */

$this->breadcrumbs=array(
	'Datamaster'=>array('/site/page', 'view'=>'datamaster'),
	'Tindakan',
);

$this->menu=array(
	array('label'=>'List Tindakan', 'url'=>array('index')),
	array('label'=>'Create Tindakan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tindakan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tindakan</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tindakan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id_tindakan',
		'nama_tindakan',
		'deskripsi',
		'biaya',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this KabupatenController */
/* @var $model Kabupaten */

$this->breadcrumbs=array(
	'Datamaster'=>array('/site/page', 'view'=>'datamaster'),
	'Wilayah'=>array('/site/page', 'view'=>'wilayah'),
	'Kabupaten',
);

$this->menu=array(
	// array('label'=>'List Kabupaten', 'url'=>array('index')),
	array('label'=>'Tambah Kabupaten', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kabupaten-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Kabupaten</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kabupaten-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'nama_kabupaten',
            'header' => 'Kabupaten',
            'value' => '$data->nama_kabupaten',
        ),
        array(
            'name' => 'nama_provinsi',
            'header' => 'Provinsi',
            'value' => '$data->provinsi ? $data->provinsi->nama_provinsi : "(Kosong)"',
            'filter' => CHtml::listData(Provinsi::model()->findAll(array('order'=>'nama_provinsi ASC')), 'nama_provinsi', 'nama_provinsi'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

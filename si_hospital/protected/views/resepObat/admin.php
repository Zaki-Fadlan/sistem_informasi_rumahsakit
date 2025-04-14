<?php
/* @var $this ResepObatController */
/* @var $model ResepObat */

$this->breadcrumbs=array(
	'Resep Obats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ResepObat', 'url'=>array('index')),
	array('label'=>'Create ResepObat', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#resep-obat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Resep Obat untuk pengunjung', 'url'=>array('/resepObat/tabel_kunjungan')),
	),
)); ?>
<h1>Riwayat Pemberian Resep Obat Pengunjung</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'resep-obat-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_resep_obat',
		'id_dokter',
		'id_kunjungan',
		'id_obat',
		'jumlah',
		'dosis',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this KunjunganTindakanController */
/* @var $model KunjunganTindakan */

$this->breadcrumbs=array(
	'Kunjungan Tindakans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KunjunganTindakan', 'url'=>array('index')),
	array('label'=>'Create KunjunganTindakan', 'url'=>array('create')),
	array('label'=>'View KunjunganTindakan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KunjunganTindakan', 'url'=>array('admin')),
);
?>

<h1>Update KunjunganTindakan <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
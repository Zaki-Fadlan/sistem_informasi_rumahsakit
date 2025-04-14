<?php
/* @var $this TagihanController */
/* @var $model Tagihan */

$this->breadcrumbs=array(
	'Tagihans'=>array('index'),
	$model->id_tagihan=>array('view','id'=>$model->id_tagihan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tagihan', 'url'=>array('index')),
	array('label'=>'Create Tagihan', 'url'=>array('create')),
	array('label'=>'View Tagihan', 'url'=>array('view', 'id'=>$model->id_tagihan)),
	array('label'=>'Manage Tagihan', 'url'=>array('admin')),
);
?>

<h1>Update Tagihan <?php echo $model->id_tagihan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
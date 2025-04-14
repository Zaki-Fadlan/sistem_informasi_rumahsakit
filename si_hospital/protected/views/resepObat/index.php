<?php
/* @var $this ResepObatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Resep Obats',
);

$this->menu=array(
	array('label'=>'Create ResepObat', 'url'=>array('create')),
	array('label'=>'Manage ResepObat', 'url'=>array('admin')),
);
?>

<h1>Resep Obats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this KabupatenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Datamaster' => array('/site/page', 'view'=>'Datamaster'), 
	'Kabupatens'
);

$this->menu=array(
	array('label'=>'Create Kabupaten', 'url'=>array('create')),
	array('label'=>'Manage Kabupaten', 'url'=>array('admin')),
);
?>

<h1>Kabupatens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Wilayah';
$this->breadcrumbs=array(
	'Datamaster'=>array('/site/page', 'view'=>'datamaster'),
	'Wilayah',
);
?>
<h1>Wilayah</h1>

<?php $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Provinsi', 'url'=>array('/provinsi/admin')),
		array('label'=>'Kabupaten', 'url'=>array('/kabupaten/admin')),
	),
)); ?>
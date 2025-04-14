<?php
/* @var $this KunjunganController */
/* @var $model Kunjungan */

$this->breadcrumbs=array(
	'Kunjungans'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kunjungan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Riwayat Kunjungan</h1>
<p>
Klik nama pasien untuk menambahkan kunjungan baru pada pasien yang terdaftar
</p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'kunjungan-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'name' => 'nama_pasien',
            'header' => 'Nama Pasien',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->Pasien->nama_lengkap), array("kunjungan/create", "id_pasien"=>$data->id_pasien))',
            'filter' => CHtml::activeTextField($model, 'nama_pasien'),
        ),
        array(
            'name' => 'nik', 
            'header' => 'NIK',
            'value' => '$data->Pasien->nik', 
            'filter' => CHtml::activeTextField($model, 'nik'), 
        ),
        array(
            'name' => 'tanggal_daftar', 
            'header' => 'Tanggal Daftar',
            'value' => '$data->Pasien->tanggal_daftar', 
            'filter' => false, 
        ),
        array(
            'name' => 'tanggal_kunjungan',
            'filter' => false,
        ),
        array(
            'name' => 'jenis_kunjungan',
            'header' => 'Jenis Kunjungan',
            'value' => '$data->JenisKunjungan ? $data->JenisKunjungan->nama_jenis : "N/A"',
            'filter' => false, 
        ),
        array(
            'name' => 'keluhan',
            'filter' => false,
        ),
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>

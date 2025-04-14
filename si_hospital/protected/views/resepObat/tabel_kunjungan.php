<?php
/* @var $this KunjunganTindakanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Data Kunjungan',
);
?>

<h1>Data Kunjungan</h1>
<p>Pilih Nama Pasien untuk ditindak</p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'kunjungan-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id_kunjungan',
        array(
            'name' => 'id_pasien',
            'header' => 'Nama Pasien',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->Pasien->nama_lengkap), array("resepObat/create", "id_kunjungan"=>$data->id_kunjungan))',

        ),
        array(
            'name' => 'id_jenis_kunjungan',
            'header' => 'Jenis Kunjungan',
            'value' => '$data->JenisKunjungan->nama_jenis', // sesuaikan field
        ),
        'tanggal_kunjungan',
        'keluhan',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>

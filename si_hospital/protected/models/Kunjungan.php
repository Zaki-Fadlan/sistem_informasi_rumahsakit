<?php

/**
 * This is the model class for table "tbl_kunjungan".
 *
 * The followings are the available columns in table 'tbl_kunjungan':
 * @property integer $id_kunjungan
 * @property integer $id_petugas
 * @property integer $id_pasien
 * @property string $tanggal_kunjungan
 * @property integer $id_jenis_kunjungan
 * @property string $keluhan
 *
 * The followings are the available model relations:
 * @property TblUsers $idPetugas
 * @property TblPasien $idPasien
 * @property TblJenisKunjungan $idJenisKunjungan
 * @property TblResepObat[] $tblResepObats
 * @property TblTagihan[] $tblTagihans
 * @property TblKunjunganTindakan[] $tblKunjunganTindakans
 */
class Kunjungan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nama_pasien; // Atribut tambahan untuk pencarian berdasarkan nama pasien
    public $nik; // Atribut tambahan untuk pencarian berdasarkan NIK pasien
    public $tanggal_daftar; // Atribut tambahan untuk pencarian berdasarkan tanggal daftar pasien
    public $obat; // Atribut tambahan untuk pencarian berdasarkan tanggal daftar pasien
    public $jenis_kunjungan; // Atribut tambahan untuk pencarian berdasarkan tanggal daftar pasien
    public $nama_inputer; // Atribut tambahan untuk pencarian berdasarkan tanggal daftar pasien

	public function tableName()
	{
		return 'tbl_kunjungan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' id_pasien', 'required'),
			// array('id_petugas, id_pasien, tanggal_kunjungan, id_jenis_kunjungan', 'required'),
			array('id_petugas, id_pasien, id_jenis_kunjungan', 'numerical', 'integerOnly'=>true),
			array('keluhan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kunjungan, id_petugas, id_pasien, tanggal_kunjungan, id_jenis_kunjungan, keluhan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Petugas' => array(self::BELONGS_TO, 'Users', 'id_petugas'),
			'Pasien' => array(self::BELONGS_TO, 'Pasien', 'id_pasien'),
			'JenisKunjungan' => array(self::BELONGS_TO, 'JenisKunjungan', 'id_jenis_kunjungan'),
			'ResepObat' => array(self::HAS_MANY, 'ResepObat', 'id_kunjungan'),
			'Tagihan' => array(self::HAS_MANY, 'Tagihan', 'id_kunjungan'),
			'KunjunganTindakan' => array(self::HAS_MANY, 'KunjunganTindakan', 'id_kunjungan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kunjungan' => 'Id Kunjungan',
			'id_petugas' => 'Id Petugas',
			'id_pasien' => 'Id Pasien',
			'tanggal_kunjungan' => 'Tanggal Kunjungan',
			'id_jenis_kunjungan' => 'Id Jenis Kunjungan',
			'keluhan' => 'Keluhan',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
	
		$criteria->with = array('Pasien'); 

		$criteria->compare('Pasien.nama_lengkap', $this->nama_pasien, true); 
		$criteria->compare('Pasien.nik', $this->nik, true); 

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

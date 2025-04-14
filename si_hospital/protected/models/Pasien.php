<?php

class Pasien extends CActiveRecord
{

	public $nama_kabupaten; 
    public $id_pasien;
    public $nama_lengkap;
    public $nik;
    public $dob;
    public $jenis_kelamin;
    public $alamat;
    public $id_kabupaten;
    public $no_hp;
    public $tanggal_daftar;
    public $id_provinsi;
	public $id_jenis_kunjungan;
	public function tableName()
	{
		return 'tbl_pasien';
	}

	public function rules()
	{
		return array(
			array('nama_lengkap, dob, jenis_kelamin, tanggal_daftar', 'required'),
			array('nama_lengkap', 'length', 'max'=>100),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('id_kabupaten', 'numerical', 'integerOnly'=>true),
			array('nik, no_hp', 'length', 'max'=>20),
			array('alamat', 'safe'),
			array('id_jenis_kunjungan', 'required'),
			array('id_pasien, nama_lengkap, nik, dob, jenis_kelamin, alamat, id_kabupaten, no_hp, tanggal_daftar, nama_kabupaten', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Kabupaten' => array(self::BELONGS_TO, 'Kabupaten', 'id_kabupaten'),
			'Kunjungan' => array(self::HAS_MANY, 'Kunjungan', 'id_pasien'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_pasien' => 'Id Pasien',
			'nama_lengkap' => 'Nama Lengkap',
			'nik' => 'NIK',
			'dob' => 'Lahir',
			'jenis_kelamin' => 'Jenis Kelamin',
			'alamat' => 'Alamat',
			'id_kabupaten' => 'Id Kabupaten',
			'no_hp' => 'No Hp',
			'tanggal_daftar' => 'Tanggal Daftar',
			'nama_kabupaten' => 'Nama Kabupaten',
			'nama_provinsi' => 'Nama Provinsi',
			'id_jenis_kunjungan' => 'Jenis Kunjungan',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;
		$criteria->with = array('Kabupaten'); // Relasi dengan kabupaten

		$criteria->addCondition('LOWER(nama_lengkap) LIKE :nama_lengkap');
		$criteria->params[':nama_lengkap'] = '%' . strtolower($this->nama_lengkap) . '%';
		$criteria->compare('nik',$this->nik,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

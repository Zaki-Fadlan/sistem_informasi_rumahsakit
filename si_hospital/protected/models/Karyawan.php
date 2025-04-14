<?php

/**
 * This is the model class for table "tbl_karyawan".
 *
 * The followings are the available columns in table 'tbl_karyawan':
 * @property integer $id_karyawan
 * @property string $nama
 * @property integer $nip
 * @property string $jenis_kelamin
 * @property string $dob
 * @property string $kontak
 * @property string $alamat
 * @property integer $id_kabupaten
 *
 * The followings are the available model relations:
 * @property TblKabupaten $idKabupaten
 * @property TblUsers[] $tblUsers
 */
class Karyawan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nama_kabupaten; 

	public function tableName()
	{
		return 'tbl_karyawan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, nip, jenis_kelamin, dob, id_kabupaten', 'required'),
			array('nip, id_kabupaten', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>100),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('kontak', 'length', 'max'=>20),
			array('alamat', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_karyawan, nama, nip, jenis_kelamin, dob, kontak, alamat, id_kabupaten', 'safe', 'on'=>'search'),
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
			'Kabupaten' => array(self::BELONGS_TO, 'Kabupaten', 'id_kabupaten'),
			'Users' => array(self::HAS_MANY, 'Users', 'id_karyawan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_karyawan' => 'Id Karyawan',
			'nama' => 'Nama',
			'nip' => 'Nip',
			'jenis_kelamin' => 'Jenis Kelamin',
			'dob' => 'Dob',
			'kontak' => 'Kontak',
			'alamat' => 'Alamat',
			'id_kabupaten' => 'Id Kabupaten',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_karyawan',$this->id_karyawan);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('nip',$this->nip);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('kontak',$this->kontak,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('id_kabupaten',$this->id_kabupaten);
		$criteria->compare('Kabupaten.nama_kabupaten', $this->nama_kabupaten, true); 


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Karyawan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

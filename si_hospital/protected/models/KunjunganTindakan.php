<?php

/**
 * This is the model class for table "tbl_kunjungan_tindakan".
 *
 * The followings are the available columns in table 'tbl_kunjungan_tindakan':
 * @property integer $id
 * @property integer $id_dokter
 * @property integer $id_tindakan
 * @property integer $id_kunjungan
 * @property string $catatan
 * @property string $biaya
 *
 * The followings are the available model relations:
 * @property TblKunjungan $idKunjungan
 * @property TblUsers $idDokter
 * @property TblTindakan $idTindakan
 */
class KunjunganTindakan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $pasien; 
	public function tableName()
	{
		return 'tbl_kunjungan_tindakan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokter, id_tindakan, id_kunjungan', 'required'),
			array('id_dokter, id_tindakan, id_kunjungan', 'numerical', 'integerOnly'=>true),
			array('biaya', 'length', 'max'=>10),
			array('catatan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_dokter, id_tindakan, id_kunjungan, catatan, biaya', 'safe', 'on'=>'search'),
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
			'Kunjungan' => array(self::BELONGS_TO, 'Kunjungan', 'id_kunjungan'),
			'Tindakan' => array(self::BELONGS_TO, 'Tindakan', 'id_tindakan'),
			'Pasien' => array(self::HAS_ONE, 'Pasien', array('id_pasien' => 'id_pasien'), 'through' => 'Kunjungan'),
			'JenisKunjungan' => array(self::HAS_ONE, 'JenisKunjungan', array('id_jenis_kunjungan' => 'id_jenis_kunjungan'), 'through' => 'Kunjungan'),
			'Dokter' => array(self::BELONGS_TO, 'Users', 'id_dokter'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_dokter' => 'Id Dokter',
			'id_tindakan' => 'Id Tindakan',
			'id_kunjungan' => 'Id Kunjungan',
			'catatan' => 'Catatan',
			'biaya' => 'Biaya',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_dokter',$this->id_dokter);
		$criteria->compare('id_tindakan',$this->id_tindakan);
		$criteria->compare('id_kunjungan',$this->id_kunjungan);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('biaya',$this->biaya,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KunjunganTindakan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}

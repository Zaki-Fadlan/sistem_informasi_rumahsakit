<?php

/**
 * This is the model class for table "tbl_tindakan".
 *
 * The followings are the available columns in table 'tbl_tindakan':
 * @property integer $id_tindakan
 * @property string $nama_tindakan
 * @property string $deskripsi
 * @property string $biaya
 *
 * The followings are the available model relations:
 * @property TblKunjunganTindakan[] $tblKunjunganTindakans
 */
class Tindakan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tindakan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_tindakan', 'required'),
			array('nama_tindakan', 'length', 'max'=>100),
			array('biaya', 'length', 'max'=>10),
			array('deskripsi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tindakan, nama_tindakan, deskripsi, biaya', 'safe', 'on'=>'search'),
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
			'KunjunganTindakan' => array(self::HAS_MANY, 'KunjunganTindakan', 'id_tindakan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tindakan' => 'Id Tindakan',
			'nama_tindakan' => 'Nama Tindakan',
			'deskripsi' => 'Deskripsi',
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

		$criteria->compare('id_tindakan',$this->id_tindakan);
		$criteria->compare('nama_tindakan',$this->nama_tindakan,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('biaya',$this->biaya,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tindakan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "tbl_obat".
 *
 * The followings are the available columns in table 'tbl_obat':
 * @property integer $id_obat
 * @property string $nama_obat
 * @property string $satuan
 * @property string $harga_satuan
 * @property integer $stok
 * @property string $deskripsi
 *
 * The followings are the available model relations:
 * @property TblResepObat[] $tblResepObats
 */
class Obat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_obat, stok', 'required'),
			array('stok', 'numerical', 'integerOnly'=>true),
			array('nama_obat', 'length', 'max'=>100),
			array('harga_satuan', 'length', 'max'=>10),
			array('satuan, deskripsi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_obat, nama_obat, satuan, harga_satuan, stok, deskripsi', 'safe', 'on'=>'search'),
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
			'ResepObats' => array(self::HAS_MANY, 'ResepObat', 'id_obat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_obat' => 'Id Obat',
			'nama_obat' => 'Nama Obat',
			'satuan' => 'Satuan',
			'harga_satuan' => 'Harga Satuan',
			'stok' => 'Stok',
			'deskripsi' => 'Deskripsi',
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

		$criteria->compare('id_obat',$this->id_obat);
		$criteria->compare('nama_obat',$this->nama_obat,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('harga_satuan',$this->harga_satuan,true);
		$criteria->compare('stok',$this->stok);
		$criteria->compare('deskripsi',$this->deskripsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Obat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recetas".
 *
 * @property int $id
 * @property int $id_usuario
 * @property string $tipo
 * @property string $datos
 * @property string $fecha
 * @property int $id_prodp
 *
 * @property Favoritos[] $favoritos
 * @property Likes[] $likes
 * @property Producto $prodp
 * @property Usuarios $usuario
 */
class Recetas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'tipo', 'datos', 'id_prodp'], 'required'],
            [['id_usuario', 'id_prodp'], 'integer'],
            [['datos'], 'string'],
            [['fecha'], 'safe'],
            [['tipo'], 'string', 'max' => 20],
            [['id_prodp'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_prodp' => 'id']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuario' => 'Id Usuario',
            'tipo' => 'Tipo',
            'datos' => 'Datos',
            'fecha' => 'Fecha',
            'id_prodp' => 'Id Prodp',
        ];
    }

    /**
     * Gets query for [[Favoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favoritos::className(), ['ud_receta' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Likes::className(), ['id_receta' => 'id']);
    }

    /**
     * Gets query for [[Prodp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdp()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_prodp']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'id_usuario']);
    }
}

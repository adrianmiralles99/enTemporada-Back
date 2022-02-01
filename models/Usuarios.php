<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $nick
 * @property string $correo
 * @property string $password
 * @property string $imagen
 * @property string $descripcion
 * @property string $localidad
 * @property string $direccion
 * @property string $tipo
 *
 * @property Favoritos[] $favoritos
 * @property Likes[] $likes
 * @property Recetas[] $recetas
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'nick', 'correo', 'password', 'imagen', 'descripcion', 'localidad', 'direccion', 'tipo'], 'required'],
            [['descripcion', 'tipo'], 'string'],
            [['nombre', 'localidad'], 'string', 'max' => 20],
            [['apellidos', 'imagen'], 'string', 'max' => 40],
            [['nick'], 'string', 'max' => 12],
            [['correo', 'direccion'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'nick' => 'Nick',
            'correo' => 'Correo',
            'password' => 'Password',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
            'localidad' => 'Localidad',
            'direccion' => 'Direccion',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[Favoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favoritos::className(), ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Likes::className(), ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[Recetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Recetas::className(), ['id_usuario' => 'id']);
    }
}

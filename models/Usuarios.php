<?php

namespace app\models;

use Yii;
use app\models\Likes;
use app\models\Recetas;
use app\models\Favoritos;

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
        return $this->hasMany(Favoritos::class, ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Likes::class, ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[Recetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Recetas::class, ['id_usuario' => 'id']);
    }



    // CLASES CREADAS

    public static function findByUsername($username)
    {
        return static::findOne(['nick' => $username]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    // Comprueba que el password que se le pasa es correcto
    public function validatePassword($password)
    {
        return $this->password === md5($password); // Si se utiliza otra función de encriptación distinta a md5, habrá que cambiar esta línea
    }
}

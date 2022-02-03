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
 * @property string $estado
 *
 * @property Favoritos[] $favoritos
 * @property Likes[] $likes
 * @property Recetas[] $recetas
 * @property Recetas[] $recetas0
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    static $tipoUsuarios = ["U" => "Usuario",  "A" => "Administrdor"];

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
            [['nombre', 'apellidos', 'nick', 'correo', 'password', 'imagen', 'descripcion', 'localidad', 'direccion', 'tipo', 'estado','token','fecha_cad'], 'required'],
            [['descripcion', 'tipo', 'estado'], 'string'],
            [['nombre', 'localidad'], 'string', 'max' => 20],
            [['apellidos', 'imagen'], 'string', 'max' => 40],
            [['nick'], 'string', 'max' => 12],
            [['correo', 'direccion'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
            [['token'], 'string', 'max' => 40],
            [['fecha_cad'], 'date', 'max' => 32],
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
            'estado' => 'Estado',
            'token' => 'Token',
            'fecha_cad' => 'Fecha Caducidad',
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

    /**
     * Gets query for [[Recetas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas0()
    {
        return $this->hasMany(Recetas::class, ['id_usuario' => 'id']);
    }

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

        $us = self::findOne(['token' => $token]);
        var_dump(md5(date("Y-m-d H:i:s")));
        die();
        // Por si caduca
        // if($us->fecha){

        // }
        // return self::findOne(['token' => $token]);
    }

    // Comprueba que el password que se le pasa es correcto
    public function validatePassword($password)
    {
        return $this->password === md5($password); // Si se utiliza otra función de encriptación distinta a md5, habrá que cambiar esta línea
    }

    public function getTipoText()
    {
        return self::$tipoUsuarios[$this->tipo];
    }
}

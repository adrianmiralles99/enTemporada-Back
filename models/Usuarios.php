<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $nick
 * @property string $correo
 * @property string $password
 * @property string|null $imagen
 * @property string|null $descripcion
 * @property string $localidad
 * @property string $direccion
 * @property string $tipo
 * @property string $estado
 * @property string|null $token
 * @property string|null $fecha_cad
 * @property int|null $exp
 * @property int|null $id_ultima_receta
 *
 * @property Favoritos[] $favoritos
 * @property Likes[] $likes
 * @property Recetas[] $recetas
 * @property Recetas[] $recetas0
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $eventImage;
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
            [['nombre', 'apellidos', 'nick', 'correo', 'password', 'localidad', 'direccion', 'tipo', 'estado'], 'required'],
            [['descripcion', 'tipo', 'estado'], 'string'],
            [['fecha_cad', 'imagen'], 'safe'],
            [['exp', 'id_ultima_receta'], 'integer'],
            [['nombre', 'localidad'], 'string', 'max' => 20],
            [['apellidos', 'token'], 'string', 'max' => 40],
            [['nick'], 'string', 'max' => 12],
            [['correo', 'direccion'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
            [['eventImage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'fecha_cad' => 'Fecha Cad',
            'exp' => 'Exp',
            'id_ultima_receta' => 'Id Ultima Receta',
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

    static $tipoUsuarios = ["U" => "Usuario",  "A" => "Administrador"];

    public function getTipoText()
    {
        return self::$tipoUsuarios[$this->tipo];
    }

    static $tipoEstado = ["A" => "Activo",  "P" => "Pendiente", "B" => "Bloqueado"];

    public function getEstadoText()
    {
        return self::$tipoEstado[$this->estado];
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
    }
    public function beforeSave($insert)
    {
        return parent::beforeSave($insert);
    }

    // Comprueba que el password que se le pasa es correcto
    public function validatePassword($password)
    {
        return $this->password === md5($password); // Si se utiliza otra función de encriptación distinta a md5, habrá que cambiar esta línea
    }

    function hasRole($role){
        return $this->tipo==$role;
        //return in_array($this->roles,$role);  Si es un array de roles
    }
        
     
}

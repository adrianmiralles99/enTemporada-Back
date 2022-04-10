<?php

namespace app\models;

use Yii;
use app\models\Subcomentarios;

/**
 * This is the model class for table "entradas".
 *
 * @property int $id
 * @property int $id_usuario
 * @property int $id_categoria
 * @property string $titulo
 * @property string $fecha
 * @property string $estado
 * @property string $texto
 * @property string $imagen
 *
 * @property Categorias $categoria
 * @property Comentario[] $comentarios

 * @property FavoritosEntrada[] $favoritosEntradas
 * @property LikesEntrada[] $likesEntradas
 * @property Usuarios $usuario
 */
class Entradas extends \yii\db\ActiveRecord
{
    public $eventImage;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entradas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_categoria', 'titulo', 'estado', 'texto', 'imagen'], 'required'],
            [['id_usuario', 'id_categoria'], 'integer'],
            [['fecha'], 'safe'],
            [['estado', 'texto'], 'string'],
            [['titulo'], 'string', 'max' => 75],
            [['imagen'], 'string', 'max' => 40],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_usuario' => 'id']],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['id_categoria' => 'id']],
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
            'id_usuario' => 'Id Usuario',
            'id_categoria' => 'Id Categoria',
            'titulo' => 'Titulo',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
            'texto' => 'Texto',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'id_categoria']);
    }
    
    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id_entrada' => 'id']);
    }

    /**
     * Gets query for [[FavoritosEntradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritosEntradas()
    {
        return $this->hasMany(FavoritosEntrada::className(), ['id_entrada' => 'id']);
    }

    /**
     * Gets query for [[LikesEntradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikesEntradas()
    {
        return $this->hasMany(LikesEntrada::className(), ['id_entrada' => 'id']);
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
    public function getComentariosEntrada(){
        return Comentarios::find()->select('texto, id')->where(['id_entrada' => $this->id])->all();
    }
    public function getSubComentarios($idcomentario){
        return Subcomentarios::find()->select('texto, id')->where(['id_comentarioprinc' => $idcomentario])->all();
    }
    
    
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id
 * @property string $nombre
 * @property string $imagen
 * @property string $descripcion
 * @property string $info_nut
 * @property string $tipo
 * @property string $color
 *
 * @property Calendario[] $calendarios
 * @property Recetas[] $recetas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'imagen', 'descripcion', 'info_nut', 'tipo', 'color'], 'required'],
            [['info_nut'], 'safe'],
            [['descripcion', 'tipo'], 'string'],
            [['nombre'], 'string', 'max' => 20],
            [['imagen'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 40],
            [['eventImage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png'],
            [['eventImageB'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png'],
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
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
            'info_nut' => 'Info Nut',
            'tipo' => 'Tipo',
            'color' => 'Color',
        ];
    }

    /**
     * Gets query for [[Calendarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarios()
    {
        return $this->hasMany(Calendario::class, ['id_prod' => 'id']);
    }

    /**
     * Gets query for [[Recetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Recetas::class, ['id_prodp' => 'id']);
    }

    public function afterFind()
    {
        $this->info_nut = json_decode($this->info_nut, true);
        return parent::afterFind();
    }
    public function beforeSave($insert)
    {
        $this->info_nut = json_encode($this->info_nut); //Los convertimos a Json
        return parent::beforeSave($insert);
    }

    static $nutrientes = [
        "e" => "Energia",  "pr" => "Proteinas", "g" => "Grasa",  "hc" => "H. carbono", "cl" => "Calcio",
        "fb" => "Fibra", "s" => "Sodio",  "pt" => "Potasio", "h" => "Hierro",  "af" => "Ac. folico"
    ];
    static $articulo = ["V" => "Verdura",  "F" => "Fruta"];

    public function getTipoArticulo()
    {
        return self::$articulo[$this->tipo];
    }
    public function getNutriente($e)
    {
        return self::$nutrientes[$e];
    }
}

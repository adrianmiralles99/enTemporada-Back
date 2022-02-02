<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendario".
 *
 * @property int $id_prod
 * @property string $enero
 * @property string $febrero
 * @property string $marzo
 * @property string $abril
 * @property string $mayo
 * @property string $junio
 * @property string $julio
 * @property string $agosto
 * @property string $septiembre
 * @property string $octubre
 * @property string $noviembre
 * @property string $diciembre
 *
 * @property Producto $prod
 */
class Calendario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prod', 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'], 'required'],
            [['id_prod'], 'integer'],
            [['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'], 'string'],
            [['id_prod'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_prod' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prod' => 'Id Prod',
            'enero' => 'Enero',
            'febrero' => 'Febrero',
            'marzo' => 'Marzo',
            'abril' => 'Abril',
            'mayo' => 'Mayo',
            'junio' => 'Junio',
            'julio' => 'Julio',
            'agosto' => 'Agosto',
            'septiembre' => 'Septiembre',
            'octubre' => 'Octubre',
            'noviembre' => 'Noviembre',
            'diciembre' => 'Diciembre',
        ];
    }

    /**
     * Gets query for [[Prod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_prod']);
    }
}

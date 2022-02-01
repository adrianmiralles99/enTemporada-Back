<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favoritos".
 *
 * @property int $id
 * @property int $id_usuario
 * @property int $ud_receta
 *
 * @property Recetas $udReceta
 * @property Usuarios $usuario
 */
class Favoritos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favoritos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'ud_receta'], 'required'],
            [['id_usuario', 'ud_receta'], 'integer'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_usuario' => 'id']],
            [['ud_receta'], 'exist', 'skipOnError' => true, 'targetClass' => Recetas::className(), 'targetAttribute' => ['ud_receta' => 'id']],
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
            'ud_receta' => 'Ud Receta',
        ];
    }

    /**
     * Gets query for [[UdReceta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUdReceta()
    {
        return $this->hasOne(Recetas::className(), ['id' => 'ud_receta']);
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

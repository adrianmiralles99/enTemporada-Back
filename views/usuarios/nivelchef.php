<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Usuarios;
use yii\grid\ActionColumn;
use yii\grid\CheckboxColumn;

use yii\web\JsExpression;
use daixianceng\echarts\ECharts;
/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$model = new Usuarios;
$this->title = 'Nivel de chef de los usuarios';
$this->params['breadcrumbs'][] = $this->title;

$usuarios = [];
$puntosexp = [];
$diamante = 0; $platino = 0; $oro = 0; $plata =0; $bronce= 0;
foreach ($model->getUsuariosAprobados() as $valor){
    if($valor["exp"] >= 0 && $valor["exp"] < 150){
        $bronce++;
    }else if($valor["exp"] >= 150 && $valor["exp"] <300){
      $plata++;
    }else if ($valor["exp"] >= 300 && $valor["exp"] <400){
     $oro++;
    }else if ($valor["exp"] >= 400 && $valor["exp"] < 475){
      $platino++;
    }else{
     $diamante++;
    }
    array_push($usuarios, $valor["nick"]);
    array_push($puntosexp, $valor["exp"]);

}
$colorPalette = ['#0b5ea4', '#0ffffc', '#feff02', '#e1f1ff', '#ed8d05'];

?>


<div class="nivelchef">
    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>
    <div class="row mt-5">
        <div class="col-4">
        <h5>Número de usuarios por nivel de chef:</h5>
        <div class="mt-4">
            <?= ECharts::widget([
            'responsive' => true,
            'options' => [
                'style' => 'height: 400px;',
                
            ],
            'pluginEvents' => [
                'click' => [
                    new JsExpression('function (params) {console.log(params)}'),
                    new JsExpression('function (params) {console.log("ok")}')
                ],
                'legendselectchanged' => new JsExpression('function (params) {console.log(params.selected)}')
            ],
            'pluginOptions' => [
                'option' => [
                
                    'tooltip' => [
                        'trigger' => 'item'
                    ],
                    'legend' => [
                        'orient'=> 'horizontal',
                        'left'=> 'center'
                    ],
                    'color'=> $colorPalette,

                    'series' => [
                        [
                            'name'=> 'Nivel de chef',
                            'type'=> 'pie',
                            'radius'=> ['40%', '70%'],

                            'data'=> [
                            [ 'value'=> $diamante, 'name'=> 'Diamante '],
                            ['value'=>  $platino, 'name'=> 'Platino' ],
                            ['value'=> $oro,'name'=> 'Oro' ],
                            [ 'value'=>  $plata,'name'=>'Plata'],
                            ['value'=>  $bronce, 'name'=>'Bronce']
                            ],
                            'itemStyle'=> [
                                'borderColor'=> '#fff',
                                'borderWidth'=> 2,
                                'borderRadius'=> 10,
                            ],
                            
                            'emphasis'=> [
                                'label'=> [
                                    'show'=> true,
                                    'fontSize'=> '30',
                                    'fontWeight'=>'bold'
                                ]
                            ],
                            'labelLine'=> [
                            'show'=> false
                            ],
                        ],
                        
                    ]
                ]
            ]
            ]); ?>
        </div>
        </div>
        <div class="col-4 ">
            <h5>Puntos de experiencia por usuario:</h5>
            <div class="mt-4">
            <?= ECharts::widget([
            'responsive' => true,
            'options' => [
                'style' => 'height: 400px;',
                
            ],
            'pluginEvents' => [
                'click' => [
                    new JsExpression('function (params) {console.log(params)}'),
                    new JsExpression('function (params) {console.log("ok")}')
                ],
                'legendselectchanged' => new JsExpression('function (params) {console.log(params.selected)}')
            ],
            'pluginOptions' => [
                'option' => [
                    'xAxis'=> [
                        'type'=>'category',
                        'data'=> $usuarios
                    ],
                    'yAxis'=> [
                        'type'=>'value',
                    ],
                    'series' => [
                        [
                            'data'=> $puntosexp,
                            'itemStyle'=> [
                                 'normal'=> [ 'color'=> '#175537' 
                                 ] 
                                ],
                            'type'=>  'bar',
                            'showBackground'=> true,
                            'backgroundStyle'=>  [
                                'color'=>  'rgba(23, 85, 55,0.2)'
                            ]
                        ],     
                    ]
                ]
            ]
            ]); ?>
            </div>
        </div>
    </div>
   

</div><!-- nivelchef -->

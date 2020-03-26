<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loans-index">

<div class="customGrid">
    


    <?= GridView::widget([
        'class' => 'allLoans',
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			[
				'class' => 'yii\grid\DataColumn', 
				'label' => 'User Name',
				'value' => function($data){ $user=new User();  $all=$user->find()->where('id='.$data->user_id)->all(); 
					return $all[0]->first_name." ".$all[0]->last_name;
				}
			],
            'amount',
            'interest',
            'duration',
            'start_date',
            'end_date',
            //'campaign',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
            
        ],
        
    ]); ?>
    
    </div>

<br/>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
			[
				"label" => "Age",
				"value" => function($data){
					$pCode=$data->personal_code;
					$dobY=substr($pCode,1,2);
					$dobM=substr($pCode,3,2);
					$dobD=substr($pCode,5,2);
					$d1 = new DateTime(date('y-m-d', time()));
					$d2 = new DateTime($dobY."-".$dobM."-".$dobD);

					$diff = $d2->diff($d1);

					return $diff->y;
				}
			],
            'email:email',
            'personal_code',
            'phone',
            'active',
            'dead',
            'lang',
        ],
    ]) ?>

</div>

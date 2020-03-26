<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Loans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loans-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList($allUsers) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput(['maxlength' => true, 'class' => 'datePicker']) ?>

<?= $form->field($model, 'end_date')->textInput(['maxlength' => true, 'class' => 'datePicker']) ?>

    <?= $form->field($model, 'campaign')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(["1" =>"Active", "0" => "Inactive"]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'button-orange button-large']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


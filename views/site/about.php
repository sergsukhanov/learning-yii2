<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Monstertest;
use app\models\Monster;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$selectedMonster = (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->name : '';
$monsterMap = ArrayHelper::map(Monster::find()->all(), 'name', 'name');
$monsterName = isset($_POST['monsterName']) ? $_POST['monsterName'] : false;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, in, reprehenderit. Commodi consectetur cumque, expedita facere itaque molestias nemo nihil odit officia reprehenderit repudiandae sapiente velit voluptas. Itaque, nostrum suscipit!
    </p>
    <p>
        <?php
        // Invalid Data
       /* $data = [
            'name' => 'Wolfman',
            'age' => 'invalidstring',
            'gender' => 'male'
        ];*/
        // Valid Data
        $data = [
            'name' => 'Wolfman',
            'age' => '32',
            'gender' => 'm'
        ];
        $validateMonster1 = new Monstertest($data);
        //$validateMonster1->save();
        // Example of deleting a record
        //$deleteMonster = MonsterTest::findOne(['name'=>'Wolfman'])->delete();
        // Examples of Yii Active Record finders
        $foundMonster1 = MonsterTest::findOne(1);
        $foundMonster2 = MonsterTest::findAll(['gender' => 'm']);
        ?>
    <hr>
    <p>
        Found Monster 1 Name: <?= $foundMonster1->name?><br>
        Found Monster 2 Count: <?= count($foundMonster2)?><br>
    </p>
    <hr>
    <p>
        Validate Monster 1 Errors: <pre><?= var_dump($validateMonster1->getErrors())?></pre>
    </p>
    <p><h3>Enter your favorite monster's name</h3>
    <?= Html::beginForm()?>
    <?= Html::radioList('monsterName', $selectedMonster, $monsterMap);?>
    <?= Html::input('submit', 'monsterSubmit', 'submit', ['id' => 'monsterSubmit']);?>
    <?= Html::endForm()?>
    </p>

    <?php if ($monsterName):?>
        <p class="monster-name">Your favorite monster's name is: <?= Html::encode($monsterName)?></p>
    <?php endif?>



    <code><?= __FILE__ ?></code>
</div>

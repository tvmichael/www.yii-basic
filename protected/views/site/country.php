<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h2>Countries</h2>
    <ul>
        <?php foreach ($countries as $country): ?>
            <li>
                <p>
                <?= Html::encode("{$country->code} ({$country->name})") ?>:
                <?= $country->population ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
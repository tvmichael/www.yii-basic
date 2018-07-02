<?php

/** @var $this yii\web\View
 *
 * $cE - string, current exchange = 1 or2
 * $cC - array, current currency = UAH, USD, RUR
 *
 * $course - array,
 * $currency - array,
 * $exchange - array,
 * $exchangeCurrency - array,
 *
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'PlayPay';
?>

<h1>FORM</h1>

<div class="pp-table">
    <div class="pp-table-cell">
        <?php $form = ActiveForm::begin([
            'id'=>'playpay-form',
            'action' => Url::toRoute(['site/exchange',]),
        ]);?>
        <div class="row">
        <?php
        $i = 0;
        $exchangeName = [];
        foreach ($cE as $itemE):
            foreach ($exchange as $item):
                if ($itemE == $item['id']):
                    $j=($i==0?'From':'To');
                    $card = 'card'.$j;
                    $sum = 'sum'.$j;
                    $exchangeName[$i] = $item['name'];
                    ?>
                    <div class="col-sm-5">
                        <h3><?php echo ($i==0?'Віддаєте':'Отримуєте');?></h3>
                        <div class="pp-form-currency">
                            <div class="pp-form-img">
                                <img src="images\playpay\<?php echo $item['image'];?>">
                            </div>
                            <div class="form-group">
                                <label for="<?php echo $card;?>" >Номер рахунку:</label>
                                <?php
                                echo MaskedInput::widget([
                                    'name'=> $card,
                                    'id'=> $card,
                                    'mask'=> '9999 9999 9999 9999',
                                ]);
                                ?>
                            </div>
                            <?php //echo $form->field($model, $card)->label('Номер рахунку:'); ?>
                            <div class="form-group">
                                <label for="<?php echo $sum;?>" >Номер рахунку:</label>
                                <?php
                                echo MaskedInput::widget([
                                    'name'=> $sum,
                                    'id'=> $sum,
                                    'clientOptions'=> [
                                        'alias'=>'decimal',
                                        'groupSeparator'=> ' ',
                                        'autoGroup'=> true,
                                    ],
                                ]);
                                ?>
                            </div>
                            <div class="pp-form-currency">
                                <?php foreach ($variantExchange[$itemE] as $v):
                                    if ($i==0) $hrefLink = $v.'-'.$cC[1];
                                        else $hrefLink =  $cC[0].'-'.$v;
                                    if($v == $cC[$i]) $className = 'pp-form-currency-active';
                                        else $className = '';
                                    ?>
                                    <a class="<?php echo $className;?>" href="<?php echo Url::toRoute([
                                        'site/playpay',
                                        'cE' => $cE[0].'-'.$cE[1],
                                        'cC' => $hrefLink,
                                    ]); ?>">
                                        <?php echo $v;?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    if($i == 0):?>
                    <div class="col-sm-2 text-center">
                        <div class="row">
                            <div class="col-sm-12 hidden-xs"></div>
                            <div class="col-sm-12 pp-form-revers">
                                <a href="<?php echo Url::toRoute([
                                        'site/playpay',
                                        'cE' => $cE[1].'-'.$cE[0],
                                    ]);?>">
                                    <img src="images\playpay\arrow.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    endif;
                endif;
            endforeach;
            $i++;
        endforeach;?>
        <div class="col-sm-12 text-center">
            <?php
            $currentExchange = null;
            foreach ($course as $c):
                if($c['base_ccy'] == $cC[0]){
                    //1
                    if($c['ccy'] ==$cC[1]){
                        $currentExchange = round(1/$c['buy'], 4);
                    }
                } else {
                    //0
                    if($c['ccy'] == $cC[0]){
                        $currentExchange = round($c['buy'], 4);
                    }
                }
            endforeach;
            ?>
            <p class="pp-form-course">
                Поточний курс: 1
                <?php echo $exchangeName[0];?>
                <?php echo $cC[0];?>
                =
                <span><?php echo $currentExchange;?></span>
                <?php echo $exchangeName[1];?>
                <?php echo $cC[1];?>
            </p>
            <p class="pp-form-commission">З комісією Приват24 UAH - <span>10</span> UAH</p>
            <div class="pp-form-submit">
                <button type="submit">
                    <img src="images\playpay\button-arrow.png">
                    Обміняти
                </button>
            </div>
        </div>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h2>array</h2>
            <pre>
                <?php
                echo '<br />cE:';
                print_r($cE);
                echo '<br />cC:';
                print_r($cC);
                echo '<br />variantExchange:';
                print_r($variantExchange);


                echo '<hr>';
                echo '<br />course:';
                print_r($course);
                echo '<br />currency:';
                print_r($currency);
                echo '<br />exchange:';
                print_r($exchange);
                echo '<br />exchangeCurrency:';
                print_r($exchangeCurrency);
                ?>
            </pre>
        </div>
    </div>
</div>

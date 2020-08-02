<?php

/* @var $this yii\web\View */

$this->title = 'Lesson 2';

use kartik\select2\Select2;
use kartik\select2\Select2Asset;
use yii\web\JsExpression;
use yii\bootstrap4\Modal;
use yii\web\View;
use yii\helpers\Html;

Select2Asset::register($this);
?>
<div class="site-select-2">
    <?=Html::tag('h3', 'Array category - JS')?>
    <div class="select-2">
        <div>
            <select class="js-example-basic-single-1"></select>
        </div>
        <br>
        <div>
            <select class="js-example-basic-single-2"></select>
        </div>
        <br>
        <div>
            <select class="js-example-basic-single-3"></select>
        </div>
    </div>
    <script>
        console.log('LOAD-1');
        let baseData1 = [
            {
                "id": 1,
                "text": "Option 1"
            },
            {
                "id": 2,
                "text": "Option 2 selected",
                "selected": true
            },
            {
                "id": 3,
                "text": "Option 3",
                "disabled": true
            }
        ];
        let baseData2 = [
            {
                "text": "Group 1",
                "children" : [
                    {
                        "id": 1,
                        "text": "Option 1.1"
                    },
                    {
                        "id": 2,
                        "text": "Option 1.2"
                    }
                ]
            },
            {
                "text": "Group 2",
                "children" : [
                    {
                        "id": 3,
                        "text": "Option 2.1"
                    },
                    {
                        "id": 4,
                        "text": "Option 2.2 selected",
                        "selected": true
                    }
                ]
            }
        ];
        let baseData3 = [
            {
                "text": "Group 1",
                "children" : [
                    {
                        "id": 1,
                        "text": "Option 1.1"
                    },
                    {
                        "id": 2,
                        "text": "Option 1.2",
                        "selected": true
                    }
                ]
            },
            {
                "text": "Group 2",
                "children" : [
                    {
                        "text": "Group 2-1",
                        "children" : [
                            {
                                "id": 21,
                                "text": "Option 21-1.2"
                            },
                            {
                                "id": 22,
                                "text": "Option 22-1.2"
                            },
                            {
                                "id": 23,
                                "text": "Option 23-1.2"
                            },
                            {
                                "text": "Group 2-2",
                                "children" : [
                                    {
                                        "id": 201,
                                        "text": "Option 2.2-1.3"
                                    },
                                    {
                                        "id": 202,
                                        "text": "Option 2.2-1.4",
                                    }
                                ]
                            }
                        ]
                    },
                    {
                        "text": "Group 2-2",
                        "children" : [
                            {
                                "id": 13,
                                "text": "Option 2-1.3"
                            },
                            {
                                "id": 14,
                                "text": "Option 2-1.4",
                            }
                        ]
                    }
                ]
            }
        ];

        document.addEventListener("DOMContentLoaded", function(event) {
            console.log('LOAD-2');
            console.log(event);

            $('.js-example-basic-single-1').select2({
                placeholder: 'Select an option',
                width:'100%',
                data: baseData1
            });

            $('.js-example-basic-single-2').select2({
                placeholder: 'Select an option',
                width:'100%',
                data: baseData2
            });

            $('.js-example-basic-single-3').select2({
                placeholder: 'Select an option',
                width:'100%',
                data: baseData3
            });
        });

    </script>
</div>





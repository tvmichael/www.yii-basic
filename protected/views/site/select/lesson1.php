<?php

/* @var $this yii\web\View */

$this->title = 'Lesson 1';

use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\bootstrap4\Modal;
use yii\web\View;

$format = <<< SCRIPT
    let numberValue = [];
    function jsTemplateResult(state,e,x ) {
        console.log('templateResult-1');
        console.log(state);
        console.log(e);
        console.log(x);
        return state.text;
    }
    function jsTemplateSelection(state, e, x) {
   
        console.log('templateSelection-2');
        console.log(state);
        console.log(e);
        console.log(x);
        
        
        if(!state.selected) 
        {
            state.text  = state.text + '#';
            state.id = '#' + state.id
        }
 
        return state.text;
    }
    function jsEscapeMarkup(state, e, x) {
        console.log('escapeMarkup-3');
        console.log(state);
        console.log(e);
        console.log(x);
        return state;
    }
    

    function jsTest(params, dataX, x) {
        console.log('matcher-4');
        console.log(params);
        console.log(dataX);
        console.log(x);
         
        if(!params.selected) 
        {
            params.term  = params.term + '#';
            params.id = '#' + params.id
        }
        
        return params;
    }   
    
    function jsTokenizer(params, data) {
        console.log('jsTokenizer-5');
        console.log(params);
        console.log(data);
      
        if(params.term!='')
        {   
            if(parseInt(params.term) == Number(params.term))
            {
                if(!numberValue.includes(params.term))
                {
                    params.term = '#' + params.term
                    console.log('::0');
                }
            }
        }
        console.log('::1');
        
        return params;
    }   
    
    function matchCustom(params, data) {
        console.log('matchCustom');
        console.log(params);
        console.log(data);
        
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
          return data;
        }
    
        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
          return null;
        }
    
        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
          var modifiedData = $.extend({}, data, true);
          modifiedData.text += ' (matched)';
    
          // You can return modified objects from here
          // This includes matching the `children` how you want in nested data sets
          return modifiedData;
        }
    
        // Return `null` if the term should not be displayed
    return null;
}
    
SCRIPT;
?>
<div class="site-index">
    <div class="jumbotron">
        <p class="lead"><<< SCRIPT</p>
    </div>
    <div class="body-content">
        <div class="select">
            <?php
            //        echo Select2::widget([
            //            'name' => 'state_2',
            //            'value' => '',
            //            'data' => ['1'=>1],
            //            'options' => ['multiple' => true, 'placeholder' => 'Select states ...']
            //        ]);


            // Templating example of formatting each list element
            $data = ['101'=>'11', '102'=>'12', '103'=>'13'];
            $escape = new JsExpression("function(m) { return m; }");
            $this->registerJs($format, View::POS_HEAD);


            echo '<label class="control-label">Provinces</label>';
            echo Select2::widget([
                'options' => [

                ],
                'id'=>'state_12',
                'name' => 'state_12',
                'data' => $data,
                'options' => [
                    'placeholder' => 'Select a state ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    //'templateResult' => new JsExpression('jsTemplateResult'),
                    //'templateSelection' => new JsExpression('jsTemplateSelection'),
                    //'escapeMarkup' => new JsExpression('jsEscapeMarkup'),
                    'allowClear' => true,
                    'tags' => true,
                    'tokenSeparators' => [';'],
                    //'matcher' => new JsExpression('jsTest'),
                    //'matcher' => new JsExpression('matchCustom'),
                    'tokenizer' => new JsExpression('jsTokenizer'),
                    //'resultsAdapter' => new JsExpression('jsTest'),
                ],
            ]);

            ?>
        </div>
    </div>
</div>





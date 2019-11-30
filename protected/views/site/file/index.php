<?php
use yii\helpers\Url;

$this->title = 'Load file';
?>
<div class="site-load-file">
    <div>
        <h2>Load file</h2>
    </div>
    <div class="body-content">
        <div class="row">
            <form id="form-send-file">
                <div class="form-group">
                    <label for="form-text">Email address</label>
                    <input type="text" name="form[text]" class="form-control" id="form-text" placeholder="Text">
                </div>
                <div class="form-group">
                    <label for="form-number">Password</label>
                    <input type="number" name="form[number]" class="form-control" id="form[number]" placeholder="Number">
                </div>
                <div class="form-group">
                    <label for="form-file">File input</label>
                    <input type="file" name="form[file]" id="form-file">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                $('.site-load-file form').submit(function () {
                    let url = '<?php echo Url::to(['/site/load-file'])?>';
                    console.log(this);

                    $.ajax({
                        url: url,
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function (data) {
                            alert(data);
                        }
                    });

                    return false;
                });
            });
        </script>
    </div>
</div>

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
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Загрузка файла (тест 1)</h4>
                        <form id="form-send-file-1">
                            <div class="form-group">
                                <label for="text-1">Text</label>
                                <input type="text" name="form[text]" class="form-control" id="text-1" placeholder="Text">
                            </div>
                            <div class="form-group">
                                <label for="number-1">Number</label>
                                <input type="number" name="form[number]" class="form-control" id="number-1" placeholder="Number">
                            </div>
                            <div class="form-group">
                                <label for="form-file">File input</label>
                                <input type="file" name="form[file]" id="file-1">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Check me out
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Загрузка файла (тест 2)</h4>
                        <form id="form-send-file-2">
                            <div class="form-group">
                                <label for="text-2">Text</label>
                                <input type="text" name="form[text]" class="form-control" id="text-2" placeholder="Text">
                            </div>
                            <div class="form-group">
                                <label for="number-2">Number</label>
                                <input type="number" name="form[number]" class="form-control" id="number-2" placeholder="Number">
                            </div>
                            <div class="form-group">
                                <label for="file-2">
                                    <div class="btn btn-warning">File input</div>
                                </label>
                                <input type="file" name="form[file]" id="file-2">
                                <div class="preview">
                                    <p>No files currently selected for upload</p>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Check me out
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                // ----------------------------------------------------------
                // загрузка файла на сервер
                $('.site-load-file #form-send-file-1').submit(function () {
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


                // --------------------------------------------------------------
                var form2 = document.getElementById('form-send-file-2'),
                    input = document.getElementById('file-2'),
                    preview = form2.querySelector('.preview');

                input.style.opacity = 0;
                input.addEventListener('change', updateImageDisplay);

                function updateImageDisplay(e) {

                    console.log(e);
                    console.log(this);
                    
                    while(preview.firstChild) {
                        preview.removeChild(preview.firstChild);
                    }

                    var curFiles = input.files;
                    if(curFiles.length === 0) {
                        var para = document.createElement('p');
                        para.textContent = 'No files currently selected for upload';
                        preview.appendChild(para);
                    } else {
                        console.log(curFiles);
                        var para = document.createElement('p');
                        para.textContent = curFiles[0].name;
                        preview.appendChild(para);
                    }
                }
            });
        </script>
    </div>
</div>

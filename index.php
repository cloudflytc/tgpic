<?php
/**
 * FILE_NAME: index.php
 */
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>tg图床</title>
    <?php include "static/view/head.html"; ?>
    <script crossorigin="anonymous" integrity="sha384-4RTCcfPYk9Ynbsqfb8mxO6fADyCH+Hd9RaSvW6xO9/icE1biaZ1uw/qCx2BdQB2n"
        src="https://lib.baomitu.com/bootstrap-fileinput/5.0.6/js/fileinput.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-LBn99WQzkTDqv2h5L8yIOywHmqQvPsnkZZwxIg5ikQnHP2WbXhrKdLsUF65TgANs"
        src="https://lib.baomitu.com/bootstrap-fileinput/5.0.6/js/plugins/piexif.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-X03VuPfgj8rBD0thhiay5PNx+BvsaJZFXcfIsgh259SWkOoVuZdnw+OykP2UG7lJ"
        src="https://lib.baomitu.com/bootstrap-fileinput/5.0.6/js/plugins/purify.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-cuvJnJFRVnh5sfgGvFy3Yq55ljj4zer/VhFoCJp9puj5+3GR8s4cT48vqPafhLtu"
        src="https://lib.baomitu.com/bootstrap-fileinput/5.0.6/themes/fas/theme.min.js"></script>
</head>
<body>
    <?php include "static/view/nav.html"; ?>
    <div class="container Hidove-main">
        <div class="page-header">
            <h1>图片上传</h1>
            <p>最大5M，一次性最多10张。</p>
        </div>
       

        <div class="post">
            <form enctype="multipart/form-data">
                <div class="form-group">
                    <input id="Hidove" type="file" name="image" multiple="true" class="file"
                        data-overwrite-initial="false" data-min-file-count="1" data-max-file-count="10"
                        accept="image/*">
                </div>
            </form>
        </div>
        <div id="showurl" style="display:none;">
            <ul id="navTab" class="nav nav-tabs">
                <li class="nav-item">
                    <a aria-selected="true" data-toggle="tab" role="tab" class="nav-link active" href="#urlcode">URL</a>
                </li>
                <li class="nav-item"><a aria-selected="false" data-toggle="tab" role="tab" class="nav-link"
                        href="#htmlcode">HTML</a></li>
                <li class="nav-item"><a aria-selected="false" data-toggle="tab" role="tab" class="nav-link"
                        href="#bbcode">BBCode</a></li>
                <li class="nav-item"><a aria-selected="false" data-toggle="tab" role="tab" class="nav-link"
                        href="#markdown">Markdown</a></li>
                <li class="nav-item"><a aria-selected="false" data-toggle="tab" role="tab" class="nav-link"
                        href="#markdownwithlink">Markdown with Link</a></li>
            </ul>
            <div id="navTabContent" class="tab-content">
                <div id="urlcode" class="tab-pane active show">
                    <div class="card card-default">
                        <div class="card-body Hidove-imageucode">
                            <table class="table table-bordered">
                                <tbody id="urlcodes">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="htmlcode" class="tab-pane">
                    <div class="card card-default">
                        <div class="card-body Hidove-imageucode">
                            <table class="table table-bordered">
                                <tbody id="htmlcodes">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="bbcode" class="tab-pane">
                    <div class="card card-default">
                        <div class="card-body Hidove-imageucode">
                            <table class="table table-bordered">
                                <tbody id="bbcodes">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="markdown" class="tab-pane">
                    <div class="card card-default">
                        <div class="card-body Hidove-imageucode">
                            <table class="table table-bordered">
                                <tbody id="markdowncodes">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="markdownwithlink" class="tab-pane">
                    <div class="card card-default">
                        <div class="card-body Hidove-imageucode">
                            <table class="table table-bordered">
                                <tbody id="markdowncodes2">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "static/view/foot.html"; ?>
<script src="static/js/upload.js"></script>
</body>
</html>

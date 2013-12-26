<?php

if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');
    
    if(isset($_POST['UploadCSV'])) {
        $upload = new Uploader();
        $form = new FormDesigner();
        $standalone = new StandAlone();

        $columnarray = array(CsvConvartID, Name, Discription, Mark);
        $completeupload = $upload->csv_upload('csvcontent', $columnarray);
        
        if(!$completeupload) {
            echo '<div class="container">';
                echo $standalone->msg('<strong>Well done!</strong> Successfully inserted the datas.');
                $filename = 'engineerinfo.csv';
                $uploadspath = UPLOADSPATH;
                $standalone->rmfile( $uploadspath, $filename);
                echo $standalone->smart_newline("<br/>");
                echo $standalone->error_msg('<strong>Oh snap!</strong> We deleted your uploaded file after insertion of data');
            echo '</div>';
        }
    } else {

        echo '<div class="container">
            <form action="csv" method="post" enctype="multipart/form-data" class="form-horizontal col-sm-7" role="form">
                <fieldset><legend>Upload Your CSV File</legend>
                    <div class="row">
                        <div class="col-xs-5">
                            <input type="file" name="csv" />
                        </div>
                        <div class="col-xs-6">
                            <input type="submit" name="UploadCSV" value="Save" class="btn btn-primary" />
                        </div>
                    </div>
                </fieldset>
            </form>
          </div>';
    }

    getPage('footer');
} else {
    $willow = new StandAlone();
    $redirect_to_login = $willow->redirect_to_login();
}
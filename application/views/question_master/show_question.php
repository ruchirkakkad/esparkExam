

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Demo</title>
        <link href="<?php echo base_url() ?>assets/frontend/css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/frontend/css/style.css" type="text/css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/jquery.countdown.css"> 

        <script src="<?php echo base_url() ?>assets/frontend/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery.plugin.js"></script> 
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery.countdown.js"></script>
    </head>

    <body>
        <div class="main">
            <div class="col-md-12 main_top"><img src="<?php echo base_url() ?>assets/frontend/images/logo.png" class="img-responsive" ></div><!--main_top end-->

            <div class="col-md-12 middle_part">
                <div class="main_content">
                    <!--                    <ul class="nav-tabs">
                    <?php
//                        $i = 1;
//                        foreach ($category_section as $key => $value)
//                        {
//                            if ($i == 1)
//                            {
//                                echo "<li class='active'><a class='sectionTab' data-sectionId='$i' data-toggle='tab'>$value->name</a></li>";
//                            }
//                            else
//                            {
//                                echo "<li><a class='sectionTab' data-sectionId='$i' data-toggle='tab'>$value->name</a></li>";
//                            }
//
//                            $i++;
//                        }
                    ?>
                                        </ul>-->
                    <div id="my-tab-content" class="tab-content">
                        <div id="tab1" class="tab-pane active">
                            <div class="col-md-9 mid_left">
                                <div class="col-md-12 insturction">
                                    <div class="col-md-6 qtype">Question Type: Multiple Selection Question</div>
                                    <div class="col-md-6 marks"></div>
                                </div>
                                <div class="col-md-12 question_no"></div>
                                <div class="col-md-12 question"><?php echo $questions[0]->question; ?></div>
                                <div class="col-md-12 option">
                                    <ul class="setOptions">
                                        <li><input type='radio' value='1' name='MCQanswer'><?php echo $questions[0]->option1; ?></li>
                                        <li><input type='radio' value='1' name='MCQanswer'><?php echo $questions[0]->option2; ?></li>
                                        <li><input type='radio' value='1' name='MCQanswer'><?php echo $questions[0]->option3; ?></li>
                                        <li><input type='radio' value='1' name='MCQanswer'><?php echo $questions[0]->option4; ?></li>
                                    </ul>
                                </div>                                
                            </div>

                        </div>
                    </div>
                </div>
            </div><!--middle_part end-->

            <div class="footer">
                <div >Copyright &COPY; eSparkbiz pvt ltd 2014.</div>
            </div>            
    </body>
</html>

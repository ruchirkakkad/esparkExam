<noscript> 
For full functionality of this site it is necessary to enable JavaScript.
Here are the <a href="http://www.enable-javascript.com/" target="_blank">
    instructions how to enable JavaScript in your web browser</a>.
</noscript>
<script language="JavaScript">
alert(confirmExit());
    window.onbeforeunload = confirmExit;
    function confirmExit() {
        return "You have attempted to leave this page. Are you sure?";
    }
</script>
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
                    <ul class="nav-tabs">
                        <?php
                        $i = 1;
                        foreach ($category_section as $key => $value)
                        {
                            if ($i == 1)
                            {
                                echo "<li class='active'><a class='sectionTab' data-sectionId='$i' data-toggle='tab'>$value->name</a></li>";
                            }
                            else
                            {
                                echo "<li><a class='sectionTab' data-sectionId='$i' data-toggle='tab'>$value->name</a></li>";
                            }

                            $i++;
                        }
                        ?>
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                        <div id="tab1" class="tab-pane active">
                            <div class="col-md-9 mid_left">
                                <div class="col-md-12 insturction">
                                    <div class="col-md-6 qtype">Question Type: Multiple Selection Question</div>
                                    <div class="col-md-6 marks"></div>
                                </div>
                                <div class="col-md-12 question_no"></div>
                                <div class="col-md-12 question"></div>
                                <div class="col-md-12 option">
                                    <ul class="setOptions">
                                        <!-- Options-->
                                    </ul>
                                </div>
                                <div class="col-md-12 button_box">
                                    <!--<input type="button" value="Mark for Review & Next">-->
                                    <!--<input type="button" value="Clear Response">-->
                                    <input type="submit" value="Save & Next" class="pull-right sveAndNext">
                                </div>
                            </div>

                            <div class="col-md-3 mid_right">
                                <div class="col-md-12 ex_name"><?php echo $this->session->userdata('users')['firstname'] . " " . $this->session->userdata('users')['lastname'] ?></div>
                                <div class="col-md-12 section_view" id="newPage"></div>
                                <div class="col-md-12 midright_question">Question Palette</div>
                                <div class="col-md-12 question_range">
                                    <ul class="question_palette">
                                    </ul>
                                </div>
                                <div class="col-md-12 midright_bottom">
                                    <span>Legends</span>
                                    <ul>
                                        <li><img src="<?php echo base_url() ?>assets/frontend/images/ans.png" class="img-responsive" alt=" ">Answered</li>
                                        <li><img src="<?php echo base_url() ?>assets/frontend/images/not_ans.png" class="img-responsive" alt=" ">Not Answered</li>
                                        <li><img src="<?php echo base_url() ?>assets/frontend/images/mark.png" class="img-responsive" alt=" ">Marked</li>
                                        <li><img src="<?php echo base_url() ?>assets/frontend/images/nv.png" class="img-responsive" alt=" ">Not Visited</li>
                                    </ul>
                                    <div class="submition text-center"><input class="submitTest" type="submit" value="SUBMIT"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--middle_part end-->

            <div class="footer">
                <div >Copyright &COPY; eSparkbiz pvt ltd 2014.</div>
            </div>
            <script type="text/javascript">


                jQuery(document).on('click', '.sveAndNext', function () {
                    //Finding Next Question-------------------------------------------------------
                    var QuestionIdcurrent = '';
                    var QuestionIdtoShow = '';
                    currentQuestionPalleteId = parseInt($(this).attr('data-questionId'));
                    nextQuestionPalleteId = currentQuestionPalleteId + 1;
                    $('.question_palette li').each(function () {
                        if (parseInt($(this).children('a').attr('data-questionnum')) == currentQuestionPalleteId)
                        {
                            QuestionIdcurrent = $(this).children('a').attr('data-questinid');
                        }
                        if (parseInt($(this).children('a').attr('data-questionnum')) == nextQuestionPalleteId)
                        {
                            QuestionIdtoShow = $(this).children('a').attr('data-questinid');
                        }
                    });
                    if (QuestionIdtoShow == '')
                    {
                        QuestionIdtoShow = QuestionIdcurrent;
                    }

                    //Save the selected answer---------------------------------------------------------
                    var selected = $("input[type='radio'][name='MCQanswer']:checked");
                    var answer = '';
                    if (selected.length > 0) {
                        answer = selected.val();
                    }
                    else
                    {
                        answer = 'not_answered';
                    }
//                    alert(answer);
                    //Ajax for saving the data and get the new question for display----------------------
                    $('.question_palette li').each(function () {
                        if ($(this).children('a').attr('data-questionnum') == currentQuestionPalleteId)
                        {
                            if (answer == 'not_answered')
                            {
                                $(this).children('a').attr('class', 'not_ans getQuestionHtml')
                            }
                            else
                            {
                                $(this).children('a').attr('class', 'ans getQuestionHtml')
                            }
                        }
                    });
                    jQuery.ajax({
                        url: '<?php echo base_url(); ?>exam/ajaxGetQuestionsData',
                        type: 'post',
                        data: {id: QuestionIdtoShow, Qid: QuestionIdcurrent, Ans: answer},
                        dataType: 'json',
                        success: function (data) {
                            if (currentQuestionPalleteId == $('.getQuestionHtml:last').attr('data-questionnum'))
                            {
                                $('.nav-tabs li').filter('.active').next().children().trigger('click');
                            }
                            else
                            {
                                checkedOption1 = "";
                                checkedOption2 = "";
                                checkedOption3 = "";
                                checkedOption4 = "";

                                if (data.ans == 1)
                                {

                                    checkedOption1 = "checked";
                                } else if (data.ans == 2)
                                {

                                    checkedOption2 = "checked";
                                } else if (data.ans == 3)
                                {
                                    checkedOption3 = "checked";
                                }
                                else if (data.ans == 4)
                                {
                                    checkedOption4 = "checked";
                                }



                                var options =
                                        "<li><input type='radio' " + checkedOption1 + " value='1' name='MCQanswer'>" + data.option1 + "</li>" +
                                        "<li><input type='radio' " + checkedOption2 + " value='2' name='MCQanswer'>" + data.option2 + "</li>" +
                                        "<li><input type='radio' " + checkedOption3 + " value='3' name='MCQanswer'>" + data.option3 + "</li>" +
                                        "<li><input type='radio' " + checkedOption4 + " value='4' name='MCQanswer'>" + data.option4 + "</li>";

                                $('.question').html(data.question);
                                $('.setOptions').html(options);
                                $('.question_no').html('Question No: ' + nextQuestionPalleteId);
                                $('.sveAndNext').attr('data-questionId', nextQuestionPalleteId);
                                lastQuestion();
                            }

                        }
                    });

                });
                var GQuestionData = "";
                function preventBack() {
                    window.history.forward();
                }
                setTimeout("preventBack()", 0);
                window.onunload = function () {
                };

                $(document).ready(function () {
                    $('#newPage').countdown({until: +6000, expiryUrl: '<?php echo base_url(); ?>exam/showQuestions',
                        description: 'Time Left'});

                    $('#newPageStart').click(function () {
                        shortly = new Date();
                        shortly.setSeconds(shortly.getSeconds() + 5.5);
                        $('#newPage').countdown('option', {until: shortly});
                    });
                });

                jQuery(document).on('click', '.getQuestionHtml', function () {
                    var id = $(this).attr('data-questinId');

                    var Question_number = $(this).attr('data-questionNum');
                    var Qid = $(this).attr('data-questionnum');

                    jQuery.ajax({
                        url: '<?php echo base_url(); ?>exam/ajaxGetQuestionsData',
                        type: 'post',
                        data: {id: id, Qid: Qid},
                        dataType: 'json',
                        complete: function () {
                            setTimeout(function () {
                                alert(answer);
                                $('.question_palette li').each(function () {
                                    if ($(this).children('a').attr('data-questionnum') == Qid)
                                    {
                                        if (answer == 'not_answered')
                                        {
                                            $(this).children('a').attr('class', 'not_ans getQuestionHtml')
                                        }
                                        else
                                        {
                                            $(this).children('a').attr('class', 'ans getQuestionHtml')
                                        }
                                    }
                                });
                            }, 1000);
                        },
                        success: function (data) {
                            checkedOption1 = "";
                            checkedOption2 = "";
                            checkedOption3 = "";
                            checkedOption4 = "";

                            if (data.ans == 1)
                            {

                                checkedOption1 = "checked";
                            } else if (data.ans == 2)
                            {

                                checkedOption2 = "checked";
                            } else if (data.ans == 3)
                            {
                                checkedOption3 = "checked";
                            }
                            else if (data.ans == 4)
                            {
                                checkedOption4 = "checked";
                            }

                            var options =
                                    "<li><input type='radio' " + checkedOption1 + " value='1' name='MCQanswer'>" + data.option1 + "</li>" +
                                    "<li><input type='radio' " + checkedOption2 + " value='2' name='MCQanswer'>" + data.option2 + "</li>" +
                                    "<li><input type='radio' " + checkedOption3 + " value='3' name='MCQanswer'>" + data.option3 + "</li>" +
                                    "<li><input type='radio' " + checkedOption4 + " value='4' name='MCQanswer'>" + data.option4 + "</li>";

                            $('.question').html(data.question);
                            $('.setOptions').html(options);
                            $('.question_no').html('Question No: ' + Question_number);
                            $('.sveAndNext').attr('data-questionId', Question_number);
                            lastQuestion();

                            var selected = $("input[type='radio'][name='MCQanswer']:checked");
                            var answer = '';
                            if (selected.length > 0) {
                                answer = selected.val();
                            }
                            else
                            {
                                answer = 'not_answered';
                            }
                        }
                    });
                });

                jQuery(document).on('click', '.sectionTab', function () {
                    var id = $(this).attr('data-sectionId');

                    var htmlPalette = '';
                    var questionCounter = 1;
                    jQuery.ajax({
                        url: '<?php echo base_url(); ?>exam/ajaxGetQuestionsPalette',
                        type: 'post',
                        data: {id: id},
                        dataType: 'json',
                        success: function (data) {
                            GQuestionData = data;
                            var obj = data;
                            //alert(obj);
                            jQuery.each(obj['questions'], function (i, val) {

                                var quesID = obj['questions'][i].id
//                                alert(quesID)
                                var className = obj['flags'][quesID];

                                htmlPalette += "<li><a href='javascript:void(0)' class='" + className + " getQuestionHtml' data-questinId='" + obj['questions'][i].id + "' data-questionNum='" + questionCounter + "'>" + questionCounter + "</a></li>";
                                questionCounter++;
                            });

                            $('.question_palette').html(htmlPalette);

                            jQuery('.getQuestionHtml:first').trigger('click');
                        }
                    });
                });

                jQuery('.sectionTab:first').trigger('click');

                function lastQuestion()
                {
                    if ($('.nav-tabs li').filter('.active').children().text() == $('.nav-tabs li:last').children().text())
                    {
                        if ($('.getQuestionHtml:last').text() == $('.sveAndNext').attr('data-questionid'))
                        {
                            $('.sveAndNext').val('Save');
                        }
                        else
                        {
                            $('.sveAndNext').val('Save & Next');
                        }
                    }
                    else
                    {
                        $('.sveAndNext').val('Save & Next');
                    }
                }

                jQuery(document).on('click', '.submitTest', function () {
                    
                    jQuery.ajax({
                        url: '<?php echo base_url(); ?>exam/logout',
                        type: 'post',
                        data: {},                        
                        success: function (data) {
                            alert('Your Exam is Submitted');
                           $('.middle_part').html('You successfully completed the exam');
                        }
                    });
                });
            </script>
    </body>
</html>

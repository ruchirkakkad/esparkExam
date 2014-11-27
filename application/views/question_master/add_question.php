<link href="<?php echo base_url(); ?>assets/summernote.css" type="text/css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.summernote').summernote();
    });
</script>
<div id="main">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <div class="box-title">
                        <h3><i class="icon-edit"></i> Questions</h3>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal" method="POST" action="<?php echo (isset($edit)) ? base_url()."question_master/post_edit_question/".$questions[0]->id : base_url().'question_master/post_add_question'; ?>">
                            <div class="control-group">
                                <label class="control-label" for="select">Category</label>
                                <div class="controls">
                                    <select class="input-large" id="select" name="category_id">
                                        <?php
                                        foreach ($category as $key => $value)
                                        {
                                            $selected = (isset($edit) && $value->id == $questions[0]->category_id) ? 'selected' : '';
                                            echo "<option value='$value->id' $selected >$value->name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textarea">Question</label>
                                <div class="controls">
                                    <div class="box-content nopadding">
                                        <textarea class="summernote" id="question" name="question"><?php echo (isset($edit)) ? $questions[0]->question : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textfield">Option 1</label>
                                <div class="controls">
                                    <textarea class="summernote" id="option1" name="option1"><?php echo (isset($edit)) ? $questions[0]->option1 : '' ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textfield">Option 2</label>
                                <div class="controls">
                                    <textarea class="summernote" id="option2" name="option2"><?php echo (isset($edit)) ? $questions[0]->option2 : '' ?></textarea>                                                                 
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textfield">Option 3</label>
                                <div class="controls">
                                    <textarea class="summernote" id="option3" name="option3"><?php echo (isset($edit)) ? $questions[0]->option3 : '' ?></textarea>                                   
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textfield">Option 4</label>
                                <div class="controls">
                                    <textarea class="summernote" id="option4" name="option4"><?php echo (isset($edit)) ? $questions[0]->option4 : '' ?></textarea>                               
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textfield">Option 5</label>
                                <div class="controls">
                                    <textarea class="summernote" id="option5" name="option5"><?php echo (isset($edit)) ? $questions[0]->option5 : '' ?></textarea>                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textfield">Option 6</label>
                                <div class="controls">
                                    <textarea class="summernote" id="option6" name="option6"><?php echo (isset($edit)) ? $questions[0]->option6 : '' ?></textarea>                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select">Answer</label>
                                <div class="controls">
                                    <select class="input-large" id="answer" name="answer">
                                        <option value="1" <?php echo (isset($edit) && '1' == $questions[0]->answer) ? 'selected' : ''; ?> >Option-1</option>                                        
                                        <option value="2" <?php echo (isset($edit) && '2' == $questions[0]->answer) ? 'selected' : ''; ?> >Option-2</option>                                        
                                        <option value="3" <?php echo (isset($edit) && '3' == $questions[0]->answer) ? 'selected' : ''; ?> >Option-3</option>                                        
                                        <option value="4" <?php echo (isset($edit) && '4' == $questions[0]->answer) ? 'selected' : ''; ?> >Option-4</option>                                        
                                        <option value="5" <?php echo (isset($edit) && '5' == $questions[0]->answer) ? 'selected' : ''; ?> >Option-5</option>                                        
                                        <option value="6" <?php echo (isset($edit) && '6' == $questions[0]->answer) ? 'selected' : ''; ?> >Option-6</option>                                        
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="select">Answer</label>
                                <div class="controls">
                                    <select class="input-large" id="moderator_level" name="moderator_level">
                                        <option value="1" <?php echo (isset($edit) && 'easy' == $questions[0]->moderator_level) ? 'selected' : ''; ?> >easy</option>                                        
                                        <option value="2" <?php echo (isset($edit) && 'medium' == $questions[0]->moderator_level) ? 'selected' : ''; ?> >medium</option>                                        
                                        <option value="3" <?php echo (isset($edit) && 'hard' == $questions[0]->moderator_level) ? 'selected' : ''; ?> >hard</option>                                        
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="status" value="1" <?php echo (isset($edit) && '1' == $questions[0]->status) ? 'checked' : ''; ?>> Enable
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="status" value="0" <?php echo (isset($edit) && '0' == $questions[0]->status) ? 'checked' : ''; ?>> Disable
                                    </label>                                    
                                </div>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Save changes</button>
                                <button class="btn" type="button">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
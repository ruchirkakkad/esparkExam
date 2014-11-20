
<?php if($que_data[0]->que_type == 'checkbox') {?>
<script type="text/javascript">

jQuery(document).ready(function() 
       {             
          document.getElementById("mcqbox").style.display="none";          
       });
</script>
<?php } elseif($que_data[0]->que_type == 'mcqbox') {?>
<script type="text/javascript">

jQuery(document).ready(function() 
       {        
          document.getElementById("chkbox").style.display="none";          
       });
</script>
<?php } else {?>
<script type="text/javascript">

jQuery(document).ready(function() 
       {   
          document.getElementById("chkbox").style.display="none";          
          document.getElementById("mcqbox").style.display="none";          
       });
</script>
<?php } ?>
       


<script type="text/javascript">

function addCboxes()
{ var  txtbox = "";
     txtbox = '<br/><br/><br/>Option : <input type="text" name="chkboxname[]" id="chkboxname[]" class="longinput" style="width: 30%;"/>&nbsp; &nbsp; Points : <select name="chkboxval[]" id="chkboxval[]" class="mydropbox" style="width: 100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>';    
    jQuery('#chkboxSpan').append(txtbox);
}

function addMboxes()
{   
   var txtbox = "";
    txtbox = '<br/><br/><br/>Option : <input type="text" name="mcqboxname[]" id="mcqboxname" class="longinput" style="width: 30%;"/>&nbsp; &nbsp; Points : <select name="mcqboxval[]" id="mcqboxval[]" class="mydropbox" style="width: 100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>';    
    jQuery('#mcqboxSpan').append(txtbox);
}
function addCboxes1()
{ var  txtbox = "";
     txtbox = '<span class="field test">Option : <input type="text" name="chkboxname[]" id="chkboxname[]" class="longinput" style="width: 30%;"/>&nbsp; &nbsp; Points : <select name="chkboxval[]" id="chkboxval[]" class="mydropbox" style="width: 100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select><span/>';    
    jQuery('#chkboxSpan1').append(txtbox);
}

function addMboxes1()
{   
   var txtbox = "";
    txtbox = '<span class="field test">Option : <input type="text" name="mcqboxname[]" id="mcqboxname" class="longinput" style="width: 30%;"/>&nbsp; &nbsp; Points : <select name="mcqboxval[]" id="mcqboxval[]" class="mydropbox" style="width: 100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></span>';    
    jQuery('#mcqboxSpan1').append(txtbox);
}

function removeCboxes()
{
    jQuery('#chkbox span:last').remove();
}

function showDivTarea()
{
    document.getElementById("chkbox").style.display="none";          
    document.getElementById("mcqbox").style.display="none";
}

function showDivCbox()
{
    document.getElementById("chkbox").style.display="block";          
    document.getElementById("mcqbox").style.display="none";
}

function showDivMbox()
{
    document.getElementById("mcqbox").style.display="block";
    document.getElementById("chkbox").style.display="none";
}

</script>



<div class="vernav iconmenu">
    	<ul>
            <li><a href="<?php echo base_url(); ?>assessments/" class="inbox">List Of Forms</a></li>
            <li class="current"><a href="<?php echo base_url(); ?>assessments/question/" class="drafts">Add Question</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->

<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Edit Question OR <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="color: #C23A3A;">Cancel Editing</a></h1>
            <span class="pagedesc">Edit A Question For A Specific Assessment Form.</span><br/>
            <?php 
            if(isset($this->session->userdata['register_session']))
            {              
            ?>
            <span class="pagedesc" style="color:#F0882C;font-size: 15px;margin-top: 5px;">
                <?php 
                    echo $this->session->userdata['register_session']['admin_message'];
                    $this->session->unset_userdata('register_session');
                ?>
            </span>
            <?php 
            }
            ?>
        </div><!--pageheader-->         
      
        <div id="contentwrapper" class="contentwrapper"> 
            
            <div id="validation" class="subcontent">
            	
                <form accept-charset="utf-8" method="post" action="<?php echo base_url();?>assessments/editquestion/<?php echo $que_data[0]->que_id; ?>" 
                   name="registerForm" id="addque" class="stdform stdform2">            
                    
                        <p>
                            <label>Select Form : </label>
                                <span class="field">
                                    <select name="formname" id="formname">                                        
                                        <option value="1" <?php if($que_data[0]->assessment_id == '1') echo "selected='selected'"; ?> >CC Depression Assessment</option>
                                        <option value="2" <?php if($que_data[0]->assessment_id == '2') echo "selected='selected'"; ?> >CC Financial Assessment</option>
                                        <option value="3" <?php if($que_data[0]->assessment_id == '3') echo "selected='selected'"; ?> >CC Matters of the Heart Assessment</option>
                                        <option value="4" <?php if($que_data[0]->assessment_id == '4') echo "selected='selected'"; ?> >CC Perfectionism Assessment</option>
                                    </select>
                                </span>
                        </p>
                    
                    	<p>
                            <label>Question Name : </label>
                            <span class="field"><input type="text" name="quename" id="quename" class="longinput" value="<?php echo $que_data[0]->que_name; ?>" /></span>
                        </p>
                        
                        <p>
                            <label>Input Type : </label>
                                <span class="field">
                                    <span>Open Ended Question</span>
                                        <input value="textarea" <?php if($que_data[0]->que_type == 'textarea') echo "checked='checked'"; ?>
                                               type="radio" id="rad1" class="longinput" name="quetype" onclick="showDivTarea();" style="width: 2%;"/>                                                                        
                                    <span style="margin-left: 20px;">Checkbox</span>
                                    <input value="checkbox" <?php if($que_data[0]->que_type == 'checkbox') echo "checked='checked'"; ?> 
                                           type="radio" id="rad2" class="longinput" name="quetype" onclick="showDivCbox();" style="width: 2%;"/>
                                    <span style="margin-left: 20px;">MCQ Question</span>
                                        <input value="mcqbox" <?php if($que_data[0]->que_type == 'mcqbox') echo "checked='checked'"; ?>
                                               type="radio" id="rad3" class="longinput" name="quetype" onclick="showDivMbox();" style="width: 2%;"/>
                                </span>
                       </p>
                       
                       <?php 
                       if($que_data[0]->que_type == 'checkbox')
                       {
                       ?>                       
                       <p id="chkbox" style="display: block;">
                                <label>Insert Checkbox Values : </label>
                                <span id ="chkboxSpan1">
                                <?php 
                                for($i=1 ; $i<(count($que_data)) ; $i++)
                                {
                                ?>                                
                                <span class="field test">
                                    Option : <input type="text" name="chkboxname[]" value="<?php echo $que_data[$i]->opt_name; ?>" id="chkboxname[]" class="longinput" style="width: 30%;"/>
                                    &nbsp; &nbsp; Points : <select name="chkboxval[]" id="chkboxval[]">
                                                                <option <?php if($que_data[$i]->opt_value == '0') echo "selected='selected'"; ?> value="0">0</option>
                                                                <option <?php if($que_data[$i]->opt_value == '1') echo "selected='selected'"; ?> value="1">1</option>
                                                                <option <?php if($que_data[$i]->opt_value == '2') echo "selected='selected'"; ?> value="2">2</option>
                                                                <option <?php if($que_data[$i]->opt_value == '3') echo "selected='selected'"; ?> value="3">3</option>
                                                                <option <?php if($que_data[$i]->opt_value == '4') echo "selected='selected'"; ?> value="4">4</option>
                                                                <option <?php if($que_data[$i]->opt_value == '5') echo "selected='selected'"; ?> value="5">5</option>
                                                           </select>
                                    <?php if($i == 1) {?>
                                    &nbsp; &nbsp; <input type="button" class="radius2" value="Add More List Items" 
                                           style="background: green;border: red;color: white;height: 30px;font-size: 14px;cursor: pointer" 
                                           onclick="addCboxes1();"/>
                                    <?php } ?>
                                </span>                                
                                <?php }?>
                                </span>             
                       </p>
                       <?php } 
                       else {
                       ?>
                       <p id="chkbox" style="display:none;">
                                <label>Insert Checkbox Values : </label>
                                <span id="chkboxSpan" class="field test">
                                    Option : <input type="text" name="chkboxname[]" id="chkboxname[]" class="longinput" style="width: 30%;"/>
                                    &nbsp; &nbsp; Points : <select name="chkboxval[]" id="chkboxval"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>                                                                                 
                                    &nbsp; &nbsp; <input type="button" class="radius2" value="Add More List Items" 
                                           style="background: green;border: red;color: white;height: 30px;font-size: 14px;cursor: pointer" 
                                           onclick="addCboxes();"/>                                   
                                </span>

                       </p>
                       <?php } ?>
                       <?php 
                       if($que_data[0]->que_type == 'mcqbox')
                       {
                       ?> 
                       
                       <p id="mcqbox" style="display: block;">
                                <label>Insert MCQ Values : </label>
                                <span id ="mcqboxSpan1">
                                <?php 
                                for($i=1 ; $i<(count($que_data)) ; $i++)
                                {
                                ?>                                
                                <span class="field test">
                                    Option : <input type="text" name="mcqboxname[]" value="<?php echo $que_data[$i]->opt_name; ?>" id="mcqboxname" class="longinput" style="width: 30%;"/>
                                    &nbsp; &nbsp; Points : <select name="mcqboxval[]" id="mcqboxval">
                                                                <option <?php if($que_data[$i]->opt_value == '0') echo "selected='selected'"; ?> value="0">0</option>
                                                                <option <?php if($que_data[$i]->opt_value == '1') echo "selected='selected'"; ?> value="1">1</option>
                                                                <option <?php if($que_data[$i]->opt_value == '2') echo "selected='selected'"; ?> value="2">2</option>
                                                                <option <?php if($que_data[$i]->opt_value == '3') echo "selected='selected'"; ?> value="3">3</option>
                                                                <option <?php if($que_data[$i]->opt_value == '4') echo "selected='selected'"; ?> value="4">4</option>
                                                                <option <?php if($que_data[$i]->opt_value == '5') echo "selected='selected'"; ?> value="5">5</option>
                                                           </select>
                                    <?php if($i == 1) {?>
                                    &nbsp; &nbsp; <input type="button" class="radius2" value="Add More List Items" 
                                           style="background: green;border: red;color: white;height: 30px;font-size: 14px;cursor: pointer" 
                                           onclick="addMboxes1();"/>
                                    <?php } ?>
                                </span>                                
                                <?php }?>
                                </span>
                       </p>
                       <?php } else {?>
                       
                       <p id="mcqbox" style="display:none;">
                                <label>Insert MCQ Values : </label>
                                <span id ="mcqboxSpan" class="field test">
                                    Option : <input type="text" name="mcqboxname[]" id="mcqboxname" class="longinput" style="width: 30%;"/>
                                    &nbsp; &nbsp; Points : <select name="mcqboxval[]" id="mcqboxval"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
                                    &nbsp; &nbsp; <input type="button" class="radius2" value="Add More List Items" 
                                           style="background: green;border: red;color: white;height: 30px;font-size: 14px;cursor: pointer" 
                                           onclick="addMboxes();"/>
                                </span>
                       </p>
                       
                       <?php }?>
                       
                       <p>
                            <label>Question Status : </label>
                                <span class="field">
                                    <select name="questatus" id="questatus">                                        
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>                                        
                                    </select>
                                </span>
                       </p>
                        
                       <p class="stdformbutton">
                                <button class="submit radius2" name="editquestion_btn">Update Question</button>
                                <input type="reset" class="reset radius2" value="Reset Button" />
                       </p>
                       
                    </form>

            </div><!--subcontent-->
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

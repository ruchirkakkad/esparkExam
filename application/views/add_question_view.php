<script type="text/javascript">
var addMboxID = 1;
var addChkboxID = 1;
jQuery(document).ready(function() 
       {        
          document.getElementById("chkbox").style.display="none";          
          document.getElementById("mcqbox").style.display="none";          
       });

function addCboxes()
{
    var  txtbox = "";
    var id = addChkboxID;   
    txtbox = '<span id="chkboxspan_'+id+'"><br/><br/>Option : <input type="text" name="chkboxname[]" id="chkboxname[]" class="longinput" style="width: 30%;"/>&nbsp; &nbsp; Points : <select name="chkboxval[]" id="chkboxval[]" class="mydropbox" style="width: 100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>&nbsp;&nbsp;<span style="margin-left:10px;padding:5px 8px;color:#FFF;cursor:pointer;background:red;" onclick="removeThisCbox('+id+');">remove</span><span>';    
    jQuery('#chkboxSpan').append(txtbox);
    addChkboxID++;
}

function addMboxes()
{   
   var id = addMboxID;   
   var txtbox = "";
    txtbox = '<span id="mcqboxspan_'+id+'"><br/><br/>Option : <input type="text" name="mcqboxname[]" id="mcqboxname_'+id+'" class="longinput" style="width: 30%;"/>&nbsp; &nbsp; Points : <select name="mcqboxval[]" id="mcqboxvalsel_'+id+'" class="mydropbox" style="width: 100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>&nbsp;&nbsp;<span style="margin-left:10px;padding:5px 8px;color:#FFF;cursor:pointer;background:red;" onclick="removeThis('+id+');">remove</span><span>';    
    jQuery('#mcqboxSpan').append(txtbox);
    addMboxID++;
}

function removeThis(id)
{
    var removeID1 = '#mcqboxspan_'+id;   
    jQuery(""+removeID1).html("");    
}

function removeThisCbox(id)
{
    var removeID1 = '#chkboxspan_'+id;   
    jQuery(""+removeID1).html("");    
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
            <h1 class="pagetitle">Add A Question</h1>
            <span class="pagedesc">Add A Question For A Specific Assessment Form.</span><br/>
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
            	
                <form accept-charset="utf-8" method="post" action="<?php echo base_url();?>assessments/addquestion/" 
                   name="registerForm" id="addque" class="stdform stdform2">            
                    
                        <p>
                            <label>Select Form : </label>
                                <span class="field">
                                    <select name="formname" id="formname">                                        
                                        <option value="1">CC Depression Assessment</option>
                                        <option value="2">CC Financial Assessment</option>
                                        <option value="3">CC Matters of the Heart Assessment</option>
                                        <option value="4">CC Perfectionism Assessment</option>
                                    </select>
                                </span>
                        </p>
                    
                    	<p>
                            <label>Question Name : </label>
                            <span class="field"><input type="text" name="quename" id="quename" class="longinput" /></span>
                        </p>
                        
                        <p>
                            <label>Input Type : </label>
                                <span class="field">
                                    <span>Open Ended Question</span>
                                        <input value="textarea" type="radio" id="rad1" class="longinput" name="quetype" onclick="showDivTarea();" checked="checked" style="width: 2%;"/>                                                                        
                                    <span style="margin-left: 20px;">Checkbox</span>
                                        <input value="checkbox" type="radio" id="rad2" class="longinput" name="quetype" onclick="showDivCbox();" style="width: 2%;"/>
                                    <span style="margin-left: 20px;">MCQ Question</span>
                                        <input value="mcqbox" type="radio" id="rad3" class="longinput" name="quetype" onclick="showDivMbox();" style="width: 2%;"/>
                                </span>
                       </p>
                       
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
                       <p id="mcqbox" style="display:none;">
                                <label>Insert MCQ Values : </label>
                                <span id ="mcqboxSpan" class="field test">
                                    Option : <input type="text" name="mcqboxname[]" id="mcqboxname_0" class="longinput" style="width: 30%;"/>
                                    &nbsp; &nbsp; Points : <select name="mcqboxval[]" id="mcqboxvalsel_0"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
                                    &nbsp; &nbsp; <input type="button" class="radius2" value="Add More List Items" 
                                           style="background: green;border: red;color: white;height: 30px;font-size: 14px;cursor: pointer" 
                                           onclick="addMboxes();"/>
                                </span>
                       </p>
                       
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
                                <button class="submit radius2" name="addquestion_btn">Add Question</button>
                                <input type="reset" class="reset radius2" value="Reset Button" />
                       </p>
                       
                    </form>

            </div><!--subcontent-->
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->
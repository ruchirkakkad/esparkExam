<script type="text/javascript">
jQuery(document).ready(function() 
       {   
           
            jQuery(".fancybox").fancybox({
            fitToView: false,
            autoSize: false,
            autoDimensions: false,
            width: 520,
            height:150
        });          
 });
</script>

<div class="centercontent tables">

    <div class="pageheader notab">
        <h1 class="pagetitle">Admin Emails</h1>
        <span class="pagedesc">Below email-ID's will get notified on each new user registration & on each submitted assessment form!!!</span><br/>                
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
            	
                <form accept-charset="utf-8" method="post" action="<?php echo base_url();?>adminmanagement/addemailids/" 
                   name="registerForm" id="addque" class="stdform stdform2">            
                    
                        <p>
                            <label>Admin Email : </label>
                            <span class="field">
                                <input type="text" name="admin1_email" id="admin1_email" class="longinput" style="width: 50%;" required />
                            </span>
                        </p>                        
                        
                        
                        <p class="stdformbutton">
                            <button class="submit radius2" name="addquestion_btn">Add Email</button>
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>
                       
                    </form>
                
                    <div class="contenttitle2">
                        <h3>Admin Email Table</h3>
                    </div><!--contenttitle-->
            
                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                        <colgroup>
                            <col class="con0" />
                            <col class="con1" />
                            <col class="con0" />                           
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="head0">No</th>
                                <th class="head1">Email Id</th>
                                <th class="head0">Actions</th>                            
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="head0">No</th>
                                <th class="head1">Email Id</th>
                                <th class="head0">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody> 
                            <?php 
                            $count = 1;
                            if(!empty($emailids))
                            {
                                foreach ($emailids as $admin_emails) 
                                    {                            
                            ?>
                                    <tr class="gradeX">                              
                                        <td class="center"><?php echo $count; $count++; ?></td>
                                        <td class="center"><?php echo $admin_emails->email_address; ?></td>
                                        <td class="center">
                                            <a href="#updatebox" class="fancybox" style="background: #FF6600;padding: 5px 10px;color: #fff;border-radius: 3px;" onclick="updateID(<?php echo $admin_emails->id; ?>);">
                                                Update ID
                                            </a> 
                                            <a href="<?php echo base_url(); ?>adminmanagement/deleteemail/<?php echo $admin_emails->id; ?>" style="background: #930B0B;padding: 5px 10px;color: #fff;border-radius: 3px;margin-left: 5px;" onClick="return confirm('Are you sure you want to delete this ID?')">delete ID</a>
                                        </td>                            
                                    </tr>                     
                            <?php 
                                    }
                            }        
                            ?>
                        </tbody>
                    </table>                

            </div><!--subcontent-->
        
        </div><!--contentwrapper-->    
        
    </div><!-- centercontent -->

</div><!--bodywrapper-->

<script type="text/javascript">

function updateID(id)

    {   
              jQuery.ajax({
                url: "<?php echo base_url(); ?>adminmanagement/getupdatedata",
                type: "POST",
                data: {u_id: id},
                dataType: "html",
                async: false,
                success: function(ch)
                {
                    document.getElementById('admin1_email_updated').value = ch;
                    document.getElementById('hidden_id').value = ch;
                }
            });
        }

</script>


<span id="updatebox" style="display: none;width: 600px;">
<form accept-charset="utf-8" method="post" action="<?php echo base_url();?>adminmanagement/updateemail/" 
name="update_email" id="addque" class="stdform stdform2">                            
      <p>
            <label>Admin Email : </label>
                <span class="field">
                    <input type="text" name="admin1_email_updated" id="admin1_email_updated" class="longinput" style="width: 96%;" required />
                </span>
      </p>                        
       
      <input type="hidden" name="hidden_id" id="hidden_id" value=""/>
                        
      <p class="stdformbutton">
             <button class="submit radius2" name="addquestion_btn">Update Email</button>
             <input type="reset" class="reset radius2" value="Reset Button" />
      </p>
                       
</form>
</span>
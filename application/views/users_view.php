<script type="text/javascript">
jQuery(document).ready(function() 
       {        
          jQuery('.fancybox').fancybox();
          jQuery('#tbox').hide();         
          jQuery('#prd_add').hide();         
       });
</script>

<div class="vernav iconmenu">
    	<ul>
            <li class="current"><a href="<?php echo base_url(); ?>users/" class="inbox">List Of Users</a></li>            
            <li><a href="<?php echo base_url(); ?>users/adduser" class="inbox">Add User</a></li>            
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->


<div class="centercontent tables">

    <div class="pageheader notab">
        <h1 class="pagetitle">Registered Users</h1>
        <span class="pagedesc">This is a list of registered users</span><br/>        
        <?php 
            if(isset($this->session->userdata['update_msg_session']))
            {              
            ?>
            <span class="pagedesc" style="color:#F0882C;font-size: 15px;margin-top: 5px;">
                <?php 
                    echo $this->session->userdata['update_msg_session']['admin_message'];
                    $this->session->unset_userdata('update_msg_session');
                ?>
            </span>
            <?php 
            }
            ?>

    </div><!--pageheader-->

    <div id="contentwrapper" class="contentwrapper">            

        <div class="contenttitle2">
            <h3>User Table</h3>
        </div><!--contenttitle-->
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
            <colgroup>
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
            </colgroup>
            <thead>
                <tr>
                    <th class="head0">No</th>
                    <th class="head1">User Name</th>
                    <th class="head0">Email</th>
                    <th class="head1">Allow Assessment</th>
                    <th class="head0">Actions</th>
                    <th class="head1">View History</th>
                    <th class="head0">Last Login</th>                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0">No</th>
                    <th class="head1">User Name</th>
                    <th class="head0">Email</th>
                    <th class="head1">Allow Assessment</th>
                    <th class="head0">Actions</th>
                    <th class="head1">View History</th>
                    <th class="head0">Last Login</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $count = 1;
                foreach ($user_data as $md) {
                    ?>  
                    <tr class="gradeX">
                        <td><? echo $count;
                $count++;
                    ?></td>
                        <td><?php echo $md->user_name . " " . $md->user_lname; ?></td>
                        <td><?php echo $md->user_email; ?></td>
                        <td class="center">
                            <?php
                            if ($md->is_allow_to_assist == '0') {
                                ?>
                                <div class="btntestOff" id="assist_<?php echo $md->user_id; ?>" onclick="changeState('<?php echo $md->user_id; ?>', '<?php echo $md->is_allow_to_assist; ?>');"></div>
                                <?php
                            } else {
                                ?>
                                <div class="btntestOn" id="assist_<?php echo $md->user_id; ?>" onclick="changeState('<?php echo $md->user_id; ?>', '<?php echo $md->is_allow_to_assist; ?>');"></div>
                                <?php
                            }
                            ?>
                        </td>
                        <td class="center">
                            <a href="#userbox" class='fancybox' style="background: #FF6600;padding: 5px 10px;color: #fff;border-radius: 3px;" onclick="editUser('<?php echo $md->user_id; ?>');">edit</a> 
                            <?php if($md->is_active == '1') { ?>
                            <a href="<?php echo base_url(); ?>users/disable/<?php echo $md->user_id; ?>" style="background: #067B00;padding: 5px 10px;color: #fff;border-radius: 3px;">enabled</a>
                            <?php } else { ?>
                            <a href="<?php echo base_url(); ?>users/enable/<?php echo $md->user_id; ?>" style="background: #930B0B;padding: 5px 10px;color: #fff;border-radius: 3px;">disabled</a>
                            <?php } ?>
                            
                        </td>
                        <td>
                            <a href="<?php echo base_url(); ?>userhistory/user/<?php echo $md->user_id; ?>" style="background: #FF6600;padding: 5px 10px;color: #fff;border-radius: 3px;">View History</a> 
                        </td> 
                        <td class="center"><?php echo $md->last_login; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>               


    </div><!--contentwrapper-->

</div><!-- centercontent -->


</div><!--bodywrapper-->

<script type="text/javascript">


				    jQuery(document).ready(function(){
                                      jQuery(".dataTables_length select").change(function(){
                                        jQuery('.btntestOff').iphoneSwitch("on", function() {
                                        }, function() {
                                        },
                                                {
                                                    switch_on_container_path: '<?php echo base_url(); ?>assets/js/toggle/iphone_switch_container_off.png'
                                                });

                                        jQuery('.btntestOn').iphoneSwitch("off", function() {
                                        }, function() {
                                        },
                                                {
                                                    switch_on_container_path: '<?php echo base_url(); ?>assets/js/toggle/iphone_switch_container_off.png'
                                                });
                                        });
                                    });
                                    
                                    jQuery(document).ready(function(){
                                      jQuery("#dyntable_paginate span").click(function(){                                          
                                        jQuery('.btntestOff').iphoneSwitch("on", function() {
                                        }, function() {
                                        },
                                                {
                                                    switch_on_container_path: '<?php echo base_url(); ?>assets/js/toggle/iphone_switch_container_off.png'
                                                });

                                        jQuery('.btntestOn').iphoneSwitch("off", function() {
                                        }, function() {
                                        },
                                                {
                                                    switch_on_container_path: '<?php echo base_url(); ?>assets/js/toggle/iphone_switch_container_off.png'
                                                });
                                        });
                                    });



                                    jQuery(document).ready(function()
                                    {
                                        jQuery('.btntestOff').iphoneSwitch("on", function() {
                                        }, function() {
                                        },
                                                {
                                                    switch_on_container_path: '<?php echo base_url(); ?>assets/js/toggle/iphone_switch_container_off.png'
                                                });

                                        jQuery('.btntestOn').iphoneSwitch("off", function() {
                                        }, function() {
                                        },
                                                {
                                                    switch_on_container_path: '<?php echo base_url(); ?>assets/js/toggle/iphone_switch_container_off.png'
                                                });

                                    });

                                    function changeState(id, classid)
                                    {
                                        jQuery.ajax({
                                            url: "<?php echo base_url(); ?>users/changeAssistStatus/",
                                            type: "POST",
                                            data: {u_id: id},
                                            dataType: "html",
                                            async: false,
                                            success: function(ch)
                                            {
                                                if (ch === 'yes')
                                                {                                                            
                                                    alert("Status changed successfully.")
                                                                                         
                                                    if (classid === '0')
                                                    {                                                                                                                
                                                        jQuery("#assist_" + id).removeClass("btntestOff");
                                                        jQuery("#assist_" + id).addClass("btntestOn");
                                                        jQuery('.btntestOff').iphoneSwitch("on", function() {}, function() {},
                                                                {
                                                                    switch_on_container_path: '<?php echo base_url(); ?>assets/js/toggle/iphone_switch_container_off.png'
                                                                });
                                                    }
                                                    else
                                                    {
                                                        jQuery("#assist_" + id).removeClass("btntestOn");
                                                        jQuery("#assist_" + id).addClass("btntestOff");
                                                        jQuery('.btntestOn').iphoneSwitch("off", function() {}, function() {},{
                                                                    switch_on_container_path: '<?php echo base_url(); ?>assets/js/toggle/iphone_switch_container_off.png'
                                                                });
                                                    }
                                                }
                                                else
                                                {
                                alert('Failed To Change Status!!!');
                                                }
                                            }
                                        });
                                    }
                                    
           function editUser(userid)
           {
               
               jQuery.ajax({
                     url: "<?php echo base_url(); ?>users/editUserId/",
                     type: "POST",
                     data: {user_id: userid},
                     dataType: "json",
                     async: false,
                     success: function(ch)
                     {
                         //alert(ch);
                         
                         jQuery('#user_name').val(ch.user_name);
                         jQuery('#user_lname').val(ch.user_lname);
                         jQuery('#user_email').val(ch.user_email);
                         jQuery('#user_phone').val(ch.user_phone);                         
                         jQuery('#user_category').val(ch.user_category);
                         jQuery('#user_initial').val(ch.user_initial);
                         jQuery("#uniform-user_initial span").html(ch.user_initial+'.');                         
                         if(ch.is_admin === '1')
                             {
                                jQuery("#uniform-is_admin span").html("Admin");
                                jQuery("#is_admin").val(1);                                
                             }
                             else
                                 {
                                    jQuery("#uniform-is_admin span").html("User");
                                    jQuery("#is_admin").val(0);
                                 }                                 
                         jQuery("#uniform-user_category span").html(ch.user_category);                         
                         jQuery('#other_category').val(ch.other_category);
                         jQuery('#user_church_name').val(ch.user_church_name);
                         jQuery('#user_church_size').val(ch.user_church_size);
                         if(ch.user_church_size === '')
                             {
                                jQuery("#uniform-user_church_size span").html("Select church size"); 
                                jQuery("#user_church_size").val(''); 
                             }
                             else
                                 {
                                    jQuery("#uniform-user_church_size span").html(ch.user_church_size);
                                    jQuery("#user_church_size").val(ch.user_church_size);
                                 }
                         jQuery('#user_church_address').val(ch.user_church_address);
                         jQuery('#user_phone').val(ch.user_phone);  
                         jQuery('#user_id').val(ch.user_id);
                         
                         if(ch.user_category === 'Other')
                             {
                                 document.getElementById("other_cat").style.display = "block";
                             }
                             else
                             {
                                 document.getElementById("other_cat").style.display = "none";
                             }
                         
                     }
                   });
               
           }
                                    


</script>

<div id="userbox" class="contentwrapper" style='display: none'>            
<div id="validation" class="subcontent">
            	
      <form accept-charset="utf-8" method="post" action="<?php echo base_url();?>users/update/" 
         name="registerForm" id="addque" class="stdform stdform2">            
          
          
              <input type='hidden' id='user_id' name='user_id' value=''/>            
              
              
              <p style="border-top:1px solid #DDD;">
                  <label>User Initial : </label>
                  <span class="field">
                    <select id="user_initial" name="user_initial">
                          <option id="Ms" value="Ms">Ms.</option>
                          <option id="Mr" value="Mr">Mr.</option>
                          <option id="Mrs" value="Mrs">Mrs.</option>
                    </select>
                  </span>
              </p>
          
              <p>                  
                  <label>User First Name : </label>
                  <span class="field"><input type="text" name="user_name" id="user_name" class="longinput" /></span>
              </p>
              
              <p>
                  <label>User Last Name : </label>
                  <span class="field"><input type="text" name="user_lname" id="user_lname" class="longinput" /></span>
              </p>
              
              <p>
                  <label>User Email : </label>
                  <span class="field"><input type="text" name="user_email" id="user_email" class="longinput" /></span>
              </p>
              
              <p>
                  <label>User Password : </label>
                  <span class="field"><input type="password" name="user_password" id="user_password" class="longinput" placeholder="Type To Change"/></span>
              </p>
          
              <p>
                  <label>Category : </label>
                      <span class="field">
                          <select name="user_category" id="user_category" onchange="checkCategory();">                                        
                            <option id="Pastor">Pastor</option>
                            <option id="Planter">Planter</option>
                            <option id="Missionary">Missionary</option>
                            <option id="District_Official">District Official</option>
                            <option id="Prospective_Minister">Prospective Minister</option>                            
                            <option id="Other">Other</option>                            
                          </select>
                      </span>
              </p>
              
              <p id="other_cat">
                  <label>Other Category : </label>
                  <span class="field"><input type="text" name="other_category" id="other_category" class="longinput" /></span>
              </p>
              
              <p>
                  <label>Update User As : </label>
                      <span class="field">
                          <select name="is_admin" id="is_admin">                                        
                            <option id="user" value="0">User</option>
                            <option id="admin" value="1">Admin</option>                                                        
                          </select>
                      </span>
              </p>
          
              <p>
                  <label>Church Name : </label>
                  <span class="field"><input type="text" name="user_church_name" id="user_church_name" class="longinput" /></span>
              </p>
              
              <p>
                  <label>Church Size : </label>
                      <span class="field">
                          <select name="user_church_size" id="user_church_size">                                        
                            <option id="Select_church_size" value="">Select church size</option>
                            <option id="Less_than_200" value="Less than 200">Less than 200</option>
                            <option id="Between_201_and_400" value="Between 201 and 400">Between 201 and 400</option>
                            <option id="Greater_than_400" value="Greater than 400">Greater than 400</option>                                                        
                          </select>
                      </span>
              </p>
              
              <p>
                  <label>Phone Number : </label>
                  <span class="field"><input type="text" name="user_phone" id="user_phone" class="longinput" /></span>
              </p>
              
              <p>
                  <label>Church Address : </label>
                  <span class="field"><textarea name='user_church_address' id='user_church_address'></textarea></span>
              </p>
              
             <p class="stdformbutton">
                      <button class="submit radius2" name="update_user_btn">Update User</button>
                      <input type="reset" class="reset radius2" value="Reset Button" />
             </p>
             
     </form>

</div>
</div>
<script type="text/javascript">

function checkCategory()
{
    var cat = document.getElementById('user_category').value;    
    if(cat === 'Other')
        {
            document.getElementById("other_cat").style.display = "block";
        }
        else
            {
                document.getElementById("other_cat").style.display = "none";
            }
}

</script>
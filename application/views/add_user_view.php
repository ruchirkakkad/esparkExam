<div class="vernav iconmenu">
    	<ul>
            <li><a href="<?php echo base_url(); ?>users/" class="inbox">List Of Users</a></li>            
            <li class="current"><a href="<?php echo base_url(); ?>users/adduser" class="inbox">Add User</a></li>            
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
</div><!--leftmenu-->


<div class="centercontent">

    <div class="pageheader notab">
        <h1 class="pagetitle">Add User</h1>
        <span class="pagedesc">New User Entry</span><br/>        
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

    

         
    <div id="contentwrapper" class="contentwrapper" style="margin-top: 10px;">    
      <form accept-charset="utf-8" method="post" action="<?php echo base_url();?>users/addnewuser/" 
            name="registerForm" id="addque" class="stdform stdform2" style="border-top: 1px solid #DDDDDD">            
          
              <p>
                  <label>User First Name : </label>
                  <span class="field">
                      <select id="user_initial" name="user_initial">
                          <option id="Ms" value="Ms">Ms.</option>>
                          <option id="Mr" value="Mr">Mr.</option>>
                          <option id="Mrs" value="Mrs">Mrs.</option>>
                      </select>
                      <input type="text" name="user_name" id="user_name" class="longinput" style="width: 50%;" required />
                  </span>
              </p>
              
              <p>
                  <label>User Last Name : </label>
                  <span class="field">
                      <input type="text" name="user_lname" id="user_lname" class="longinput" style="width: 50%;" required/>
                  </span>
              </p>
              
              <p>
                  <label>User Email : </label>
                  <span class="field">
                      <input type="text" name="user_email" id="user_email" class="longinput" style="width: 50%;" onblur="checkEmail();" required />
                      <span id="email_avail" style="margin-right: 200px;color: red;display: none;float: right;margin-top: 5px;">Email Id Already Exists!</span>
                  </span>
              </p>
              
              <p>
                  <label>User Password : </label>
                  <span class="field">
                      <input type="password" name="user_password" id="user_password" class="longinput" style="width: 50%;" required />
                  </span>
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
              
              <p id="other_cat" style="display: none;">
                  <label>Other Category : </label>
                  <span class="field">
                      <input type="text" name="other_category" id="other_category" class="longinput" style="width: 50%;"/>
                  </span>
              </p>
              
              <p>
                  <label>Add User As : </label>
                      <span class="field">
                          <select name="is_admin" id="is_admin" onchange="checkCategory();">                                        
                            <option id="user">User</option>
                            <option id="admin">Admin</option>                                                        
                          </select>
                      </span>
              </p>
          
              <p>
                  <label>Church Name : </label>
                  <span class="field">
                      <input type="text" name="user_church_name" id="user_church_name" class="longinput" style="width: 50%;"/>
                  </span>
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
                  <span class="field">
                      <input type="text" name="user_phone" id="user_phone" class="longinput" style="width: 50%;"/>
                  </span>
              </p>
              
              <p>
                  <label>Church Address : </label>
                  <span class="field">
                      <textarea name='user_church_address' id='user_church_address' style="width: 50%;"></textarea>
                  </span>
              </p>
              
             <p class="stdformbutton">
                      <button class="submit radius2" name="add_user_btn">Submit Button</button>
                      <input type="reset" class="reset radius2" value="Reset Button" />
             </p>
             
     </form>
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

function checkEmail()
    {
        var u_name = document.getElementById("user_email").value;        
        if(u_name != "")
            {
                jQuery.ajax({
                url : "<?php echo base_url();?>users/verifyEmail/",
                type : "POST",
                data : {u_name:u_name},
                dataType : "html",
                async : false,

                success : function(ch)
                {                    
                    var ans = ch;                    
                    
                     if(ans === 'yes')
                        {                               
                            document.getElementById("email_avail").style.display="block"; 
                            document.getElementById("user_email").value=""; 
                            
                        }
                        else
                            {                                
                                document.getElementById("email_avail").style.display="none";                            
                            }
                }
                });
            }
    }   


</script>
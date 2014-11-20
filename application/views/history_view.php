<div class="vernav iconmenu">
    	<ul>
            <li class="current"><a href="<?php echo base_url(); ?>userhistory/" class="inbox">List Of Users</a></li>            
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
            </colgroup>
            <thead>
                <tr>
                    <th class="head0">No</th>
                    <th class="head1">User Name</th>
                    <th class="head0">Email</th>
                    <th class="head1">View History</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0">No</th>
                    <th class="head1">User Name</th>
                    <th class="head0">Email</th>
                    <th class="head1">View History</th>
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
                            <a href="<?php echo base_url(); ?>userhistory/user/<?php echo $md->user_id; ?>" style="background: #FF6600;padding: 5px 10px;color: #fff;border-radius: 3px;">View History</a> 
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>               


    </div><!--contentwrapper-->

</div><!-- centercontent -->


</div><!--bodywrapper-->
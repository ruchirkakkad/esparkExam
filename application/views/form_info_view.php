<div class="vernav iconmenu">
    	<ul>
            <li class="current"><a href="<?php echo base_url(); ?>assessments/" class="inbox">List Of Forms</a></li>
            <li><a href="<?php echo base_url(); ?>assessments/question/" class="drafts">Add Question</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
<div class="centercontent tables">

    <div class="pageheader notab">
        <h1 class="pagetitle"><?php echo $title;?></h1>
        <span class="pagedesc">This is a list All Questions Of <?php echo $title;?>.</span><br/>
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

        
        <div class="contenttitle2">
            <h3><?php 
            		if($this->uri->segment(3) == '1') echo "CC Depression Assessment";  
            		elseif($this->uri->segment(3) == '2') echo "CC Financial Assessment";  
            		elseif($this->uri->segment(3) == '3') echo "CC Matters of the Heart Assessment";  
            		else echo "CC Perfectionism Assessment";  
            	?></h3>
        </div><!--contenttitle-->
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntableaf1">
            <colgroup>
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
            </colgroup>
            <thead>
                <tr>
                    <th class="head0">No</th>
                    <th class="head1">Question Name</th>
                    <th class="head0">Question Type</th>
                    <th class="head1">Inserted By</th>
                    <th class="head0">Enable/Disable</th>
                    <th class="head1">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0">No</th>
                    <th class="head1" style="width: 500px;">Question Name</th>
                    <th class="head0">Question Type</th>
                    <th class="head1">Inserted By</th>
                    <th class="head0">Enable/Disable</th>
                    <th class="head1">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $count = 1;
                if(!empty($form_data))
                foreach ($form_data as $mfd) {
                    ?> 
                <tr class="gradeX">
                    <td><? echo $count;$count++;?>                        
                    </td>
                    <td><?php echo $mfd->que_name; ?></td>
                    <td><?php echo $mfd->que_type; ?></td>
                    <td><?php echo $mfd->que_created_by; ?></td>
                    <td>
                    <?php if($mfd->is_enabled == '1') { ?>
                        <a href="<?php echo base_url(); ?>assessments/disable/<?php echo $this->uri->segment(3); ?>/<?php echo $mfd->que_id; ?>" style="background: #067B00;padding: 5px 10px;color: #fff;border-radius: 3px;">enabled</a>
                        <?php } else { ?>
                        <a href="<?php echo base_url(); ?>assessments/enable/<?php echo $this->uri->segment(3); ?>/<?php echo $mfd->que_id; ?>" style="background: #930B0B;padding: 5px 10px;color: #fff;border-radius: 3px;">disabled</a>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url(); ?>assessments/questionedit/<?php echo $mfd->que_id; ?>" class='fancybox' style="background: #FF6600;padding: 5px 10px;color: #fff;border-radius: 3px;" onclick="">edit</a>
                    <a href="<?php echo base_url(); ?>assessments/questiondelete/<?php echo $this->uri->segment(3); ?>/<?php echo $mfd->que_id; ?>" style="background: #930B0B;padding: 5px 10px;color: #fff;border-radius: 3px;margin-left:5px;" onClick="return confirm('Are you sure you want to delete this Question?')">delete</a></td>
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
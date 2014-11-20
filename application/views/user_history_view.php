<div class="vernav iconmenu">
    	<ul>
            <li class="current"><a href="<?php echo base_url(); ?>users/" class="inbox">List Of Users</a></li>            
            <li class="current"><a href="<?php echo base_url(); ?>userhistory/" class="inbox">All Users History Page</a></li>                        
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
<div class="centercontent tables">

    <div class="pageheader notab">
        <h1 class="pagetitle"><?php echo $this->session->set_userdata['history_of_user']; ?></h1>
        <span class="pagedesc">This is the history of <?php echo $this->session->set_userdata['history_of_user']; ?> of all 4 assessment forms. </span><br/>                

    </div><!--pageheader-->

    <div id="contentwrapper" class="contentwrapper">
        
        <?php 
        for($i=1 ; $i<=4 ; $i++)
        {
            if($i == 1)
            {                $form_name = "CC Depression Assessment";            }
            elseif($i == 2)
            {                $form_name = "CC Financial Assessment";            }
            elseif($i == 3)
            {                $form_name = "CC Matters of the Heart Assessment";            }
            else
            {                $form_name = "CC Perfectionism Assessment";            }
        ?>
        
        <div class="contenttitle2">
            <h3><?php echo $form_name; ?></h3>
        </div><!--contenttitle-->
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable_uh_<?php echo $i; ?>">
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
                    <th class="head1">Date</th>
                    <th class="head0">User Score</th>
                    <th class="head1">Total Score</th>
                    <th class="head0">Percentage</th>
                    <th class="head1">Result Bar</th>
                    <th class="head0">Result Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0">No</th>
                    <th class="head1">Date</th>
                    <th class="head0">User Score</th>
                    <th class="head1">Total Score</th>
                    <th class="head0">Percentage</th>
                    <th class="head1">Result Bar</th>
                    <th class="head0">Result Status</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                        if(!empty($history_data[$i]))
                        {
                            $count = 1;
                        foreach ($history_data[$i] as $rows)
                        {
                            $date = new DateTime($rows->submitted_on);
                            $res_date = $date->format('m/d/Y') ;
                            
                            $percentage = ((100 * $rows->user_score/$rows->assessment_score));
                            $percentage = floor(($percentage) * 100 + .5) * .01;
                        ?>
                    <tr class="gradeX">
                        <td><?php echo $count; $count++; ?></td>
                        <td><?php echo $res_date; ?></td>
                        <td><?php echo $rows->user_score;?></td>
                        <td class="center"><?php echo $rows->assessment_score; ?></td>
                        <td class="center"><?php echo $percentage; ?>%</td>
                        <td class="center" style="width: 410px;">
                            <div class="progressdiv">
                                 <div class="progressbar">
                                        <div class="progress" style="width:<?php echo $percentage; ?>%;"></div>
                                 </div>
                            </div>
                        </td>
                        <td>
                            <?php 
                            if($percentage < 30)
                            {
                                echo "Low";
                            }
                            elseif ($percentage >= 30 && $percentage < 70) 
                            {
                                echo "Moderate";
                            }
                            else 
                            {
                                echo "Severe";
                            }    
                            ?>
                        </td>
                    </tr>
                    <?php 
                        }
                        }
                    ?>
                    
            </tbody>
        </table>
        <?php 
        }
        ?>        

    </div>
</div>
</div>
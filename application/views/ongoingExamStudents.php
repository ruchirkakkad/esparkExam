<!-- dataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/datatable/TableTools.css">
<!-- dataTables -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatable/TableTools.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatable/ColReorderWithResize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatable/ColVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatable/jquery.dataTables.grouping.js"></script>

<div id="main">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="box box-color box-bordered">
                    <div class="box-title">
                        <h3>
                            <i class="icon-table"></i>
                            OnGoing Exam
                        </h3>
                    </div>
                    <div class="box-content nopadding">
                        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_0_wrapper">
                            <table class="table table-hover table-nomargin dataTable table-bordered" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1105px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 229px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                        <th class="hidden-350 sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 220px;" aria-label="Browser: activate to sort column ascending">Enrollment number</th>
                                        <th class="hidden-350 sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 202px;" aria-label="Platform(s): activate to sort column ascending">College</th>
<!--                                        <th class="hidden-1024 sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 199px;" aria-label="Engine version: activate to sort column ascending">Category</th>
                                        <th class="hidden-1024 sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 199px;" aria-label="Engine version: activate to sort column ascending">Level</th>
                                        <th class="hidden-480 ">Action</th>-->
                                    </tr>
                                </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    <?php
//                                    echo "<pre>";
//                                    print_r($students);
//                                    die;
                                    foreach ($students as $key => $value)
                                    {
                                        ?>
                                        <tr class="odd">
                                            <td class="  sorting_1"><?php echo $value['firstname']; ?></td>
                                            <td class="hidden-350"><?php echo $value['enroll_no']; ?></td>
                                            <td class="hidden-350 "><?php echo $value['college_id']; ?></td>
<!--                                            <td class="hidden-1024 "><?php echo $value->name; ?></td>
                                            <td class="hidden-1024 "><?php echo $value->moderator_level; ?></td>
                                            <td class="hidden-480 ">
                                                <a title="" rel="tooltip" class="btn" href="show_question/<?php echo $value->id;?>" data-original-title="View"><i class="icon-search"></i></a>
                                                <a title="" rel="tooltip" class="btn" href="edit_question/<?php echo $value->id;?>" data-original-title="Edit"><i class="icon-edit"></i></a>
                                                <a title="" rel="tooltip" class="btn" href="delete_question/<?php echo $value->id;?>" data-original-title="Delete"><i class="icon-remove"></i></a>
                                            </td>-->
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
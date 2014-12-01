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
                <div class="box box-bordered">
                    <div class="box-title">
                        <h3>
                            <i class="icon-table"></i>
                            College : <?php echo $students['collegeName'][0]['name']; ?>
                        </h3>
                    </div>
                    <div class="box-content nopadding">
                        <table class="table table-hover table-nomargin dataTable dataTable-tools table-bordered studentresulttable">

                            <?php
                            $i = 0;
                            foreach ($students['records'] as $key => $value)
                            {
                                if ($i == 0)
                                {
                                    $i++;
                                    echo "<thead><tr>";
                                    foreach ($value as $key1 => $value1)
                                    {
                                        $strAlias = str_replace("_", " ", $key1);
                                        $strAlias = str_replace("XX", "+", $strAlias);
                                        $strAlias = str_replace("ZZ", "&", $strAlias);
                                        echo '<th class="hidden-350 sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 229px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">' . $strAlias . '</th>';
                                    }
                                    echo "</tr></thead>";
                                }

                                echo "<tr>";
                                $j = 0;
                                foreach ($value as $key1 => $value1)
                                {
                                    if($j== 1 )
                                    {
                                        echo "<td class='sorting_1'><a href='". base_url()."result/getStudentResult/".$value['id']."'>$value1</a></td>";
                                    }
                                    else
                                    {
                                        echo "<td class='sorting_1'>$value1</td>";
                                    }
                                    $j++;
                                }
                                echo "</tr>";                                
                                
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
//        if ($(".studentresulttable").length > 0) {
//            var e = {sPaginationType: "full_numbers", oLanguage: {sSearch: "", sInfo: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries", sLengthMenu: "_MENU_ <span>entries per page</span>"}, sDom: "CTlfrtip", aoColumnDefs: [{bSortable: !1, aTargets: [8]}], oColVis: {buttonText: "Change columns <i class='icon-angle-down'></i>"}, oTableTools: {sSwfPath: "<?php echo base_url();?>assets/js/plugins/datatable/swf/copy_csv_xls_pdf.swf"}}, t = $(".studentresulttable").dataTable(e);
//            $(".dataTables_filter input").attr("placeholder", "Search here...");
//            $(".dataTables_length select").wrap("<div class='input-mini'></div>").chosen({disable_search_threshold: 9999999});
//            t.columnFilter({sPlaceHolder: "head:after", aoColumns: [null, null,null,null,null,null,null,null,null]});
//            $(".studentresulttable").css("width", "100%")
//        }

if ($(".studentresulttable").length > 0) {
            var e = {sPaginationType: "full_numbers"
              , oLanguage: {sSearch: "<span>Search:</span> ", sInfo: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries", sLengthMenu: "_MENU_ <span>entries per page</span>"}, sDom: "CTlfrtip", aoColumnDefs: [{bSortable: !1, aTargets: [8]}], oColVis: {buttonText: "Change columns <i class='icon-angle-down'></i>"}, oTableTools: {sSwfPath: "<?php echo base_url(); ?>/assets/js/plugins/datatable/swf/copy_csv_xls_pdf.swf"}, "bDestroy": true}, t = $(".studentresulttable").dataTable(e);
            $(".dataTables_filter input").attr("placeholder", "Search here...");
            $(".dataTables_length select").wrap("<div class='input-mini'></div>").chosen({disable_search_threshold: 9999999});
            t.columnFilter({sPlaceHolder: "head:after", aoColumns: [null,null,null,null,null,null,null,null,null]});
            $(".studentresulttable").css("width", "100%")
        }
    });
</script>
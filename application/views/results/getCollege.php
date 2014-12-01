<div id="main">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="box box-bordered">
                    <div class="box-title">
                        <h3><i class="icon-th-list"></i> Select College</h3>
                    </div>
                    <div class="box-content nopadding">
                        <form class="form-horizontal form-striped" method="POST" action="<?php echo base_url();?>result/collegeWise">
                            <div class="control-group">
                                <label class="control-label" for="select">Collegs</label>
                                <div class="controls">
                                    <select class="input-large" id="select" name="college">
                                        <?php
                                            foreach ($colleges as $key => $value)
                                            {
                                                echo "<option value='".$value->id."'>$value->name</option>";
                                            }
                                        ?>                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Save changes</button>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
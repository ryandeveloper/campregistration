<?php 
View::$title = 'Add Cabin';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>

<!-- Main Container -->
<div class="main_container">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Cabin</h3>
                    
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                        <a href="#" data-toggle="remove">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo View::getMessage();  ?> 
                    <form class="form-horizontal" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="action" value="addcabin" />

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Cabin Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($cabin->Name) ? $cabin->Name : ''; ?>" name="Name" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group-separator"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Notes</label>

                            <div class="col-sm-10">
                                <input type="text" name="Notes" value="<?php echo isset($cabin->Notes) ? $cabin->Notes : ''; ?>" class="form-control">
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?php echo view::url('cabins'); ?>" class="btn btn-warning">Cancel</a>
                                <button id="send" type="submit" class="btn btn-success">Add Cabin</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
         </div>
     </div>  

</div>
<!-- /Main Container -->
<?php View::footer(); ?>
<?php 
View::$title = 'Edit Cabin';
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
                    <h3 class="panel-title"><?php echo View::$title; ?></h3>
                    
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
                        <input type="hidden" name="action" value="updatetent" />
                        <input type="hidden" name="tid" value="<?php echo $tent->TentID; ?>" />

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tent Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($tent->Name) ? $tent->Name : ''; ?>" name="Name" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group-separator"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Notes</label>

                            <div class="col-sm-10">
                                <input type="text" name="Notes" value="<?php echo isset($tent->Notes) ? $tent->Notes : ''; ?>" class="form-control">
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?php echo view::url('tents'); ?>" class="btn btn-warning">Cancel</a>
                                <button id="send" type="submit" class="btn btn-success">Save Changes</button>
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
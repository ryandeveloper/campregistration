<?php 
View::$title = 'Edit Church';
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
                        <input type="hidden" name="action" value="updatechurch" />
                        <input type="hidden" name="cid" value="<?php echo $church->ChurchID; ?>" />

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Church Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($church->Name) ? $church->Name : ''; ?>" name="Name" placeholder="" required="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($church->City) ? $church->City : ''; ?>" name="City" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($church->Title) ? $church->Title : ''; ?>" name="Title" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pastor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo isset($church->Pastor) ? $church->Pastor : ''; ?>" name="Pastor" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Notes</label>

                            <div class="col-sm-10">
                                <input type="text" name="Notes" value="<?php echo isset($church->Notes) ? $church->Notes : ''; ?>" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group-separator"></div>
                        
                        <div class="item form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-warning">Back</a>
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
<?php 
View::$title = 'Edit Role';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo();  //print_r(unserialize(base64_decode($_SESSION[SESSIONCODE])));?>
<!-- page content -->
<div class="main_container">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo View::$title; ?></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php echo View::getMessage(); ?>   
                        <form class="form-horizontal form-label-left input_mask" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="action" value="updaterole" />
                            <input type="hidden" name="roleid" value="<?php echo $role->UserLevelID; ?>" />
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                    Role Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo isset($role->Name) ? $role->Name : ''; ?>" id="name" name="Name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control dowysiwyg" name="Description"><?php echo isset($role->Description) ? $role->Description : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo View::url('role'); ?>" class="btn btn-warning">Back</a>

                                    <button id="send" type="submit" class="btn btn-success">Save Role</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
<!-- /page content -->
<?php View::footer(); ?>
<?php 
View::$title = 'Add User';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo();  //print_r(unserialize(base64_decode($_SESSION[SESSIONCODE])));?>

<!-- Main Container -->
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
                                <input type="hidden" name="action" value="adduser" />
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12 bottom-align-text" for="fname">Profile Picture</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="file-0a" class="file" type="file" data-min-file-count="0" name="Avatar" data-show-upload="false" data-allowed-file-extensions='["jpeg","png","jpg"]'>
                                        <span>* Allowed file types: jpeg, jpg, png</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">
                                       User Level
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php 
                                            $inarray = array();
                                            switch($userinfo->Level) {
                                                case 1:
                                                    $inarray = array(1,2,3,4);
                                                    break;
                                                case 2:
                                                    $inarray = array(3,4);
                                                    break;
                                                case 3:
                                                    $inarray = array(4);
                                                    break;
                                            }
                                            View::form(
                                                'selecta',
                                                array(
                                                    'name'=>'user[Level]',
                                                    'options'=>$levels,
                                                    'value'=>isset($pdata->Level) ? $pdata->Level : '',
                                                    'class'=>'form-control col-md-7 col-xs-12',
                                                    'inarray'=>$inarray
                                                )
                                            ); 
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">
                                        First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($pdata->FirstName) ? $pdata->FirstName : ''; ?>" id="fname" name="meta[FirstName]" required="required" class="form-control col-md-7 col-xs-12">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">
                                        Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($pdata->LastName) ? $pdata->LastName : ''; ?>" id="lname" name="meta[LastName]" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nname" class="control-label col-md-3 col-sm-3 col-xs-12">Nickname</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($pdata->NickName) ? $pdata->NickName : ''; ?>" id="nname" name="meta[NickName]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" value="<?php echo isset($pdata->Email) ? $pdata->Email : ''; ?>" id="email" name="user[Email]" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">
                                        Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="phone" value="<?php echo isset($pdata->Phone) ? $pdata->Phone : ''; ?>" id="phone" name="meta[Phone]" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">
                                        Gender <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p> <?php $gender = isset($pdata->Gender) ? $pdata->Gender : 'M'; ?>
                                            Male: <input type="radio" class="flat" name="meta[Gender]" id="genderM" value="M" <?php echo $gender == 'M' ? 'checked' : ''; ?> required /> 
                                            Female: <input type="radio" class="flat" name="meta[Gender]" id="genderF" value="F" <?php echo $gender == 'F' ? 'checked' : ''; ?> required />
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($pdata->Address) ? $pdata->Address : ''; ?>" id="address" name="meta[Address]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($pdata->City) ? $pdata->City : ''; ?>" id="city" name="meta[City]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="state" class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($pdata->State) ? $pdata->State : ''; ?>" id="state" name="meta[State]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($pdata->Country) ? $pdata->Country : ''; ?>" name="meta[Country]" id="autocomplete-custom-append" class="form-control col-md-10" style="float: left;" />
                                      <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postal" class="control-label col-md-3 col-sm-3 col-xs-12">Postal Code</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($pdata->PostalCode) ? $pdata->PostalCode : ''; ?>" id="postal" name="meta[PostalCode]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bio</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control dowysiwyg" name="meta[Bio]"><?php echo isset($pdata->Bio) ? $pdata->Bio : ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <p>&nbsp;<br>&nbsp;</p>
                                        <p>* Password will automatically be sent to the user email.</p>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo View::url('users/'); ?>" class="btn btn-warning">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Add User</button>
                                    </div>
                                </div>
                            </form>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- /Main Container -->
<?php View::footer(); ?>
<?php 
View::$title = 'User Profile';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>
<!-- page content -->
<div class="main_container">

    <div class="page-title">
        <div class="title-env">
            <h1 class="title"><?php echo View::$title; ?></h1>
            <p class="description">User profile and data info</p>
        </div>
    </div>

    <section class="profile-env">
        <div class="row">
            <div class="col-sm-3">

                <!-- User Info Sidebar -->
                <div class="user-info-sidebar">

                    <a href="#" class="user-img">
                        <?php $avatar = View::common()->getUploadedFiles($userinfo->Avatar); ?>
                        <img src="<?php echo ($userinfo->Avatar) ? View::url('/assets/files/') . $avatar[0]->FileSlug : View::url('/assets/images/user-4.png'); ?>" alt="user-img" class="img-cirlce img-responsive img-thumbnail" width="150">
                    </a>

                    <a href="#" class="user-name">
                        <?php echo $userinfo->FirstName; ?> <?php echo $userinfo->LastName; ?>
                        <span class="user-status is-online"></span>
                    </a>

                    <span class="user-title">
                        <?php echo $userinfo->Bio; ?>
                    </span>

                    <hr>

                    <ul class="list-unstyled user-info-list">
                        <li>
                            <i class="fa-home"></i>
                            <?php echo strlen($userinfo->City) > 0 ? $userinfo->City : "City"; ?>, <?php echo strlen($userinfo->State) > 0 ? $userinfo->State : "State"; ?>
                        </li>
                        <li>
                            <i class="fa-envelope-o"></i>
                            <?php echo strlen($userinfo->Email) > 0 ? $userinfo->Email : "youremail@xxxxxx.com"; ?>
                        </li>
                        <li>
                            <i class="fa-phone"></i>
                            <?php echo strlen($userinfo->Phone) > 0 ? $userinfo->Phone : "+99 999-999-9999"; ?>
                        </li>
                    </ul>

                    <hr>

<!--                    <ul class="list-unstyled user-friends-count">
                        <li>
                            <span>643</span>
                            followers
                        </li>
                        <li>
                            <span>108</span>
                            following
                        </li>
                    </ul>-->

<!--                    <button type="button" class="btn btn-success btn-block text-left">
                        Following
                        <i class="fa-check pull-right"></i>
                    </button>-->
                </div>

            </div>

            <div class="col-sm-9">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#editprofile" role="tab" id="profile-editprofile" data-toggle="tab" aria-expanded="true">Update Profile</a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#editpassword" role="tab" id="profile-editpassword" data-toggle="tab" aria-expanded="false">Change Password</a>
                        </li>
                    </ul>
                    <?php echo View::getMessage(); ?>                        
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="editprofile" aria-labelledby="profile-tab">
                            <form class="form-horizontal form-label-left input_mask" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="action" value="updateuser" />
                                <input type="hidden" name="userid" value="<?php echo $userinfo->UserID; ?>" />
                                <input type="hidden" name="metaid" value="<?php echo $userinfo->UserMetaID; ?>" />
                                <input type="hidden" name="avatarid" value="<?php echo $userinfo->Avatar; ?>" />

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12 bottom-align-text" for="fname">Change Profile Picture</label>
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
                                                    'value'=>$userinfo->Level,
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
                                        <input type="text" value="<?php echo $userinfo->FirstName; ?>" id="fname" name="meta[FirstName]" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">
                                        Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo $userinfo->LastName; ?>" id="lname" name="meta[LastName]" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nname" class="control-label col-md-3 col-sm-3 col-xs-12">Nickname</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo $userinfo->NickName; ?>" id="nname" name="meta[NickName]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" value="<?php echo $userinfo->Email; ?>" id="email" name="user[Email]" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">
                                        Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="phone" value="<?php echo $userinfo->Phone; ?>" id="phone" name="meta[Phone]" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">
                                        Gender <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>
                                            Male: <input type="radio" class="flat" name="meta[Gender]" id="genderM" value="M" <?php echo $userinfo->Gender == 'M' ? 'checked' : ''; ?> required /> 
                                            Female: <input type="radio" class="flat" name="meta[Gender]" id="genderF" value="F" <?php echo $userinfo->Gender == 'F' ? 'checked' : ''; ?> required />
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo $userinfo->Address; ?>" id="address" name="meta[Address]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo $userinfo->City; ?>" id="city" name="meta[City]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="state" class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo $userinfo->State; ?>" id="state" name="meta[State]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="Country" name="meta[Country]" class="form-control">
                                          <?php foreach(View::getCountries() as $country) { ?>
                                          <option value="<?php echo $country; ?>" <?php echo $userinfo->Country == $country ? 'selected' : ''; ?>><?php echo $country; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postal" class="control-label col-md-3 col-sm-3 col-xs-12">Postal Code</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo isset($userinfo->PostalCode) ? $userinfo->PostalCode : ''; ?>" id="postal" name="meta[PostalCode]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bio</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control dowysiwyg" name="meta[Bio]"><?php echo $userinfo->Bio; ?></textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo View::url('users/'); ?>" class="btn btn-warning">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Save Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="editpassword" aria-labelledby="profile-tab">
                            <form class="form-horizontal form-label-left input_mask" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="action" value="savepassword" />
                                <input type="hidden" name="userid" value="<?php echo $userinfo->UserID; ?>" />
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oldpassword">
                                       Old Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" value="" id="oldpassword" name="OldPassword" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newpassword">
                                       New Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" value="" id="newpassword" name="NewPassword" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newpasswordconfirm">
                                       Confirm New Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" value="" id="newpasswordconfirm" name="NewPasswordConfirm" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo View::url('users/'); ?>" class="btn btn-warning">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    
</div>
<!-- /page content -->
<?php View::footer(); ?>
<?php 
View::$title = 'Edit Participant';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>
<style>
    .form-group { overflow: hidden; }
    .table.meal-table td {
        padding: 10px;
    }
    .show { display: block; }
</style>
<!-- <pre>
<?php print_r($user); ?>
</pre> -->
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
                <div class="panel-body" style="width:800px;">

                    <?php echo View::getMessage();  ?> 
                    <form enctype="multipart/form-data" class="form-horizontal validate" method="post">
                        <input class="" type="hidden" name="action" value="updateparticipant" />
                        <input class="" type="hidden" name="pid" value="<?php echo isset($user->PPID) ? $user->PPID : "";?>" />
                        <input type="hidden" id="cabinPrice" value="<?php echo isset($products[0]->Price) ? $products[0]->Price : ''; ?>">
                        <input type="hidden" id="tentPrice" value="<?php echo isset($products[1]->Price) ? $products[1]->Price : ''; ?>">
                        <input type="hidden" id="mealprice" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>">
                        <input type="hidden" id="packagePrice" value="<?php echo isset($products[3]->Price) ? $products[3]->Price : ''; ?>">
                        <input type="hidden" id="owntentPrice" value="<?php echo isset($products[4]->Price) ? $products[4]->Price : ''; ?>">
                        <input type="hidden" id="entrancePrice" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : ''; ?>">
                        <input type="hidden" id="cleared" name="ppmeta[Cleard]" value="<?php echo isset($user->Cleard) ? $user->Cleard : "0";?>">
                        <input type="checkbox" name="ppmeta[Package]" id="packfull" class="amt" value="<?php echo isset($products[3]->Price) ? $products[3]->Price : ''; ?>" style="display: none;" <?php echo strlen($user->Package) > 1 ? 'checked' : ""; ?>>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">Gender</label><br>
                                <select class="form-control" name="pp[Gender]" data-validate="required" required="">
                                    <option value="">Select Gender</option>
                                    <option value="Brother" <?php echo $user->Gender == 'Brother' ? 'selected' : "";?>>Brother</option>
                                    <option value="Sister" <?php echo $user->Gender == 'Sister' ? 'selected' : "";?>>Sister</option>
                                    <option value="Pastor" <?php echo $user->Gender == 'Pastor' ? 'selected' : "";?>>Pastor</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">Encoder</label><br>
                                <input type="text" class="form-control" value="<?php echo isset($user->encoderFirstName) ? $user->encoderFirstName : "";?>" readonly>
                                <input type="hidden" name="pp[UserID]" value="<?php echo isset($user->UserID) ? $user->UserID : $userinfo->UserID; ?>">

                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">First Name</label><br>
                                <input type="text" class="form-control" value="<?php echo isset($user->FirstName) ? $user->FirstName : "";?>" name="pp[FirstName]" data-validate="required" placeholder="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">Last Name</label><br>
                                <input type="text" class="form-control" value="<?php echo isset($user->LastName) ? $user->LastName : "";?>" name="pp[LastName]" placeholder="" required="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">Age</label><br>
                                <input type="number" class="form-control" value="<?php echo isset($user->Age) ? $user->Age : "";?>" name="pp[Age]" placeholder="">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">Church</label><br>
                                <select class="form-control" name="pp[ChurchID]">
                                    <option>Select Church</option>
                                    <?php
                                    foreach($churches as $church){
                                    ?>
                                        <option value="<?php echo $church->ChurchID; ?>" <?php echo $church->ChurchID == $user->ChurchID ? 'selected' : "";?>><?php echo $church->Name; ?> <small><?php echo strlen($church->City) > 0 ? "(".$church->City.")" : ""; ?></small></option>
                                    <?php }; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group-separator"></div>
                        
                        <div class="sections">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            
                                <div class="statuses form-group">
                                    <label class="control-label">Registration Options</label>
                                    <select id="package-status" class="form-control" name="pp[StatusID]" required="">
                                        <option>Select Status</option>
                                        <?php
                                        
                                        foreach($statuses as $status){
                                        ?>
                                            <option value="<?php echo $status->StatusID; ?>" <?php echo $status->StatusID == $user->StatusID ? 'selected' : ''; ?>><?php echo $status->Name; ?> <small><?php echo strlen($status->Notes) > 0 ? "(".$status->Notes.")" : ""; ?></small></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                
                                <div class="statuses form-group status3 <?php if($user->StatusID == 1 || $user->StatusID == 2){ echo 'show'; } ?>">
                                    <label class="control-label">Cabin</label><br>
                                    <select class="form-control" name="pp[CabinID]" id="cabins" data-validate="required">
                                        <option value="">Select</option>
                                        <?php
                                        foreach($cabins as $cabins){
                                        ?>
                                            <option value="<?php echo $cabins->CabinID; ?>" <?php echo $cabins->CabinID == $user->CabinID ? 'selected' : ''; ?>><?php echo $cabins->Name; ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                
                                <div class="statuses form-group status5 <?php if($user->StatusID == 3){ echo 'show'; } ?>">
                                    <label class="control-label">Tent</label><br>
                                    <select class="form-control" name="pp[TentID]" id="tents" data-validate="required">
                                        <option value="">Select</option>
                                        <?php
                                        foreach($tents as $tent){
                                        ?>
                                            <option value="<?php echo $tent->TentID; ?>" <?php echo $tent->TentID == $user->TentID ? 'selected' : ''; ?>><?php echo $tent->Name; ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                
                                <div class="statuses status2 <?php if($user->StatusID == 2 || $user->StatusID == 3 || $user->StatusID == 4){ echo 'show'; } ?>">
                                    <table class="table meal-table">
                                        <tbody>
                                            <thead>
                                                <th>Meal:</th>
                                                <th>22</th>
                                                <th>23</th>
                                                <th>24</th>
                                                <th>25</th>
                                            </thead>
                                            <tr>
                                                <td><label>Breakfast:</label></td>
                                                <td>-</td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal1]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal2) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal2]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal5) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal3]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal8) > 1 ? 'checked' : ""; ?>></label></td>                        
                                            </tr>
                                            <tr>
                                                <td><label>Lunch:</label></td>
                                                <td>-</td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal4]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal3) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal5]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal6) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal6]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal9) > 1 ? 'checked' : ""; ?>></label></td>
                                            </tr>
                                            <tr>
                                                <td><label>Dinner:</label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal7]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal1) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal8]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal4) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Meal9]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?>" class="amt regcheckbox meal-yes" <?php echo strlen($user->Meal7) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td>-</td>                        
                                            </tr>
                                            <tr>
                                                <td colspan="5"><label><input type="checkbox" id="selectallMeals" class="regcheckbox selectall" name=""> Select All</label></td>                        
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            
                                <div class="statuses status1 <?php if($user->StatusID == 4 || $user->StatusID == 2 || $user->StatusID == 3){ echo 'show'; } ?>">
                                    <table class="table entrance-table">
                                        <tbody>
                                            <thead>
                                                <th>Entrance:</th>
                                                <th>22</th>
                                                <th>23</th>
                                                <th>24</th>
                                                <th>25</th>
                                            </thead>
                                            <tr>
                                                <td><label>-</label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Entrance1]" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : '0'; ?>" class="amt regcheckbox entrance-yes" <?php echo strlen($user->Entrance1) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Entrance2]" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : '0'; ?>" class="amt regcheckbox entrance-yes" <?php echo strlen($user->Entrance2) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Entrance3]" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : '0'; ?>" class="amt regcheckbox entrance-yes" <?php echo strlen($user->Entrance3) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Entrance4]" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : '0'; ?>" class="amt regcheckbox entrance-yes" <?php echo strlen($user->Entrance4) > 1 ? 'checked' : ""; ?>></label></td>                        
                                            </tr>
                                            <tr>
                                                <td colspan="5"><label><input type="checkbox" id="selectallEntrance" name="" class="regcheckbox selectall" rel="entrance-yes"> Select All</label></td>                        
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="statuses status4 <?php if($user->StatusID == 2){ echo 'show'; } ?>">
                                    <table class="table cabin-table">
                                        <tbody>
                                            <thead>
                                                <th>Cabin:</th>
                                                <th>1st</th>
                                                <th>2nd</th>
                                                <th>3rd</th>
                                                <th></th>
                                            </thead>
                                            <tr>
                                                <td><label>-</label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Cabin1]" value="<?php echo isset($products[0]->Price) ? $products[0]->Price : '0'; ?>" class="amt regcheckbox cabin-yes" <?php echo strlen($user->Cabin1) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Cabin2]" value="<?php echo isset($products[0]->Price) ? $products[0]->Price : '0'; ?>" class="amt regcheckbox cabin-yes" <?php echo strlen($user->Cabin2) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Cabin3]" value="<?php echo isset($products[0]->Price) ? $products[0]->Price : '0'; ?>" class="amt regcheckbox cabin-yes" <?php echo strlen($user->Cabin3) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td></td>                        
                                            </tr>
                                            <tr>
                                                <td colspan="5"><label><input type="checkbox" id="selectallCabins" name="" class="regcheckbox selectall" rel="cabin-yes"> Select All</label></td>                        
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="statuses status6 <?php if($user->StatusID == 3){ echo 'show'; } ?>">
                                    <table class="table tent-table">
                                        <tbody>
                                            <thead>
                                                <th>Tent:</th>
                                                <th>1st</th>
                                                <th>2nd</th>
                                                <th>3rd</th>
                                                <th></th>
                                            </thead>
                                            <tr>
                                                <td><label><input type="checkbox" name="ppmeta[TentOwned]" value="1" rel="tent-yes" class="regcheckbox owntent" <?php echo $user->TentOwned == 1 ? 'checked' : ""; ?>> Own Tent?</label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Tent1]" value="<?php echo isset($products[1]->Price) ? $products[1]->Price : ''; ?>" class="amt regcheckbox tent-yes" <?php echo strlen($user->Tent1) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Tent2]" value="<?php echo isset($products[1]->Price) ? $products[1]->Price : ''; ?>" class="amt regcheckbox tent-yes" <?php echo strlen($user->Tent2) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td><label><input type="checkbox" name="ppmeta[Tent3]" value="<?php echo isset($products[1]->Price) ? $products[1]->Price : ''; ?>" class="amt regcheckbox tent-yes" <?php echo strlen($user->Tent3) > 1 ? 'checked' : ""; ?>></label></td>
                                                <td></td>                        
                                            </tr>
                                            <tr>
                                                <td colspan="5"><label><input type="checkbox" id="selectallTents" name="" class="regcheckbox selectall" rel="tent-yes"> Select All</label></td>                        
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="section">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Amount</label><br>
                                    <input type="number" class="form-control" value="0" id="TotalAmount" name="ppmeta[TotalAmount]" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Paid</label><br>
                                    <input type="number" class="form-control" value="<?php echo isset($user->PaidAmount) ? $user->PaidAmount : "0"; ?>" id="PaidAmount" name="ppmeta[PaidAmount]">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Balance</label><br>
                                    <input type="number" class="form-control" value="0" id="Balance" name="ppmeta[Balance]" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Excess</label><br>
                                    <input type="number" class="form-control" value="0" id="Excess" name="ppmeta[Excess]" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Notes</label><br>
                                    <textarea class="form-control" name="ppmeta[Notes]" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group-separator"></div>
                        <div class="item form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?php echo view::url('participants'); ?>" class="btn btn-warning">Back</a>
                                <button type="submit" class="btn btn-success">Update Participant</button>
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
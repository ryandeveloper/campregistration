<?php 
View::$title = 'Participants';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>

<!-- Main Container -->
<div class="main_container">
<?php echo View::getMessage(); ?>
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo View::$title; ?></h3>

                    <a class="btn btn-success pull-right" href="javascript:;" onclick="jQuery('#modalParticipant').modal('show', {backdrop: 'static'});">Add Participant</a>
                </div>
                <pre>
                <?php print_r($participants); ?>
                </pre>
                <div class="panel-body">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive bulk_action nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="50" class="no-sorting">Status</th> 
                                <th class="no-sorting" width="50px">Gender</th>
                                <th class="no-sorting">Name</th>
                                <th class="no-sorting">Age</th>
                                <th class="no-sorting">Type</th>
                                <th class="no-sorting">Church</th>
                                <th class="no-sorting">Cabin</th>
                                <th class="no-sorting">Tent</th>
                                <th class="no-sorting">Due</th>
                                <th class="no-sorting">Paid</th>
                                <th class="no-sorting">Balance</th>
                                <th class="no-sorting">Encoder</th>
                                <th width="150" class="no-sorting text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $cntr = 0;
                            if(isset($participants)) {
                                foreach($participants as $participant) { $cntr++;
                                ?>
                                    <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer">
                                        <td class="text-center">
                                        <?php if($participant->Cleard == "0"){ ?>
                                            <i class="fa fa-close" style="color: red; font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-check" style="color:#8dc63f; font-size: 18px;"></i>
                                        <?php } ?>
                                        </td>
                                        <td><?php if($participant->Gender == "Brother"){echo "Bro";}elseif($participant->Gender == "Sister"){echo "Sis";}elseif ($participant->Gender == "Pastor") { echo "Ptr";} ?></td>
                                        <td><?php echo ucwords($participant->FirstName); ?> <?php echo ucwords($participant->LastName); ?></td>
                                        <td><?php echo $participant->Age; ?></td>
                                        <td><?php echo ucwords($participant->statsName); ?></td>
                                        <td><?php echo ucwords($participant->churchName); ?></td>
                                        <td><?php echo ucwords($participant->cabinName); ?></td>
                                        <td><?php echo ucwords($participant->tentName); ?></td>
                                        <td><?php echo $participant->TotalAmount; ?></td>
                                        <td><?php echo $participant->PaidAmount; ?></td>
                                        <td><?php echo $participant->Balance; ?></td>
                                        <td><?php echo ucwords($participant->encoderFirstName); ?></td>
                                        <td style="text-align:center;">
                                            <a href="<?php echo View::url('participants/edit/'); ?><?php echo $participant->PPID; ?>" title="Edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                                            <?php if($userinfo->Level == 1) { ?>
                                            <a href="<?php echo View::url('participants/delete/'); ?><?php echo $participant->PPID; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $participant->FirstName; ?> <?php echo $participant->LastName; ?>?');" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr class="">
                                    <td>NO DATA</td>
                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>

         </div>
     </div>

</div>
<!-- /Main Container -->
<?php View::footer(); ?>

<!-- Popup Add Form Modal -->
<div class="modal fade" id="modalParticipant">
    <div class="modal-dialog participant-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Participant</h4>
            </div>
 
            <form class="form-horizontal" enctype="multipart/form-data" method="post">

                <div class="modal-body">
                    <input class="" type="hidden" name="action" value="addparticipant" />

                    <input type="hidden" id="cabinPrice" value="<?php echo isset($products[0]->Price) ? $products[0]->Price : ''; ?>">
                    <input type="hidden" id="tentPrice" value="<?php echo isset($products[1]->Price) ? $products[1]->Price : ''; ?>">
                    <input type="hidden" id="mealprice" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>">
                    <input type="hidden" id="packagePrice" value="<?php echo isset($products[3]->Price) ? $products[3]->Price : ''; ?>">
                    <input type="hidden" id="owntentPrice" value="<?php echo isset($products[4]->Price) ? $products[4]->Price : ''; ?>">
                    <input type="hidden" id="entrancePrice" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : ''; ?>">
                    <input type="hidden" id="cleared" name="ppmeta[Cleard]" value="0">
                    <input type="checkbox" id="packfull" class="amt" value="<?php echo isset($products[3]->Price) ? $products[3]->Price : ''; ?>" style="display: none;">

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label">Gender</label><br>
                            <select class="form-control" name="pp[Gender]" required="">
                                <option>Select Gender</option>
                                <option>Brother</option>
                                <option>Sister</option>
                                <option>Pastor</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">Encoder</label><br>
                            <input type="text" class="form-control" value="<?php echo isset($userinfo->FirstName) ? $userinfo->FirstName : ''; ?>" readonly>
                            <input type="hidden" name="pp[UserID]" value="<?php echo isset($userinfo->UserID) ? $userinfo->UserID : ''; ?>">

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label">First Name</label><br>
                            <input type="text" class="form-control" value="" name="pp[FirstName]" placeholder="" required="">
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">Last Name</label><br>
                            <input type="text" class="form-control" value="" name="pp[LastName]" placeholder="" required="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label">Age</label><br>
                            <input type="number" class="form-control" value="" name="pp[Age]" placeholder="">
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">Church</label><br>
                            <select class="form-control" name="pp[ChurchID]">
                                <option>Select Church</option>
                                <?php
                                foreach($churches as $church){
                                ?>
                                    <option value="<?php echo $church->ChurchID; ?>"><?php echo $church->Name; ?> <small><?php echo strlen($church->City) > 0 ? "(".$church->City.")" : ""; ?></small></option>
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
                                        <option value="<?php echo $status->StatusID; ?>"><?php echo $status->Name; ?> <small><?php echo strlen($status->Notes) > 0 ? "(".$status->Notes.")" : ""; ?></small></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            
                            <div class="statuses form-group status3">
                                <label class="control-label">Cabin</label><br>
                                <select class="form-control" name="pp[CabinID]" id="cabins">
                                    <option>Select</option>
                                    <?php
                                    foreach($cabins as $cabins){
                                    ?>
                                        <option value="<?php echo $cabins->CabinID; ?>"><?php echo $cabins->Name; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            
                            <div class="statuses form-group status5">
                                <label class="control-label">Tent</label><br>
                                <select class="form-control" name="pp[TentID]" id="tents">
                                    <option>Select</option>
                                    <?php
                                    foreach($tents as $tent){
                                    ?>
                                        <option value="<?php echo $tent->TentID; ?>"><?php echo $tent->Name; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            
                            <div class="statuses status2">
                                <table class="table meal-table">
                                    <tbody>
                                        <thead>
                                            <th>Meal:</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                        </thead>
                                        <tr>
                                            <td><label>Breakfast:</label></td>
                                            <td>-</td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal1]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal2]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal3]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>                        
                                        </tr>
                                        <tr>
                                            <td><label>Lunch:</label></td>
                                            <td>-</td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal4]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal5]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal6]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Dinner:</label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal7]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal8]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Meal9]" value="<?php echo isset($products[2]->Price) ? $products[2]->Price : ''; ?>" class="amt regcheckbox meal-yes"></label></td>
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
                        
                            <div class="statuses status1">
                                <table class="table entrance-table">
                                    <tbody>
                                        <thead>
                                            <th>Entrance:</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                        </thead>
                                        <tr>
                                            <td><label>-</label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Entrance1]" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : ''; ?>" class="amt regcheckbox entrance-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Entrance2]" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : ''; ?>" class="amt regcheckbox entrance-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Entrance3]" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : ''; ?>" class="amt regcheckbox entrance-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Entrance4]" value="<?php echo isset($products[5]->Price) ? $products[5]->Price : ''; ?>" class="amt regcheckbox entrance-yes"></label></td>                        
                                        </tr>
                                        <tr>
                                            <td colspan="5"><label><input type="checkbox" id="selectallEntrance" name="" class="regcheckbox selectall" rel="entrance-yes"> Select All</label></td>                        
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="statuses status4">
                                <table class="table cabin-table">
                                    <tbody>
                                        <thead>
                                            <th>Cabin:</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                        </thead>
                                        <tr>
                                            <td><label>-</label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Cabin1]" value="<?php echo isset($products[0]->Price) ? $products[0]->Price : ''; ?>" class="amt regcheckbox cabin-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Cabin2]" value="<?php echo isset($products[0]->Price) ? $products[0]->Price : ''; ?>" class="amt regcheckbox cabin-yes"</label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Cabin3]" value="<?php echo isset($products[0]->Price) ? $products[0]->Price : ''; ?>" class="amt regcheckbox cabin-yes"></label></td>
                                            <td></td>                        
                                        </tr>
                                        <tr>
                                            <td colspan="5"><label><input type="checkbox" id="selectallCabins" name="" class="regcheckbox selectall" rel="cabin-yes"> Select All</label></td>                        
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="statuses status6">
                                <table class="table tent-table">
                                    <tbody>
                                        <thead>
                                            <th>Tent:</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                        </thead>
                                        <tr>
                                            <td><label><input type="checkbox" name="ppmeta[TentOwned]" value="1" rel="tent-yes" class="regcheckbox owntent"> Own Tent?</label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Tent1]" value="<?php echo isset($products[1]->Price) ? $products[1]->Price : ''; ?>" class="amt regcheckbox tent-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Tent2]" value="<?php echo isset($products[1]->Price) ? $products[1]->Price : ''; ?>" class="amt regcheckbox tent-yes"></label></td>
                                            <td><label><input type="checkbox" name="ppmeta[Tent3]" value="<?php echo isset($products[1]->Price) ? $products[1]->Price : ''; ?>" class="amt regcheckbox tent-yes"></label></td>
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
                                <input type="number" class="form-control" value="0" id="PaidAmount" name="ppmeta[PaidAmount]">
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

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Cabin</button>
                </div>

            </form>
        </div>
    </div>
</div>
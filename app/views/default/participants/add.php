<?php 
View::$title = 'Add Participant';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>
<style>
    .form-group { overflow: hidden; }
    .table.meal-table td {
        padding: 10px;
    }
</style>
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
                    <form enctype="multipart/form-data" method="post">
                        <input class="form-horizontal" type="hidden" name="action" value="addcabin" />

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">Gender</label><br>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>Brother</option>
                                    <option>Sister</option>
                                    <option>Pastor</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">Encoder</label><br>
                                <input type="text" class="form-control" value="<?php echo isset($userinfo->FirstName) ? $userinfo->FirstName : ''; ?>" name="FirstName" readonly>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">First Name</label><br>
                                <input type="text" class="form-control" value="<?php echo isset($cabin->Name) ? $cabin->Name : ''; ?>" name="FirstName" placeholder="">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">Last Name</label><br>
                                <input type="text" class="form-control" value="<?php echo isset($cabin->Name) ? $cabin->Name : ''; ?>" name="LastName" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">Age</label><br>
                                <input type="number" class="form-control" value="<?php echo isset($cabin->Name) ? $cabin->Name : ''; ?>" name="Age" placeholder="">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">Church</label><br>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>Brother</option>
                                    <option>Sister</option>
                                    <option>Pastor</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group-separator"></div>
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">Registration Options</label>
                                <select class="form-control">
                                    <option>Select Status</option>
                                    <option>Cabin (Lodge Only)</option>
                                    <option>Infant (Free)</option>
                                    <option>Package (Full)</option>
                                    <option>Walk In</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Cabin</label><br>
                                    <select class="form-control">
                                        <option>Select</option>
                                        <option>Cabin 1</option>
                                        <option>Cabin 2</option>
                                        <option>Cabin 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tent</label><br>
                                    <select class="form-control">
                                        <option>Select</option>
                                        <option>Tent 1</option>
                                        <option>Tent 2</option>
                                        <option>Tent 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group section">
                            <div class="col-sm-6">
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
                                            <td>-</td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>                        
                                        </tr>
                                        <tr>
                                            <td colspan="5"><a href="javascript:void(0);" class="selectall selmeals" rel="meals">Select All</a></td>                        
                                        </tr>
                                    </tbody>
                                </table>

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
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>                        
                                        </tr>
                                        <tr>
                                            <td><label>Lunch:</label></td>
                                            <td>-</td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                        </tr>
                                        <tr>
                                            <td><label>Dinner:</label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td>-</td>                        
                                        </tr>
                                        <tr>
                                            <td colspan="5"><a href="javascript:void(0);" class="selectall selmeals" rel="meals">Select All</a></td>                        
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="col-sm-6">
                                
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
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td></td>                        
                                        </tr>
                                        <tr>
                                            <td colspan="5"><a href="javascript:void(0);" class="selectall selmeals" rel="meals">Select All</a></td>                        
                                        </tr>
                                    </tbody>
                                </table>

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
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary"> Own Tent?</label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td><label><input type="checkbox" name="" class="cbr cbr-secondary" checked=""></label></td>
                                            <td></td>                        
                                        </tr>
                                        <tr>
                                            <td colspan="5"><a href="javascript:void(0);" class="selectall selmeals" rel="meals">Select All</a></td>                        
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                        
                        <div class="form-group section">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Amount</label><br>
                                    <input type="text" class="form-control" value="3232" name="TotalAmount" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Paid</label><br>
                                    <input type="text" class="form-control" value="" name="TotalAmount">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Balance</label><br>
                                    <input type="text" class="form-control" value="3232" name="TotalAmount" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Excess</label><br>
                                    <input type="text" class="form-control" value="3232" name="TotalAmount" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Notes</label><br>
                                    <textarea class="form-control" name="notes" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>
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
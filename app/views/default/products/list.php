<?php 
View::$title = 'Products';
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

                    <a class="btn btn-success pull-right" href="javascript:;" onclick="jQuery('#modalProducts').modal('show', {backdrop: 'static'});">Add Product</a>
                </div>

                <div class="panel-body">
                    <table id="test" class="table column-filter table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr class="replace-inputs">
                                <th>Name</th>
                                <th>Description</th>
                                <th width="200" class="text-center">Price</th>
                                <th width="200" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $cntr = 0;
                            if(count($products)) {
                            foreach($products as $product) { $cntr++;
                            ?>
                                <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer prid-<?php echo $product->ProductID; ?>">
                                    <td><?php echo ucwords($product->Name); ?></td>
                                    <td><?php echo ucwords($product->Description); ?></td>
                                    <td class="text-center"><?php echo number_format($product->Price); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo View::url('products/edit/'.$product->ProductID); ?>" title="Edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                                        <?php if($userinfo->Level == 1) { ?>
                                        <a href="<?php echo View::url('products/delete/'.$product->ProductID); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $product->Name; ?>?');" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php }
                            } else {?>
                            <tr class="">
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
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
<div class="modal fade" id="modalProducts">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Product</h4>
            </div>
 
            <form class="form-horizontal" enctype="multipart/form-data" method="post">

                <div class="modal-body">
                    <input type="hidden" name="action" value="addproduct" />

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="" name="Name" placeholder="" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Description</label>

                        <div class="col-sm-9">
                            <input type="text" name="Description" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Price</label>

                        <div class="col-sm-9">
                            <input type="number" name="Price" value="" class="form-control" required="required">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Product</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php 
View::$title = 'Dashboard';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>

<!-- Main Container -->
<div class="main_container">

  <div class="panel panel-default">
  	<div class="panel-heading">
        <h3 class="panel-title"><?php echo View::$title; ?> <br><small class="text-muted"><strong>LEGEND:</strong> GTP = PARTICULARS | TATP = TOTAL AMOUNT TO PAY | TAP = TOTAL AMOUNT PAID</small></h3><br>
    </div>
    <div class="panel-body">   
      <div class="row">

      	<!-- Content block 1 -->
        <div class="col-md-6 col-sm-12 col-xs-12">

    		<div class="contentBlock">
		   	<h4>Financial Report</h4>
		   		<!-- GTP 1 -->
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th></th>
			         </tr>
			         <tr>
			            <td><label>Total Amount to Pay (TATP)</label></td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalAmountToPay) ? $totals->TotalAmountToPay : "0" ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			         </tr>
			         <tr>
			            <td><label>Total Amount Paid (TAP)</label></td>
			            <td>
			               <h3 class="center"data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalPaidAmount) ? $totals->TotalPaidAmount : "0" ?>" data-suffix="" data-duration="0.9"><span class="num"></span></h3>
			            </td>
			         </tr>
			         <tr>
			            <td><label>Total Amount in Excess of TAP</label></td>
			            <td>
			               <h3 class="center"data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalAmountExcess) ? $totals->TotalAmountExcess : "0" ?>" data-suffix="" data-duration="1"><span class="num"></span></h3>
			            </td>
			         </tr>
			         <tr>
			            <td><label>Total Amount Unpaid</label></td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalUnpaidAmt) ? $totals->TotalUnpaidAmt : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></h3>
			            </td>
			         </tr>
			      </tbody>
			   </table>

			   <h4>Cash Flow</h4>
			   <!-- GTP 2 -->
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th>Total Amt</th>
			         </tr>
			         <tr>
			            <td><label>Total Collections</label></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalCollection) ? $totals->TotalCollection : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Total Disbursements</label></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalWithdraw) ? $totals->TotalWithdraw : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td>Total Available Cash</td>
			            <td>
			            	<?php 
			            	$totalCol = isset($totals->TotalCollection) ? $totals->TotalCollection : "0";
			            	$totalWithdraw = isset($totals->TotalWithdraw) ? $totals->TotalWithdraw : "0";
			            	$totalCash = $totalCol - $totalWithdraw;
			            	?>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo $totalCash; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			         </tr>
			         <tr>
			         	<td><a class="btn btn-info btn-sm" href="<?php echo View::url('finances'); ?>">View all history</a></td>
			         	<td></td>
			         </tr>
			      </tbody>
			   </table>
			   
			   <!-- GTP 3 -->
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th>TATP</th>
			            <th>TAP</th>
			            <th>Excess</th>
			            <th>Balance</th>
			         </tr>
			         <tr>
			            <td><label>Full Package</label></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalAmtPackage) ? $totals->TotalAmtPackage : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalPackagePaid) ? $totals->TotalPackagePaid : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalPackageExcess) ? $totals->TotalPackageExcess : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalPackageBal) ? $totals->TotalPackageBal : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Cabin</label></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalCabAmt) ? $totals->TotalCabAmt : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalCabPaid) ? $totals->TotalCabPaid : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalCabExcess) ? $totals->TotalCabExcess : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalCabBal) ? $totals->TotalCabBal : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Tent</label></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalTentAmt) ? $totals->TotalTentAmt : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalTentPaid) ? $totals->TotalTentPaid : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalTentExcess) ? $totals->TotalTentExcess : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalTentBal) ? $totals->TotalTentBal : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Walk-in</label></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalWIAmt) ? $totals->TotalWIAmt : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalWIPaid) ? $totals->TotalWIPaid : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalWIExcess) ? $totals->TotalWIExcess : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			            <td data-count=".num" data-from="0" data-to="<?php echo isset($totals->TotalWIBal) ? $totals->TotalWIBal : "0" ?>" data-suffix="" data-duration="1.1"><span class="num"></span></td>
			         </tr>
			      </tbody>
			   </table>

			   <h4>Prices</h4>
			   <!-- GTP 4 -->
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th>Per Day</th>
			            <th>Total Amt</th>
			         </tr>
			         <tr>
			            <td><label>Full Package</label></td>
			            <td><?php echo isset($products[3]->Price) ? $products[3]->Price / 3 : '0'; ?></td>
			            <td><?php echo isset($products[3]->Price) ? $products[3]->Price : '0'; ?></td>
			         </tr>
			         <tr>
			            <td><label>Cabin (Lodging only)</label></td>
			            <td><?php echo isset($products[0]->Price) ? $products[0]->Price : '0'; ?></td>
			            <td><?php echo isset($products[0]->Price) ? $products[0]->Price * 3 : '0'; ?></td>
			         </tr>
			         <tr>
			            <td><label>Tent (Lodging only)</label></td>
			            <td><?php echo isset($products[1]->Price) ? $products[1]->Price : '0'; ?></td>
			            <td><?php echo isset($products[1]->Price) ? $products[1]->Price * 3 : '0'; ?></td>
			         </tr>
			         <tr>
			            <td><label>Pesonal Tent (Lodging only)</label></td>
			            <td><?php echo isset($products[4]->Price) ? $products[4]->Price : '0'; ?></td>
			            <td><?php echo isset($products[4]->Price) ? $products[4]->Price * 3 : '0'; ?></td>
			         </tr>
			         <tr>
			            <td><label>Walk-in (Entrance)</label></td>
			            <td><?php echo isset($products[5]->Price) ? $products[5]->Price : '0'; ?></td>
			            <td><?php echo isset($products[5]->Price) ? $products[5]->Price * 3 : '0'; ?> (3 Days)</td>
			         </tr>
			         <tr>
			            <td><label>Meal</label></td>
			            <td><?php echo isset($products[2]->Price) ? $products[2]->Price : '0'; ?> / Meal</td>
			            <td><?php echo isset($products[2]->Price) ? $products[2]->Price * 9 : '0'; ?> (9 Meals)</td>
			         </tr>
			      </tbody>
			   </table>

			</div>
        
        </div>

        <!-- Content block 2 -->
        <div class="col-md-6 col-sm-12 col-xs-12">

        	<div class="contentBlock">
			   <h4>Attendance / Amt</h4>
			   <!-- GTP 5 -->
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th>Number of Attendees</th>
			            <th>Amount</th>
			         </tr>
		         	<?php 
		         		$totalHCab = $totals->Day1CountCab + $totals->Day2CountCab + $totals->Day3CountCab;
			         	$totalHTent = $totals->Day1CountTent + $totals->Day2CountTent + $totals->Day3CountTent;
			         	$totalHTentOwn = $totals->Day1CountTentOwn + $totals->Day2CountTentOwn + $totals->Day3CountTentOwn;
			         	$totalHWI = $totals->Day1CountWI + $totals->Day2CountWI + $totals->Day3CountWI;
			         	$totalHInf = $totals->HeadCountInf;

			         	$totalHead = $totalHCab + $totalHTent + $totalHTentOwn + $totalHWI + $totalHInf;
			         	$totalHeadAmt = $totals->HeadCountPackage * $products[3]->Price + $totalHCab * $products[0]->Price + $totalHTent * $products[1]->Price + $totalHTentOwn * $products[4]->Price + $totalHWI * $products[5]->Price;
		         	?>
			         <tr>
			            <td><label>Full Package</label></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->HeadCountPackage) ? $totals->HeadCountPackage : "0" ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->HeadCountPackage) ? $totals->HeadCountPackage * $products[3]->Price : "0"; ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Cabin (Lodging only)</label></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHCab) ? $totalHCab : "0" ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHCab) ? $totalHCab * $products[0]->Price : "0"; ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Tent (Lodging only)</label></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHTent) ? $totalHTent : "0" ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHTent) ? $totalHTent * $products[1]->Price : "0"; ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Personal Tent (Lodging only)</label></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHTentOwn) ? $totalHTentOwn : "0" ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHTentOwn) ? $totalHTentOwn * $products[4]->Price : "0"; ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Walk-in (Entrance)</label></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHWI) ? $totalHWI : "0" ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHWI) ? $totalHWI * $products[5]->Price : "0"; ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			         </tr>
			         <tr>
			            <td><label>Infants</label></td>
			            <td class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHInf) ? $totalHInf : "0"; ?>" data-suffix="" data-duration="0.5"><span class="num"></span></td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Total</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHead) ? $totalHead : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>
			            	<h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totalHeadAmt) ? $totalHeadAmt : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			         </tr>
			      </tbody>
			   </table>

			   <h4>Jabez</h4>
			   <!-- GTP 6 -->
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th>1st</th>
			            <th>2nd</th>
			            <th>3rd</th>
			         </tr>
			         <tr>
			            <td><label>Full Package</label></td>
			            <td><?php echo isset($totals->HeadCountPackage) ? $totals->HeadCountPackage : "0"; ?></td>
			            <td><?php echo isset($totals->HeadCountPackage) ? $totals->HeadCountPackage : "0"; ?></td>
			            <td><?php echo isset($totals->HeadCountPackage) ? $totals->HeadCountPackage : "0"; ?></td>
			         </tr>
			         <tr>
			            <td><label>Cabin (Lodging only)</label></td>
			            <td><?php echo isset($totals->Day1CountCab) ? $totals->Day1CountCab : "0"; ?></td>
			            <td><?php echo isset($totals->Day2CountCab) ? $totals->Day2CountCab : "0"; ?></td>
			            <td><?php echo isset($totals->Day3CountCab) ? $totals->Day3CountCab : "0"; ?></td>
			         </tr>
			         <tr>
			            <td><label>Tent (Lodging only)</label></td>
			            <td><?php echo isset($totals->Day1CountTent) ? $totals->Day1CountTent : "0"; ?></td>
			            <td><?php echo isset($totals->Day2CountTent) ? $totals->Day2CountTent : "0"; ?></td>
			            <td><?php echo isset($totals->Day3CountTent) ? $totals->Day3CountTent : "0"; ?></td>
			         </tr>
			         <tr>
			            <td><label>Personal Tent (Lodging only)</label></td>
			            <td><?php echo isset($totals->Day1CountTentOwn) ? $totals->Day1CountTentOwn : "0"; ?></td>
			            <td><?php echo isset($totals->Day2CountTentOwn) ? $totals->Day2CountTentOwn : "0"; ?></td>
			            <td><?php echo isset($totals->Day3CountTentOwn) ? $totals->Day3CountTentOwn : "0"; ?></td>
			         </tr>
			         <tr>
			            <td><label>Walk-in (Entrance)</label></td>
			            <td><?php echo isset($totals->Day1CountWI) ? $totals->Day1CountWI : "0"; ?></td>
			            <td><?php echo isset($totals->Day2CountWI) ? $totals->Day2CountWI : "0"; ?></td>
			            <td><?php echo isset($totals->Day3CountWI) ? $totals->Day3CountWI : "0"; ?></td>
			         </tr>
			      </tbody>
			   </table>

			   <h4>Meals</h4>
			   <?php 
		         	$TotalAmtMeal1 = isset($totals->CountMeal1) ? number_format($totals->CountMeal1 * $products[2]->Price) : "0";
		         	$TotalAmtMeal2 = isset($totals->CountMeal2) ? number_format($totals->CountMeal2 * $products[2]->Price) : "0";
		         	$TotalAmtMeal3 = isset($totals->CountMeal3) ? number_format($totals->CountMeal3 * $products[2]->Price) : "0";
		         	$TotalAmtMeal4 = isset($totals->CountMeal4) ? number_format($totals->CountMeal4 * $products[2]->Price) : "0";
		         	$TotalAmtMeal5 = isset($totals->CountMeal5) ? number_format($totals->CountMeal5 * $products[2]->Price) : "0";
		         	$TotalAmtMeal6 = isset($totals->CountMeal6) ? number_format($totals->CountMeal6 * $products[2]->Price) : "0";
		         	$TotalAmtMeal7 = isset($totals->CountMeal7) ? number_format($totals->CountMeal7 * $products[2]->Price) : "0";
		         	$TotalAmtMeal8 = isset($totals->CountMeal8) ? number_format($totals->CountMeal8 * $products[2]->Price) : "0";
		         	$TotalAmtMeal9 = isset($totals->CountMeal9) ? number_format($totals->CountMeal9 * $products[2]->Price) : "0";

		         	$TotalAmtMeals = $TotalAmtMeal1 + $TotalAmtMeal2 + $TotalAmtMeal3 + $TotalAmtMeal4 + $TotalAmtMeal5 + $TotalAmtMeal6 + $TotalAmtMeal7 + $TotalAmtMeal8 + $TotalAmtMeal9;
	         	?>
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
	      			<tbody>
			         <tr>
			            <th>Date</th>
			            <th>GTP</th>
			            <th>Number of Meals</th>
			            <th>Amount</th>
			         </tr>
			         <tr>
			            <td><label>Dec 22</label></td>
			            <td>Dinner</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal1) ? $totals->CountMeal1 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal1; ?></td>
			         </tr>
			         <tr>
			            <td><label>Dec 23</label></td>
			            <td>Breakfast</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal2) ? $totals->CountMeal2 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal2; ?></td>
			         </tr>
			         <tr>
			            <td><label>Dec 23</label></td>
			            <td>Lunch</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal3) ? $totals->CountMeal3 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal3; ?></td>
			         </tr>
			         <tr>
			            <td><label>Dec 23</label></td>
			            <td>Dinner</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal4) ? $totals->CountMeal4 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal4; ?></td>
			         </tr>
			         <tr>
			            <td><label>Dec 24</label></td>
			            <td>Breakfast</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal5) ? $totals->CountMeal5 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal5; ?></td>
			         </tr>
			         <tr>
			            <td><label>Dec 24</label></td>
			            <td>Lunch</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal6) ? $totals->CountMeal6 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal6; ?></td>
			         </tr>
			         <tr>
			            <td><label>Dec 24</label></td>
			            <td>Dinner</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal7) ? $totals->CountMeal7 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal7; ?></td>
			         </tr>
			         <tr>
			            <td><label>Dec 25</label></td>
			            <td>Breakfast</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal8) ? $totals->CountMeal8 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal8; ?></td>
			         </tr>
			         <tr>
			            <td><label>Dec 25</label></td>
			            <td>Lunch</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="<?php echo isset($totals->CountMeal9) ? $totals->CountMeal9 : "0"; ?>" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td><?php echo $TotalAmtMeal9; ?></td>
			         </tr>
			         <tr>

			            <td><label>Total</label></td>
			            <td></td>
			            <td></td>
			            <td><h3 class="center" data-count=".num" data-from="0" data-to="<?php echo $TotalAmtMeals; ?>" data-suffix="" data-duration="0.5$stats"><span class="num"></span></h3></td>
			         </tr>
			      </tbody>
			   </table>
			</div>

        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="contentBlock">
			   <h3>Stats</h3>
			   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive display nowrap dashboard-table" cellspacing="0" width="100%">
			      	<thead>
			            <th>Church</th>
			            <th>Total Count</th>
			            <th>Package</th>
			            <th>Cabin</th>
			            <th>Tent</th>
			            <th>Walkin</th>
			            <th>Infant</th>
			            <th>Amount to Pay</th>
			            <th>Paid Amount</th>
			            <th>Balance</th>
			         </thead>
			      <tbody>
		         	<?php 
                    $cntr = 0;
                    if(isset($stats)) {
                        foreach($stats as $stat) { $cntr++;
                        ?>
			         	<tr>
				            <td><?php echo isset($stat->Name) ? ucwords($stat->Name) : "None"; ?></td>
				            <td><?php echo isset($stat->ChurchCount) ? ucwords($stat->ChurchCount) : "None"; ?></td>
				            <td><?php echo isset($stat->ChurchPackCount) ? ucwords($stat->ChurchPackCount) : "None"; ?></td>
				            <td><?php echo isset($stat->ChurchCabCount) ? ucwords($stat->ChurchCabCount) : "None"; ?></td>
				            <td><?php echo isset($stat->ChurchTentCount) ? ucwords($stat->ChurchTentCount) : "None"; ?></td>
				            <td><?php echo isset($stat->ChurchWICount) ? ucwords($stat->ChurchWICount) : "None"; ?></td>
				            <td><?php echo isset($stat->ChurchInfCount) ? ucwords($stat->ChurchInfCount) : "None"; ?></td>
				            <td><?php echo isset($stat->ChurchTotalDue) ? number_format($stat->ChurchTotalDue) : "0"; ?></td>
				            <td><?php echo isset($stat->ChurchTotalPaid) ? number_format($stat->ChurchTotalPaid) : "0"; ?></td>
				            <td><?php echo isset($stat->ChurchTotalBal) ? number_format($stat->ChurchTotalBal) : "0"; ?></td>
			         	</tr>
			         	<?php }
                        	} else { ?>
                        <tr>
                        	<td>NO DATA</td>
                        </tr>
                    <?php }; ?>

			      </tbody>
			   </table>
			</div>
        </div>


      </div><!-- End Row -->   
    </div><!-- End panel-body -->
  </div><!-- End panel-default -->

</div>
<!-- /Main Container -->
<?php View::footer(); ?>

<?php 
View::$title = 'Dashboard';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>

<!-- Main Container -->
<div class="main_container">
<pre>
<?php print_r($userinfo); ?>
</pre>
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
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th></th>
			         </tr>
			         <tr>
			            <td><label>Total Amount to Pay (TATP)</label></td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="511645" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			         </tr>
			         <tr>
			            <td><label>Total Amount Paid (TAP)</label></td>
			            <td>
			               <h3 class="center"data-count=".num" data-from="0" data-to="195755" data-suffix="" data-duration="0.9"><span class="num"></span></h3>
			            </td>
			         </tr>
			         <tr>
			            <td><label>Total Amount in Excess of TAP</label></td>
			            <td>
			               <h3 class="center"data-count=".num" data-from="0" data-to="25" data-suffix="" data-duration="1"><span class="num"></span></h3>
			            </td>
			         </tr>
			         <tr>
			            <td><label>Total Amount Unpaid</label></td>
			            <td>
			               <h3 class="center"data-count=".num" data-from="0" data-to="315890" data-suffix="" data-duration="1.1"><span class="num"></span></h3>
			            </td>
			         </tr>
			      </tbody>
			   </table>

			   <h4>Cash Flow</h4>
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th>Total Amt</th>
			         </tr>
			         <tr>
			            <td><label>Total Collections</label></td>
			            <td>560,806.00</td>
			         </tr>
			         <tr>
			            <td><label>Total Disbursements</label></td>
			            <td>548,165.00</td>
			         </tr>
			         <tr>
			            <td>Total Available Cash</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="12641" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			         </tr>
			         <tr>
			         	<td><a class="btn btn-info btn-sm" href="#">View all history</a></td>
			         	<td></td>
			         </tr>
			      </tbody>
			   </table>
			   
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
			            <td>165000</td>
			            <td>3300</td>
			            <td>0</td>
			            <td>161700</td>
			         </tr>
			         <tr>
			            <td><label>Cabin</label></td>
			            <td>252650</td>
			            <td>101210</td>
			            <td>0</td>
			            <td>151440</td>
			         </tr>
			         <tr>
			            <td><label>Tent</label></td>
			            <td>41620</td>
			            <td>39370</td>
			            <td>0</td>
			            <td>2250</td>
			         </tr>
			         <tr>
			            <td><label>Walk-in</label></td>
			            <td>52375</td>
			            <td>51875</td>
			            <td>25</td>
			            <td>500</td>
			         </tr>
			      </tbody>
			   </table>

			   <h4>Prices</h4>
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th>Per Day</th>
			            <th>Total Amt</th>
			         </tr>
			         <tr>
			            <td><label>Full Package</label></td>
			            <td>550</td>
			            <td>1650</td>
			         </tr>
			         <tr>
			            <td><label>Cabin (Lodging only)</label></td>
			            <td>180</td>
			            <td>540</td>
			         </tr>
			         <tr>
			            <td><label>Tent (Lodging only)</label></td>
			            <td>100</td>
			            <td>300</td>
			         </tr>
			         <tr>
			            <td><label>Pesonal Tent (Lodging only)</label></td>
			            <td>85</td>
			            <td>255</td>
			         </tr>
			         <tr>
			            <td><label>Walk-in (Entrance)</label></td>
			            <td>25</td>
			            <td>100 (4 Days)</td>
			         </tr>
			         <tr>
			            <td><label>Meal</label></td>
			            <td>50/Meal</td>
			            <td>450 (9 Meals)</td>
			         </tr>
			      </tbody>
			   </table>

			</div>
        
        </div>

        <!-- Content block 2 -->
        <div class="col-md-6 col-sm-12 col-xs-12">

        	<div class="contentBlock">
			   <h4>Attendance / Amt</h4>
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
			      <tbody>
			         <tr>
			            <th>GTP</th>
			            <th>Number of Attendees</th>
			            <th>Amount</th>
			         </tr>
			         <tr>
			            <td><label>Full Package</label></td>
			            <td>100</td>
			            <td>165,000.00</td>
			         </tr>
			         <tr>
			            <td><label>Cabin (Lodging only)</label></td>
			            <td>276</td>
			            <td>138,780.00</td>
			         </tr>
			         <tr>
			            <td><label>Tent (Lodging only)</label></td>
			            <td>50</td>
			            <td>12,900.00</td>
			         </tr>
			         <tr>
			            <td><label>Personal Tent (Lodging only)</label></td>
			            <td>21</td>
			            <td>5,270.00</td>
			         </tr>
			         <tr>
			            <td><label>Walk-in (Entrance)</label></td>
			            <td>295</td>
			            <td>23,125.00</td>
			         </tr>
			         <tr>
			            <td><label>Infants</label></td>
			            <td>27</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Total</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="769" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>
			            	<h3 class="center" data-count=".num" data-from="0" data-to="345075" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			         </tr>
			      </tbody>
			   </table>

			   <h4>Jabez</h4>
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
			            <td>100</td>
			            <td>100</td>
			            <td>100</td>
			         </tr>
			         <tr>
			            <td><label>Cabin (Lodging only)</label></td>
			            <td>248</td>
			            <td>250</td>
			            <td>273</td>
			         </tr>
			         <tr>
			            <td><label>Tent (Lodging only)</label></td>
			            <td>39</td>
			            <td>49</td>
			            <td>41</td>
			         </tr>
			         <tr>
			            <td><label>Personal Tent (Lodging only)</label></td>
			            <td>21</td>
			            <td>21</td>
			            <td>20</td>
			         </tr>
			         <tr>
			            <td><label>Walk-in (Entrance)</label></td>
			            <td>201</td>
			            <td>215</td>
			            <td>258</td>
			         </tr>
			      </tbody>
			   </table>

			   <h4>Meals</h4>
			   <table class="table table-small-font table-bordered table-striped dashboard-table">
	      			<tbody>
			         <tr>
			            <th>Date</th>
			            <th>GTP</th>
			            <th>Number of Meals</th>
			            <th>Amount</th>
			         </tr>
			         <tr>
			            <td><label>Dec 25</label></td>
			            <td>Dinner</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="390" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>19,500.00</td>
			         </tr>
			         <tr>
			            <td><label>Dec 26</label></td>
			            <td>Breakfast</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="312" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>15,600.00</td>
			         </tr>
			         <tr>
			            <td><label>Dec 26</label></td>
			            <td>Lunch</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="397" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>19,850.00</td>
			         </tr>
			         <tr>
			            <td><label>Dec 26</label></td>
			            <td>Dinner</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="392" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>19,600.00</td>
			         </tr>
			         <tr>
			            <td><label>Dec 27</label></td>
			            <td>Breakfast</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="326" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>16,300.00</td>
			         </tr>
			         <tr>
			            <td><label>Dec 27</label></td>
			            <td>Lunch</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="407" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>20,350.00</td>
			         </tr>
			         <tr>
			            <td><label>Dec 27</label></td>
			            <td>Dinner</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="403" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>20,150.00</td>
			         </tr>
			         <tr>
			            <td><label>Dec 28</label></td>
			            <td>Breakfast</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="334" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>16,700.00</td>
			         </tr>
			         <tr>
			            <td><label>Dec 28</label></td>
			            <td>Lunch</td>
			            <td>
			               <h3 class="center" data-count=".num" data-from="0" data-to="408" data-suffix="" data-duration="0.8"><span class="num"></span></h3>
			            </td>
			            <td>20,400.00</td>
			         </tr>
			         <tr>
			            <td><label>Total</label></td>
			            <td></td>
			            <td></td>
			            <td><h3 class="center" data-count=".num" data-from="0" data-to="168450" data-suffix=".00" data-duration="0.8"><span class="num"></span></h3></td>
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
			         
			         <tr>
			            <td>Anahawan</td>
			            <td>5</td>
			            <td>0</td>
			            <td>5</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>4950</td>
			            <td>0</td>
			            <td>4950</td>
			         </tr>
			         <tr>
			            <td>Antipolo</td>
			            <td>106</td>
			            <td>0</td>
			            <td>59</td>
			            <td>0</td>
			            <td>39</td>
			            <td>8</td>
			            <td>53880</td>
			            <td>46530</td>
			            <td>7350</td>
			         </tr>
			         <tr>
			            <td>Banisilan</td>
			            <td>92</td>
			            <td>86</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>6</td>
			            <td>141900</td>
			            <td>0</td>
			            <td>141900</td>
			         </tr>
			         <tr>
			            <td>Binan</td>
			            <td>9</td>
			            <td>0</td>
			            <td>0</td>
			            <td>9</td>
			            <td>0</td>
			            <td>0</td>
			            <td>2250</td>
			            <td>0</td>
			            <td>2250</td>
			         </tr>
			         <tr>
			            <td>Bontoc</td>
			            <td>6</td>
			            <td>6</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>9900</td>
			            <td>0</td>
			            <td>9900</td>
			         </tr>
			         <tr>
			            <td>Bulihan</td>
			            <td>126</td>
			            <td>0</td>
			            <td>1</td>
			            <td>42</td>
			            <td>83</td>
			            <td>0</td>
			            <td>50015</td>
			            <td>50015</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Cabadbaran</td>
			            <td>43</td>
			            <td>0</td>
			            <td>40</td>
			            <td>0</td>
			            <td>0</td>
			            <td>3</td>
			            <td>39600</td>
			            <td>990</td>
			            <td>38610</td>
			         </tr>
			         <tr>
			            <td>Cagayan Valley</td>
			            <td>30</td>
			            <td>0</td>
			            <td>29</td>
			            <td>0</td>
			            <td>0</td>
			            <td>1</td>
			            <td>28710</td>
			            <td>0</td>
			            <td>28710</td>
			         </tr>
			         <tr>
			            <td>Calbayog</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Camiguin</td>
			            <td>18</td>
			            <td>0</td>
			            <td>15</td>
			            <td>0</td>
			            <td>0</td>
			            <td>3</td>
			            <td>14850</td>
			            <td>0</td>
			            <td>14850</td>
			         </tr>
			         <tr>
			            <td>Candelaria</td>
			            <td>50</td>
			            <td>0</td>
			            <td>29</td>
			            <td>0</td>
			            <td>21</td>
			            <td>0</td>
			            <td>23945</td>
			            <td>23945</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Carmona</td>
			            <td>23</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>23</td>
			            <td>0</td>
			            <td>800</td>
			            <td>800</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Conalum</td>
			            <td>9</td>
			            <td>0</td>
			            <td>8</td>
			            <td>0</td>
			            <td>0</td>
			            <td>1</td>
			            <td>7920</td>
			            <td>0</td>
			            <td>7920</td>
			         </tr>
			         <tr>
			            <td>Dasmarinas</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Del Gallego</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Lipa</td>
			            <td>36</td>
			            <td>1</td>
			            <td>35</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>34420</td>
			            <td>34420</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Lucena</td>
			            <td>8</td>
			            <td>6</td>
			            <td>2</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>11880</td>
			            <td>0</td>
			            <td>11880</td>
			         </tr>
			         <tr>
			            <td>Masbate</td>
			            <td>20</td>
			            <td>0</td>
			            <td>17</td>
			            <td>0</td>
			            <td>0</td>
			            <td>3</td>
			            <td>16830</td>
			            <td>0</td>
			            <td>16830</td>
			         </tr>
			         <tr>
			            <td>Nabua</td>
			            <td>17</td>
			            <td>0</td>
			            <td>14</td>
			            <td>0</td>
			            <td>2</td>
			            <td>1</td>
			            <td>12920</td>
			            <td>0</td>
			            <td>12920</td>
			         </tr>
			         <tr>
			            <td>San Pedro</td>
			            <td>110</td>
			            <td>1</td>
			            <td>4</td>
			            <td>20</td>
			            <td>85</td>
			            <td>0</td>
			            <td>35830</td>
			            <td>35830</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Tagkawayan</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			         </tr>
			         <tr>
			            <td>Tambongan</td>
			            <td>19</td>
			            <td>0</td>
			            <td>18</td>
			            <td>0</td>
			            <td>0</td>
			            <td>1</td>
			            <td>17820</td>
			            <td>0</td>
			            <td>17820</td>
			         </tr>
			         <tr>
			            <td>Trece Martires</td>
			            <td>42</td>
			            <td>0</td>
			            <td>0</td>
			            <td>0</td>
			            <td>42</td>
			            <td>0</td>
			            <td>3225</td>
			            <td>3225</td>
			            <td>0</td>
			         </tr>
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

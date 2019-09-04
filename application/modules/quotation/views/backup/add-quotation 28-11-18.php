<?php
 $this->load->view("header.php");
 $tableName = 'tbl_contact_m';
 $location  = 'manage_contact';
?>
<link href="<?=base_url();?>assets/plugins/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
<link href="<?=base_url();?>assets/plugins/colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet">
<link href="<?=base_url();?>assets/plugins/select2/css/select2.css" rel="stylesheet">

<form id="f1" name="f1" method="POST" action="insertQuotation" onSubmit="return checkKeyPressed(a)">

<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=42epwf1jarbwose89sqt3dztyfu7961g4cs5xoib4kordvbd"></script>
<script>tinymce.init({ selector:'#tem' });</script>

<!-- Main content -->
<div class="main-content">
<div class="panel-body panel panel-default">	
<ol class="breadcrumb breadcrumb-2"> 
		<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
		<li><a href="#">Quotation </a></li> 
		
		<li class="active"><strong><a href="#">Manage Quotation</a></strong></li> 
		<div class="pull-right">
		<a class="btn btn-sm" href="<?=base_url();?>quotation/manage_quotation">Manage Quotation</a>
		<a class="btn btn-sm" href="<?=base_url('report/Report/searchSalesdeals?id=add-quotation');?>">Refresh Contact</a>
		</div>
</ol>
		
<div class="row">
<div class="col-lg-12">
<div class="heading">
<h4 class="panel-title"><strong>Add Quotation</strong></h4>


<div class="panel-body">
<div class="table-responsive-">
<table class="table table-striped table-bordered table-hover" >
<thead>
<tr>
<th>Date</th>
<th>
  <input type="date"  class="form-control input-sm" id="dateValue" required name="date" onchange="genrateQuotation();" value="<?php echo $detail->invoice_date;?>" />
</th>
<th><div style="width:100px;">Customer Name</div></th>
<th style="width: 247px;">
<div class="field">
	<select name="vendor_id" style="width:100% !important" required id="contact_id_copy" class="select2  form-control input-sm" onChange="document.getElementsByName('contactid')[0].value=this.value;">
		<option value="" selected disabled>Select</option>
		<?php
		$contQuery=$this->db->query("select * from tbl_contact_m where status='A'");
		foreach($contQuery->result() as $contRow)
		 {
		 ?>
		    <option value="<?php echo $contRow->contact_id; ?>">
			 <p><strong><?=$contRow->contact_person;?></strong></p>
			 <p><strong>(<?=$contRow->title_deal;?>)</strong></p>
			</option>
		<?php } ?>
	</select>
    <a style="display:none" onClick="openpopup('<?=base_url();?>master/Account/add_contact',900,630,'','')"><img src="<?php echo base_url();?>/assets/images/addcontact.png" width="25px" height="25px"/></a>
</div>

</th>
<th style="display:none">Invoice Type</th>
<th style="display:none">
<div class="field">
	<select name="invoice_type" class="form-control"  required id="invoice_type"   <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>>
		<option value="GST">GST</option>
		
			<option value="No-Tax">
			No-Tax
			</option>
		
	</select>
</div>

</th>



<th><div style="width:100px;">Quotation No</div></th> 
<th><input type="text" name="purchase_no" id="quotationNo" readonly onkeyup="duplicate_po_check(this.value);" class="form-control input-sm"  required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php } ?> style="width: 250px;"></th>
<th style="display: none;">Term</th>
<th style="display: none;">
<input type="hidden"  class="form-control" min="0" name="due_date" value="<?php echo $detail->due_date;?>" />
</th>
</tr>
	
  </thead>
</table>
</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" >
		<tbody>
			<tr class="gradeA">
			<th>Product Code</th>
			<th style="display: none;">Quantity In Stock</th>
			<th>Unit</th>
			<th style="display:none;">Rate</th>
			<th style="display:none;">Quantity</th>
			<th>Grade</th>
			<th style="display: none;">Discount%</th>
			<th style="display: none;">Discount Amount</th>
			<th style="display: none;">CGST</th>
			<th style="display: none;">SGST</th>
			<th style="display: none;">IGST</th>
			<th style="display: none;">GST Total</th>
			<th style="display:none;">Total</th>
			<th style="display:none;">Net Price</th>
			</tr>

			<tr class="gradeA">
				<th style="width:320px;">
				<div class="input-group"> 
				<div style="width:100%; height:28px;" >

				<input type="text" name="prd"  onkeyup="getdata()" class="form-control input-sm" onClick="getdata()" id="prd" style=" width:230px;"  placeholder=" Search Items..." tabindex="5" autocomplete="off">
					<input type="hidden"  name="pri_id" id='pri_id'  value="" style="width:80px;"  />
					<img  style="display:none" src="<?php echo base_url();?>/assets/images/search11.png"  onClick="openpopup('<?=base_url();?>SalesOrder/all_product_function',1200,500,'view',<?=$sales[$i]['1'];?>)" /></div>

				</div>
					<div id="prdsrch" style="color:black;padding-left:0px; width:30%; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
				<?php
				//include("getproduct.php");
				$this->load->view('getproduct');

				?>
				</div>
				<a data-toggle="modal" data-target="#myModal" class="btn btn-sm" style="display: inline;float: right;    margin-right: 41px;
				    margin-top: -27px;" id="popupAdd"><i class="fa fa-plus" ></i> </a>

				</th>
				<th style="display: none;">
					<input type="hidden" readonly="" id="reorder" style="width:70px;" class="form-control"> 
					<input type="text" readonly=""   id="qty_stock" style="width:70px;" class="form-control input-sm"> 
				</th>

				<th>
				<input type="text" readonly="" id="usunit" style="width:70px;" class="form-control input-sm"> 
				</th>
				<th style="display:none;">
				<b id="lpr"></b>
				<input type="number" step="any" id="lph" min="1"  value="" class="form-control input-sm" style="width:70px;"></th>
				<th style="display:none;"><input type="number" id="qn" min="1" style="width:70px;"   class="form-control input-sm"></th>
                <th>
					<select id="grade" min="1" style="width:120px;"   class="form-control input-sm insertGrade" >
					<option value="">select Grade</option>
					<?php
						// $qryGrade=$this->db->query("select * from tbl_product_stock where status='1' and grade IS NOT NULL  group by grade order by grade ASC");
						// foreach($qryGrade->result_array() as $dt)
						// { 
						//	if($dt['grade'] != ""){ 
				        //       $grade[]   = '\''.$dt['grade'].'\'';
				        //       $implode = implode(',', $grade)
						//		?>
				        <!-- // <option value="<?=$implode;?>"><?=$dt['grade'];?></option> -->
				    <?php
						//}
					//}
				    ?>

				</select>
				<input type="hidden" name="quotationMapedValue" id="QuotationMap" class="form-control" style="width:70px;"/ >
				</th>

				<th style="display: none;"><input type="number" step="any" name="saleamnt" id="discount" class="form-control input-sm" style="width:70px;"/ ></th>
				<th style="display: none;"><input type="number" step="any" name="saleamnt" id="disAmt" class="form-control input-sm"  style="width:70px;"/ ></th>
				<th style="display: none;"><input type="number" min="1" step="any" name="saleamnt" id="cgst" class="form-control input-sm"  style="width:70px;"/ ></th>
				<th style="display: none;"><input type="number" min="1" step="any" name="saleamnt" id="sgst" class="form-control input-sm"   style="width:70px;"/ ></th>
                <th style="display: none;"><input type="number" step="any" name="saleamnt" id="igst" class="form-control input-sm"  style="width:70px;"/ ></th>
				<th style="display: none;"><input type="number" step="any" name="saleamnt" id="gstTotal" class="form-control input-sm"   style="width:70px;"/ ></th>


				<th style="display:none;"><input type="text" name="saleamnt" readonly="" id="tot" class="form-control input-sm" style="width:70px;"/ ></th>
				<th style="display:none;"><input type="text" name="saleamnt" readonly="" id="nettot" class="form-control input-sm"  style="width:70px;"/ ></th>

			</tr>
		</tbody>
    </table>

<table class="table table-striped table-bordered table-hover" >
<thead>
<tr id="selectTableBox"><th valign="top" style="vertical-align:top">Subject</th>
	<th valign="top"  class="form-control" style="width:12%; vertical-align:top;">
	<select name="subject" required class="form-control" id="sub">
		<option value="" >----Select Subject----</option>
	<!-- 		<?php 
			$sqlunit=$this->db->query("select * from tbl_product_subject where status = 1");
			foreach ($sqlunit->result() as $fetchunit){
			?>
		<option value="<?php echo $fetchunit->sub_details;?>"><?php echo $fetchunit->title; ?></option>
		<?php } ?> -->
	</select></th>

        

<th valign="top" style="vertical-align:top;">Contant</th>
<th  valign="top"  class="form-control" style="width:20%;">
	<select name="contant" required class="form-control" id="unit">
		<option value="" >----Select Contant----</option>
		<!-- 	<?php 
			$sqlunit=$this->db->query("select * from tbl_product_contant where status=1");
			foreach ($sqlunit->result() as $fetchunit){
			?>
		<option value="<?php echo $fetchunit->sub_details;?>"><?php echo $fetchunit->title; ?></option>
		<?php } ?> -->
	</select></th>
<th  valign="top"  class="form-control" style="width:8%;">Price;</th>	
  <td  valign="top"  class="form-control">
	<select name="priceText" required class="form-control" id="unit">
		<option value="" >----Select Price----</option>
		<!-- <?php 
		 $sqlunit=$this->db->query("select * from tbl_product_price_text where status=1");
		  foreach ($sqlunit->result() as $fetchunit){
		?><option value="<?php echo $fetchunit->sub_details;?>"><?php echo $fetchunit->title; ?></option>
	   <?php } ?> -->
	</select>  </td>	

  </tr>	

  </thead>

</table>	
	
</div>

<br><br>

<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
	

	<table id="invo" style="width:100%;  background:#dddddd;  height:70%;" title="Invoice"  >

		<tr>
			<td style="width:1%;"><div align="center"> <u>Sl No</u>.</div></td>
			<td style="width:11%;"><div align="center"><u>Item</u></div></td>
			<td style="width:3%; display:none;"> <div align="center"><u>Rate</u></div></td>
			<td style="width:3%;display:none;" ><div align="center"><u>Quantity</u></div></td>
			<td style="width:3%;" ><div align="center"><u>Grade</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>Discount</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>Discount Amount</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>CGST</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>SGST</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>IGST</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>GST TOTAL</u></div></td>
			<td style="width:3%;display:none;"> <div align="center"><u>Total</u></div></td>
			<td style="width:3%;display:none;"> <div align="center"><u>Net Price</u></div></td>
			<td style="width:3%;"> <div align="center"><u>Action</u></div></td>
		</tr>
	</table>


	<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
		<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoice" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

		<tr></tr>
		</table>
	</div>
</div>
<table class="table table-striped table-bordered table-hover">
<br><br>
		<tr>
			<h3 class="modal-title">&nbsp;&nbsp;<strong>Add Accessories</strong></h3>
		</tr>
		<br>
	<tr>

  		<th class="form-control" style="width:4%;">Select Category</th>	
  <td>
  	<input type="hidden" name="acc_cat_id" id="acc_cat_id" value="">
	<select name="accessories_cat" class="form-control" id="accessories_cat" onchange="getaccessoriescat(this)" value="" style="width: 200px;">
		<option value="" >----Select Category----</option>
		 <?php 
		 $sqlunit=$this->db->query("select * from tbl_master_data where status='A' and param_id=24");
		  foreach ($sqlunit->result() as $fetchunit){
		?>
		<option value='<?php echo $fetchunit->serial_number;?>' arrts='<?php echo json_encode($fetchunit)?>'><?php echo $fetchunit->keyvalue; ?></option>
	   <?php } ?> 
	</select>  </td>	



	<th class="form-control" style="width:4%;">Select Model</th>	
  <td id="accessories_subcat">
	<select name="accessories" class="form-control" id="accessories" onchange="getaccessories(this)" value="" subcat="" style="width: 230px;">
		<option value="" >----Select Model----</option>
	</select>  </td>	

	<th>Price</th>
<th>
<input type="hidden"  class="form-control" name="access_row" value="0" id="access_row"/>

<input type="text"  class="form-control" name="access_price" value="" readonly="true" id="access_price" style="width: 150px;"/>
</th>

	<th>Description</th>
<th>
<input type="text" class="form-control" name="access_descript" value="" readonly="true" id="access_descript" style="width: 150px;"/>
</th>
<th></th>
<td>
<input type="button" class="btn btn-sm" name="Add" value="ADD" readonly="true" id="AddButton" onclick="addaccessories()" />
</td>


  </tr>


</table>

			<br>
		
			<br>
<div style="width:100%; background:#dddddd; padding-left:0px; color:#000000; border:2px solid ">
	<table id="accessories_table" style="width:100%;  background:#dddddd;  height:70%;" title="accessories_table"  >
		


		<tr>
			<td style="width:8%;"> <div align="center"><u>S.No</u></div></td>
			<td style="width:1%;"><div align="center"> <u>Category</u>.</div></td>
			<td style="width:11%;"><div align="center"><u>Model</u></div></td>
			<td style="width:3%;display:none;" ><div align="center"><u>Quantity</u></div></td>
			<td style="width:3%;" ><div align="center"><u>Price</u></div></td>
			<td style="width:11%;"><div align="center"><u>Description</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>Discount</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>Discount Amount</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>CGST</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>SGST</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>IGST</u></div></td>
			<td style="width:3%;display: none;"> <div align="center"><u>GST TOTAL</u></div></td>
			<td style="width:3%;display:none;"> <div align="center"><u>Total</u></div></td>
			<td style="width:3%;display:none;"> <div align="center"><u>Net Price</u></div></td>
			<td style="width:3%;"> <div align="center"><u>Action</u></div></td>
		</tr>
		
	</table>


	<div style="width:100%; background:white;   color:#000000;  max-height:170px; overflow-x:auto;overflow-y:auto;" id="m">
		<table id="invoice"  style="width:100%;background:white;margin-bottom:0px;margin-top:0px;min-height:30px;" title="Invoicenew" class="table table-bordered blockContainer lineItemTable ui-sortable"  >

		<tr></tr>
		</table>
	</div>
</div>

<input type="hidden" name="rows" id="rows">
<!--//////////ADDING TEST/////////-->
<input type="hidden" name="spid" id="spid" value="d1"/>
<input type="hidden" name="ef" id="ef" value="0" />


<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >


<tbody>
	<tr class="gradeA" style="display:none">
	<th>Sub Total</th>
	<th>&nbsp;</th>
	<th>
	<input type="text" placeholder="Placeholder" id="sub_total" readonly="" name="sub_total" class="form-control input-sm">
	</th>
	</tr>

	<tr class="gradeA" style="display:none">
	<th>Service Charge</th>
	<th><input type="number" step="any" min="1" id="service_charge" onkeyup="serviceChargeCal();" name="service_charge_per" placeholder="0%" class="form-control"></th>
	<th><input type="text" readonly="" id="service_charge_total" name="service_charge_total" placeholder="Placeholder" class="form-control"></th>
	</tr>


	<tr style="display:none" class="gradeA">
	<th>Gross Discount</th>
	<th><input type="number" name="gross_discount_per" onkeyup="grossDiscountCal()" id="gross_discount_per" step="any" min="1" placeholder="%" class="form-control"></th>
	<th><input type="number" readonly="" name="gross_discount_total" id="gross_discount_total" step="any" placeholder="Placeholder" class="form-control"></th>
	</tr>



	<tr  class="gradeA">
	<th style="display: none;">CGST TAX</th>
	<th style="display: none" >&nbsp;<input  type="number" name="total_cgst"  id="total_cgst" step="any"  placeholder="%" class="form-control"></th>
	<th style="display: none;"><input type="number" readonly="" name="total_tax_cgst_amt" id="total_tax_cgst_amt" step="any" placeholder="Placeholder" class="form-control"></th>
	</tr>

	<tr  class="gradeA" style="display: none;">
	<th>SGST TAX</th>
	<th ><input  type="number" name="total_sgst"  id="total_sgst" step="any"  placeholder="%" class="form-control"></th>
	<th><input type="number" readonly="" name="total_tax_sgst_amt" id="total_tax_sgst_amt" step="any" placeholder="Placeholder" class="form-control"></th>
	</tr>

	<tr  class="gradeA" style="display: none;">
	<th>IGST TAX</th>
	<th><input style="display:none" type="number" name="total_igst"  id="total_igst" step="any" min="1" placeholder="%" class="form-control"></th>
	<th><input type="number" readonly="" name="total_tax_igst_amt" id="total_tax_igst_amt" step="any" placeholder="Placeholder" class="form-control"></th>
	</tr>
	<tr  class="gradeA" style="display: none;">
	<th>Total GST TAX</th>
	<th>&nbsp;</th>
	<th><input type="number" readonly="" name="total_gst_tax_amt" id="total_gst_tax_amt" step="any" placeholder="Placeholder" class="form-control"></th>
	</tr>




<tr  class="gradeA" style="display:none">
<th >Total Discount</th>
<th><input  type="number" name="total_dis"  id="total_dis" step="any" min="0" placeholder="%" class="form-control input-sm"></th>
<th><input type="number" readonly="" name="total_dis_amt" id="total_dis_amt" step="any" placeholder="Placeholder" class="form-control input-sm"></th>
</tr>




<tr class="gradeA" style="display:none">
<th>Grand Total</th>
<th>&nbsp;</th>
<th><input type="number" readonly="" step="any" id="grand_total" name="grand_total" placeholder="Placeholder" class="form-control input-sm"></th>
</tr>
<tr class="gradeA">
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<tr class="gradeA">
<th>

<th>&nbsp;</th>
<th>
<input class="btn btn-sm" type="button" value="SAVE"   id="sv1" onclick="fsv(this)" >
&nbsp;<a href="<?=base_url();?>quotation/manage_quotation" class="btn btn-secondary btn-sm">Cancel</a>
</th></th>
</tr>
</tbody>
</table>
</div>
<div id="quotationProductmapValue">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Quotation</h4>
          <div id="resultarea" class="text-center " style="font-size: 15px;color: red;"></div> 
        </div>
       <form class="form-horizontal" role="form"  enctype="multipart/form-data"  id="QuotationMapForm"> 
        <div class="modal-body">
         <div class="form-group"> 
           <label class="col-sm-2 control-label">Working pressure for all boiler models/Temperature for HW/HA/FT models :</label> 
           <div class="col-sm-3"> 
           <input type="hidden" name = "quotationPro" class="form-control" value="" id="quotationPro" >
           <input type="text" class="form-control input-sm" value="" id="quotation" onkeyup="getdataQuotation(this.value);" onClick="getdataQuotation(this.value);">
           <ul style="position: absolute;z-index: 999999;top: 25px;" id="productList">
		   </ul>
          </div>
          <label class="col-sm-2 control-label">Enter Price:</label> 
          <div class="col-sm-3" > 
          <input type="text" class="form-control input-sm" value="" id="quotationPrice" >
          <input type="hidden" name = "qid" class="form-control" value="" id="qid" >
          </div>
           <div class="col-sm-2" > 
           	
           	 <button  class="btn btn-default"  type="button" onclick="addQuotation()"><img src="<?=base_url();?>assets/images/plus.png" />
           	</button>
           </div>
        </div>
       <br>
       <table class="table table-bordered table-hover" >
       	<br>
       	  <tbody>
       	  	<tr class="gradeA">
				<th>Quotation Name</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
       	  </tbody>
       	  <tbody id="quotationTable">
       	  </tbody>
       </table>

     </div>
     <div class="modal-footer">

     <button type="button" class="btn btn-sm"  id="QuotationMap">Save</button> <!-- data-dismiss="modal" -->
    </form>
   </div>
  </div>
 </div>
</div>


<script>
//add item into showling list
window.addEventListener("keydown", checkKeyPressed, false);
//funtion to select product
function checkKeyPressed(e) {
  var s=e.keyCode;

  var ppp  = document.getElementById("prd").value;
  var sspp = document.getElementById("spid").value;//
  var ef   = document.getElementById("ef").value;
  ef       = Number(ef);
  var countids=document.getElementById("countid").value;


for(n=1;n<=countids;n++)
{
    document.getElementById("tyd"+n).onkeyup  = function (e) {
	var entr =(e.keyCode);
	if(entr==13){
	  document.getElementById("popupAdd").focus();
	  document.getElementById("prdsrch").innerHTML=" ";
	  document.getElementById("popupAdd").style.backgroundColor = "red";
	 }
	}
}

document.getElementById("popupAdd").onkeydown = function (e) {
  var entr =(e.keyCode);
  if(entr==13){
     document.getElementById("lph").focus();
   }
 }

document.getElementById("lph").onkeyup = function (e) {
var entr =(e.keyCode);
  if(entr==13){
  	document.getElementById("qn").focus();
  }
}

document.getElementById("qn").onkeyup = function (e) {
var entr =(e.keyCode);
if(entr==13){
 var qty_stock=document.getElementById("qty_stock").value;
 //var reorder=document.getElementById("reorder").value;


var rate=document.getElementById("lph").value;
var qnt=document.getElementById("qn").value;
var gstTotal=document.getElementById("gstTotal").value;
var total=(Number(rate)*Number(qnt));

var net_total=(Number(rate)*Number(qnt)+Number(gstTotal));
document.getElementById("tot").value=total;
document.getElementById("nettot").value=net_total;
document.getElementById("grade").focus();

}
}



// document.getElementById("discount").onkeyup = function (e) {
// var entr =(e.keyCode);
// if(entr==13){

// var toT=document.getElementById("tot").value;

// var igst=document.getElementById("igst").value;
// var cgst=document.getElementById("cgst").value;
// var gstTotal=document.getElementById("gstTotal").value;
// var DisS=document.getElementById("discount").value;

// var disPer=(Number(toT)*Number(DisS))/100;



// var totAftDis=Number(toT)-Number(disPer);
// //var gstDis=Number(totAftDis)*Number(igst)/100;
// if(Number(igst!=''))
// {
// var aftGstPer=Number(totAftDis)*Number(igst)/100;
// }
// else
// {
	
// 	var aftGstPer=Number(totAftDis)*Number(cgst)*2/100;
// }


// var afterGstTot=Number(totAftDis)+Number(aftGstPer);

// //var Ftot=Number(afterGstTot)+Number(aftGstPer);

// document.getElementById("disAmt").value=disPer;

// document.getElementById("gstTotal").value=aftGstPer
// ;
// document.getElementById("tot").value=toT;
// document.getElementById("nettot").value=afterGstTot.toFixed(2);
// document.getElementById("disAmt").focus();
// }

//}

/*document.getElementById("grade").onkeydown  = function (e) { 
var entr =(e.keyCode);
  if(document.getElementById("grade").value=="" && entr==08){
    document.getElementById("sub").focus();
   }
 return false;
  }
}*/



/*document.getElementById("sub").onkeydown  = function (e) {
var entr =(e.keyCode);
if(document.getElementById("contant").value=="" && entr==08){

}
   if (e.keyCode == "13")
	 {
	
	 e.preventDefault();
     e.stopPropagation();
	
	  if(ppp!=='' || ef==1)
	 {
        //adda();	  	
		var ddid = document.getElementById("spid").value;
		var ddi  = document.getElementById(ddid);
		ddi.id="d";
	}else{
	 alert("Enter Correct Product");
	}
	return false;
  }
}*/

document.getElementById("grade").onkeydown  = function (e) {
var entr =(e.keyCode);
if(document.getElementById("grade").value=="" && entr==08){

}
   if (e.keyCode == "13")
	 {
	
	 e.preventDefault();
     e.stopPropagation();
	
	  if(ppp!=='' || ef==1)
	 {
        //adda();	  	
		var ddid = document.getElementById("spid").value;
		var ddi  = document.getElementById(ddid);
		ddi.id="d";
	}else{
	 alert("Enter Correct Product");
	}
	return false;
  }
}

document.getElementById("grade").onkeyup = function (e) {
// 	if(document.getElementById("grade").value=="" && entr==08){

// }
   if (e.keyCode == "13")
	 {
	   e.preventDefault();
       e.stopPropagation();
	 if(ppp!=='' || ef==1)
	   {
		adda();	  	
		var ddid=document.getElementById("spid").value;
		var ddi=document.getElementById(ddid);
		ddi.id="d";
		
		}else{
	        alert("Enter Correct Product");
			}
		return false;
    }
}

}
/////////////////////////////////////////////

function fsv(v)
{
var rc=document.getElementById("rows").value;

if(rc!=0)
{
v.type="submit";
}
else
 {
	alert('No Item To Save..');	
 }
}


function getdata()
		  {
		  
		 currentCell = 0;
		 var product1=document.getElementById("prd").value;	 
		 var product=product1;
		 var conatctId=document.getElementById("contact_id_copy").value;
			 
			 
		if(conatctId=='')
		{
		alert('Plase Select Contact First');
		document.getElementById("contact_id_copy").focus();
		}	
		if(invoice_type=='')
		{
		alert('Plase Select Invoice Type');
		document.getElementById("invoice_type").focus();
		}
		
		
		    
		    if(xobj)
			 {
			 var obj=document.getElementById("prdsrch");
			
			 xobj.open("GET","getproduct?con="+product+"&con_id="+conatctId+"&invoice_type="+invoice_type,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			   	console.log(xobj.responseText);
			    obj.innerHTML=xobj.responseText;

			   
			   }
			  }
			 }
			 xobj.send(null);
		  }
  
////////////////////////////////////////////////////

 function slr(){
		var table = document.getElementById('invoice');
        var rowCount = table.rows.length;
		  for(var i=1;i<rowCount;i++)
		  {    
              table.rows[i].cells[0].innerHTML=i;
		  }
 
			  
}  



//////////////////////////////////////////////////////////////



     var rw=0;
	 
 function adda()
		  { 
		 
		  	var qn=document.getElementById("qn").value;
			var unit=document.getElementById("usunit").value;
			var lph=document.getElementById("lph").value;
			var dis=document.getElementById("discount").value;	
			var disAmount = document.getElementById("disAmt").value;		
		       
			var cgst      = document.getElementById("cgst").value;		
			var igst      = document.getElementById("igst").value;		
			var sgst      = document.getElementById("sgst").value;		
			var gstTotal  = document.getElementById("gstTotal").value;
			var qty_stock = document.getElementById("qty_stock").value;
			var gradeval  = document.getElementById("grade").value;
			var QuotationMapval = document.getElementById("QuotationMap").value;
			var tot=document.getElementById("tot").value;
			var nettot=document.getElementById("nettot").value;
			  	
			
				
				//default
				var rows=document.getElementById("rows").value;
				var pri_id=document.getElementById("pri_id").value;
				var pd=document.getElementById("prd").value;
		   	   var table = document.getElementById("invoice");
					var rid =Number(rows)+1;
					document.getElementById("rows").value=rid;
					
						
							totalSum();	
							//serviceChargeCal();
							//grossDiscountCal();				
             				clear();
				
					currentCell = 0;
	                if(pd!="" && qn!=0)
					{
				    var indexcell=0;
					var row = table.insertRow(-1);
					rw=rw+0;
						
						//cell 0st
	                var cell=cell+indexcell;		
 	                cell = row.insertCell(0);
	                cell.style.width=".20%";
	                cell.align="center"
	                cell.innerHTML=rid;
				
				
				//cell 1st item name
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;	
			
	    cell = row.insertCell(indexcell);
				cell.style.width="11%";
				cell.align="center";
				
				
				
				
				//============================item text ============================
				var prd = document.createElement("input");
							prd.type="text";
							prd.border ="0";
							prd.value=pd;	
							prd.name='pd[]';//
							prd.id='pd'+rid;//
							prd.readOnly = true;
							prd.style="text-align:center";  
							prd.style.width="100%";
							prd.style.border="hidden"; 
							cell.appendChild(prd);
				var priidid = document.createElement("input");
							priidid.type="hidden";
							priidid.border ="0";
							priidid.value=pri_id;	
							priidid.name='main_id[]';//
							priidid.id='main_id'+rid;//
							priidid.readOnly = true;
							priidid.style="text-align:center";  
							priidid.style.width="100%";
							priidid.style.border="hidden"; 
							cell.appendChild(priidid);
							
							
							var unitt = document.createElement("input");
							unitt.type="hidden";
							unitt.border ="0";
							unitt.value=unit;	
							unitt.name='unit[]';//
							unitt.id='unit'+rid;//
							unitt.readOnly = true;
							unitt.style="text-align:center";  
							unitt.style.width="100%";
							unitt.style.border="hidden"; 
							cell.appendChild(unitt);
					
						// ends here
	
	
	//#################cell 2nd starts here####################//
	
	
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.style.display="none";
                cell.align="center"
				var qty_stockK = document.createElement("input");
							qty_stockK.type="text";
							qty_stockK.border ="0";
							qty_stockK.value=qty_stock;	    
							qty_stockK.name ='qty_stock[]';
							qty_stockK.id='qty_stock'+rid;
							qty_stockK.readOnly = true;
							qty_stockK.style="text-align:center";
							qty_stockK.style.width="100%";
							qty_stockK.style.border="hidden"; 
							cell.appendChild(qty_stockK);
	
	
	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
        cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";
				var salepr = document.createElement("input");
							salepr.type="text";
							salepr.border ="0";
							salepr.value=lph;	    
							salepr.name ='list_price[]';
							salepr.id='lph'+rid;
							salepr.readOnly = true;
							salepr.style="text-align:center";
							salepr.style.width="100%";
							salepr.style.border="hidden"; 
							cell.appendChild(salepr);
					

	
	
	
	
	
		//==============================close 2nd cell =========================================
		
		//#################cell 3rd starts here####################//					
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";
		//========================================start qnty===================================	
				var qtty = document.createElement("input");
							qtty.type="text";
							qtty.border ="0";
							qtty.value=qn;	    
							qtty.name ='qty[]';
							qtty.id='qnty'+rid;
							qtty.readOnly = true;
							qtty.style="text-align:center";
							qtty.style.width="100%";
							qtty.style.border="hidden"; 
							cell.appendChild(qtty);
								
		//======================================close 3rd cell========================================

		//========================================start qnty===================================	
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;	

	    cell = row.insertCell(indexcell);

				cell.style.width="3%";
				cell.align="center";	
				

				var grade = document.createElement("input");
							grade.type="text";
							grade.border ="0";
							grade.value=gradeval;	    
							grade.name ='grade[]';
							grade.id='grade'+rid;
							grade.readOnly = true;
							grade.style="text-align:center";
							grade.style.width="100%";
							grade.style.border="hidden"; 
							cell.appendChild(grade);




              
        indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;	

	    cell = row.insertCell(indexcell);

				cell.style.width="3%";
				cell.align="center";	
				

				var quotationMap = document.createElement("input");
							quotationMap.type="hidden";
							quotationMap.border ="0";
							quotationMap.value=QuotationMapval;	    
							quotationMap.name ='quotationMapedValue[]';
							quotationMap.id='QuotationMap'+rid;
							quotationMap.readOnly = true;
							quotationMap.style="text-align:center";
							quotationMap.style.width="100%";
							quotationMap.style.border="hidden"; 
							cell.appendChild(quotationMap);

							
								
		//======================================close 3rd cell========================================
		
		
		
		
		
		
		
		
		
		//===================================start 4th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;	

	    cell = row.insertCell(indexcell);

				cell.style.width="3%";
				cell.align="center"	
				cell.style.display="none";
				
												
				var discount = document.createElement("input");
							discount.type="text";
							discount.border ="0";
							discount.value=dis;	
							discount.name ='discount[]';
							discount.id='dis'+rid;
							discount.readOnly = true;
							discount.style="text-align:center";
							discount.style.width="100%";
							discount.style.border="hidden"; 
							cell.appendChild(discount);
		//===============================close 4th cell=================================

		

//===================================start 5th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";
				
												
				var disAmtt = document.createElement("input");
							disAmtt.type="text";
							disAmtt.border ="0";
							disAmtt.value=disAmount;	
							disAmtt.name ='disAmount[]';
							disAmtt.id='disAmount'+rid;
							disAmtt.readOnly = true;
							disAmtt.style="text-align:center";
							disAmtt.style.width="100%";
							disAmtt.style.border="hidden"; 
							cell.appendChild(disAmtt);
		//===============================close 5th cell=================================
		
		







//===================================start 5th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";
				
												
				var cgstt = document.createElement("input");
							cgstt.type="text";
							cgstt.border ="0";
							cgstt.value=cgst;	
							cgstt.name ='cgst[]';
							cgstt.id='cgst'+rid;
							cgstt.readOnly = true;
							cgstt.style="text-align:center";
							cgstt.style.width="100%";
							cgstt.style.border="hidden"; 
							cell.appendChild(cgstt);
		//===============================close 5th cell=================================
		

//===================================start 5th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";
				
												
				var sgstt = document.createElement("input");
							sgstt.type="text";
							sgstt.border ="0";
							sgstt.value=sgst;	
							sgstt.name ='sgst[]';
							sgstt.id='sgst'+rid;
							sgstt.readOnly = true;
							sgstt.style="text-align:center";
							sgstt.style.width="100%";
							cgstt.style.border="hidden"; 
							cell.appendChild(sgstt);
		//===============================close 5th cell=================================
		
//===================================start 5th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";
				
												
				var igstt = document.createElement("input");
							igstt.type="text";
							igstt.border ="0";
							igstt.value=igst;	
							igstt.name ='igst[]';
							igstt.id='igst'+rid;
							igstt.readOnly = true;
							igstt.style="text-align:center";
							igstt.style.width="100%";
							igstt.style.border="hidden"; 
							cell.appendChild(igstt);
		//===============================close 5th cell=================================
		



		
//===================================start 5th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";	
				
												
				var gstTotalt = document.createElement("input");
							gstTotalt.type="text";
							gstTotalt.border ="0";
							gstTotalt.value=gstTotal;	
							gstTotalt.name ='gstTotal[]';
							gstTotalt.id='gstTotal'+rid;
							gstTotalt.readOnly = true;
							gstTotalt.style="text-align:center";
							gstTotalt.style.width="100%";
							gstTotalt.style.border="hidden"; 
							cell.appendChild(gstTotalt);
		//===============================close 5th cell=================================

       //===================================start 6th cell================================
		indexcell=Number(indexcell+1);		
		var cell=cell+indexcell;		
	    cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center"	;
				cell.style.display="none";
				
												
				var vatamt = document.createElement("input");
							vatamt.type="text";
							vatamt.border ="0";
							vatamt.value=tot;	
							vatamt.name ='tot[]';
							vatamt.id='tot'+rid;
							vatamt.readOnly = true;
							vatamt.style="text-align:center";
							vatamt.style.width="100%";
							vatamt.style.border="hidden"; 
							cell.appendChild(vatamt);
		//===============================close 5th cell=================================
					
									
		//============================================start 7th cell================================	
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;	
	   cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				cell.style.display="none";
			
				var netprice = document.createElement("input");
							netprice.type="text";
							netprice.border ="0";
							netprice.value=nettot;	    
							netprice.name ='nettot[]';
							netprice.id='nettot'+rid;
							netprice.readOnly = true;
							netprice.style="text-align:center";
							netprice.style.width="100%";
							netprice.style.align="center";
							netprice.style.border="hidden"; 
							cell.appendChild(netprice);							
											
		//======================================close net price====================================							
		//cell 3st
	indexcell=Number(indexcell+1);		
	var cell=cell+indexcell;
	var imageloc="/mr_bajaj/";
	var cell = row.insertCell(indexcell);
				cell.style.width="3%";
				cell.align="center";
				var delt =document.createElement("img");
						delt.src ="<?=base_url();?>assets/images/delete.png";
						delt.class ="icon";
						delt.border ="0";
						//delt.style.width="30%";
						//delt.style.height="20%";
						delt.name ='dlt';
						delt.id='dlt'+rid;
						delt.style.border="hidden"; 
						delt.onclick= function() { deleteselectrow(delt.id,delt); };
					    cell.appendChild(delt);
	var edt = document.createElement("img");
						edt.src ="<?=base_url();?>/assets/images/edit.png";
						edt.class ="icon";
						//edt.style.width="60%";
						//edt.style.height="40%";
						edt.border ="0";
						edt.name ='ed';
						edt.id='ed'+rid;
						edt.style.border="hidden"; 
						edt.onclick= function() { editselectrow(delt.id,edt); };
						cell.appendChild(edt);
			

			
			}
			else
			{
			if(qn==0)
				{
					alert('***Quantity Can not be Zero ***');
					
					
				}
				else
				{
				
			alert('***Please Select PRODUCT ***');
			
			}
			}

function clear()
{

// this finction is use for clear data after adding invoice
		document.getElementById("prd").value='';
		document.getElementById("usunit").value='';
		document.getElementById("lph").value='';
		document.getElementById("lpr").innerHTML ='';
		document.getElementById("discount").value='';
		document.getElementById("disAmt").value='';
		document.getElementById("tot").value='';
		document.getElementById("nettot").value='';
		document.getElementById("qn").value='';
		document.getElementById("pri_id").value='';
		
		document.getElementById("igst").value='';
		document.getElementById("cgst").value='';
		document.getElementById("sgst").value='';
		document.getElementById("gstTotal").value='';
		document.getElementById("qty_stock").value='';
		document.getElementById("grade").value='';
		document.getElementById("QuotationMap").value = "";
			   
		document.getElementById("prd").value='';
		document.getElementById("prd").focus();	
		
		
}


////////////////////////////////// starts edit code ////////////////////////////////


function editselectrow(d,r) //modify dyanamicly created rows or product detail
 {

var regex = /(\d+)/g;
nn= d.match(regex)
id=nn;
if(document.getElementById("prd").value!=''){
document.getElementById("qn").focus();
alert("Product already in edit Mode");
return false;
}
         
          // ####### starts ##############//

        var pd       	=   document.getElementById("pd"+id).value;
        var unit     	=   document.getElementById("unit"+id).value;
		var qn       	=   document.getElementById("qnty"+id).value;
		var lph      	=   document.getElementById("lph"+id).value;
		var Discount 	=	document.getElementById("dis"+id).value;
		var disAmt 		=	document.getElementById("disAmount"+id).value;
		var tot         =   document.getElementById("tot"+id).value;
		var nettot      =   document.getElementById("nettot"+id).value;
		var igst        =   document.getElementById("igst"+id).value;
		var cgst        =   document.getElementById("cgst"+id).value;


		var grade = document.getElementById("grade"+id).value;
		var QuotationMap  = document.getElementById("QuotationMap"+id).value;

		var sgst=document.getElementById("sgst"+id).value;
		var gstTotal=document.getElementById("gstTotal"+id).value;
		var qty_stock=document.getElementById("qty_stock"+id).value;
		
		var pri_id=document.getElementById("main_id"+id).value;
// ####### ends ##############//

// ####### starts ##############//
document.getElementById("pri_id").value=pri_id;
document.getElementById("qn").focus();
document.getElementById("prd").value=pd;
document.getElementById("usunit").value=unit;
document.getElementById("qn").value=qn;
document.getElementById("lpr").innerHTML=lph;
document.getElementById("lph").value           = lph;
document.getElementById("discount").value      = discount;
document.getElementById("disAmt").value        = disAmt;
document.getElementById("tot").value           = tot;
document.getElementById("nettot").value        = nettot;

document.getElementById("igst").value          = igst;
document.getElementById("cgst").value          = cgst;
document.getElementById("sgst").value          = sgst;
document.getElementById("gstTotal").value      = gstTotal;
document.getElementById("qty_stock").value     = qty_stock;
document.getElementById("grade").value         = grade;
document.getElementById("QuotationMap").value  = QuotationMap;

// ####### ends ##############//

editDeleteCalculation();


var i = r.parentNode.parentNode.rowIndex;
document.getElementById("invoice").deleteRow(i);
var rowVal = document.getElementById("rows").value;
document.getElementById("rows").value = rowVal-1;

}

////////////////////////////////// ends edit code ////////////////////////////////




////////////////////////////////// starts delete code ////////////////////////////////

function deleteselectrow(d,r) //delete dyanamicly created rows or product detail
 {
 
var regex = /(\d+)/g;

nn= d.match(regex)
	id=nn;
	if(document.getElementById("prd").value!=''){
 		document.getElementById("qn").focus();
     alert("Product already in edit Mode");
     return false;
}




		var pd=document.getElementById("pd"+id).value;
		var unit=document.getElementById("unit"+id).value;
		var qn=document.getElementById("qnty"+id).value;
		var lph=document.getElementById("lph"+id).value;
		var discount=document.getElementById("dis"+id).value;
		var disAmt=document.getElementById("disAmount"+id).value;
		var tot=document.getElementById("tot"+id).value;
		var nettot=document.getElementById("nettot"+id).value;
		
		var pri_id=document.getElementById("main_id"+id).value;
		var igst=document.getElementById("igst"+id).value;
		var cgst=document.getElementById("cgst"+id).value;
		var sgst=document.getElementById("sgst"+id).value;
		var gstTotal=document.getElementById("gstTotal"+id).value;
		
		

	    var i = r.parentNode.parentNode.rowIndex;
     var cnf = confirm('Are You Sure..??? you want to Delete line no1.'+(id));
if (cnf== true)
 {
  document.getElementById("invoice").deleteRow(i);
  var rowVal = document.getElementById("rows").value;
  document.getElementById("rows").value = Number(rowVal)-1;
  slr();
  
 editDeleteCalculation();
	//serviceCh argeCal();	
	//grossDiscountCal();
	}
	
	}


////////////////////////////////// ends delete code ////////////////////////////////


function totalSum(){


var tot=document.getElementById("tot").value;
var subb=document.getElementById("sub_total").value;
var gt=document.getElementById("grand_total").value;
var totDisPer=document.getElementById("total_dis").value;
var discount=document.getElementById("discount").value;
var disAmt=document.getElementById("disAmt").value;
var total_dis_amt=document.getElementById("total_dis_amt").value;
var total_igst=document.getElementById("total_igst").value;
var total_tax_igst_amt=document.getElementById("total_tax_igst_amt").value;
var igst=document.getElementById("igst").value;
var cgst=document.getElementById("cgst").value;
var sgst=document.getElementById("sgst").value;
var total_sgst=document.getElementById("total_sgst").value;
var gstTotal=document.getElementById("gstTotal").value;
var total_tax_sgst_amt=document.getElementById("total_tax_sgst_amt").value;
var total_tax_cgst_amt=document.getElementById("total_tax_cgst_amt").value;

var total_cgst=document.getElementById("total_cgst").value;
var total_gst_tax_amt=document.getElementById("total_gst_tax_amt").value;


			var tol=(Number(nettot));
			
			var total=Number(nettot)+Number(gt);
			
			var Stotal=Number(tot)+Number(subb);
			var Sdis=Number(totDisPer)+Number(discount);
			var SdisTot=Number(total_dis_amt)+Number(disAmt);
			var SigstPer=Number(total_igst)+Number(igst);
			var SigstAmt=Number(gstTotal)+Number(total_tax_igst_amt);
			document.getElementById("grand_total").value=total.toFixed(2);	
			document.getElementById("sub_total").value=Stotal.toFixed(2);
			
			document.getElementById("total_dis").value=Sdis;
			document.getElementById("total_dis_amt").value=SdisTot.toFixed(2);
			
			if(Number(igst!=''))
			{
				
			document.getElementById("total_igst").value=SigstPer;
			document.getElementById("total_tax_igst_amt").value=SigstAmt.toFixed(2);
			}
			
			if(Number(sgst!=''))
			{
				
				var SsgstPer=Number(sgst)+Number(total_sgst);
				var sgstT=Number(tot)*Number(sgst)/100;
				
				var SsgstAmt=Number(gstTotal/2)+Number(total_tax_sgst_amt);
				
				
			document.getElementById("total_sgst").value=SsgstPer;
			document.getElementById("total_cgst").value=SsgstPer;
			document.getElementById("total_tax_sgst_amt").value=SigstAmt.toFixed(2)/2;

document.getElementById("total_tax_cgst_amt").value=SsgstAmt.toFixed(2);
			
document.getElementById("total_tax_sgst_amt").value=SsgstAmt.toFixed(2);
			
			
			}


var TotGST=Number(total_gst_tax_amt)+Number(gstTotal);

			document.getElementById("total_gst_tax_amt").value=TotGST.toFixed(2);
		
		
			

}




// ###### starts when item we edit or delete ##########//
function editDeleteCalculation()
{
	
var sub_total   = document.getElementById("sub_total").value;
var grand_total = document.getElementById("grand_total").value;
var total_gst_tax_amt  = document.getElementById("total_gst_tax_amt").value;
var total_tax_cgst_amt = document.getElementById("total_tax_cgst_amt").value;

var total_cgst         = document.getElementById("total_cgst").value;
var total_sgst         = document.getElementById("total_sgst").value;
var total_igst         = document.getElementById("total_igst").value;
var total_tax_cgst_amt = document.getElementById("total_tax_cgst_amt").value;
var total_tax_sgst_amt = document.getElementById("total_tax_sgst_amt").value;
var total_tax_igst_amt = document.getElementById("total_tax_igst_amt").value;




if(Number(total_igst)!='')
{

total_igst_cal=total_igst-igst;	
document.getElementById("total_igst").value=total_igst_cal;







total_tax_igst_amt_cal=total_tax_igst_amt-gstTotal;	
document.getElementById("total_tax_igst_amt").value=total_tax_igst_amt_cal;



}
else
{
total_cgst_cal=total_cgst-cgst;
total_sgst_cal=total_sgst-sgst;
total_tax_cgst_amt_cal=total_tax_cgst_amt-gstTotal/2;
total_tax_sgst_amt_cal=total_tax_sgst_amt-gstTotal/2;

document.getElementById("total_cgst").value=total_cgst_cal;
document.getElementById("total_sgst").value=total_sgst_cal;
document.getElementById("total_tax_cgst_amt").value=total_tax_cgst_amt_cal;
document.getElementById("total_tax_sgst_amt").value=total_tax_sgst_amt_cal;

}

sub_total_cal=sub_total-tot;
grand_total_cal=grand_total-nettot;

total_dis_cal=total_dis-discount;
total_dis_amt_cal=total_dis_amt-disAmt;

total_gst_tax_amt_cal=total_gst_tax_amt-gstTotal;




document.getElementById("sub_total").value=sub_total_cal.toFixed(2);
document.getElementById("grand_total").value=grand_total_cal.toFixed(2);

document.getElementById("total_gst_tax_amt").value=total_gst_tax_amt_cal;



document.getElementById("total_dis").value=total_dis_cal;
document.getElementById("total_dis_amt").value=total_dis_amt_cal;

}
// ##### ends ###########










   }

// ###### starts service charge calculation ##########//
function serviceChargeCal()
{

var sub_total=document.getElementById("sub_total").value;
var service_charge=document.getElementById("service_charge").value;

service_total_per=Number(sub_total)*Number(service_charge)/100;
service_total_cal=Number(sub_total)+Number(service_total_per);

document.getElementById("service_charge_total").value=service_total_per.toFixed(2);
document.getElementById("grand_total").value=service_total_cal.toFixed(2);
return service_total_cal.toFixed(2);
}
// ##### ends ###########
  

// ###### starts gross discount calculation ##########//
function grossDiscountCal()
{

var serviceTotl=serviceChargeCal();

var gross_discount_per=document.getElementById("gross_discount_per").value;
var gross_discount_total=document.getElementById("gross_discount_total").value;
var grand_total=document.getElementById("grand_total").value;


service_total_per=Number(serviceTotl)*Number(service_charge)/100;
service_total_cal=Number(sub_total)+Number(service_total_per);

var totalGross=Number(serviceTotl)*Number(gross_discount_per)/100;
var totalGrossCal=Number(grand_total)-Number(totalGross);

document.getElementById("gross_discount_total").value=totalGross.toFixed(2);
document.getElementById("grand_total").value=totalGrossCal.toFixed(2);
}
// ##### ends ###########

  
  
  
  
  
  
  
  
function duplicate_po_check1(v)
		  {

		  var po_id=document.getElementById("po_id").value=v;	 
		   
		    if(xobj)
			 {
			 alert();			
			 xobj.open("GET","duplicate_po_check?po_id="+po_id,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    obj.innerHTML=xobj.responseText;
				alert(xobj.responseText);
			   }
			  }
			 }
			 xobj.send(null);
		  }
  
  
  
  function duplicate_po_check(v){


		var strURL="duplicate_po_check?po_id="+v;

		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					if (req.status == 200) {

					//var price=mtr*ext_per;
					if(req.responseText=='False')
					{
					alert("Duplicate Purchase Order Id. Please choose anoother Id");	
					document.getElementById("sv1").disabled = true;

					
					}
					else
					{
						document.getElementById("sv1").disabled = false;
					}
					
					
					//	document.getElementById('rack_id').innerHTML=req.responseText;

					} else {

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}
}


  
      
</script>
</form>
<?php
$this->load->view("footer.php");
?>
<script src="/amazon/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="/amazon/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="/amazon/assets/js/form-advanced-script.js"></script>

<script type="text/javascript">
	// $('#myModal').modal('show');
 function getAllselectbox(pid){
    ur = "<?=base_url('quotation/ajex_selectQuotation');?>";
    $.ajax({
      url: ur,
      type: "POST",
      data: {'id':pid},
      success: function(data){
      	//alert(data);
        //$("#listingData").hide();
        $("#selectTableBox").empty().append(data).fadeIn();
      }
    });
  }

  function getAllGradebox(pid){
  	
     ur = "<?=base_url('quotation/ajex_selectgrade');?>";
     $.ajax({
      url: ur,
      type: "POST",
      data: {'id':pid},
      success: function(data){
      	$(".insertGrade").empty().append(data).fadeIn();
      }
    });

  }

  function genrateQuotation(){
  var datavalue = $('#dateValue').val();
    ur = "<?=base_url('quotation/ajex_nextIncrementId');?>";
    $.ajax({
      url: ur,
      data:{'dateval':datavalue},
      type: "POST",
      success: function(data){
      //	alert(data);
      	if(data != ""){
      	  $("#quotationNo").val(data);
      	}
       }
    });

  }
  //*************************************ACCESSORIES****************************************
  function getaccessories(ths)
  	{
  			var status = $('#accessories option:selected').attr('arrt');
  			var data=JSON.parse(status);
  			$("#access_price").val(data.acc_price);
  			$("#access_descript").val(data.acc_description);

/*  				var a=$(ths).val();
  				//alert($(ths).val());
  				var datas="&acc_id="+a;
  				$.ajax({
  					url:"<?php //echo base_url('quotation/quotationdetails');?>",
  					type:"POST",
  					data:datas,
  					success:function(data){
  						$("#accessories_table").empty().append(data);
  					}
  				});*/
   	}
function getaccessoriescat()
	{
		var catval=$("#accessories_cat").val();
		//alert(catval);
		//$("#acc_cat_id").val(catval);
		$("#access_price").val("");
		$("#access_descript").val("");
		var datas="&acc_id="+catval;
		$.ajax({
  					url:"<?php echo base_url('quotation/get_accessories_subcat');?>",
  					type:"POST",
  					data:datas,
  					success:function(data){
  						//console.log(data);
  						$("#accessories_subcat").empty().append(data);
  					}
  				});	
	}
 function addaccessories()
		  { 
		 
		  	var category=document.getElementById("accessories_cat").value;
			var model=document.getElementById("accessories").value;
			var price=document.getElementById("access_price").value;
			var description=document.getElementById("access_descript").value;	
			var table=document.getElementById("accessories_table");
			var accrow=document.getElementById("access_row").value;
			var status = $('#accessories option:selected').attr('arrt');
			var modeldata = JSON.parse(status);
			
			var catdata=$('#accessories_cat option:selected').attr('arrts');
			var catvaldata=JSON.parse(catdata);
			
			var row=0;
			var cellindex=0;
				// alert(accrow);			
				/*var rows=document.getElementById("rows").value;
			   var table = document.getElementById("invoice");
					var rid =Number(rows)+1;
					document.getElementById("rows").value=rid;
					//var cdet=;*/
				if(category != "" && model != "" && price != "" && description != "")
					{
						var rid=Number(accrow)+1;
						$("#access_row").val(rid);
						//alert(document.getElementById("access_row").value);
						//***************Inserting Row*******************

						var row=table.insertRow(-1);
						//****************Inserting Cells***************
						var cell=cell+cellindex;
						cell=row.insertCell(cellindex);
						//cell.style.width=".20%";
	                	cell.align="center";
	                	cell.innerHTML=rid;

	               		cellindex=Number(cellindex)+1;
	               		var cell=row.insertCell(cellindex);

	               		var cat=document.createElement("input");
	               		cat.type="text";
	               		cat.name="acc_cat[]";
	               		cat.id="cat"+rid;
	               		cat.value=catvaldata.keyvalue;
	               		cat.border="none";
	               		cat.readOnly="true";
	               		cat.className="form-control";
	               		//cat.style.width="100%";
	               		cat.style="text-align:center;background:#dddddd";
	               		cell.append(cat);

	               		var catid=document.createElement("input");
	               		catid.type="text";
	               		catid.name="acc_catid[]";
	               		catid.id="catid"+rid;
	               		catid.value=category;
	               		catid.border="none";
	               		catid.readOnly="true";
	               		catid.className="form-control";
	               		catid.style="display:none";
	               		cell.append(catid);



	               		cellindex=Number(cellindex)+1;
	               		var cell=row.insertCell(cellindex);


						var subcat=document.createElement("input");
						subcat.type="text"
						subcat.name="acc_sub[]";
						subcat.id="sub"+rid;
						subcat.value=modeldata.acc_subcategory;
						subcat.border="none";
						subcat.readOnly="true";
						subcat.className="form-control";
						subcat.style="text-align:center;background:#dddddd";
						cell.append(subcat);

						var subcatid=document.createElement("input");
						subcatid.type="text"
						subcatid.name="acc_subid[]";
						subcatid.id="subid"+rid;
						subcatid.value=model;
						subcatid.border="none";
						subcatid.readOnly="true";
						subcatid.className="form-control";
						subcatid.style="display:none";
						cell.append(subcatid);


						cellindex=Number(cellindex)+1;
						var cell=row.insertCell(cellindex);


						var mprice=document.createElement("input");
						mprice.type="text"
						mprice.name="mprice[]";
						mprice.id="mpr"+rid;
						mprice.value=price;
						mprice.border="none";
						mprice.readOnly="true";
						mprice.className="form-control";
						mprice.style="text-align:center;background:#dddddd";
						cell.append(mprice);
						
						cellindex=Number(cellindex)+1;
						var cell=row.insertCell(cellindex);
						
						var mdesc=document.createElement("input");
						mdesc.type="text";
						mdesc.name="mdescrip[]";
						mdesc.id="mdesc"+rid;
						mdesc.value=description;
						mdesc.border="none";
						mdesc.className="form-control";
						mdesc.readOnly="true";
						mdesc.style="text-align:center;background:#dddddd";
						cell.append(mdesc);

						cellindex=Number(cellindex)+1;
						var cell=row.insertCell(cellindex);

						var edt=document.createElement('img');
						edt.src="<?php echo base_url('assets/images/edit.png')?>";
						edt.class="icon";
						edt.border="none";
						edt.name="edit";
						edt.id="edit"+rid;
						edt.style.border="hidden";
						edt.onclick=function(){editaccessoryrow(edt.id,edt);};
						//alert("access granted");
						cell.append(edt);
					
						var del=document.createElement('img');
						del.src="<?php echo base_url('assets/images/delete.png')?>";
						del.class="icon";
						del.border="none";
						del.name="delete";
						del.id="delete"+rid;
						del.style.border="hidden";
						del.onclick=function(){deleteaccessoryrow(del.id,del);};
						//alert("access granted");
						cell.append(del);	


						
						$("#accessories_cat").val("");
						$("#accessories").val("");
						document.getElementById("access_price").value="";
						document.getElementById("access_descript").value="";

					}	
				else
				{

					alert("access denied");			
				}
				}
function editaccessoryrow(d,r) //modify dyanamicly created rows or product detail
 {

var regex = /(\d+)/g;
nn= d.match(regex)
id=nn;
/*if(document.getElementById("prd").value!=''){
document.getElementById("qn").focus();
alert("Product already in edit Mode");
return false;
}*/
         
          // ####### starts ##############//

        var category       	=   document.getElementById("catid"+id).value;
        var model     	=   	document.getElementById("subid"+id).value;
		var price       	=   document.getElementById("mpr"+id).value;
		var description      	=   document.getElementById("mdesc"+id).value;

// ####### ends ##############//

// ####### starts ##############//
document.getElementById("accessories_cat").focus();
$("#accessories_cat").val(category).prop("selected:true");
document.getElementById("accessories_cat").value=category;
$("#accessories").val(model).prop("selected:true");
document.getElementById("accessories").value=model;
document.getElementById("access_price").value=price;
document.getElementById("access_descript").value=description;

var i = r.parentNode.parentNode.rowIndex;
document.getElementById("accessories_table").deleteRow(i);
var rowVal = document.getElementById("access_row").value;
document.getElementById("access_row").value = rowVal-1;

rowsadd();
}

////////////////////////////////// ends edit code ////////////////////////////////




////////////////////////////////// starts delete code ////////////////////////////////

function deleteaccessoryrow(d,r) //delete dyanamicly created rows or product detail
 {
 
var regex = /(\d+)/g;

nn= d.match(regex)
	id=nn;
/*	if(document.getElementById("prd").value!=''){
 		document.getElementById("qn").focus();
     alert("Product already in edit Mode");
     return false;
}
*/

		

	    var i = r.parentNode.parentNode.rowIndex;
     var cnf = confirm('Are You Sure..??? you want to Delete line no.'+(id));
if (cnf== true)
 {
  document.getElementById("accessories_table").deleteRow(i);
  var rowVal = document.getElementById("access_row").value;
  document.getElementById("access_row").value = Number(rowVal)-1;
  rowsadd();
  	}
	
	}
function rowsadd(){
		var table = document.getElementById('accessories_table');
        var rowCount = table.rows.length;
		  for(var i=1;i<rowCount;i++)
		  {    
              table.rows[i].cells[0].innerHTML=i;
		  }
}
////////////////////////////////// ends delete code ////////////////////////////////

</script>



<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_sales_order_hdr';

?>
	 <!-- Main content -->
	 <div class="main-content">			
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Quotation</a></li> 
				
				<li class="active"><strong><a href="#">Manage Quotation</a></strong></li> 
				<div class="pull-right">
				   <a class="btn btn-sm" href="<?=base_url();?>quotation/add_quotation">Add Quotation</a>
				</div>
			</ol>
<?php
if($this->session->flashdata('flash_msg')!='')
{
 ?>
<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php } ?>
			<div class="row">
				<div class="col-lg-12">
					
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
<th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th>Quotation No.</th>
	    <th style="display:none">Invoice Type</th>
		<th>Date</th>
        <th>Customer Name</th>
		<th style="display:none;">Due Date</th>
		<th style="display:none;">Status</th>
      	<th>Grand Total</th>
         <th>Action</th>
</tr>
</thead>

<tbody>
<?php
$i=1;
	foreach($result as $sales)
  {
  ?>

<tr class="gradeC record">
<th style="display:none;"><input type="checkbox" /></th>
<th><?=$sales->quotationid;?></th>
<th style="display:none"><?php echo $sales->invoice_status;?></th>
<th><?=$sales->invoice_date;?></th>
<th><?php 
		$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$sales->contactid'");
		$res1 = $sqlgroup->row();
		echo $res1->first_name;?></th>
<th style="display:none;">
<?php 
$idt=$sales->invoice_date;
$date = new DateTime("$idt");
$fdate=$date->format("Y-m-d");
$dt=$sales->due_date;
if($dt!=''){
echo $idate= date('Y-m-d', strtotime($fdate. " + $dt days"));
}else{
echo $fdate;
}
?>
</th>

<th style="display:none;"><?php 
$cdate = date("Y-m-d");
if($dt!=''){
$idate= date('Y-m-d', strtotime($fdate. " + $dt days"));
}else{
$idate=$fdate;
}
$theRequestMadeDateTime = strtotime($idate);
$theCurrentDateTime = strtotime($cdate);
$theDifferenceInSeconds = 600 - ($theCurrentDateTime - $theRequestMadeDateTime);
$minutesLeft = (floor ($theDifferenceInSeconds / (60*60*24)));
if($cdate<$idate)
{
?>
<samp style="color:#2c96dd">
<?php
echo $minutesLeft." days due";
?>
</samp>
<?php
}elseif($cdate>$idate){
?>
<samp style="color:#ef6f08">
<?php
echo abs($minutesLeft)." days over due";

?>
</samp>
<?php }else
{
?>
<samp style="color:#ef6f08">
<?php
echo " Today's due";
}
?>
</samp></th>
<th><?=$sales->grand_total;?></th>
<th>

<!-- <button class="btn btn-default" onClick="openpopup('<?=base_url();?>purchaseorder/purchaseorder/edit_purchase_order_1',1400,600,'id',<?=$sales->purchaseid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-pencil"></i></button> -->
	

<?php
if($sales->invoice_status=='GST')
{
?>
<a style="display:none" href="<?=base_url();?>purchaseorder/purchaseorder/print_invoice?id=<?=$sales->purchaseid;?>" class="btn btn-default" target="blank"><i class="glyphicon glyphicon-print"></i></a>
<?php } else {?> 
<a style="display:none" href="<?=base_url();?>purchaseorder/purchaseorder/case_memo?id=<?=$sales->purchaseid;?>" class="btn btn-default" target="blank"><i class="glyphicon glyphicon-print"></i></a>
<?php }?>
<?php
$pri_col='purchaseid';
$table_name='tbl_purchase_order_hdr';
	?>
<button class="btn btn-default delbuttonPurchase" id="<?=$sales->purchaseid."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<a class="btn btn-default" href="<?=base_url();?>quotation/print_quotation?id=<?=$sales->quotationid;?>" target="_blank">Print</a>
</th>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php

$this->load->view("footer.php");
?>
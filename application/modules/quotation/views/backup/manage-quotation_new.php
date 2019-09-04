<?php
$this->load->view("header.php");	

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}

$tableName='tbl_sales_order_hdr';

?>
<!-- Main content -->
<div class="main-content">		
<div class="panel-body panel panel-default">	
<ol class="breadcrumb breadcrumb-2" style="margin-top:10px;"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a>Quotation</a></li> 
	<li class="active"><strong><a>Manage Quotation</a></strong></li> 
	<div class="pull-right">
	   <a class="btn btn-sm" href="<?=base_url();?>quotation/add_quotation">Make Quotation</a>
	  <!--  <a class="btn btn-sm" href="<?=base_url('report/Report/searchSalesdeals');?>">Refresh Contact</a> -->
	</div>
</ol>

<div class="row" >
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
<a class="btn btn-secondary btn-sm delete_all"><span>Delete</span></a>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" url="<?=base_url();?>/quotation/quotation/manage_quotation?<?='purchase_no='.$_GET['purchase_no'].'&invoice_date='.$_GET['invoice_date'].'&contactid='.$_GET['contactid'].'&grand_total='.$_GET['grand_total'];?>" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
	<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
	<option value="<?=$dataConfig['total'];?>" <?=$entries==$dataConfig['total']?'selected':'';?>>ALL</option>
</select>
entries</label>
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="margin-top: -5px;margin-left: 12px;float: right;">
Showing <?=$dataConfig['page']+1;?> to 
<?php
	$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
	echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
?> of <?=$dataConfig['total'];?> entries
</div>
</div>
<div id="DataTables_Table_0_filter" class="dataTables_filter">
<label>Search:
<input type="text" class="form-control input-sm" id="searchTerm"  onkeyup="doSearch()" placeholder="What you looking for?">
</label>
</div>
</div>
</div>
</div>		

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
<table class="table table-striped table-bordered table-hover dataTables-example11" id="getDataTable" >
<thead bgcolor="#CCCCCC">
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th>Quotation No.</th>
	    
		<th>Date</th>
        <th>Title deal</th>
        <th>Owner Name</th>
		<th>org name</th>
        <th>Customer Name</th>
		<th>Product</th>
		
        <th>City</th>
        <th>State</th>
      	<th >Price Total</th>
        <th>Action</th>
</tr>
</thead>
<thead>
<tr style="display:none">
<form method="get">
	<th><input style="display:none" name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	<th><input name="purchase_no"  type="text"  class="search_box form-control input-sm"  value="" /></th>
	<th><input name="invoice_date"  type="date"  class="search_box form-control input-sm"  value="" /></th>
	<th><input name="title_deal"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th><input name="owner_name"  type="text"  class="search_box form-control input-sm"  value="" /></th>
	<th ><input name="org_name"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th ><input name="person_name"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th ><input name="grand_tota1l"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th ><input name="city"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th ><input name="state"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th ><input name="grand_total"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    
    
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter" style="margin:0px;"><span>Search</span></button></td>
</form>
</tr>
</thead>

<tbody>
<?php
$i=1;
// echo "<pre>";
// print_r($result);
// echo "<pre>";
foreach($result as $sales)
{
	
	
	// get city,sate,owner org,deal data
	
	$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$sales->contactid'");
		 $res1 = $sqlgroup->row();
?>

<tr class="gradeC record">
<th><input type="checkbox" /></th>
<th><?=$sales->purchase_no;?></th>

<th><?=$sales->invoice_date;?></th>
<th><?=$res1->title_deal;?></th>


<th >
<?=$res1->owner_name;?>
</th>

<th ><?=$res1->org_name;?></th>
<th ><?php 
		
		echo $res1->person_name;?></th>
<th ><?php 
//echo "select S.productname from tbl_quotation_order_dtl D,tbl_product_stock S  where S.Product_id = D.productid AND D.quotationid='$sales->quotationid'";
	$sqlpro=$this->db->query("select S.productname from tbl_quotation_order_dtl D,tbl_product_stock S  where S.Product_id = D.productid AND D.quotationid='$sales->quotationid'");
	$sqlprores1 = $sqlpro->row();
	echo $sqlprores1->productname;?></th>
<th ><?=$res1->state_id;?></th>
<th ><?=$res1->city;?></th>
<th ><?php

$quatationDtlQuery=$this->db->query("select *from tbl_quotation_order_dtl where quotationid='$sales->quotationid'");
$getDtlData=$quatationDtlQuery->row();


$json = $getDtlData->quotation_mapg;
$obj = json_decode($json);
$arrayData=$obj->{'price'}; // 12345
echo $stringData=implode(",",$arrayData);

//$d=explode(",",$stringData);



 
?>
</th>

<th>


<?php
$pri_col='quotationid';
$table_name='tbl_quotation_order_hdr';
	?>
<button class="btn btn-default delbuttonPurchase" id="<?=$sales->quotationid."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>

<a class="btn btn-default" href="<?=base_url();?>quotation/print_quotation1234?id=<?=$sales->quotationid;?>&pressure=<?=$sales->pressure;?>" target="_blank">Print</a>

</th>
</tr>
<?php } ?>
</tbody>
</table>
<div class="row">
    <div class="col-md-12 text-right">
    	<div class="col-md-6 text-left"> </div>
    	<div class="col-md-6"> 
         <?php echo $pagination; ?>
        </div>
	</div>
</div>

</div>
</div>
</div>

</div>
</div>
</div>


<?php
$this->load->view("footer.php");
?>
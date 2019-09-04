<?php
$this->load->view("header.php");

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}
 
?>

<!-- Main content -->
<div class="main-content">

<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><span class="top_title">Add</span>&nbsp;Contact</h4>
<div id="resultarea" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>

<form class="form-horizontal" role="form"  id="contactForm">
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Company Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" class="hiddenField" name="contact_id" id="contact_id" value="" />
<input type="text" name="first_name" id="first_name" value="" class="form-control" >
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
<select name="maingroupname" class="form-control"  id="groupName" required >
  <option value="">-------select---------</option>
  <?php
   $ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");
   foreach ($ugroup2->result() as $fetchunit){
  ?>
   <option value="<?=$fetchunit->account_id ;?>"><?=$fetchunit->account_name;?></option>
<?php } ?>
</select>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person" id="contact_person" value=""  class="form-control">
</div> 
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4"> 
<input type="email" name="email" value="" id = "email" class="form-control">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="tel"  id="mobile" name="mobile" maxlength="10" title="Enter  mobile number"  value=""  class="form-control" >
</div> 
<label class="col-sm-2 control-label">Phone No.:</label> 
<div class="col-sm-4" id="regid"> 
 <input type="text"  title="Enter Your Phone Number" id="phone" name="phone" value="" class="form-control">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Address1:</label> 
<div class="col-sm-4" id="regid"> 
<textarea class="form-control" name="address1" id="address1"></textarea>
</div>  
<label class="col-sm-2 control-label">Address2:</label> 
<div class="col-sm-4" id="regid"> 
<textarea class="form-control" name="address3" id="address3"></textarea>
</div> 
</div>

<div class="form-group" > 
<label class="col-sm-2 control-label">City:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="city" id="city" value="" class="form-control">
</div> 
<label class="col-sm-2 control-label">State:</label> 
<div class="col-sm-4" id="regid"> 
<select name="state" class="form-control" id="state_id" >
<option value="">--Select--</option>
<?php 
$stnm=$this->db->query("select * from tbl_state_m order by stateName asc");
foreach($stnm->result() as $stdata)
{
?>
<option value="<?=$stdata->code;?>"><?=$stdata->stateName;?></option>
<?php } ?>
</select>
</div> 
</div>

<div class="form-group" > 
<label class="col-sm-2 control-label">Pin Code:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="pin_code" id="pincode" value=""  class="form-control">
</div> 
<label class="col-sm-2 control-label">Nick Name</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="printname" id="printname" class="form-control" value="" />
</div> 
</div>

</div>
<div class="modal-footer" id="button">
<input type="submit" class="btn btn-sm" value="Save"  id="contactForm1"/>
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>

</div>
</div>

<div class="row" id="listingData">

<div class="col-lg-12">
<div class="panel panel-default">

<!-- /.panel-heading -->
<div class="panel-body">
<div class="row">
<div class="col-sm-12">
	<?php if($this->session->flashdata('addcontact_msg') != ""){ ?>
	<p class=" breadcrumb text-center btn btn-secondary btn-sm" style="width: 50%; margin-left: 25%;"><?=$this->session->flashdata('addcontact_msg');?></p>  
   <?php } ?>
<ol class="breadcrumb"> 
  <li class="active">Manage Contact</li> 
</ol>
 
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
  <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
   <a class="btn btn-sm" href="<?=base_url('report/Report/searchSalesdeals?id=add-contact');?>">Add Contact</a>
   <a class="btn btn-sm" href="<?=base_url('report/Report/searchSalesdeals_update?id=add-contact');?>">Refresh Contact</a>
  <!-- <a class="btn btn-sm" data-toggle="modal" formid = "#contactForm" data-target="#modal-0" id="formreset">Add Contact</a> -->
  <!-- <a class="btn btn-secondary btn-sm delete_all"><span>Delete</span></a> -->
</div>
</div>
<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" url="<?=base_url();?>master/Account/manage_contact?<?='first_name='.$_GET['first_name'].'&contact_person='.$_GET['contact_person'].'&group_name='.$_GET['group_name'].'&email='.$_GET['email'].'&mobile='.$_GET['mobile'].'&phone='.$_GET['phone'].'&filter='.$_GET['filter'];?>" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
	<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
	<option value="<?=$dataConfig['total'];?>" <?=$entries==$dataConfig['total']?'selected':'';?>>ALL</option>
</select>
entries</label>

<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -5px;margin-left: 12px;float: right;">
	Showing <?=$dataConfig['page']+1;?> to 
	<?php
	$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
	echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
	?> of <?php echo $dataConfig['total'];?> entries
</div>
</div>
<div id="DataTables_Table_0_filter" class="dataTables_filter">
<label>Search:
<input type="text" class="form-control input-sm" id="searchTerm"  onkeyup="doSearch()" placeholder="What you looking for?">
</label>
</div>
</div>
</div>
</div><!--row close-->
<div class="row">
<div class="col-lg-12">
<div class="table-responsive">

<table class="table table-striped table-bordered table-hover dataTables-example11" >
<thead bgcolor="#CCCCCC">
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th>Title deal</th>
        <th>Owner Name</th>
		<th>org name</th>
        <th>Customer Name</th>
        <th>Contact Person 1</th>
        <th>Contact Person 2</th>
        <th>Email Id</th>
		<th>Mobile No.</th>
		<th>City</th>
        <th>State</th>
        
		<!-- <th>Mobile No.</th>
		<th>Phone No.</th> -->
		<th><div style="width:100px;">Action</div></th>
</tr>
</thead>
<thead>										
<tr>
<form method="get">														
	<th>&nbsp;</th>
	<th><input name="owner_namee"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th><input name="title_deal"  type="text"  class="search_box form-control input-sm"  value="" /></th>
	<th><input name="org_name"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th><input name="person_name"  type="text"  class="search_box form-control input-sm"  value="" /></th>
	<th><input name="contact_person"  type="text"  class="search_box form-control input-sm"  value="" /></th>
	<th><input name="contact_person2"  type="text"  class="search_box form-control input-sm"  value="" /></th>
	<th><input name="person_email"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th><input name="mobile"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th><input name="city"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th><input name="state_id"  type="text"  class="search_box form-control input-sm"  value="" /></th>
    <th><button type="submit" class="btn btn-sm" name="filter" value="filter" style="margin:0 0 0 0px;"><span>Search</span></button></th>		
</form>
</tr>	
</thead>
												
<tbody id="getDataTable">
<?php

$i=1;
foreach($result as $fetch_list)
{

?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->contact_id; ?>">
<th><!-- <input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->contact_id; ?>" value="<?php echo $fetch_list->contact_id;?>" /> --> <?=$i;?></th>
<th><?=$fetch_list->title_deal;?></th>

<?php
  // $contactQuery=$this->db->query("select *from tbl_account_mst where account_id='$fetch_list->group_name'");
  // $getContact=$contactQuery->row();
?>
<th><?=$fetch_list->owner_name;?></th>
<th><?=$fetch_list->org_name;?></th>
<th><?=$fetch_list->person_name;?></th>
<th><?=$fetch_list->contact_person;?></th>
<th><?=$fetch_list->contact_person2;?></th>
<th><?=$fetch_list->person_email;?></th>
<th><?=$fetch_list->mobile;?></th>
<th><?=$fetch_list->city;?></th>
<th><?=$fetch_list->state_id;?></th>

<th>
<?php if($view!=''){ ?>
<button style="display:none" class="btn btn-default" title="View Contact !" property = "view" type="button" data-toggle="modal" data-target="#modal-0" arrt= '<?=json_encode($fetch_list);?>' onclick="editContact(this);" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>
<?php } if($edit!=''){ ?>
<!-- <button class="btn btn-default" title="Update Contact !" data-toggle="modal" data-target="#modal-0" data-a="<?=$fetch_list->contact_id;?>"  arrt= '<?=json_encode($fetch_list);?>' onclick="editContact(this);" type="button"  data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button> -->

<?php }
$pri_col='contact_id';
$table_name='tbl_contact_m';
	?>
<!-- <button class="btn btn-default delbutton" title="Delete Contact !"  id="<?php echo $fetch_list->contact_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>	 -->
</th>
</tr>
<?php $i++; } ?>
</tbody>

<input type="text" style="display:none;" id="table_name" value="tbl_contact_m">  
<input type="text" style="display:none;" id="pri_col" value="contact_id">

</table>

<div class="row">
<div class="col-md-12 text-right">
    <div class="col-md-6 text-left"> 
    </div>
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
</div>

</div>
	
<?php
$this->load->view("footer.php");
?>
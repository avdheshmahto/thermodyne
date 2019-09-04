
<?php
$this->load->view("header.php");


/*$url=base_url()."master/Item/manage_item";

$query=$this->db->query("select * from `tbl_product_stock`");
	$row = $query->num_rows();
	$rows = $row;
	
	$page_rows = 20;

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	
	

	$paginationCtrls = '';

	if($last != 1){
		
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$url.'?pn='.$previous.'" >Previous</a> &nbsp; &nbsp; ';
		
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$url.'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	
	@$paginationCtrls .= '<a class="active">'.$pagenum.' </a>&nbsp; ';
	
	for($i = $pagenum+1; $i <= 5; $i++){
		$paginationCtrls .= '<a href="'.$url.'?pn='.$i.'" >'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$url.'?pn='.$next.'" >Next</a> ';
    }
	}

*/
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
<h4 class="modal-title">Contact</h4>
<div id="resultarea" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>

<form class="form-horizontal" role="form"  id="contactForm">
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Company Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" class="hiddenField" name="contact_id" id="contact_id" value="<?=$branchFetch->contact_id; ?>" />
<input type="text" name="first_name" id="first_name" value="" class="form-control" >
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
<?php
	$hdrQuery=$this->db->query("select * from tbl_contact_m where contact_id='".$_GET['id']."' or contact_id='".$_GET['view']."'");
    $hrdrow=$hdrQuery->row();
	  
 ?>
<input type="hidden" name="grpname" value="" id="group_name" />
<select name="maingroupname" class="form-control"  id="groupName" required>
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
<input type="tel" minlength="10" maxlength="10" id="mobile" name="mobile" title="Enter 10 digit mobile number"  value=""  class="form-control" >
</div> 
<label class="col-sm-2 control-label">Phone No.:</label> 
<div class="col-sm-4" id="regid"> 
 <input type="text" maxlength="10"  pattern="[0-9]{10}" title="Enter Your Phone Number" id="phone" name="phone" value="" class="form-control">
</div> 
</div>

<div class="form-group" style="display: none;"> 
<label class="col-sm-2 control-label">Pan No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="pan_no" pattern1=".{10,10}" maxlength="10" id="IT_Pan" placeholder="PAN No 10 digist" title="PAN Number must be 10 character" value=""  class="form-control">
</div> 
<label class="col-sm-2 control-label">GSTIN No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="gst" id="gstin"  placeholder="GSTIN" value=""  class="form-control">
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
<select name="state" class="form-control" id="state_id" required>
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
</div><!-- /.modal-content -->

</div><!-- /.modal-dialog -->
</div>
<div class="row" id="listingData">
<div class="col-lg-12">
<div class="panel panel-default">

<!-- /.panel-heading -->
<div class="panel-body">
<div class="row">
<div class="col-sm-12">
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
  <a class="btn btn-sm" data-toggle="modal" formid = "#contactForm" data-target="#modal-0" id="formreset">Add Contact</a>
  <a class="btn btn-secondary btn-sm delete_all"><span>Delete</span></a>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('master/Account/manage_contact');?>" class="form-control input-sm">
	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
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
<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data">											
<table class="table table-striped table-bordered table-hover dataTables-example11" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th>Name</th>
		<th>Group Name</th>
        <th>Email Id</th>
		<th>Mobile No.</th>
		<th>Phone No.</th>
		<th>Action</th>
</tr>
</thead>

<tbody id="getDataTable">

<?php

$i=1;
  foreach($result as $fetch_list)
  {

  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->contact_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->contact_id; ?>" value="<?php echo $fetch_list->contact_id;?>" /></th>

<th onClick1="openpopup('update_contact',1200,500,'view',<?=$fetch_list->contact_id;?>)">

<?=$fetch_list->first_name;?>
</th>

<?php
  $contactQuery=$this->db->query("select *from tbl_account_mst where account_id='$fetch_list->group_name'");
  $getContact=$contactQuery->row();
?>

<th>
<?=$getContact->account_name;?></th>
<th onclick="contactDetails('<?php echo $urlvc ?>')"><?=$fetch_list->email;?></th>
<th onclick="contactDetails('<?php echo $urlvc ?>')"><i class="fa fa-phone" aria-hidden="true"></i>
<a href="tel:9716127292"><?=$fetch_list->mobile;?></a></th>
<th onclick="contactDetails('<?php echo $urlvc ?>')"><?=$fetch_list->phone;?></th>
<th>
<?php if($view!=''){ ?>
<button class="btn btn-default" property = "view" type="button" data-toggle="modal" data-target="#modal-0" arrt= '<?=json_encode($fetch_list);?>' onclick="editContact(this);" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>
<?php } if($edit!=''){ ?>
<button class="btn btn-default" data-toggle="modal" data-target="#modal-0" data-a="<?=$fetch_list->contact_id;?>"  arrt= '<?=json_encode($fetch_list);?>' onclick="editContact(this);" type="button"  data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='contact_id';
$table_name='tbl_contact_m';
	?>
<button class="btn btn-default delbutton"  id="<?php echo $fetch_list->contact_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>	
</th>
</tr>



<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_contact_m">  
<input type="text" style="display:none;" id="pri_col" value="contact_id">
</table>
</form>
	  <div class="row">
       <div class="col-md-12 text-right">
    	  <div class="col-md-6 text-left"> 
    		<!-- <h6>Showing 1 to 10 of <?php echo $totalrow; ?> entries</h6> -->
    	  </div>
    	  <div class="col-md-6"> 
             <?=$pagination; ?>
          </div>

          <div class="popover fade right in displayclass" role="tooltip" id="popover" style=" background-color: #ffffff;border-color: #212B4F;"><!-- <div class="arrow" style="top: 50%;"></div>  -->
		<div class="popover-content" id="showParent"></div>
		</div>
       </div>
     </div>
</div>
</div>
</div>

<div class = "modal-contenttt"></div>
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>

</div>
	
<?php
$this->load->view("footer.php");
?>
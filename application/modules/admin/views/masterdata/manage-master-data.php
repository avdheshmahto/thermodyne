<?php
$this->load->view("header.php");
?>

<!-- Main content -->
<div class="main-content" style="margin-top: 10px;">
<div class="panel-body panel panel-default">

<form class="form-horizontal" method="post" action="<?=base_url();?>admin/masterdata/insert_master_data">	
<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a href="#">Admin Setup</a></li> 
	<li><a href="#">Master Data</a></li>
	<li class="active"><strong><a href="#">Manage Master Data</a></strong></li>
	 
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0"><i class="fa fa-plus" aria-hidden="true"></i>Add Master Data</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Master Data</h4>
</div>

<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Value Name:</label> 
<div class="col-sm-4"> 						
<input type="hidden" name="serial_number" value="" />
<select name="param_id" class="form-control" required>
	<option value="">----Select----</option>
	<?php 
	$comp_sql = $this->db->query("select * FROM tbl_master_data_mst where status='A'");
	foreach ($comp_sql->result() as $comp_fetch){
	?>
	<option value="<?php echo @$comp_fetch->param_id;?>"><?php echo @$comp_fetch->keyname;?></option>
	<?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">*Key Value</label> 
<div class="col-sm-4"> 
<input name="keyvalue"  type="text" value="" class="form-control" required> 
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="description"></textarea>
</div>  
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<a href="#/" class="btn btn-secondary btn-sm delete_all"><i class="fa fa-trash-o"></i>Delete all</a>
</div>
</ol>
</form>
<?php
if($this->session->flashdata('flash_msg')!='')
{
?>

<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php }?>	

<div class="row">
<div class="col-lg-12">
<div class="panel-body">
<div class="table-responsive">

<!--<form class="form-horizontal" method="post" action="<?=base_url();?>admin/masterdata/insert_master_data">-->
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead bgcolor="#CCCCCC">
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
 		<th style="width:100px;">Value Name</th>
		<th>Added value</th>
		<th>Description</th>
        <th style="width:110px;">Action</th>
</tr>
</thead>

<tbody>
<?php
  $i=1;
  foreach($result as $fetch_list)
  {
?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->serial_number; ?>">
<td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->serial_number; ?>" value="<?php echo $fetch_list->serial_number;?>" /></td>
<?php 
 $compQuery = $this -> db
           -> select('*')
           -> where('param_id',$fetch_list->param_id)
           -> get('tbl_master_data_mst');
		  $compRow = $compQuery->row();
?>
		
<th><?=$compRow->keyname;?></th>
<th><?=$fetch_list->keyvalue;?></th>
<th><?=$fetch_list->description;?></th>

<th>
<?php if($view!=''){ ?>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>
<button class="btn btn-default" type="button" data-toggle="modal" href='#editMaster' onclick="updateMasterData('<?php echo $fetch_list->serial_number;?>')"> <i class="icon-pencil"></i></button>


<?php } if($delete!=''){
$pri_col='serial_number';
$table_name='tbl_master_data';
?>
<button class="btn btn-default delbutton" id="<?=$fetch_list->serial_number."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<?php } ?>
</th>
</tr>

<div id="modal-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Master Data</h4>
</div>

<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Value Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="serial_number" value="<?php echo $fetch_list->serial_number; ?>" />
<select name="param_id" class="form-control" disabled="disabled">
	<option value="">----Select----</option>
	<?php 
	$comp_sql = $this->db->query("select * FROM tbl_master_data_mst where status='A'");
	foreach ($comp_sql->result() as $comp_fetch){
	?>	
	<option value="<?php echo $comp_fetch->param_id;?>"<?php if($comp_fetch->param_id==$fetch_list->param_id){?>selected<?php }?>><?php echo @$comp_fetch->keyname;?></option>
	<?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">*Key Value</label> 
<div class="col-sm-4"> 
<input name="keyvalue"  type="text" value="<?=$fetch_list->keyvalue;?>" class="form-control" readonly> 
</div> 
</div>

<div class="form-group" style="margin: 50px 0px 0px 0px;"> 
<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="description" readonly="readonly"><?=$fetch_list->description;?></textarea>
</div>  
</div>
</div>

<div class="modal-footer">
<!--<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">-->
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++;} ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_master_data">  
<input type="text" style="display:none;" id="pri_col" value="serial_number">
</table>
</div>
</div>
</div>
</div>
</div>

<form class="form-horizontal" role="form" method="post" action="<?=base_url();?>admin/masterdata/insert_master_data" enctype="multipart/form-data">
<div id="editMaster" class="modal fade modal" role="dialog">
   <div class="modal-dialog modal-lg">
       <div id="modal-master">

       </div>
   </div>    
</div>
</form>

<script>
function updateMasterData(v)
{
//alert(v);
var ur = "<?=base_url();?>admin/masterdata/update_master_data";
//alert(ur);
$.ajax({   
		  
			type: "GET",  
			url: ur,  
			data: {"ID":v},  
			success: function(data)  
			{   
				//alert(data);
				document.getElementById("modal-master").innerHTML = data;
			}   
		});

	//var xhttp = new XMLHttpRequest();
//	 xhttp.open("GET", "update_master_data?ID="+v, false);
//	 xhttp.send();
//
// 	document.getElementById("modal-contenttt").innerHTML = xhttp.responseText;

}

</script>

<?php
$this->load->view("footer.php");
?>
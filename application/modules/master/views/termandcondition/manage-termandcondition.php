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
<h4 class="modal-title">Add Scope of Supply</h4>
<div id="resultarea" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>

<form class="form-horizontal" role="form"  id="TermForm">
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label"><star>*</star>Model Name :</label>
<div class="col-sm-4">
<input type="hidden" class="hiddenField" class="form-control"  name="id" id="id" value="" />
<input type="text" class="form-control" required name="type" id="type" value="" />
</div> 
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><star>*</star>Scope of Supply</label>
<div class="col-sm-10" style1="height:500px;">
<textarea name="tem" class="form-control" id="tem"></textarea>
</div>
</div>

</div>

<div class="modal-footer" id="button">
<input type="submit" class="btn btn-sm" value="Save"  id="TermForm"/>
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
<li class="active">Manage Scope of Supply</li> 
</ol>
</div>
</div>



<div class="row">
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
<!-- <a class="btn btn-sm" data-toggle="modal" formid="#TermForm" data-target="#modal-0" id="formreset">Add Scope of Supply</a> -->
<a class="btn btn-sm" href="<?=base_url('master/termandcondition/add_scope_of_supply');?>">Add Scope of Supply</a>
<a class="btn btn-secondary btn-sm delete_all"><span>Delete</span></a>
</div>
</div>



<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('master/termandcondition/manage_termandcondition');?>" class="form-control input-sm">

	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>

</select> entries</label>



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

<form class="form-horizontal" method="post" action="<?=base_url('master/termandcondition/insert_termandcondition')?>">											
<table class="table table-striped table-bordered table-hover dataTables-example11" >
<thead>
<tr>
	<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	<th>Serial No.</th>
	<th>Model</th>
	<th>Action</th>
</tr>
</thead>



<tbody id="getDataTable">

<?php

$i=1;

foreach($result as $fetch_list) { ?>
 
<tr class="gradeC record" data-row-id="<?php echo $fetch_list->id; ?>">

<th>
	<input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->id; ?>" value="<?php echo $fetch_list->id;?>" /> 
</th>

<th><?php echo $i;?></th>

<th><?php 
$ctg=$this->db->query("select * from tbl_category where id='$fetch_list->type' ");
$getCtg=$ctg->row();
echo $getCtg->name;?></th>

<th>
<?php if($view!=''){ ?>

<!-- <button class="btn btn-default" property = "view" type="button" data-toggle="modal" data-target="#modal-0" arrt= '<?=json_encode($fetch_list);?>' onclick="editTermandcondition(this);" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button> -->

<?php } if($edit!=''){ ?>

<!-- <button class="btn btn-default" data-toggle="modal" data-target="#modal-0" data-a="<?=$fetch_list->id;?>"  arrt= '<?=json_encode($fetch_list);?>' onclick="editTermandcondition(this);" type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button> -->

<button class="btn btn-default" type="button"><a href="<?=base_url('master/termandcondition/add_scope_of_supply?id=');?><?=$fetch_list->id;?>"><i class="icon-pencil"></i></a></button>
<?php }

$pri_col='id';
$table_name='tbl_termandcondition';

?>

<button class="btn btn-default delbutton"  id="<?php echo $fetch_list->id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>	

</th>

</tr>



<?php $i++; } ?>

</tbody>

<input type="text" style="display:none;" id="table_name" value="tbl_termandcondition">  

<input type="text" style="display:none;" id="pri_col" value="id">

</table>

</form>

	<div class="row">
       <div class="col-md-12 text-right">
    	  <div class="col-md-6 text-left">  </div>
    	  <div class="col-md-6">  <?=$pagination; ?>  </div>       
       </div>
    </div>

</div>

</div>

</div>



<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
</div>

<?php $this->load->view("footer.php"); ?>



<script>

    CKEDITOR.replace( 'des' );

</script>
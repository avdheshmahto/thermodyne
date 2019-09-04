
<div class="col-lg-12">
<div class="panel panel-default">

<!-- /.panel-heading -->
<div class="panel-body">
<div class="row">
<div class="col-sm-12">
<ol class="breadcrumb"> 
<li class="active">Manage Term and Condition</li> 
</ol>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
  <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
  <a class="btn btn-sm" data-toggle="modal" formid = "#TermForm" data-target="#modal-0" id="formreset">Add Term and Condition</a>
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
	<th>Serial No.</th>
	<th>Type</th>
	<th>Action</th>
</tr>
</thead>

<tbody id="getDataTable">

<?php

$i=1;
  foreach($result as $fetch_list)
  {

  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->id; ?>" value="<?php echo $fetch_list->id;?>" /> </th>
<th><?php echo $i;?></th>
<th><?php echo $fetch_list->type;?></th>
<th>
<?php if($view!=''){ ?>
<button class="btn btn-default" property = "view" type="button" data-toggle="modal" data-target="#modal-0" arrt= '<?=json_encode($fetch_list);?>' onclick="editTermandcondition(this);" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>
<button class="btn btn-default" data-toggle="modal" data-target="#modal-0" data-a="<?=$fetch_list->id;?>"  arrt= '<?=json_encode($fetch_list);?>' onclick="editTermandcondition(this);" type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

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

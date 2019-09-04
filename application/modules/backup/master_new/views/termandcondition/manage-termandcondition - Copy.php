<?php
require_once(APPPATH.'core/my_controller.php');
	$obj=new my_controller();
	$CI =& get_instance();
$tableName='tbl_termandcondition';

$this->load->view("header.php"); 
?>
<div class="main-content">
<div class="row">

<div class="col-lg-12">
<div class="panel panel-default">
<ol class="breadcrumb"> 

<li class="active">Manage Term and Condition</li> 
</ol>
<br />
<div class="pull-right">
<div class="dt-buttons">
<a class="btn btn-sm" href="<?=base_url();?>master/termandcondition/add_termandcondition">Add Term and Condition</a>
<a class="btn btn-secondary btn-sm delete_all"><span>Delete</span></a>
</div>
</div>
<br />

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example">
<thead>
<tr>
	<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	<th>Type</th>
	<th>Action</th>
</tr>
</thead>
<tbody>
<?php
  foreach($result as $fetch_list)
  {
  ?>
<tr class="gradeC record" data-row-id="<?php echo $fetch_list->id; ?>">
<th>
<input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->id; ?>" value="<?php echo $fetch_list->id;?>" /> 
</th>
<th><?php echo $fetch_list->type;?></th>
										
										
										
<th>
  <?php if($view!=''){ ?>
<button class="btn btn-default"  <a href="#" onClick="openpopup('add_termandcondition',1200,500,'view',<?=$fetch_list->id;?>)"><i class="fa fa-eye"></i></a></button>&nbsp;&nbsp;&nbsp;
<?php } if($edit!=''){ ?>
<button class="btn btn-default" <a href="#" onClick="openpopup('add_termandcondition',1200,500,'id',<?=$fetch_list->id;?>)"><i class="icon-pencil"></i> </button>
<?php } 
if($delete!=''){ 
$pri_col='id';
$table_name='tbl_termandcondition';
?>
&nbsp;&nbsp;&nbsp;<button class="btn btn-default" <a href="#" id="<?php echo $fetch_list->id."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"><i class="icon-trash"></i></a></button>
<?php
}
} ?>
</th>
</tr>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_termandcondition">  
<input type="text" style="display:none;" id="pri_col" value="id">  
</table>
</div>
</div>
</div>
</div>
</div>


<?php $this->load->view("footer.php"); ?>

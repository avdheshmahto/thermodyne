<?php

error_reporting (E_ALL ^ E_NOTICE);

$tableName='tbl_termandcondition';

$this->load->view("header.php");

		$userQuery = $this -> db

           -> select('*')

		   -> where('id',$_GET['id'])

		   -> or_where('id',$_GET['view'])

           -> get('tbl_termandcondition');

		$row = $userQuery->row();

?>



<div class="main-content">

<div class="row">

<div class="col-lg-12">

<div class="panel panel-default">



<?php if($_GET['id']!=''){ ?>

<ol class="breadcrumb"> 

<li class="active">Update Scope of Supply</li> 

</ol>

<?php } else if($_GET['view']!=''){?>

<ol class="breadcrumb"> 

<li class="active">View Scope of Supply</li> 

</ol>

<?php } else {?>

<ol class="breadcrumb"> 

<li class="active">Add Scope of Supply</li> 

</ol>

<br />

<div class="pull-right">

<div class="dt-buttons">

<a class="btn btn-sm" href="<?=base_url();?>master/termandcondition/manage_termandcondition">Manage Scope of Supply</a>

</div>

</div>

<br />

<?php } ?>

<div class="panel-body">

<form class="form-horizontal" action="insert_termandcondition" method="post">



<input type="hidden" name="id" class="span6 "value="<?php echo $row->id?>" readonly size="22" aria-required='true' />

<div class="form-group"> 
<input type="hidden" class="hiddenField" class="form-control"  name="id" id="id" value="<?=$row->id?>" />
<label class="col-sm-2 control-label"><star>*</star>Model Name :</label>

<div class="col-sm-4">

<!-- <input type="text" class="form-control" name="type" value="<?=$row->type;?>" /> -->
<select class="form-control" name="type" required>
	<option>--Select--</option>
	<?php
	$ctg=$this->db->query("select * from tbl_category where status=1 ");
	foreach ($ctg->result() as $getCtg) { ?>
	<option value="<?=$getCtg->id;?>" <?php if($getCtg->id == $row->type) {?>selected <?php } ?>><?=$getCtg->name;?></option>
	<?php	} ?>
</select>

</div> 

</div>

<div class="form-group">

<label class="col-sm-2 control-label"><star>*</star>Scope of Supply</label>

<div class="col-sm-10" style1="height:500px;">

<textarea name="tem" class="form-control" id="tem">

<?php echo $row->des;?></textarea>

</div>

</div>

<div class="form-group">

<div class="col-sm-4 col-sm-offset-2">


<input type="submit" class="btn btn-sm" value="Save">
<a href="<?=base_url();?>master/termandcondition/manage_termandcondition" class="btn btn-secondary btn-sm">Cancel</a>




</div>

</div>

</form>

</div>

</div>

</div>

</div>

<?php $this->load->view("footer.php"); ?>



<script>

    CKEDITOR.replace( 'tem' );

</script>
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

<li class="active">Update Term and Condition</li> 

</ol>

<?php } else if($_GET['view']!=''){?>

<ol class="breadcrumb"> 

<li class="active">View Term and Condition</li> 

</ol>

<?php } else {?>

<ol class="breadcrumb"> 

<li class="active">Add Term and Condition</li> 

</ol>

<br />

<div class="pull-right">

<div class="dt-buttons">

<a class="btn btn-sm" href="<?=base_url();?>master/termandcondition/manage_termandcondition">Manage Term and Condition</a>

</div>

</div>

<br />

<?php } ?>

<div class="panel-body">

<form class="form-horizontal" action="insert_item" method="post" enctype="multipart/form-data">



<input type="hidden" name="id" class="span6 "value="<?php echo $row->id?>" readonly size="22" aria-required='true' />

<div class="form-group"> 

<label class="col-sm-2 control-label"><star>*</star>Template Name :</label>

<div class="col-sm-4">

<input type="text" class="form-control" required name="type" value="<?=$row->type;?>" />

</div> 

</div>

<div class="form-group">

<label class="col-sm-2 control-label"><star>*</star>Term And Condition</label>

<div class="col-sm-10" style="height:500px;">

<textarea name="des" class="form-control" id="tem">

<?php echo $row->des;?></textarea>

</div>

</div>

<div class="form-group">

<div class="col-sm-4 col-sm-offset-2">

<?php if(@$_GET['popup'] == 'True') {

if($_GET['id']!=''){

?>

<input type="submit" class="btn btn-sm" value="Save">

<?php } ?>

<a href="" onclick="popupclose(this.value)"  title="Cancel" class="btn btn-secondary btn-sm"> Cancel</a>



	   	 <?php }else {  ?>

		 

		<input type="submit" class="btn btn-sm" value="Save">

       <a href="<?=base_url();?>master/termandcondition/manage_termandcondition" class="btn btn-secondary btn-sm">Cancel</a>



       <?php } ?>



</div>

</div>

</form>

</div>

</div>

</div>

</div>

<?php $this->load->view("footer.php"); ?>



<script>

    CKEDITOR.replace( 'des' );

</script>
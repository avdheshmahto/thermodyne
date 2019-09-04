<?php 

$id = "";   $sku_no="";    $productname="";$update = "";

$technical_value = "";



// echo "<pre>";

//   print_r($result);

// echo "</pre>";



if(sizeof($result) > 0){



  $id              =  $result[0]['Product_id'];

  $sku_no          =  $result[0]['sku_no'];

  $productname     =  $result[0]['productname'];

  //$update          =  'true';

  $technical_value =  $result[0]['technical_value'];

  $update = $technical_value !=""?'true':'';    

  

 

}

?>

<div class="form-group"> 

<label class="col-sm-2 control-label">*Product Name :</label> 

<div class="col-sm-3" > 

 <input type="text" class="form-control" value="<?=$productname;?>" id="prdname" readonly>

</div>

<label class="col-sm-2 control-label">*Product Code :</label> 

<div class="col-sm-3" > 

 <input type="text" class="form-control" value="<?=$sku_no;?>" id="prdcode" readonly>

   <input type="hidden" name = "pid" class="form-control" value="" id="proId">

   

   <input type="hidden" name = "pname" class="form-control" value="<?=$productname;?>"  id="pname">



</div>

</div>




<div class="form-group"> 

<label class="col-sm-2 control-label">*Maximum Working Pressure :</label> 

<div class="col-sm-3" > 



<select class="form-control" value="" name="pressure" id="pressure">
  
  <option value="">-----select-----</option>

  <?php
      $query=$this->db->query('select * from tbl_master_data where param_id=25');
    foreach ($query->result() as $res) {
  ?>
  <option value="<?=$res->keyvalue;?>"><?=$res->keyvalue;?></option>

<?php

 } 

 ?>

</select>

</div>

<label class="col-sm-2 control-label">*Scope of supply File :</label> 
<div class="col-sm-4"> 
<input type="file" name="file_name" id="file_name"  onchange="loadFile(this)" />
<a href="<?=base_url()?>assets/excel_demo/tblData.csv" >Uploaded File</a>
</div> 


</div>

</div>

  <input type="hidden" id="rowVal" value="<?=$j;?>">

  <input type="hidden" id="incrementval" value="<?=$i;?>">

</div>







<!-- <table class="table table-bordered table-hover">

   <tbody>

    <tr class="gradeA">

      <th>Subcategory / Name</th>

      <th>Entity</th>

      <th>Value</th>

      <th>Grade</th>

      <th>Action</th>

     </tr>

   </tbody>

   <tbody id="technicalTable" >



    <?php if(sizeof($array_price) > 0){  

      foreach($array_price as $dt){ ?>

    <tr>

        <td ><input type ="text" class="form-control" name="sub_catg[]" value="<?=$dt['name'];?>"></td>

        <td><i class="fa fa-trash  fa-2x" id="quotationdel" aria-hidden="true"></i></td>

    </tr>

  <?php } } ?>

   </tbody>

   <!--<tbody id="technicalTable2">

    <?php if(sizeof($array_price) > 0){  

      foreach($array_price as $dt){ ?>

    <tr>

        <td><input type ="text" class="form-control" name="techname[]" value="<?=$dt['name'];?>"></td>

        <td><input type ="text" class="form-control" name="techentity[]" value="<?=$dt['price'];?>"></td>

        <td><input type ="text" class="form-control" name="techvalue[]" value="<?=$dt['price'];?>"></td>

        <td><input type ="text" class="form-control" name="techgrade[]" value="<?=$dt['price'];?>"></td>

        <td><i class="fa fa-trash  fa-2x" id="quotationdel" aria-hidden="true"></i></td>

    </tr>

  <?php } } ?>

   </tbody>

</table> -->

<div class="form-group"></div>

<div class="modal-footer" id="button">

<input type="submit" class="btn btn-sm" value="Save"> 

<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>

</div>






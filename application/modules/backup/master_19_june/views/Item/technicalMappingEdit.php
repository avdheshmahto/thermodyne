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
<label class="col-sm-2 control-label">*Sub Category :</label> 
<div class="col-sm-3" > 
 <input type="text" class="form-control" value="" name="sub_catg" id="sub_catg">
 
 
</div>
<div class="col-sm-2"> 
   <button class="btn btn-default" type="button" onclick="addSubCatg()"><img src="/thermodyne/assets/images/plus.png"></button>
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Name :</label> 
<div class="col-sm-3" > 
 <input type="text" class="form-control" value=""  id="tech_name">
</div>
<label class="col-sm-2 control-label">*Entity :</label> 
<div class="col-sm-3" > 
   <input type="text" class="form-control" value="" id="tech_entity">
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Value :</label> 
<div class="col-sm-3" > 
 <input type="text" class="form-control" value=""  id="tech_value">
</div>
<label class="col-sm-2 control-label">*Grade :</label> 
<div class="col-sm-3" > 
   <input type="text" class="form-control" value="" id="tech_grade">
   <!-- <input type="text" id="rowVal" value=""> -->
   <input type="hidden" name="update" value="<?=$update;?>">
</div>
<div class="col-sm-2"> 
   <button class="btn btn-default" type="button" onclick="addtechnical()"><img src="/thermodyne/assets/images/plus.png"></button>
 </div>
</div>
<br>
 <div class="">

<br/>

<table class="table table-bordered table-hover">
   <tbody>
    <tr class="gradeA">
      <th>Subcategory / Name</th>
      <th>Entity</th>
      <th>Value</th>
      <th>Grade</th>
      <th>Action</th>
     </tr>
   </tbody>
   <tbody id="technicalTable">
    <?php 
   
    if($technical_value != ""){
      $i = 1;
    foreach ($result as $key => $dt) {
      $jsonData =   json_decode($dt['technical_value'],true);

     ?>
      
    
    <tr style="color: #fbfbfb;background: #929090;" class="<?=$dt['sub_category'].'_'.$i;?>">
      <td>Subcategory</td>
      <td ><input  type ="text" class="form-control"  value="<?=$dt['sub_category'];?>"></td>
      <td></td>
      <td></td>
      <td><i class="fa fa-trash  fa-2x" id="technical_main" aria-hidden="true"></i></td>
    </tr>

    <?php
     $j=1;
     foreach ($jsonData as $jkey => $jdt) { ?>

    <tr class="<?=$dt['sub_category'].'_row_'.$i;?>">
      <td><input  type ="text" class="form-control" name="technical[<?=$dt['sub_category'];?>_<?=$i;?>][<?=$j;?>][name]" value="<?=$jdt['name']?>"></td>
      <td><input  type ="text" class="form-control" name="technical[<?=$dt['sub_category'];?>_<?=$i;?>][<?=$j;?>][entity]" value="<?=$jdt['entity']?>"></td>
      <td><input  type ="text" class="form-control" name="technical[<?=$dt['sub_category'];?>_<?=$i;?>][<?=$j;?>][value]" value="<?=$jdt['value']?>"></td>
      <td><input type ="text" class="form-control" name="technical[<?=$dt['sub_category'];?>_<?=$i;?>][<?=$j;?>][grade]" value="<?=$jdt['grade']?>"></td>
      <td><i class="fa fa-trash  fa-2x" id="quotationdel" aria-hidden="true"></i></td>
    </tr>

    <?php 

    $j++;}

    $i++;} }

    ?>
   </tbody>
</table>
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



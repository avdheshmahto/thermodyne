<?php 
$id = "";   $sku_no="";    $productname="";$update = "";
$technical_value = "";     $subject = "";

// echo "<pre>";
//   print_r($result);
// echo "</pre>";

if(sizeof($result) > 0){

  $id              =  $result[0]['Product_id'];
  $sku_no          =  $result[0]['sku_no'];
  $productname     =  $result[0]['productname'];
  $update          =  $result[0]['id'] !=""?'true':''; 
 
  $subject         = $result[0]['sub_details'];
  
 
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
     <input type="hidden" name = "pid"    class="form-control" value="" id="proId">
     <input type="hidden" name = "update" class="form-control" value="<?=$update;?>" id="update">
     <input type="hidden" name = "pname"  class="form-control" value="<?=$productname;?>"  id="pname">
  </div>
</div>
<!-- <div class="form-group"> 
 <label class="col-sm-2 control-label">Subject Title :</label> 
 <div class="col-sm-3"> 
  <input type="text" class="form-control" value="" name="sub_catg" id="sub_catg">
 </div>
 <div class="col-sm-2"> 
   <button class="btn btn-default" type="button" onclick="addSubCatg()"><img src="/thermodyne/assets/images/plus.png"></button>
 </div>
</div> -->
<div class="form-group"> 
  <label class="col-sm-2 control-label">Subject Title :</label> 
  <div class="col-sm-3" > 
    <input type="text" class="form-control" value=""  id="sub_title">
  </div>
  <label class="col-sm-2 control-label">Subject Details :</label> 
  <div class="col-sm-3" > 
    <textarea type="text" class="form-control" value="" id="sub_details" rows="5" cols="17"></textarea>
  </div>
  <div class="col-sm-2"> 
   <button class="btn btn-default" type="button" onclick="addSubject()"><img src="/thermodyne/assets/images/plus.png"></button>
  </div>
</div>


<br/>

<table class="table table-bordered table-hover">
   <tbody>
    <tr class="gradeA">
      <th>Title</th>
      <th>Details</th>
      <th>Action</th>
    </tr>
   </tbody>
   <tbody id="subjectTable">
     <?php if($subject != ""){ 
     if(sizeof($result) > 0){ 
      foreach($result as $dt){ ?>
    <tr>
      <td><input type ="text" class="form-control" name="subjectTitle[]"  value="<?=$dt['title'];?>"></td>
      <td><input type ="text" class="form-control" name="subjectDetails[]"  value="<?=$dt['sub_details'];?>"></td>
      <td><i class="fa fa-trash  fa-2x" id="subjectmapping" aria-hidden="true"></i></td>
    </tr>
  <?php } } } ?>

   </tbody>
</table>

  
</div>

<div class="form-group"></div>
<div class="modal-footer" id="button">
<input type="submit" class="btn btn-sm" value="Save"> 
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>



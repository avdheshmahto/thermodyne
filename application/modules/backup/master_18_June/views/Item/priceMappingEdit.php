<?php 
$id = "";   $currency="";    $capacity="";
$entity=""; $array_price=array();
if(sizeof($result) > 0){
 //  print_r($result);
  $id       =  $result['id'];
  $currency =  $result['currency'];
  $capacity =  $result['capacity'];
  $entity   =  $result['entity'];
  $price    =  $result['price'];
  $array_price =  json_decode($price,true);
 // print_r($array_price);
}
?>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Capacity:</label> 
<div class="col-sm-3" > 
 <input type="text" class="form-control" value="<?=$capacity;?>" name="capacity" id="capacity">
</div>
<label class="col-sm-2 control-label">*Capacity Type:</label> 
<div class="col-sm-3" > 
   <input type="text" class="form-control" value="<?=$entity;?>" name="entity" id="entity">
   <input type="hidden" name = "pid" class="form-control" value="" id="proId">
   <input type="hidden" name = "id" class="form-control" value="<?=$id;?>"  id="id">
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Price Name:</label> 
<div class="col-sm-3" > 
 <input type="text" class="form-control" value=""  id="pricename">
</div>
<label class="col-sm-2 control-label">*Price Value:</label> 
<div class="col-sm-3" > 
   <input type="text" class="form-control" value="" id="pricevalue">
 </div>
<div class="col-sm-2"> 
   <button class="btn btn-default" type="button" onclick="addprice()"><img src="/thermodyne/assets/images/plus.png"></button>
 </div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Currency Name:</label> 
<div class="col-sm-3" > 
 <input type="text" class="form-control" name="currency" value="<?=$currency;?>"  id="currency">
</div>
</div>
<br>
<table class="table table-bordered table-hover">
   <tbody>
      <tr class="gradeA">
    <th>Quotation Name</th>
    <th>Price</th>
    <th>Action</th>
     </tr>
   </tbody>
   <tbody id="priceTable">
    <?php if(sizeof($array_price) > 0){  
      foreach($array_price as $dt){ ?>
    <tr>
        <td><input type ="text" class="form-control" name="pricename[]" value="<?=$dt['name'];?>"></td>
        <td><input type ="text" class="form-control" name="productPrice[]" value="<?=$dt['price'];?>"></td>
        <td><i class="fa fa-trash  fa-2x" id="quotationdel" aria-hidden="true"></i></td>
    </tr>
  <?php } } ?>
   </tbody>
</table>
<div class="form-group"></div>
<div class="modal-footer" id="button">
<input type="submit" class="btn btn-sm" value="Save"> 
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>



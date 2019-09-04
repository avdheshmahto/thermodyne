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



<table class="table table-bordered table-hover tabletech">

<input type="hidden" name="update" value="<?=$update;?>">

   <tbody>

    <tr class="gradeA">

      <th>Subcategory / Item</th>

      <th>Unit</th>

      <th>Description</th>

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

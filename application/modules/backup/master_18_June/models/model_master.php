<?php
class model_master extends CI_Model {
	
function productCatg_data(){
	
	  $this->db->select("*");
	  // $this->db->order_by("prodcatg_id","desc");
      $this->db->from('tbl_prodcatg_mst');  
      $query = $this->db->get();
      
	  return $result=$query->result();  
}	

function productSubCatg_data(){
	
	  $this->db->select("*");
	  // $this->db->order_by("prodcatg_id","desc");
      $this->db->from('tbl_prodcatg_m');  
      $query = $this->db->get();
      
	  return $result=$query->result();  
}

function contact_get($last,$strat){
  
	$query=$this->db->query("select *from tbl_contact_m where status='A' ORDER BY contact_id DESC limit $strat,$last");
  return $result=$query->result();  
}

function product_get($last,$strat){
  $query=$this->db->query("select *from tbl_product_stock where status='A' ORDER BY Product_id DESC limit $strat,$last");
  return $result=$query->result();  
}


function termAndCondition_data($last, $strat){
	 $query=$this->db->query("select * from tbl_termandcondition where status='A' ORDER BY id DESC limit $strat,$last");
   return $result=$query->result();
}

function category_all($last,$strat){
	$data="";
  /*echo "SELECT  id, name,name as text, inside_cat as parent_id ,create_on FROM tbl_category where status = 1 Order by id ASC limit $strat,$last";*/
  $result = $this->db->query("SELECT  id, name,name as text, inside_cat as parent_id ,create_on,type,grade FROM tbl_category where status = 1 Order by id DESC limit $strat,$last")->result_array();
  if(sizeof($result ) > 0){
       return $result;
  }
}

  /*function category_all_list(){
	   $data="";
       $result = $this->db->query("SELECT  id, name,name as text,create_on FROM tbl_category where status = 1 Order by id ASC")->result_array();
       if(sizeof($result ) > 0){
       return $result;
       }
  }*/

  function insert_value($post){
  	 $data = date("Y-m-d"); 
     $sql  = "insert into tbl_category set name = ?,inside_cat = ?,type=?,create_on = ?,grade = ?";
    return $this->db->query($sql,array($post['category'],$post['selectCategory'],$post['typeid'],$data,$post['grade']));
  
  }

  function tree_all(){
	   $data="";
       $result = $this->db->query("SELECT  id, name,name as text, inside_cat as parent_id ,create_on FROM tbl_category where status = 1 Order by id ASC")->result_array();
        foreach ($result as $row) {
           $data[] = $row;
       }
     return $data;
  }

    function edit_Category($post){
          $qry = "update tbl_category set name = ?,inside_cat=?,type = ?,grade = ?  WHERE id = ?";
          $this->db->query($qry,array($post['category'],$post['selectCategory'],$post['typeid'],$post['grade'],$post['edit']));
    }

    function get_child_data($id = 0,$spacing = '',$user_tree_array = ''){
      if (!is_array($user_tree_array))
          $user_tree_array = array(); 

          $sql   = "select * from tbl_category where  inside_cat = $id";
          $query = $this->db->query($sql);
          $data  = $query->result_array();

        if (sizeof($data) > 0) {
         foreach($data as $row) {
            // echo "<option>".$spacing . $row['name']."</option>";
            $user_tree_array[] = array("id" => $row['id'],"name" => $spacing.$row['name']);
            $user_tree_array   = $this->get_child_data($row['id'],$spacing . '&nbsp;&nbsp;&nbsp;&nbsp;',$user_tree_array);
         }
       }

      return $user_tree_array;
    }

    function delete_data($id,$arr){
       foreach ($arr as $key => $value) {
         $qry = "update tbl_category set status = 0  WHERE id = ?";
         $this->db->query($qry,array($value['id']));
       }
         $qry = "update tbl_category set status = 0  WHERE id = $id";
         $this->db->query($qry);

    }

    function categorySelectbox($parent = 0, $spacing = '', $user_tree_array = ''){
      if (!is_array($user_tree_array))
        $user_tree_array = array();
   
        $sql = "select * from tbl_category where status = 1 AND inside_cat = $parent";
        $query = $this->db->query($sql);
        $data  = $query->result_array();
         if (sizeof($data) > 0) {
           foreach($data as $row) {
             // echo "<option>".$spacing . $row['name']."</option>";
             $user_tree_array[] = array("id" => $row['id'], "name" => $spacing . $row['name'],'praent' => $row['inside_cat']);
             $user_tree_array = $this->categorySelectbox($row['id'],$spacing . '&nbsp;&nbsp;&nbsp;&nbsp;',$user_tree_array);
           }
         }
       return $user_tree_array;
     }


    function treeGetParentid($id = 0, $user_tree_array = ''){

        if (!is_array($user_tree_array))
            $user_tree_array = array(); 

            $sql   = "select * from tbl_category where  id = $id";
            $query = $this->db->query($sql);
            $data  = $query->result_array();
        if (sizeof($data) > 0) {
           foreach($data as $row) {
             $user_tree_array   = $this->treeGetParentid($row['inside_cat']);
             if($row['inside_cat'] == 0){
              return $row['id'];  
             }
           }
        }
       return $user_tree_array;
    } 


    function treeGetParentValue($id = 0, $user_tree_array = ''){

        if (!is_array($user_tree_array))
            $user_tree_array = array(); 

            $sql   = "select * from tbl_category where  id =$id";
            $query = $this->db->query($sql);
            $data  = $query->result_array();

          if (sizeof($data) > 0) {
           foreach($data as $row) {
              $user_tree_array[] = array("id" => $row['inside_cat'],'name'=>$row['name']);
              $user_tree_array   = $this->treeGetParentValue($row['inside_cat'],$user_tree_array);
           }
         }
       return $user_tree_array;
    }

function count_all($tableName,$status = 0,$get){
 
  $qry ="select count(*) as countval from $tableName where status= ?";
    if($get['filtername']!="" || $get['filterdate']!="" || $get['filtertype'] != ''){
      if($get['filtername']!="")
         $qry .= " AND name LIKE '%".$get['filtername']."%'";

      if($get['filterdate']!="")
         $qry .= " AND create_on ='".$get['filterdate']."'";

      if($get['filtertype']!="")
         $qry .= " AND type ='".$get['filtertype']."'";

  }
   $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}

function mapCategory(){
  $sql   = "select * from tbl_category where  inside_cat = 0 AND status = 1 AND type = 2";
  $query = $this->db->query($sql);
  return  $data  = $query->result_array();
}

function mapscope(){
  $sql   = "select * from tbl_category where  inside_cat = 0 AND status = 1 AND type = 3";
  $query = $this->db->query($sql);
  return  $data  = $query->result_array();
}

function insertmapping($post){
  $countval =  count($post['mapcat']);
  $mapScope =  count($post['mapScope']);
  $date     = date("Y-m-d");
  $qrydel   = "delete from tbl_product_mapping where product_id =?";
  $this->db->query($qrydel,array($post['pid']));  
   if($countval != 0){
    foreach ($post['mapcat'] as  $dt) {
         $qry = "insert into tbl_product_mapping set type = ?, cat_id = ?,product_id =?,create_on = ?";
         $this->db->query($qry,array(1,$dt,$post['pid'],$date)); 
     // echo $dt;
    }
   }  

  if($mapScope != 0){
    foreach ($post['mapScope'] as  $dt1) {
         $qry = "insert into tbl_product_mapping set type = ?, cat_id = ?,product_id =?,create_on = ?";
         $this->db->query($qry,array(2,$dt1,$post['pid'],$date)); 
     // echo $dt;
    }
   }    
} 


 function modPriceMapping($post,$price){
  if($post['id'] != ""){
    //echo "Adfdfadf";
   // echo "delete from tbl_product_price_mapping where id =".$post['id'];
    // $qrydel   = "delete from tbl_product_price_mapping where id =".$post['id'];
    // $this->db->query($qrydel);  

    $qry = "update tbl_product_price_mapping set pid = ?,currency = ? ,capacity = ?, entity =?,  price = ? where id = ?";
    $this->db->query($qry,array($post['pid'],$post['currency'],$post['capacity'],$post['entity'],$price,$post['id']));  
  }else{
    $qry = "insert into tbl_product_price_mapping set pid = ?,currency = ? ,capacity = ?, entity =?,  price = ?";
    $this->db->query($qry,array($post['pid'],$post['currency'],$post['capacity'],$post['entity'],$price));  

   }
 }

function modGetPriceMapping($id){
  $query = $this->db->query("select * from tbl_product_price_mapping where  pid = ? AND status = 1",array($id));
return $data  = $query->row_array();
 //  print_r($data);

}

}  /// End Class ///

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Accessories extends my_controller {


function __construct()
{
   parent::__construct(); 
   $this->load->model('accessory_model');	
   $this->load->model('model_admin_login');
	// load pagination library //
   $this->load->library('pagination');
	// load Employee Model //
   //$this->load->model('Employee_model', 'employee');
}


// listing records
public function data() { 
$config['total_rows'] = $this->employee->getAllEmployeeCount();
$data['total_count'] = $config['total_rows'];
		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {
			$page_number = $this->uri->segment(3);
			$config['base_url'] = base_url() . 'Item/index/';
			if (empty($page_number))
				$page_number = 1;
			$offset = ($page_number - 1) * $this->pagination->per_page;
			$this->employee->setPageNumber($this->pagination->per_page);
			$this->employee->setOffset($offset);
			$this->pagination->cur_page = $offset;
			$this->pagination->initialize($config);
			$data['page_links'] = $this->pagination->create_links();
			$data['employeeInfo'] = $this->employee->employeeList();
		}
		// load view
  $this->load->view('Item/index', $data);
}


public function updateItem()
{
	if($this->session->userdata('is_logged_in'))
	{
		 $data['ID'] = $_GET['ID'];
		$this->load->view('/Item/edit-item',$data);
	}
	else
	{
		redirect('index');
	}
}


public function manage_accessories()
{
   if($this->session->userdata('is_logged_in'))
    {
      $data =  $this->manageItemJoinfun();  	
	  $this->load->view('Accessories/manage-accessories',$data);
	}
	else
	{
	  redirect('index');
	}
		
}


public function manageItemJoinfun()
{
    
	 $table_name = 'tbl_accessories';
     //$url   = site_url('/master/Item/manage_item?');
	 $sgmnt = "4";

	 if($_GET['entries']!="")
		$showEntries = $_GET['entries'];
     else
    	$showEntries = 10;

     $totalData   = $this->accessory_model->count_allaccessories($table_name,'A',$this->input->get());
    //$totalData   = $this->model_master->filterListproduct($p="",$p2 = "",$this->input->get());
    //$showEntries= $_GET['entries']?$_GET['entries']:'12';

    if($_GET['entries']!="" && $_GET['filter'] != 'filter')
	  $url        = site_url('/master/Item/manage_item?entries='.$_GET['entries']);
    elseif($_GET['filter'] == 'filter' || $_GET['entries'] != '')
       $url        = site_url('/master/Item/manage_item?sku_no='.$_GET['sku_no'].'?acc_cat='.$_GET['acc_cat'].'&acc_subcat='.$_GET['acc_subcat'].'&acc_price='.$_GET['acc_price'].'&acc_des='.$_GET['acc_des'].'&filter='.$_GET['filter'].'&entries='.$_GET['entries']);
     else
	 	$url   = site_url('/master/Accessories/manage_accessories?');
   
     $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);

     $data=$this->user_function(); // call permission fnctn

     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();

     if($this->input->get('filter') == 'filter')   ////filter start ////
        $data['result'] = $this->accessory_model->filterListaccessories($pagination['per_page'],$pagination['page'],$this->input->get());
     else	
	    $data['result'] = $this->accessory_model->accessories_get($pagination['per_page'],$pagination['page']);



	  //print_r($data);die;

		 return $data;

}

public function mappingPro()
{
  //print_r($this->input->post());
  $this->model_master->insertmapping($this->input->post());
  echo '1';
}


public function test_3(){
	
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('Item/test_3');
	}
	else
	{
		redirect('index');
	}
		
}


public function get_cid()
{
	//$data=$this->user_function();// call permission function
	$this->load->view('get_cid');
}

public function add_item()
{
	//echo "";die;
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('Item/add-item');
	}
	else
	{
		redirect('index');
	}
}

public function insert_accessories()
{

	    @extract($_POST);
	 	//print_r($_FILES);die;

		$table_name ='tbl_accessories';
		$pri_col    ='Accessory_id';

		$id         = $this->input->post('Accessory_id');
		@$branchQuery2= $this->db->query("SELECT * FROM $table_name where Accessory_id = '$id' ");
		$branchFetch2 = $branchQuery2->row();
		
        
      /*
        if($_FILES['image_name']['name']!='')
				{
                    $target = "assets/scope_document/"; 
					$target1 =$target . @date(U)."_".( $_FILES['image_name']['name']);
					$image_name=@date(U)."_".( $_FILES['image_name']['name']);
					move_uploaded_file($_FILES['image_name']['tmp_name'], $target1);
				}
				else
				{
					
					echo $image_name=$branchFetch2->scope_doc;
			    } */

						

		$dataarr= array(

					 'acc_category'  => $this->input->post('acc_category'),
					 'acc_subcategory' => $this->input->post('acc_subcategory'),
					 'acc_price'      => $this->input->post('acc_price'),
					 'acc_description'   => $this->input->post('acc_description'),
					);

	    $sesio = array(
		
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_id'=> $this->session->userdata('maker_id'),
					'author_id'=> $this->session->userdata('author_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
		
					);				

		 $dataall = array_merge($dataarr,$sesio);
		 
         if($id != "")
		 {
	            
				$this->Model_admin_login->insert_user("tbl_accessories_log",$dataall);
                $this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataarr);
                echo "2";
        }
		else
		{
             
				$this->Model_admin_login->insert_user("tbl_accessories_log",$dataall);
		        $this->Model_admin_login->insert_user($table_name,$dataall);
				echo "1";
		}
}

   
public function AccessoriesList()
{
    $data =  $this->manageItemJoinfun();  	
    //echo $
    $this->load->view('Accessories/refresh-table',$data);
} 

private function set_barcode($code)
{
	//load library
	$this->load->library('zend');
	//load in folder Zend
	$this->zend->load('Zend/Barcode');
	//generate barcode
	Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
}
	
	
public function bar()
{
	//I'm just using rand() function for data example
	$temp = rand(10000, 99999);
	$this->set_barcode($temp);
}

	

function changesubcatg()
{
   if($this->session->userdata('is_logged_in'))
   {
  		$data['result'] = $this->model_master->get_child_data($this->input->get('ID'));
		$this->load->view('Item/getsubcatg',$data);
   }
   else
   {
     redirect('index');
  }
}

public function import_product()
{
    if($this->session->userdata('is_logged_in'))
    {
	   $this->load->view('Item/import-product');
	}
	else
	{
		redirect('index');
	}
}



public function item_t()
{
	
	if($this->session->userdata('is_logged_in'))
	{
		$data=$this->user_function();// call permission fnctn
		$data['result'] = $this->model_master->product_get();	
		$this->load->view('Item/manage-item-test',$data);
	}
	else
	{
		redirect('index');
	}
		
}


public function insert_loop_data()
{
	
	for($i=1;$i<=3000;$i++)
	{
	$this->db->query("insert into tbl_product_stock set productname='safi',comp_id='1'");
	}
	
}

public function ajax_priceMapping(){
 //print_r($this->input->post());die;
   $pricesize = sizeof($this->input->post('productPrice'));
    for($i=0;$i<$pricesize;$i++) {
	    $arr[$i]['price'] = $this->input->post('productPrice')[$i];
	    $arr[$i]['name']  = $this->input->post('pricename')[$i];
	   
    }
   $jsonprice = json_encode($arr);
   $this->model_master->modPriceMapping($this->input->post(),$jsonprice);
   echo 1;
 }

public   function ajax_getPriceMapping(){
   //print_r($this->input->post());
   $data['result'] = $this->model_master->modGetPriceMapping($this->input->post('id'));
   $this->load->view('Item/priceMappingEdit',$data);
   // $getData['price'] = json_decode($getData['result']['price']);
   // echo json_encode($getData);
}
 
public   function ajax_getTechnicalMapping()
{
   $data['result'] = $this->model_master->modGetTechnicalMapping($this->input->post('id'));
   $this->load->view('Item/technicalMappingEdit',$data);
}

public   function ajax_getSubjectMapping()
{
    $data['result'] = $this->model_master->modGetsubjectMapping($this->input->post('id'));
    $this->load->view('Item/subjectMappingEdit',$data);
}

public function technicalDataInsert(){
     if($this->input->post() != ""){
	 	$pid         = $this->input->post('pid'); 
	 	$pname       = $this->input->post('pname');
	 	$update      = $this->input->post('update'); 
        $subcategory = $this->input->post('sub_catg');
        $jsonEncode  = "";
     if($update == 'true'){
         $qrydel   = "delete from tbl_technical_details where pro_id =".$pid;
         $this->db->query($qrydel); 
       } 
      // echo "<pre>";
      // print_r($this->input->post());
      // echo "<pre>";
      if($this->input->post('technical') != ""){
        foreach ($this->input->post('technical') as $key => $value) {
	        $subValue     = explode("_",$key);
	        $subcategory  = $subValue[0];
	        $jsonEncode   =  json_encode($value);
	        //print_r(json_decode($jsonEncode,true));
	        $this->model_master->mod_InsertTechnicalData($pid,$jsonEncode,$subcategory,$pname,$update);
	      } 
	    }else{
	   	   $this->model_master->mod_InsertTechnicalData($pid,$jsonEncode,$subcategory,$pname,$update);
	    }
	   echo 1;     
	 }   
   }

public function subjectDataInsert(){
     if($this->input->post() != ""){
	 	 $pid         = $this->input->post('pid'); 
	 	 $pname       = $this->input->post('pname');
	  	 $update      = $this->input->post('update'); 

        
      if($update == 'true'){
         $qrydel   = "delete from tbl_product_subject where pid =".$pid;
         $this->db->query($qrydel); 
       }
         //print_r($this->input->post());
       	$i = 0;
       	if($this->input->post('subjectTitle') != ""){
          foreach ($this->input->post('subjectTitle') as $key => $value) {
            $sub_title      = $this->input->post('subjectTitle')[$i];
            $subjectDetails = $this->input->post('subjectDetails')[$i];
            $this->model_master->mod_InsertsubjectData($pid,$subjectDetails,$sub_title);
            $i++;
	      } 
        }
         echo 1;   
    }   
  }

  public function contantDataInsert(){
     if($this->input->post() != ""){
	 	 $pid         = $this->input->post('pid'); 
	 	 $pname       = $this->input->post('pname');
	  	 $update      = $this->input->post('update'); 

        
      if($update == 'true'){
         $qrydel   = "delete from tbl_product_contant where pid =".$pid;
         $this->db->query($qrydel); 
       }
        //print_r($this->input->post('subjectTitle'));
       	$i = 0;
       	if($this->input->post('subjectTitle') != ""){
        foreach ($this->input->post('subjectTitle') as $key => $value) {
          $sub_title      = $this->input->post('subjectTitle')[$i];
          $subjectDetails = $this->input->post('subjectDetails')[$i];
          $this->model_master->mod_InsertcontantData($pid,$subjectDetails,$sub_title);
          $i++;
	     } 
	   }
         echo 1;   
    }   
  }
 
 function priceDataInsert(){
     if($this->input->post() != ""){
	 	 $pid         = $this->input->post('pid'); 
	 	 $pname       = $this->input->post('pname');
	  	 $update      = $this->input->post('update'); 

        
      if($update == 'true'){
         $qrydel   = "delete from tbl_product_price_text where pid =".$pid;
         $this->db->query($qrydel); 
       }
         //print_r($this->input->post());
       	$i = 0;
      	if($this->input->post('subjectTitle') != ""){
        foreach ($this->input->post('subjectTitle') as $key => $value) {
          $sub_title      = $this->input->post('subjectTitle')[$i];
          $subjectDetails = $this->input->post('subjectDetails')[$i];
          $this->model_master->mod_InsertpriceTextData($pid,$subjectDetails,$sub_title);
          $i++;
	     } 
	   }
         echo 1;   
    } 
 }

  function ajax_getContantMapping(){
   	  $data['result'] = $this->model_master->modGetcontantMapping($this->input->post('id'));
      $this->load->view('Item/contantMappingEdit',$data);
   }

   function ajax_getPriceTextMapping(){
   	  $data['result'] = $this->model_master->modGetPriceTextMapping($this->input->post('id'));
      $this->load->view('Item/priceTextMapping',$data);
   }
  

}

?>
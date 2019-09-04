<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class termandcondition extends my_controller {

function __construct(){
   parent::__construct(); 
    $this->load->model('model_master');	
    $this->load->library('pagination'); 
    $this->load->model('model_admin_login');
}

public function manage_termandcondition(){
//echo "sdfsdf";die;
if($this->session->userdata('is_logged_in')){
     $data =  $this->manage_term_and_condtionJoin();
    
     $this->load->view('/termandcondition/manage-termandcondition',$data);
     }
	 else
	 {
	 redirect('index');
	 }
  }
function manage_term_and_condtionJoin(){
	////Pagination start ///
      $table_name  = 'tbl_termandcondition';
	  $url        = site_url('/master/termandcondition/manage_termandcondition?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->Model_admin_login->count_all($table_name,'A');
      //$showEntries= $_GET['entries']?$_GET['entries']:'12';
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/master/termandcondition/manage_termandcondition?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     //////Pagination end ///
   
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['result']            = $this->model_master->termAndCondition_data($pagination['per_page'],$pagination['page']);	
     $data['pagination']        = $this->pagination->create_links();
     return $data;
  }

  public function ajex_TermListData(){
    $data =  $this->manage_term_and_condtionJoin();
    $this->load->view('/termandcondition/edit-termandcondition',$data);  
  }

public function updateContact(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('/Account/edit-contact',$data);
	}
	else
	{
	redirect('index');
	}
}

public function getdata_fun(){
	if($this->session->userdata('is_logged_in')){
	 $data['id'] = $_GET['con'];
		$this->load->view('/Account/getdata',$data);
	}
	else
	{
	redirect('index');
	}
}


public function add_contact(){


	if($this->session->userdata('is_logged_in')){

 		$this->load->view('Account/add-contact');
}
	else
	{
	redirect('index');
	}
}

		
public function insert_termandcondition(){
	
		@extract($_POST);
		$table_name ='tbl_termandcondition';
		$pri_col ='id';
	 	$id= $this->input->post('id');
	 	$data= array(
			'type' => $this->input->post('type'),
			'des' => $this->input->post('tem')	
		      	);
        $sesio = array(
			'comp_id' => $this->session->userdata('comp_id'),
			'divn_id' => $this->session->userdata('divn_id'),
			'zone_id' => $this->session->userdata('zone_id'),
			'brnh_id' => $this->session->userdata('brnh_id'),
			'maker_date'=> date('y-m-d'),
			'author_date'=> date('y-m-d')
		);
		
		$dataall = array_merge($data,$sesio);
		$this->load->model('Model_admin_login');
	
		if($id!=''){
		
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$dataall);
		echo "2";	
		}else{
		$this->Model_admin_login->insert_user($table_name,$dataall);
		echo "1";
			 //redirect('master/termandcondition/manage_termandcondition');
	}
 }




}
?>
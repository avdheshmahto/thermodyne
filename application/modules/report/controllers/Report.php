<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Report extends my_controller {
function __construct(){
   parent::__construct(); 
    $this->load->model('model_report');	
    $this->load->library('session');
}     

function report_function() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('open-page-report');
	}
	else
	{
	redirect('index');
	}
}

function searchPaymentReport() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['SearchPayment'] = $this->model_report->getSearchPayment($contactid);
    $this->load->view('payment-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchPaymentLogReport() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['totalSearchPayment'] = $this->model_report->getSearchPaymentLog($contactid,$payment_mode,$f_date,$t_date);
    $this->load->view('payment-log-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}



function searchPaymentReceivedReport(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['SearchPaymentReceived'] = $this->model_report->getSearchPaymentReceived($contactid);
    $this->load->view('payment-received-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchPaymentReceivedLogReport(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['SearchPaymentReceivedLog'] = $this->model_report->getSearchPaymentReceivedLog($contactid,$payment_mode,$f_date,$t_date);
    $this->load->view('payment-received-log-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}



function searchStock() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['stockSearch'] = $this->model_report->getSearchStock($p_id,$p_name);
    $this->load->view('add-product-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}



function searchTemplate() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['searchTemplate'] = $this->model_report->getTemplateSearch($temp_id,$p_name,$f_date,$t_date);
    $this->load->view('template-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_template() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-template');
	}
	else
	{
	redirect('index');
	}
}


function searchProduction() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['masterCuttingSearch'] = $this->model_report->getSearchMasterCutting($p_id,$p_name,$f_date,$t_date);
    $this->load->view('production-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_production() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-production');
	}
	else
	{
	redirect('index');
	}
}

function searchInvoice(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['invceSearch'] = $this->model_report->getSearchInvoice($inv_no,$cust_name,$f_date,$t_date);
    $this->load->view('invoice-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_qc() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-qc');
	}
	else
	{
	redirect('index');
	}
}

function searchProInvoice(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['proInvceSearch'] = $this->model_report->getSearchProInvoice($inv_no,$cstmr_name,$f_date,$t_date);
    $this->load->view('proforma-invoice-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_proforma_invoice() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-invoice-order');
	}
	else
	{
	redirect('index');
	}
}


function searchPacking() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['packingSearch'] = $this->model_report->getSearchPacking($p_id,$f_date,$t_date);
    $this->load->view('packing-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_packing() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-packing');
	}
	else
	{
	redirect('index');
	}
}

function searchPurchaseOrder() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['purchaseOrderSearch'] = $this->model_report->getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date);
    $this->load->view('add-purchaseorder-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}	

function searchSalesOrder() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['saleOrderSearch'] = $this->model_report->getSearchSaleOrder($p_no,$v_name,$f_date,$t_date,$g_total);
    $this->load->view('add-saleorder-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}	


function searchSalesdeals() {

 $select_query = "select * from tbl_contact_m where status='A'";
 $query        = $this->db->query($select_query);
 $count_tatal  = $query->num_rows();
	
// Pipedrive API token
$api_token = 'aa47ad16e85b1ad718d23e397d21fa4cc33e2d2c';

// Pipedrive company domain
$company_domain = 'therm';
 
//URL for Deal listing with your $company_domain and $api_token variables
//$url = 'https://'.$company_domain.'.pipedrive.com/v1/deals?start='.$count_tatal.'&limit=500&api_token=' . $api_token;

$url = 'https://'.$company_domain.'.pipedrive.com/v1/deals?start='.$count_tatal.'&limit=500&api_token=' . $api_token;
//GET request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
echo 'Sending request...' . PHP_EOL;
 
$output = curl_exec($ch);
curl_close($ch);
 
// Create an array from the data that is sent back from the API
// As the original content from server is in JSON format, you need to convert it to a PHP array
$result = json_decode($output, true);

//echo $output;
// Check if data returned in the result is not empty
if (empty($result['data'])) {
   // exit('No deals created yet' . PHP_EOL);
	$flasemsg  = 'No deals created yet.';
}

 $i = 1;
// echo $result['data']['person_id']['email'][0]['value'];
// echo $result['data']['person_id']['name'];
	if(!empty($result['data'])){
		 foreach ($result['data'] as $key => $dt) {
		 	 $id 		     =  $dt['id'];
		     $title 		 =  $dt['title'];
			 $contact_preson =  $dt['508498bff5b09271eee16f78dad24579d6538f28'];
			 $contact_preson2=  $dt['d38ad9e82d60bb57189f30ddede19ef0f4148e9f'];
			 $contact_phone  =  $dt['cc60bce1c961b7fd6b43f426678df38de64bbbad'];
			 $contact_state  =  $dt['af268630f04804c6eb05e4271ed424f94288f524'];
			 $contact_city   =  $dt['b9462f4f6ef79c2d722fc8a18f589b7a4fa79634'];
			 $adress         =  $dt['a2e57baa7a9f5fe9509c4402582daa174bb3e339'];
			 $org_name       =  $dt['org_name'];
			 $owner_name     =  $dt['owner_name'];
             // if(!empty($dt['person_id']['email'][0]['value'])){
			    $person_email   =  $dt['person_id']['email'][0]['value'];
		    //  }	
			    $person_name    =  $dt['person_id']['name'];
		
			 $data  = array( 
 				'contact_id'     =>  $id,
 				'title_deal'     =>  $title,
				'contact_person' =>  $contact_preson,
                'contact_person2'=>  $contact_preson2,
				'mobile'     =>  $contact_phone,
				'city'       =>  $contact_city,
				'state_id'   =>  $contact_state,
				'address1'   =>  $adress,
                'org_name'   =>  $org_name,
                'owner_name' =>  $owner_name,
                'person_email'=>  $person_email,
                'person_name' =>  $person_name,
			);

		     $this->Model_admin_login->insert_user('tbl_contact_m',$data);
		     $i++."<br>";

			  // echo "<pre>";
	         //    print_r($data);
	          // echo "</pre>";
	   }

        $flasemsg  = 'Total Rows Added '.($i-1).' .';
		    
      }
  
	

      $this->session->set_flashdata('addcontact_msg', $flasemsg); 
      if($this->input->get('id') == 'add-contact'){
	     redirect('master/Account/manage_contact');
      }
      if($this->input->get('id') == 'add-quotation'){
	     redirect('quotation/add_quotation');
      }
  }
  
   function searchSalesdeals_update() {
         $select_query = "select * from tbl_contact_m where status='A'";
		 $query        = $this->db->query($select_query);
		 $count_tatal  = $query->num_rows(); 
		 $this->searchSalesdeals_update_logicaly($count_tatal);
   }

  function searchSalesdeals_update_logicaly($count_tatal,$loopval=0,$i = 1){
         // Pipedrive API token
		 $api_token = 'aa47ad16e85b1ad718d23e397d21fa4cc33e2d2c';
         // Pipedrive company domain
		 $company_domain = 'therm';
	    //URL for Deal listing with your $company_domain and $api_token variables
	    //$url = 'https://'.$company_domain.'.pipedrive.com/v1/deals?start='.$count_tatal.'&limit=500&api_token=' . $api_token;
   
		$url = 'https://'.$company_domain.'.pipedrive.com/v1/deals?start='.$loopval.'&limit=500&api_token=' . $api_token;
		//GET request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 
		echo 'Sending request...' . PHP_EOL;
		 
		$output = curl_exec($ch);
		curl_close($ch);
		 
		// Create an array from the data that is sent back from the API
		// As the original content from server is in JSON format, you need to convert it to a PHP array
		$result = json_decode($output, true);

		//echo $output;
		// Check if data returned in the result is not empty
		if (empty($result['data'])) {
		   // exit('No deals created yet' . PHP_EOL);
			$flasemsg  = 'No deals created yet.';
		}

		 
		// $result['data']['person_id']['email'][0]['value'];
		//echo $result['data']['person_id']['name'];
			if(!empty($result['data'])){
				 foreach ($result['data'] as $key => $dt) {
				 	 $id 		     =  $dt['id'];
				     $title 		 =  $dt['title'];
					 $contact_preson =  $dt['508498bff5b09271eee16f78dad24579d6538f28'];
					 $contact_preson2=  $dt['d38ad9e82d60bb57189f30ddede19ef0f4148e9f'];
					 $contact_phone  =  $dt['cc60bce1c961b7fd6b43f426678df38de64bbbad'];
					 $contact_state  =  $dt['af268630f04804c6eb05e4271ed424f94288f524'];
					 $contact_city   =  $dt['b9462f4f6ef79c2d722fc8a18f589b7a4fa79634'];
					 $adress         =  $dt['a2e57baa7a9f5fe9509c4402582daa174bb3e339'];
					 $org_name       =  $dt['org_name'];
					 $owner_name     =  $dt['owner_name'];
		             // if(!empty($dt['person_id']['email'][0]['value'])){
					    $person_email   =  $dt['person_id']['email'][0]['value'];
				    //  }	
					    $person_name    =  $dt['person_id']['name'];
				
					 $data  = array( 
		 				//'contact_id'     =>  $id,
		 				'title_deal'     =>  $title,
						'contact_person' =>  $contact_preson,
		                'contact_person2'=>  $contact_preson2,
						'mobile'     =>  $contact_phone,
						'city'       =>  $contact_city,
						'state_id'   =>  $contact_state,
						'address1'   =>  $adress,
		                'org_name'   =>  $org_name,
		                'owner_name' =>  $owner_name,
		                'person_email'=>  $person_email,
		                'person_name' =>  $person_name,
					);

					 //$this->Model_admin_login->insert_user('tbl_contact_m',$data);
					 $this->Model_admin_login->update_user('contact_id','tbl_contact_m',$id,$data);
				     $i++."<br>";

				 // echo "<pre>";
			    //   print_r($data);
			    //  echo "</pre>";
			   }

		        // $flasemsg  = 'Total Rows Added '.($i-1).' .';
		}
		  
		    
		 if(($count_tatal) > $loopval){
		 	  $loopval = $loopval+500;
              $this->searchSalesdeals_update_logicaly($count_tatal,$loopval,$i-1);
         }else{
               $this->session->set_flashdata('addcontact_msg', $flasemsg); 
		      if($this->input->get('id') == 'add-contact'){
			     redirect('master/Account/manage_contact');
		      }
		      if($this->input->get('id') == 'add-quotation'){
			     redirect('quotation/add_quotation');
		      }
		   }
  	}

}

?>
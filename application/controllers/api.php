<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

public function __construct(){
	
	$this->load->library(array('form_validation','session'));
    $this->load->helper(array('url','html','form'));
    $this->user_id = $this->session->userdata('user_id');
}

 function action()
 {
  if($this->input->post('data_action'))
  {
   $data_action = $this->input->post('data_action');

   if($data_action == "fetch_all")
   {
    $api_url = "http://localhost/mcq/api";

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    $result = json_decode($response);

    $output = '';

    if(count($result) > 0)
    {
     foreach($result as $row)
     {
      $output .= '
      <tr>
       <td>'.$row->first_name.'</td>
       <td>'.$row->last_name.'</td>
       <td><butto type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
       <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
      </tr>

      ';
     }
    }
    else
    {
     $output .= '
     <tr>
      <td colspan="4" align="center">No Data Found</td>
     </tr>
     ';
    }

    echo $output;
   }
  }
 }
 
}

?>

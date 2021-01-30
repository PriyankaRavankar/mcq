<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mcq_model extends CI_Model {

	public function getQuestions()
	{
	$api_url = "https://opentdb.com/api.php?amount=10";

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    $query = json_decode($response);

		// echo "<pre>";
		// print_r( $query);die;
		
		return $query;
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
		  echo "No data";
		  exit();	
		}
	}

	public function saverecords($data){
	    // 	echo "<pre>";
		//    print_r($data);die;
		   for ($x=1; $x <= 10; $x++) {
				$result =[
					'user_id' => $data['user_id'],
					'question' =>$data['ques'.$x],
					'correct_answer' =>$data['ans'.$x],
					'user_answer'=>$data['quizid'.$x],
				];

				$this->db->insert('mcq_results',$result);
		   }
         //die($this->db->insert_id());
          return $this->db->insert_id();
	
	}

	public function getusers($userData =null){
		$response = array();

		$draw = $userData['draw'];
		$start = $userData['start'];
		$rowperpage = $userData['length']; // Rows display per page
		$columnIndex = $userData['order'][0]['column']; // Column index
		$columnName = $userData['columns'][$columnIndex]['data']; // Column name
		$sortColumn = $userData['columns'][2]['data'];
		$columnSortOrder = $userData['order'][0]['dir']; // asc or desc
		$searchValue = $userData['search']['value']; // Search value
		//Search
		$searchQuery = "";
		if($searchValue != ''){
		   $searchQuery = " (firstname like '%".$searchValue."%' or lastname like '%".$searchValue."%' ) ";
		}
   
		// Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('users');
		$this->db->join('mcq_scores','mcq_scores.user_id = users.id','left');
		$this->db->where('mcq_scores.user_id !=','NULL');
		//$this->db->group_by('mcq_scores.user_id');
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;
   
		// Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		     $this->db->where($searchQuery);
		   $this->db->from('users');
		   $this->db->join('mcq_scores','mcq_scores.user_id = users.id','left');
		   $this->db->where('mcq_scores.user_id !=','NULL');
		   $records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;
   
		// Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		   $this->db->where($searchQuery);
		$this->db->order_by($sortColumn, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('users');
		$this->db->join('mcq_scores','mcq_scores.user_id = users.id','left');
		$this->db->where('mcq_scores.user_id !=','NULL');
		$records = $this->db->get()->result();
   
		$data = array();
		//print_r($this->db->last_query());die;
		foreach($records as $record ){
			//print_r($record);die;
		   $data[] = array( 
			  "firstname"=>$record->firstname,
			  "lastname"=>$record->lastname,
			  "score"=>$record->score,
			  "email"=>$record->email,
			  "mobile"=>$record->mobile,
			  "city"=>$record->city
		   ); 
		}
   
		// Response
		$response = array(
		   "draw" => intval($draw),
		   "iTotalRecords" => $totalRecords,
		   "iTotalDisplayRecords" => $totalRecordwithFilter,
		   "aaData" => $data
		);
   
		return $response; 
	  }
	}



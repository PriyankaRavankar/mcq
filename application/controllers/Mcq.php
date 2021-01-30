<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mcq extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('mcq_model');
	    $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
        $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		
		$this->data['questions'] = $this->mcq_model->getQuestions();
		$this->load->view('mcq_view', $this->data);
	}

	public function resultdisplay()
	{
		// echo "<pre>";
		// print_r($_POST);die;
		$records =$_POST;
		$this->mcq_model->saverecords($records);
		$this->data['checks'] = array(
		     'ques1' => $this->input->post('quizid1'),
		     'ques2' => $this->input->post('quizid2'),
			 'ques3' => $this->input->post('quizid3'),
			 'ques4' => $this->input->post('quizid4'),
		     'ques5' => $this->input->post('quizid5'),
			 'ques6' => $this->input->post('quizid6'),
			 'ques7' => $this->input->post('quizid7'),
			 'ques8' => $this->input->post('quizid8'),
		     'ques9' => $this->input->post('quizid9'),
			 'ques10' => $this->input->post('quizid10'),
		);

      
		$this->data['results'] = array(
			'ans1' => $this->input->post('ans1'),
			'ans2' => $this->input->post('ans2'),
			'ans3' => $this->input->post('ans3'),
			'ans4' => $this->input->post('ans4'),
			'ans5' => $this->input->post('ans5'),
			'ans6' => $this->input->post('ans6'),
			'ans7' => $this->input->post('ans7'),
			'ans8' => $this->input->post('ans8'),
			'ans9' => $this->input->post('ans9'),
			'ans10' => $this->input->post('ans10'),
	   );

	   $score = 0;
	   $array1=array();
	   $array2=array();
	  
	   foreach($this->data['checks'] as $checkans) { 
		 array_push($array1, $checkans); 
		}

		foreach($this->data['results'] as $res) {
			
			
           array_push($array2, $res); 
			        
		}

		for ($x=0; $x <10; $x++) {

		 if ($array2[$x]!=$array1[$x]) { 
      
           
				} else { 
				
					
					 
					 $score = $score + 1; 
				
			   } } 

			$result =[
			'user_id' => $this->input->post('user_id'),
			'score' =>$score,
		
		];

		$this->db->insert('mcq_scores',$result);
		//print_r($score);die;

		$this->load->view('show_result', $this->data);
	}
	// public function insertscore(){
	// //	print_r($_POST);die;
	// 	$result =[
	// 		'user_id' => $this->input->post('user_id'),
	// 		'score' =>$this->input->post('score'),
		
	// 	];

	// 	$this->db->insert('mcq_scores',$result);
	// 	redirect( base_url('index.php') ); 
	// }
}

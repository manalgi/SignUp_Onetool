<?php
  class User_controller extends CI_Controller{
    function __construct() {
         parent::__construct();
         $this->load->helper('url');
         $this->load->database();
         $this->load->library('session');
      }

      public function index() {
         $query = $this->db->get("users");
         $data['records'] = $query->result();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('User_add',$data);
      }

       public function add_user_view() {
         $query = $this->db->get("users");
         $data['records'] = $query->result();
         
         $this->load->helper('form');
         $this->load->view('User_welcome',$data);

      }

      public function add_user() {

         $this->load->helper('form');
         $this->load->model('User_Model');
         /* Load form validation library */ 
         $this->load->library('form_validation');
         $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
         $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email')
         );
         
         # validate the email
         $response = file_get_contents(sprintf('https://api.kickbox.com/v2/verify?email=%s&apikey=%s', $data["email"], $this->config->item("kickbox_API_key")));
         $response = json_decode($response, true); //the result list decode json to array

         // check for email validation
         //not successful 
         if ($response["result"] != "deliverable") {
            $data['msg']="The email is invalid!";
            $this->load->view('User_add', $data);
         }
         else if($this->form_validation->run() == FALSE){
            $data['msg']="The email is already exist!";
            $this->load->view('User_add', $data);
         }
          else { //successful


            $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
            $userIp=$this->input->ip_address();
         
            $secret = $this->config->item('google_secret');
       
            $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
     
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, $url); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch); 
            curl_close($ch);      
             
            $status= json_decode($output, true);
     
            if (!$status['success']) {
               $data['msg']="Captcha failed, you fool!";
               $this->load->view('User_add', $data);
               return;
            }

            $this->User_Model->insert($data);

            $query = $this->db->get("users");
            $data['records'] = $query->result();
            $this->load->view('User_welcome',$data);
         }
        //redirect('User_welcome', 'refresh');
    }   

      

    }


?>

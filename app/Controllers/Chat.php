<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ChatModel;

class Chat extends BaseController
{

	function __construct(){
        helper(['url', 'form']);
     
        $this->ChatModel = new ChatModel();
    }

    function index(){
        helper(['form', 'url']);
		$this->ChatModel = new ChatModel();
        $data['chats']=$this->ChatModel->get_messages();
        
        return view('chatView', $data);
    }
 
    
 
    function save(){
        helper(['form', 'url']);
		$this->ChatModel = new ChatModel();
        $data = array(
            'sent_by'  => $this->request->getPost('sent_by'), 
            'message'  => $this->request->getPost('message')
        );
        $resp=$this->ChatModel->save_chat($data);
        return redirect()->to(base_url('/chat') )->with('chat', $data);
        echo json_encode(array('status' => TRUE));
    }

    public function backend()
	{	
		//HTTP headers for XML							
		header("Content-type: text/xml");
		header("Cache-Control: no-cache");
		
		//get the data		
		$query = $this->ChatModel->get_messages();
		
		//var_dump($query); die();
		
		//if empty change the status
		if($query->num_rows()==0){
			$status_code = 2;
		}else{
			$status_code = 1;
		}
		
		//XML headers
		echo "<?xml version=\"1.0\"?>\n";
		echo "<response>\n";   
		echo "\t<timestamp>".time()."</timestamp>\n";
		
		//Loop through all the data
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				
				//sanitize so XML is valid
				$escmsg = htmlspecialchars(stripslashes($row->msg));
				echo "\t<message>\n";
				echo "\t\t<id>$row->id</id>\n";
				echo "\t\t<sent_by>$row->user</sent_by>\n";
				echo "\t\t<message>$message</message>\n";
				echo "\t</message>\n";
			}
		}
		echo "</response>";
				
	}
	

 
}
 		   
?>
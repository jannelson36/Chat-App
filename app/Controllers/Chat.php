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
 
}
 		   
?>
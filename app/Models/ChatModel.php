<?php 

namespace App\Models;


use CodeIgniter\Model;


class ChatModel extends Model{

	protected $table = 'chats';
    protected $allowedFields = ['sent_by' , 'message','time'];

    
   
    public function get_messages($limit = 50){
        $sql = "SELECT * FROM chats ORDER BY id DESC LIMIT $limit";		
		return $this->db->query($sql);
    }
 
   public function save_chat($data){
        
    $query = $this->db->table($this->table)->insert($data);
    return $this->db->insertId();
    
    }
     
}



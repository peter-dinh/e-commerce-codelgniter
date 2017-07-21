<?php 
    defined('BASEPATH') OR exit('No direct script access allows');
    class MY_Model extends CI_Model
    {
        var $table = '';
        
        var $key = 'id';
        
        var $order = '';
        
        var $select = '';
        
        
        public function insert($data=array())
        {
            if(!$data)
            return false;
            if($this->db->insert($this->table, $data))
                return true;
            else return false;
        }
        
        public function update($id, $data)
        {
            if(!$id)
            return false;
            $where = array();
            $where[$this->key] = $id;
            
            $this->update_rule($where, $data);
            return true;
        }
        
        private function update_rule($where, $data)
        {
            if(!$where) return false;
            
            $this->db->where($where);
            if($this->db->update($this->table, $data))
                return true;
            else return false;
        }
        
        public function del($id)
        {
            if(!$id) return false;
            if(is_numeric($id))
                $where = array($this->key => $id);
            else
                $where = $this->key. "IN ( ". $id ." )";
            $this->del_rule($where);
            return true;
        }
        
        private function del_rule($where)
        {
            if(!$where) return false;
            
            $this->db->where($where);
            $this->db->delete($this->table);
            return true;
        }
        
        public function query($sql)
        {
            $result = $this->db->query($sql);
            return $result->result();
        }
        
        public function get_info($id, $field='')
        {
            if(!$id) return false;
            $where = array();
            $where[$this->key] = $id;
            return $this->get_info_rule($where, $field);
        }
        
        private function get_info_rule($where, $field)
        {
            if($field) $this->db->select($field);
            
            $this->db->where($where);
            $get = $this->db->get($this->table);
            if($get->num_rows())
                return $get->row();
            return false;
        }
        
        
        private function get_list_set_input($input=array())
        {
            if(isset($input['where']) && $input['where'])
                $this->db->where($input['where']);
                
            if(isset($input['like']) && $input['like'])
                $this->db->like($input['like']);
                
            if(isset($input['order'][0]) && isset($input['order'][1]))
                $this->db->order_by($input['order'][0], $input['order'][1]);
            else
                {
                    $order = ($this->order == '') ? array($this->table. '.' .$this->key, 'desc') : $this->order;
                    $this->db->order_by($order[0], $order[1]);
                }
            
            if(isset($input['limit'][0]) && isset($input['limit'][1]))
                $this->db->limit($input['limit'][0], $input['limit'][1]);
        }   
        
        public function get_list($input=array())
        {
            $this->get_list_set_input($input);
            
            $result = $this->db->get($this->table);
            
            return $result->result();
        }
        
        
        public function get_row($input=array())
        {
            $this->get_list_set_input($input);
            
            $result = $this->db->get($this->table);
            
            return $result->row();
        }
        
        function get_total($input = array())
    	{
    		$this->get_list_set_input($input);
    		
    		$query = $this->db->get($this->table);
    		
    		return $query->num_rows();
    	}
        
        public function get_sum($field, $where = array())
    	{
    		$this->db->select_sum($field);//tinh rong
    		$this->db->where($where);//dieu kien
    		$this->db->from($this->table);
    		
    		$row = $this->db->get()->row();
    		foreach ($row as $f => $v)
    		{
    			$sum = $v;
    		}
    		return $sum;
    	}
    	
    	
    	public function check_exists($where = array())
    	{
    	    $this->db->where($where);
    	    
    	    $result = $this->db->get($this->table);
    	    
    	    if($result->num_rows() > 0)
    	        return true;
    	    else return false;
    	}
    	
  
    }
?>
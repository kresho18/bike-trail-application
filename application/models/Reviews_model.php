<?php
class Reviews_model extends CI_Model {

    public function __construct() {

        $this->load->database();
    
    }
    
    public function get_trails() {

        $query = $this->db->get('Trail');
        return $query->result_array();
    
    }

    public function get_trails_where($slug) {
        
        $query = $this->db->get_where('Trail',array('slug' => $slug));
        return $query->row_array();
    
    }

    public function get_reviews_where($slug) {
        
        $query = $this->db->get_where('Review',array('trail' => $slug));
        return $query->result_array();
    
    }

    public function get_information($slug) {
        
        $query = $this->db->get_where('Review',array('slug' => $slug));
        return $query->row_array();
    
    }

    public function add_reviews($trail) {

        $slug = url_title($this->input->post('title'),'dash',TRUE);
    
        $data = array(
          'title' => $this->input->post('title'),
          'slug' => $slug,
          'text' => $this->input->post('text'),
          'rating' => $this->input->post('rating'),
          'trail' => $trail
        );
        return $this->db->insert('Review',$data);
    
    }

    public function delete_reviews($slug) {

        $this->db->where('slug', $slug);
        return $this->db->delete('Review');
    
    }

    public function save_reviews() {

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'rating' => $this->input->post('rating'),
            'text' => $this->input->post('text'),
            'trail' => $this->input->post('trail')
        );
    
        $this->db->set($data);
        $this->db->where('slug', $this->input->post('slug'));
        return $this->db->update('Review'); 
    
    }

}
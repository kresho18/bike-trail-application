<?php
class Reviews extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('reviews_model');
        $this->load->helper('url_helper');

    }

    public function index() {

        $data['title'] = "Bike Trails - Home Page";

        $this->load->view('templates/header', $data);
        $this->load->view('reviews/index', $data);
        $this->load->view('templates/footer', $data);

    }

    public function trail() {

        $data['trails'] = $this->reviews_model->get_trails();
        $data['title'] = "Trails near you";

        $this->load->view('templates/header', $data);
        $this->load->view('reviews/forum', $data);
        $this->load->view('templates/footer', $data);

    }
    
    public function view($slug) {

        $data['trails_item'] = $this->reviews_model->get_trails_where($slug);
        $data['reviews_item'] = $this->reviews_model->get_reviews_where($slug);
        $data['title'] = "Trail near you";

        $this->load->view('templates/header', $data);
        $this->load->view('reviews/view', $data);
        $this->load->view('templates/footer', $data);  
        
    }

    public function information($slug) {

        $data['information_item'] = $this->reviews_model->get_information($slug);

        $this->load->view('reviews/information', $data);
        $this->load->view('templates/footer', $data);  
        
    }

    public function add($trail) {

        
        $data['new_path'] = $trail;
        $currentURL = current_url();
        $nowdivide = substr($currentURL, 83);

        $this->load->helper('form');    
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');
    
        $data['title'] = "Add new review";
    
        if($this->form_validation->run() === FALSE) {

          $this->load->view('templates/header', $data);
          $this->load->view('reviews/add', $data);
          $this->load->view('templates/footer');
        
        } else {

            $this->reviews_model->add_reviews($nowdivide);
            $this->load->view('templates/header', $data);
            $this->load->view('reviews/index', $data);
            $this->load->view('templates/footer', $data);
        
        }
      
    }

    public function delete($slug) {

        $this->reviews_model->delete_reviews($slug);
        $this->load->view('reviews/index');
        $this->load->view('templates/footer');
    
    }

    public function edit($slug = NULL) {

        $this->load->helper('form');
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');
    
        $data['title'] = "Edit the review";
        $data['reviews_item'] = $this->reviews_model->get_information($slug);
    
        if($this->form_validation->run() === FALSE) {

          $this->load->view('templates/header', $data);
          $this->load->view('reviews/edit', $data);
          $this->load->view('templates/footer');
        
        } else {

          $this->reviews_model->save_reviews();
          $this->load->view('templates/header', $data);
          $this->load->view('reviews/success', $data);
          $this->load->view('templates/footer');
        
        }
    }

}
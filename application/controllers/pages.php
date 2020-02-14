<?php
  class Pages extends CI_Controller {
    public function view($page = 'home') {
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
        show_404();
      }

      # Enable caching. // Disabled at the moment.
      $this->output->cache(0);

      #Make the name of the page file start with uppercase letter.
      $data['title'] = ucfirst($page);

      # Get base currencies from the database to pass them to the API
      $is_post = $this->input->server('REQUEST_METHOD') == 'POST';

      if($is_post){
        $current_user = $this->session->user_id;

        $query = $this->db->get_where('currencies', array('id' => $current_user));
        $row1 = $query->row();
        $base_currencies = array($row1->basecur1, $row1->basecur2, $row1->basecur3, $row1->basecur4, $row1->basecur5);

        $post_data = json_encode($base_currencies);
        echo $post_data;
     }
     # Load page contents in the following order
      else {
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
      }
   }
}

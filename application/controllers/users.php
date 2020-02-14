<?php
  class Users extends CI_Controller {
    # Register new user
    public function signup() {
      $data = array();

    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
    $this->form_validation->set_rules('password', 'Create password', 'required');
    $this->form_validation->set_rules('password2', 'Repeat password', 'matches[password]');

    if (!$this->form_validation->run()) {
        $data['status'] = 'error';
        foreach ($_POST as $key => $value) {
            $data['messages'][$key] = form_error($key);
        }
    } else {
        $hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->user_model->signup($hashed_password);

        $this->session->set_flashdata('user_registered', 'You were successfully registered! You can now log in.');
        $data['status'] = 'success';
        $data['url'] = 'login';
    }
    echo json_encode($data);
    exit;
    }

    # Log in user
    public function login() {
      $data['title'] = 'Log in';

      $this->form_validation->set_rules('email', 'Your email', 'required');
      $this->form_validation->set_rules('password', 'Your password', 'required');

      if($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header');
        $this->load->view('pages/login', $data);
        $this->load->view('templates/footer');
      }
      else {
        # Get email address
        $email = $this->input->post('email');

        # Get password (and encrypt it)
        $password = $this->input->post('password');

        # Check if trial expired
        $expired = $this->user_model->trial_expired($email);

        if($expired) {
          $this->session->set_flashdata('free_trial_expired', 'Your free trial period has ended. To get back to using all the premium features, please buy the full account.');
          redirect('../login');
        }

        # Log in user
        $user_id = $this->user_model->login($email, $password);

        if($user_id) {
          # Create session
          $user_data = array(
            'user_id' => $user_id,
            'email' => $email,
            'logged_in' => TRUE
        );

          $this->session->set_userdata($user_data);

          # Set a flash message
          $this->session->set_flashdata('user_logged_in', 'You are now logged in.');
          redirect('../converter-premium');
        }

        else {
          # Set a flash message
          $this->session->set_flashdata('log_in_failed', 'An error occured. Please, try again.');
          redirect('../login');
        }
      }
    }

    # Log out user
    public function logout() {
      # Unset user data
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('email');

      # Set a flash message
      $this->session->set_flashdata('user_logged_out', 'You are now logged out.');
      redirect('../home');
    }

    # Check if the email is already taken
    public function check_email_exists($email) {
      $this->form_validation->set_message('check_email_exists', 'There is a user registered with this email');
      if ($this->user_model->check_email_exists($email)) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

    # Save base currencies of users choice
    public function save_base_cur() {
      $current_user = $this->session->user_id;
      if ($this->user_model->save_base_cur($current_user)) {
        $this->session->set_flashdata('preferences_saved', 'Your preferences have been saved.');
        redirect('../profile');
      } else {
        $this->session->set_flashdata('preferences_error', 'Something went wrong. Please, try again.');
        redirect('../profile');
      }
    }
  }
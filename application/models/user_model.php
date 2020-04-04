<?php
  class User_model extends CI_Model {
    # Sign in user
    public function signup($hashed_password) {
      # Set data arrays to store in the tables
      $data = array (
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
      );

      $pass_data = array (
        'password' => $hashed_password
      );

      $trial_data = array (
        'trial_type' => '30-day Premium account trial'
      );

      $base_cur_data = array (
        'basecur1' => 'EUR',
        'basecur2' => 'USD',
        'basecur3' => 'GBP',
      );

      # Insert user data in the databases
      $this->db->insert('users', $data);
      $this->db->insert('trial_period', $trial_data);
      $this->db->insert('currencies', $base_cur_data);
      return $this->db->insert('passwords', $pass_data);
    }

    # Log in user
    public function login($email, $password) {
      $userid = $this->db->get_where('users', array('email' => $email));
      $row1 = $userid->row();

      # Set trial expiry date if user is logging in for the first time
      if ($this->db->where(array('trial_expires' => NULL, 'id' => $row1->id))) {
        $trialunix = strtotime("+30 days");
        $trialend = unix_to_human($trialunix, TRUE, 'eu');
        $trial_data = array (
          'trial_expires'=> $trialend
        );
        $this->db->update('trial_period', $trial_data);
      }

      $userpass = $this->db->get_where('passwords', array('id' => $row1->id));
      $row2 = $userpass->row();
      if (password_verify($password, $row2->password)) {
        return $row1->id;
      }
      else {
        return 0;
      }
    }

    # Check if email is already taken
    public function check_email_exists($email) {
      $query = $this->db->get_where('users', array('email' => $email));
      if (empty($query->row_array())) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

    # Save base currencies of users choice
    public function save_base_cur($current_user) {
      $data_update = array (
        'basecur1' => $this->input->post('basecur1'),
        'basecur2' => $this->input->post('basecur2'),
        'basecur3' => $this->input->post('basecur3'),
        'basecur4' => $this->input->post('basecur4'),
        'basecur5' => $this->input->post('basecur5')
      );
      $this->db->where('id', $current_user);
      return $this->db->update('currencies', $data_update);
    }

    # Check if trial period has expired
    public function trial_expired($email) {
      $userid = $this->db->get_where('users', array('email' => $email));
      $row1 = $userid->row();
      $trial_ends = $this->db->get_where('trial_period', array('id' => $row1->id));
      $row_trial = $trial_ends->row();
      $expiry_date = $row_trial->trial_expires;
      if ($expiry_date != NULL) {
        $expiry_date_unix = human_to_unix($expiry_date);
        $now_unix = strtotime("now");
        if ($now_unix > $expiry_date_unix) {
          return TRUE;
        }
      }
    }
  }
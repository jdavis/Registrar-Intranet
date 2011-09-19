<?php

class UsersController extends AppController {
	var $options = array('List', 'Area');
	
	function home() {
		$this->set('title_for_layout', 'Staff Index');
		$this->set('users', $this->User->find('all'));
		$this->set('current_view', 'List');
		$this->set('views', $this->options);
	}
	
	function profile($id = null) {
		$this->User->id = $id;
		$viewUser = $this->User->read();
		$this->set('user', $viewUser);
		$this->set('title_for_layout', $viewUser['Profile']['full_name'] . '\'s Profile');
		#debug($this->User->read());
	}
	
	function lists() {
		$this->set('users', $this->User->find('all'));
		$this->set('current_view', 'List');
		$this->set('views', $this->options);
		
		$this->render('home');
	}

	function photo() {
		$options = array(
					'order' => 'User.last_name',
				);
		$this->set('users', $this->User->find('all', $options));
		$this->set('current_view', 'Photo');
		$this->set('views', $this->options);
	}
	
	function area() {
		$options = array(
			'order'=>'Profile.area asc',
				);
		$this->set('users', $this->User->find('all', $options));
		$this->set('current_view', 'Area');
		$this->set('views', $this->options);
	}
	
	function birthdaysThisMonth() {
		$month = date("F");
		
		$options = array(
			'conditions' => array(
				"Profile.birthday LIKE" => "$month%",
			),
			'order' => array(
				"Profile.birthday ASC",
			),
			'recursive' => 0,
		);
		
		return $this->User->Profile->find('all', $options);
	}

	function login() {
		/*
		if (isset($_SERVER['REMOTE_USER']) && !empty($_SERVER['REMOTE_USER'])) {
			$userInfo = array(
				'User' => array(
					'username' => $_SERVER['REMOTE_USER'],
					'password' => $this->Auth->password($_SERVER['REMOTE_USER'])
				)
			);

			if($this->Auth->login($userInfo)) {
				#$this->Session->delete('Message.auth');
				#debug("Login successful");
				#$this->redirect("/");
			} else {
				
				#debug($userInfo);
				$this->User->save($userInfo);
				$userInfo['Profile'] = array(
					'user_id' => $this->User->id,
					'first_name' => $_SERVER['REMOTE_USER'],
				);
				
				$this->User->Profile->save($userInfo);
				#debug($userInfo);
				
				#$this->Auth->login($userInfo);
				#$this->redirect("/");
			}
		}
		*/
	}

	function logout() {
		#setcookie('...', null, time()-(60*60*24), '/', null, true);
		$this->Session->delete('Permissions');
		
		$this->redirect($this->Auth->logout());
	}
	
	function edit($id = null) {
        $this->Setting->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Setting->read();
		} else {
			if ($this->Setting->save($this->data)) {
				$this->Session->setFlash('Your settings have been updated.');
				$this->redirect(array('action' => 'index'));
			}
		}
    }
	
	function staff_for_the_week() {
		$options = array(
			'conditions' => array(
				'Profile.sotd !=' => 0
			),
			'order' => array('Profile.sotd'),
		);
		
		return $this->User->Profile->find('all', $options);
	}
	
	function test() {
		$this->set('x', $this->User->find('all'));
	}
}
?>

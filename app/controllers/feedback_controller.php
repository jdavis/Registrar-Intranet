<?php

class FeedbackController extends AppController {
	function index($ajax = '') {
		// Setup the view information for this action.
		$this->layout = 'new_default';
	
		$this->back_link('Back to the Previous Page', '/');
		#$this->Email->from    = 'joshuad@iastate.edu';
		#$this->Email->to      = 'joshuad@iastate.edu';
		#$this->Email->subject = 'Test';
		#$this->Email->send('blah dee blah');
		if (!empty($this->data)) {
			if ($this->Feedback->save($this->data)) {
				if ($ajax != '') {
					$this->set('success', 1);
					$this->set('error', '');
					$this->layout = 'js/feedback';
				} else {
					$this->Session->setFlash('Your feedback has been submitted.', 'default', array('class' => 'success'));
					#$this->swerve('/');
				}
			} else {
				if ($ajax) {
					$this->set('success', 0);
					$this->set('error', 'Unable to save the feedback. Try again.');
					$this->layout = 'js/feedback';
				} else {
					// The edit failed.
					$this->Session->setFlash('There was an error saving the feedback.', 'default', array('class' => 'error'));
				}
			}
		}
	}
}
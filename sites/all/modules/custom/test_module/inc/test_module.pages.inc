<?php 
	define('CLIENT_ID_TEST', 'PZYP3JUAPNMSRR2JKMDY4BTXWEITM3D2SZXXCAF0ZV5OTHUY');
	define('CLIENT_SECRET_TEST', '1JIJTPBNV3VTV0CCEE1UOIRDR0TP1SXWNRUERRDELHTMIRDQ');
	define('REDIRECT_URI_TEST', 'http://dev-test-qbation.pantheon.io/sites/all/libraries/php-foursquare/FoursquareAPI.class.php');

	function search_box_test(){
		$form = drupal_get_form('search_box_test_form');
		drupal_add_js(drupal_get_path('module', 'test_module') . '/js/scripts.js');
		drupal_add_js(array('test_module' => array('client_id' => CLIENT_ID_TEST , 'client_secret'=> CLIENT_SECRET_TEST)), 'setting');
		dpm($form);
		return $form;
	}
	function result_search_test($latitud, $longitud, $query){
		$consult = file_get_contents('https://api.foursquare.com/v2/venues/search?client_id=' . CLIENT_ID_TEST . '&client_secret=' . CLIENT_SECRET_TEST . '&v=20130815&ll=' . $longitud . ',' . $latitud . '&query=' . $query);

		$result = json_decode($consult);
		if($result->meta->code == 200){
			return theme('result_search', array('items' => $result->response));
		}else{
			drupal_set_message(t('Don\'t result'), 'status', FALSE);
			return theme('result_search', array('items' => $result->response));
		}
	}
	function datail_item($id){
		$ch = file_get_contents('https://foursquare.com/oauth2/authenticate?client_id='. CLIENT_ID_TEST . '&response_type=token&redirect_uri=' . REDIRECT_URI_TEST);
		print_r($ch);
	}
	/**
	 * Implementes hook_form
	**/
	function search_box_test_form($form, &$form_state){
		$form = array();
		$form['search'] = array(
							'#type' => 'textfield', 
	         				'#title' => t('Search'), 
							'#size' => 60, 
							'#maxlength' => 128, 
							'#required' => TRUE,
							'#attributes' =>array('placeholder' => t('search place')),
						);

		$form['v'] = array(
						'#type' => 'hidden', 
						'#value' => '',
						'#attributes' =>array('class' => 'v'),
						);

		$form['longitud'] = array(
						'#type' => 'hidden', 
						'#value' => '',
						'#attributes' =>array('class' => 'longitud'),
						);

		$form['latitud'] = array(
						'#type' => 'hidden', 
						'#value' => '',
						'#attributes' =>array('class' => 'latitud'),
						);

		$form['submit'] = array(
				'#type' => 'submit', 
				'#value' => t('Send')
			);
		return $form;
	}

	/**
	*	Implements submit form
	**/
	function search_box_test_form_submit($form, &$form_state){
		drupal_goto('result-search-test/'. $form_state['input']['longitud'] . '/' . $form_state['input']['latitud'] . '/' . $form_state['input']['search']);
	}
?>
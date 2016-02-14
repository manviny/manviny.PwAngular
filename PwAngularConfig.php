<?php 

	class PwAngularConfig extends ModuleConfig { 



		public function getDefaults() {
		    return array(
		      'angular' => 1,
		      'ui_bootstrap' => 1,
		      'toastr' => 1,
		      'material' => 1,
		      'lodash' => 1,
		      'onsenui' => '',
		    );
		}


		public function __construct() {

			$this->add(array(
	
			  array( 'name' => 'angular', 'type' => 'checkbox', 'label' => 'instalar angular ,route, sanitize, resource' ),
			  array( 'name' => 'ui_bootstrap', 'type' => 'checkbox', 'label' => 'instalar ui-bootstrap' ),
			  array( 'name' => 'toastr', 'type' => 'checkbox', 'label' => 'instalar toastr' ),
			  array( 'name' => 'material', 'type' => 'checkbox', 'label' => 'instalar material' ),
			  array( 'name' => 'lodash', 'type' => 'checkbox', 'label' => 'instalar lodash' ),
			  array( 'name' => 'onsenui', 'type' => 'checkbox', 'label' => 'instalar onsenui' ),

			  array( 'name' => 'awskeyid', 'type' => 'text', 'label' => 'AWS Access Key ID' ),
			  array( 'name' => 'awskeysecret', 'type' => 'text', 'label' => 'AWS Secret Access key' ),

			));
		}
	}

?>

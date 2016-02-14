Needs:

Language support   


##To add a modules, script or style follow those instructions
1. Open PwAngularConfig
2. 'toastr' => 1,
3. array( 'name' => 'toastr', 'type' => 'checkbox', 'label' => 'instalar toastr' ),

It will allow user to decide to install it  
```php

    class PwAngularConfig extends ModuleConfig { 



        public function getDefaults() {
            return array(
                ....
              'toastr' => 1,
                ....
            );
        }


        public function __construct() {

            $this->add(array(
    
                ....
              array( 'name' => 'toastr', 'type' => 'checkbox', 'label' => 'instalar toastr' ),
                ....

            ));
        }
    }
```
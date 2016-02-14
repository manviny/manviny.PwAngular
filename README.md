Needs:

Language support   


##To add modules, scripts or styles follow those instructions
1. Open **PwAngularConfig.module**. It will allow user wheter to install it     

```php

    class PwAngularConfig extends ModuleConfig { 



        public function getDefaults() {
            return array(
                ....
===>            'toastr' => 1,
                ....
            );
        }


        public function __construct() {

            $this->add(array(
    
                ....
===>            array( 'name' => 'toastr', 'type' => 'checkbox', 'label' => 'instalar toastr' ),
                ....

            ));
        }
    }
```
2. Open **PwAngular.module**
```php
    public function addScripts($event) {
 
        ....
            // TOASTR
===>        if($this->toastr){ 
===>         array_push( $styles, 'angular-toastr.min.css', '...' ); 
===>         array_push( $scripts, 'angular-toastr.tpls.min.js' ); 
===>         array_push( $modules, 'toastr' );                              // it will inject the module to angular
===>        } 
        ....
```

3. Place into **styles** folder: angular-toastr.min.css
4. Place into **scripts** folder: angular-toastr.tpls.min.js




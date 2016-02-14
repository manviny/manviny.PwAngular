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



##Create a new API
```php
# PART 1
public function init() {
    ....
===>    $this->addHook('Page::sendEmail', $this, 'sendEmail');
    ....

# PART 2
public function webService($event) {
    ....
    switch ($service) {
    ....
===>            case "sendEmail":                                   
===>            $event->return = $this->sendEmail( $d["from"], $d["to"], $d["subject"], $d["message"] );
===>            break;    

# PART 3
===>    protected function sendEmail( $from, $to, $subject, $message ){
===>            $mail = wireMail();
===>            $mail->to($to)->from($from); // all calls can be chained
===>            $mail->subject($subject); 
===>            // $mail->body($message);
===>            $mail->bodyHTML($message); 
===>            $mail->send(); 
===>            return json_encode( ["from" => $from, "to" => $to, "subject" => $subject, "message" => $message,] );
===>    }
```





##USE EXAMPLE
```js
        app.controller('vehiculoCtrl', function ($scope, toastr, $http, PW) {
    
            $scope.vehiculo = <?=$page->toJSON()?>; 
            $scope.vehiculo = <?=$page->getFieldsLabel->toJSON()?>; 
            console.log($scope.vehiculo)
 
            // $scope.fields = <?=$page->fields->toJSON()?>; 
            // console.log($scope.fields)
            // console.log(fields)
        })  


        // $scope.page = <?=wire('pages')->find('id=1586')->toJSON()?>;
        // $scope.page = <?=wire('pages')->find('id=1442')->toJSON()?>;


                // PW.service('getFieldsets',{page:1442})
                // .then(function(data){ 
                //  $scope.vehiculo = data;
                //  // toastr.info( 'Gracias por contactar con Sr Cars, en breve nos ponemos en contacto.', {timeOut:3000});
    //              console.debug("pagina", $scope.page);
    //              console.debug("data", data);


                                // $http({url: '/web-service/', method: "POST", data: { service:'registerUser', data: {'from':'manol@indinet.es','to':'manol@indinet.es','subject':'manol@indinet.es','message':'manol@indinet.es'} }} )
                                // .success(function(response){ $('#signup-modal').modal('hide'); });

                            // $scope.registerUser = function(userData){ 

                            //     $http({url: '/web-service/', method: "POST", data: { service:'registerUser', data: userData }} )
                            //     .success(function(response){ $('#signup-modal').modal('hide'); });


                            //     $http({url: '/web-service/', method: "POST", data: { service:'sendEmail',  
                            //       data: {from: 'manol@indinet.es', to: 'manol@indinet.es', subject: 'usuario registrado en EXIM', message: 'aviso'}
                            //     }}).success(function(response){ console.debug("response",response); });
                                
                            //     $http({url: '/web-service/', method: "POST", data: { service:'sendEmail',  
                            //       data: {from: 'leopoldo@eximmachinery.com ', to: userData.email, subject: 'EXIM maquinaria', message: 'Gracias por registrarte.'}
                            //     }}).success(function(response){ console.debug("response",response); });
                                
                            //     toastr.info( 'Bienvenido ' + userData.name ,{timeOut:4000});
                            // }
        
      // });
```


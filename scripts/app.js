
/**
* trust HTML will output html as it is
* <div ng-bind-html="htmlString | unsafe "></div>
* @return HTML
*/
app.filter('unsafe', function($sce) { return function(val) { return $sce.trustAsHtml(val); }; });

/**
* Splits a string into an array given the sepatator ( | , ' ' ) and returns the desired index
* [imagen1.jpg|imagen2.jpg|imagen3.jpg]
* @return {{lit.images | split:'|':1}} -> imagen2.jpg
*/
app.filter('split', function() { return function(input, splitChar, splitIndex) { return input.split(splitChar)[splitIndex]; }; });  
app.filter('trustSrc', function() { return function(src) { return $sce.trustAsResourceUrl(src); }; });     


/**
 * Servicios de PW
 */
app.factory('PW', function ($q, $http, $location, $window) {
    
    // Variables globales
    // webServicePath -> se define en el modulo de pw


    // Enlaza a todos los servicios
 
    /**
     *  PW.service('searchPages', {selector: query})
     * .then(function(data){
     *      console.debug("data",data);
     * }) 
     * 
     * @param  {[type]} service  [registerUser | contact | sendEmail | searchPages | ]
     * @param  {[type]} userData [Object | String]
     * @return {[type]}          callBack
     */
    var service = function(service, userData){
        var deferred = $q.defer();
        $http.post(webServicePath, { action: service, data: userData }) 
        .success(function(data){ deferred.resolve(data); })
        return deferred.promise;
    }

    // PW.redirect('/vehiculos/camiones-7.5-tn/bomba-hormigon/');
    var redirect = function(path){
        $window.location.href = path;
    }

     return {
        service: service,
        redirect: redirect
     };        


});

    
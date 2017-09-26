
app.service('myFactory', ['$http', function($http) {

//    var urlBase = 'http://localhost:2307/Service1.svc';
        var myFactory = {};

        myFactory.httpMethodCall = function(method, url, params, header) {

            var httpData = $http({
                method: method,
                url: url,
                data: params, //forms user object
//          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
            });
            return httpData;
        };
      
        
        return myFactory;

    }]);

var app = angular.module('myRunpay', ['ui.bootstrap']);
app.controller('runpayCtrl', function($scope, $http, $location,$rootScope,$timeout) {
	$scope.runpayList = true;
	$scope.runpayDetails = true;
	$scope.loader = false;
	$scope.alertSuccess = true;
	$scope.alertDanger = true;
	$scope.propertyName = '';
    $scope.reverse = true;
    $scope.viewby = '10';
    $scope.currentPage = 1;
    $scope.itemsPerPage = $scope.viewby;
    $scope.maxSize = 5;

  	var adminId = document.getElementById("adminId").value;
  	var baseUrl = document.getElementById("baseUrl").value;
  	
  	$scope.setPage = function (pageNo) {
        $scope.currentPage = pageNo;
    };

    $scope.pageChanged = function() {
        console.log('Page changed to: ' + $scope.currentPage);
    };

    $scope.setItemsPerPage = function(num) {
      $scope.itemsPerPage = num;
      $scope.currentPage = 1; //reset to first paghe
    }

    $scope.sortBy = function(propertyName) {
        $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        $scope.propertyName = propertyName;
    };



    var Indata = {adminId:adminId}
	var response =  $http({
					    url: baseUrl+"/api/runpay/list",
					    method: "POST",
					    params: Indata
					})
	 response.success(function (data) {
        if (data.status == 1) {
           	$scope.runData = data.data;
            $scope.totalItems = data.data.length;
			$scope.runpayList = false;
			$scope.loader = true;
          	 
        } else if (data.status == 0) {
            console.log(data.data);
             $scope.loader = true;
             alert(data.message);
        }
    });
	
	$scope.runpaylisting = function () {
		var Indata = {adminId:adminId}
		var response =  $http({
					    url: baseUrl+"/api/runpay/list",
					    method: "POST",
					    params: Indata
					})
	 response.success(function (data) {
        if (data.status == 1) {
	           $scope.runData = data.data;
	           $scope.totalItems = data.data.length;
        } else if (data.status == 0) {
        	$scope.alert = data.message;
            $scope.alertDanger = false;
		            
			$timeout( function(){
				$scope.alertDanger = true;
		    }, 5000 );
        }
    });
	}
   	

   	$scope.runpayClick = function (payId) {
   	 	$scope.runpayList = true;

            var Indata = {adminId: adminId,payId: payId}
			var response =  $http({
							    url:  baseUrl+"/api/runpay/list",
							    method: "POST",
							    params: Indata
							})
			 response.success(function (data) {
		        if (data.status == 1) {
		        	console.log(data);
		        	$scope.runpayDetails = false;
			        $scope.runinData = data.data;
		           
		        } else if (data.status == 0) {
		        	$scope.alert = data.message;
		           $scope.alertDanger = false;
		            
 					$timeout( function(){
 						$scope.alertDanger = true;
				    }, 5000 );
		        }
		    });

			 var responsedata =  $http({
							    url:  baseUrl+"/api/runpay/employeeList",
							    method: "POST",
							    params: Indata
							})
			 responsedata.success(function (data) {
		        if (data.status == 1) {
		        	$scope.runpayDetails = false;
			        $scope.employeeData = data.data;
		           
		        } else if (data.status == 0) {
		        	$scope.alert = data.message;
		           $scope.alertDanger = false;
		            
 					$timeout( function(){
 						$scope.alertDanger = true;
				    }, 5000 );
		        }
		    });
        }

        $scope.generateRunpay = function(runPays){
        	
        	var payPeriod = document.getElementById("showDate").value;
        	var Indata = {adminId: adminId, payPeriod: payPeriod}
        	var response =  $http({
							    url:  baseUrl+"/api/runpay/addNewPayment",
							    method: "POST",
							    params: Indata
							})
			 response.success(function (data) {
		        if (data.status == 1) {

		       		$scope.runpaylisting();

		       		$scope.alertSuccess = false;
 					$scope.alert = data.message;

 					$timeout( function(){
 						$scope.alertSuccess = true;
				    }, 5000 );

		        } else if (data.status == 0) {

		            $scope.alert = data.message;
		            $scope.alertDanger = false;

 					$timeout( function(){
 						$scope.alertDanger = true;
				    }, 5000 );
		        }
		    });
    	}
   	
});
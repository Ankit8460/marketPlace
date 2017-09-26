var app = angular.module('myApp', ['ui.bootstrap']);
app.controller('employeeCtrl', function($scope, $http, $location, $rootScope, $timeout, $window) {
    $scope.myvalue = false;
    $scope.addEmp = false;
    $scope.employeeList = true;
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


    var Indata = { adminId: adminId }
    var response = $http({
        url: baseUrl + "/api/employee/list",
        method: "POST",
        params: Indata
    })
    response.success(function(data) {
        if (data.status == 1) {
            $scope.employeeData = data.data;
            $scope.totalItems = data.data.length;

            $scope.employeeList = false;
            $scope.loader = true;

        } else if (data.status == 0) {
            console.log(data.data);
            $scope.loader = true;
            alert(data.message);
        }
    });

    var bank = $http({
        url: baseUrl + "/api/bank/list",
        method: "POST",
        params: Indata
    })
    bank.success(function(data) {
        if (data.status == 1) {

            $scope.banklist = data.data;

        } else if (data.status == 0) {

            alert(data.message);
        }
    });


    $scope.employeeListings = function() {
        var Indata = { adminId: adminId}
        var response = $http({
            url: baseUrl + "/api/employee/list",
            method: "POST",
            params: Indata
        })
        response.success(function(data) {
            if (data.status == 1) {
                $scope.employeeData = data.data;
                $scope.totalItems = data.data.length;
                $scope.employeeList = false;

            } else if (data.status == 0) {
                console.log(data.data);
                alert(data.message);
            }
        });
    };

    $scope.addBack = function() {
        $scope.addEmp = false;
        $scope.employeeList = false;
    };
    $scope.editBack = function() {

        $scope.editEmp = false;
        $scope.myvalue = true;
        $window.scrollTo(0, 0);
    };

    $scope.showAddemployee = function() {
        $scope.emp = {};
        $scope.emp.gender = '0';
        $scope.emp.vacationStatus = '1';


        $scope.addEmp = true;
        $scope.employeeList = true;
    };
    $scope.showEditemployee = function(data) {
        $scope.editemp = {};
        $scope.editemp.employeeId = data.employeeId;
        $scope.editemp.title = data.title;
        $scope.editemp.email = data.email;
        $scope.editemp.firstName = data.firstName;
        $scope.editemp.lastName = data.lastName;
        $scope.editemp.otherName = data.otherName;
        $scope.editemp.position = data.position;
        $scope.editemp.birthDate = data.birthDate;
        $scope.editemp.birthMonth = data.birthMonth;
        $scope.editemp.birthYear = data.birthYear;
        $scope.editemp.gender = data.gender;
        $scope.editemp.mobileNo = data.mobileNo;
        $scope.editemp.address = data.address;
        $scope.editemp.workLocation = data.workLocation;
        $scope.editemp.dateOfHire = data.dateOfHire;
        $scope.editemp.salaryAmount = data.salaryAmount;
        $scope.editemp.employeeType = data.employeeType;
        $scope.editemp.bankId = data.bankId;
        $scope.editemp.vacationStatus = data.vacationStatus;

        $scope.editEmp = true;
        $scope.myvalue = false;
    };

    $scope.employeeClick = function(employeeId, adminId) {
        $scope.employeeList = true;
        var Indata = { adminId: adminId, employeeId: employeeId }
        var response = $http({
            url: baseUrl + "/api/employee/list",
            method: "POST",
            params: Indata
        })
        response.success(function(data) {
            if (data.status == 1) {
                $scope.employeeData = data.data;
                $scope.bankDetails = data.data.BankDetails;
                $scope.bankAccName = data.data.BankDetails;
                $scope.myvalue = true;

            } else if (data.status == 0) {
                console.log(data.data);
                alert(data.message);
            }
        });
    }

    $scope.addAccount = function(bank, employeeId) {

        var Indata = { employeeId: employeeId, bankId: bank.bankId, accountNo: bank.accountNo, bankAccName: bank.bankAccName }
        var response = $http({
            url: baseUrl + "/api/employee/addBankAccount",
            method: "POST",
            params: Indata
        })
        response.success(function(data) {
            if (data.status == 1) {

                $scope.employeeClick(employeeId, adminId);
                $scope.bankData = data.data;
                $scope.myvalue = true;

                $scope.alertSuccess = false;
                $scope.alert = data.message;
                $timeout(function() {
                    $scope.alertSuccess = true;
                }, 5000);


            } else if (data.status == 0) {
                console.log(data.data);
                alert(data.message);
            }
        });
    };

    $scope.addPayslip = function(paySlip, employeeId) {

        var Indata = { employeeId: employeeId, payPeriod: paySlip.payPeriod, payDate: paySlip.payDate, totalPay: paySlip.totalPay }
        var response = $http({
            url: baseUrl + "/api/employee/managePayslip",
            method: "POST",
            params: Indata
        })
        response.success(function(data) {
            if (data.status == 1) {

                $scope.bankData = data.data;
                $scope.myvalue = true;

                $scope.alertSuccess = false;
                $scope.alert = data.message;
                $scope.employeeClick(employeeId, adminId);

                $timeout(function() {
                    $scope.alertSuccess = true;
                }, 5000);

            } else if (data.status == 0) {
                console.log(data.data);
                alert(data.message);
            }
        });
    };

    $scope.addEmployee = function(emp) {

        var dateOfHire = document.getElementById("datepicker-autoclose").value;

        var Indata = {
            adminId: adminId,
            title: emp.title,
            firstName: emp.firstName,
            lastName: emp.lastName,
            otherName: emp.otherName,
            mobileNo: emp.mobileNo,
            birthDate: emp.birthDate,
            birthMonth: emp.birthMonth,
            birthYear: emp.birthYear,
            gender: emp.gender,
            address: emp.address,
            bankId: emp.bankId,
            email: emp.email,
            dateOfHire: dateOfHire,
            salaryAmount: emp.salaryAmount,
            employeeType: emp.employeeType,
            vacationStatus: emp.vacationStatus,
            workLocation: emp.workLocation,
            position: emp.position
        }

        var response = $http({
            url: baseUrl + "/api/employee/add",
            method: "POST",
            params: Indata
        })
        response.success(function(data) {
            if (data.status == 1) {
                $scope.employeeListings();
                $scope.employeeList = false;
                $scope.addEmp = false;

                $scope.alertSuccess = false;
                $scope.alert = data.message;

                $timeout(function() {
                    $scope.alertSuccess = true;
                }, 5000);

            } else if (data.status == 0) {
               $scope.alert = data.message;
                $scope.alertDanger = false;

                $timeout(function() {
                    $scope.alertDanger = true;
                }, 5000);
            }
        });
    };

    $scope.editEmployee = function(emp, employeeId) {
        var dateOfHire = document.getElementById("datepicker-autoclose1").value;

        var Indata = {
            adminId: adminId,
            employeeId: emp.employeeId,
            title: emp.title,
            firstName: emp.firstName,
            lastName: emp.lastName,
            otherName: emp.otherName,
            mobileNo: emp.mobileNo,
            birthDate: emp.birthDate,
            birthMonth: emp.birthMonth,
            birthYear: emp.birthYear,
            gender: emp.gender,
            address: emp.address,
            bankId: emp.bankId,
            email: emp.email,
            dateOfHire: dateOfHire,
            salaryAmount: emp.salaryAmount,
            employeeType: emp.employeeType,
            vacationStatus: emp.vacationStatus,
            workLocation: emp.workLocation,
            position: emp.position
        }

        var response = $http({
            url: baseUrl + "/api/employee/update",
            method: "POST",
            params: Indata
        })
        response.success(function(data) {
            if (data.status == 1) {
                $scope.employeeList = false;
                $scope.editEmp = false;
                $scope.alertSuccess = false;
                $scope.alert = data.message;
                $scope.employeeListings();

                $timeout(function() {
                    $scope.alertSuccess = true;
                }, 5000);

            } else if (data.status == 0) {
                $scope.alert = data.message;
                $scope.alertDanger = false;

                $timeout(function() {
                    $scope.alertDanger = true;
                }, 5000);
            }
        });
    };
});

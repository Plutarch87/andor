var app = angular.module('app', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
});

app.controller('mainController', ['$scope', '$http', 'filterFilter', function($scope, $http, filterFilter) {
    
   
    $scope.categories = [$scope.subcats = [ $scope.items = []]];
    
    $scope.carts = [];
    $scope.sum = 0;
    $scope.price = 0;
    $scope.promeni = 0;
    $scope.formData = {};

    $scope.naruci = function(){
		var data = {
			fullname: $scope.formData.fullName,
			buyerinfo: $scope.formData.buyerInfo,
			sumtotal: $scope.price,
		};

    	$http({
    	  		method: 'POST',
    	  		url: 'api/v1/solditem',
    	  		data: data
    			}).success(function(response) {
    				$scope.price = 0;
    				$scope.carts = [];
    				$('#myCartModal').css('display', 'none');
    				$scope.promeni = 0;
    				alert('Narudzbina uspesna SUPKU JEDAN!!!!');
    			})
    }
    $scope.deleteItem = function(index, price){
    	//$scope.carts = $scope.carts.splice(index, 0);
    	var pos = $scope.carts.indexOf(price);
    	if(index > -1) {
    		$scope.carts.splice(index, 1);
    	}
    	$scope.price = $scope.price - parseInt(price);
    }
    $scope.addItem = function(price, name) {
    		$scope.carts.push({price: price, name: name});
    		var last = $scope.carts.length - 1;
    		if($scope.carts.length > 1) {
    			$scope.sum = parseInt($scope.carts[last].price) + $scope.price;
    			$scope.price = $scope.sum;
    		} else {
    			$scope.price = parseInt(price);
    		}
    		 
    }

    $scope.promeniModal = function(){
    	$scope.promeni = 1;
    }

    // $scope.$watch('carts', function() {
    // 	console.log($scope.carts);
    // });

    $http({
        method: 'GET',
        url: 'api/v1/get-items',
        }).then(function successCallback(response) {
            $scope.items = response.data;
            $scope.categories = response.data;
            $scope.subcats = response.data;
        }, function errorCallback(response) {
    });



        
}]);
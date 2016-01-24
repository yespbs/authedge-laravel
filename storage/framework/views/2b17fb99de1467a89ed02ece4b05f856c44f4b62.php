<!DOCTYPE html>
<html ng-app="AuthEdge">
<head>
    <title>AuthEdge : Example</title> 	
 	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="app/css/style.css">
</head>
<body>
	<div class="container" data-ng-view=""></div>  
	<script type="text/javascript" src="assets/js/jquery.min.js"></script> 
	<script type="text/javascript" src="assets/js/angular.min.js"></script>
	<script type="text/javascript" src="assets/js/angular-route.min.js"></script>
	<script type="text/javascript" src="assets/js/angular-cookies.min.js"></script>
	<script type="text/javascript" src="assets/js/angular-animate.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
	
	<script type="text/javascript" src="app/js/authedge.js"></script> 	
	<script type="text/javascript" src="app/js/middlewares/authenticate.js"></script>
	<script type="text/javascript" src="app/js/configs/routes.js"></script>	
	<script type="text/javascript" src="app/js/controllers/auth.js"></script>
	<script type="text/javascript" src="app/js/controllers/dashboard.js"></script> 		
</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>404</title>
		<meta charset="utf-8">
		<style>
			
			body{
				display: flex;
				justify-content: space-around;
				height: 100vh;
			}
			
			.block{
				display: flex;
				justify-content: space-around;
				align-items: center;
				flex-basis: 50%;
			}
			
			h1{
				font-size: 250px;
				transition-property: all;
				transition-duration: 0.5s;
			}
			
			h1:nth-child(2){
				transform: rotate(-90deg);
			}
			
			a{
				text-decoration: none;
				transition-property: all;
				transition-duration: 0.5s;
				color: red;
			}
			
			h1:nth-child(2):hover{
				transform: rotate(-180deg);
			}
			
			#info{
				font-size: 132px;
				font-family: "Helvetica";
			}
			
		</style>
	</head>
	<body>
		<div class="block" style="border-right: 3px solid black">
			<h1 align="center">4</h1>
			<h1 align="center"><a href="index.php">0</a></h1>
			<h1 align="center">4</h1>
		</div>
		<div class="block">
			<p id="info">Not Found</p>
		</div>
	</body>
</html>
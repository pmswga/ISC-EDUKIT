<?php
/* Smarty version 3.1.29, created on 2017-09-17 22:23:07
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\404.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59becb9b1a4354_42581636',
  'file_dependency' => 
  array (
    'cb1a8bae6eaae1ccd9976a6293d79da44ad43427' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\404.tpl',
      1 => 1493399107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59becb9b1a4354_42581636 ($_smarty_tpl) {
?>
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
</html><?php }
}

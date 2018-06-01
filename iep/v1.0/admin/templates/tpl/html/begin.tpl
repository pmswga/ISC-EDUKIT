<!DOCTYPE html>
<html>
  <head>
    <title>{$title}</title>
    <meta charset="utf-8">
	  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/semantic/semantic.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/semantic/semantic.js"></script>

    {foreach from=$css_links item=css_link}
      <link rel="stylesheet" href="css/{$css_link}">
    {/foreach}
	  <!-- <script src="js/jquery.js"></script> -->
	  <!-- <script src="js/bootstrap.js"></script> -->
		{foreach from=$js_links item=js_link}		
			<script type="text/javascript" src="{$js_link}"></script>
    {/foreach}
  </head>
  <body>
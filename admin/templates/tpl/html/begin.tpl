<!DOCTYPE html>
<html>
  <head>
    <title>{$title}</title>
    <meta charset="utf-8">
	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link rel="stylesheet" href="css/main.css">
    {foreach from=$css_links item=css_link}
      <link rel="stylesheet" href="css/{$css_link}">
    {/foreach}
	  <script src="js/jquery.js"></script>
	  <script src="js/bootstrap.js"></script>
  </head>
  <body>
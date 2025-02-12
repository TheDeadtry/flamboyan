<!DOCTYPE html>
<html lang="en">
<head>
	<title> TRICKSTER BOOT  </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="DDD">
	<meta name="author" content="TRICKSTER">
	<meta name="authorUrl" content="http://trickster.com">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <trickster url="<?php echo $app_url?>/" name="<?php echo $project_name ?>" />
	<style type="text/css">
    body
    {
        padding: 0px 0px 0px;
        background-color: #DAE3E6;
	}
    </style>
</head>
<body>
	<div id="main-page"></div>
<script>
	document.addEventListener("DOMContentLoaded", () => {
		let trickster = document.querySelector('trickster');
		let page_url = trickster.getAttribute("url");
		/*(async function() {
			await fetch(page_url+"?ajaxreq=boot")
			.then(response => response.text())
			.then(function(data){
				eval(data);
				//document.querySelector("#main-page").innerHTML = data.html;
				//eval(data.js);
				//let elm = document.getElementsByTagName("a");
				//addOnClickLink(elm);
			})
			.catch(function(err){ console.log(err)})
		})();*/
	});
</script>
<script src="<?php echo $app_url?>/battery/minified.js?<?php echo strtotime("now"); ?>"></script>
</body>
</html>
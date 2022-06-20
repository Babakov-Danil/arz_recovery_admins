<?php 
if (empty($_SESSION['token'])){
  echo ('<script> 
	window.location.replace("/login");
	</script>');}
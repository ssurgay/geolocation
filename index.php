<?php
// Anthony Morla 
// Final Project
// Due: October 21st 2014

//	require_once 'Mobile_Detect.php';
//	$detect = new Mobile_Detect;
//	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
//	$scriptVersion = $detect->getScriptVersion();
	
	// This will allow computers to view the mobile site but only after they are re-directed to the
	// non-mobile site - so they are aware this is not designed for a computer
//	$mobileOveride = htmlspecialchars($_GET["allow"]);	
	// this allows a PC overide when passed via URL
//	if ($mobileOveride != "Yes" || empty($mobileOveride))
	{
//		if($deviceType == 'computer'){
		// redirect if its not a mobile device (tablet or phone)
//		header('Location: findr-nonmobile.php'); 
		}
	}
?> 

<html>
<head>
<script type="text/javascript" src="/morla/js/jquery.js"></script>
<meta charset="utf-8" />

<title>Findr Mobile - Meet people, do stuff</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script>
      document.addEventListener('DOMContentLoaded', function() {
		//document.getElementById('username').value = returnUsername();
		//document.getElementById('time').value = returnTime();
		
		document.getElementById("myForm").submit();
		}, false);
		
	//  function returnTime() {
	//	var t = new Date();
	//	var t = t.getTime();
		//var time = t.toString();
	//  	return time;
	//  }
	  

	  
	  function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(42.2373,-71.5314),
          zoom: 6,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
	  
	  
	var x=document.getElementById("mylocation");
	function getLocation()
		{
		if (navigator.geolocation)
		{
		navigator.geolocation.getCurrentPosition(showPosition);
		}
		else{x.innerHTML="Your browser does not support Geolocation.";}
	  }
	  
	function showPosition(position)
	  {  
		document.getElementById('lat').value = position.coords.latitude;
		document.getElementById('long').value = position.coords.longitude;
		/*
		var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		var mapOptions = {
		zoom: 12,
		center: myLatlng
		}
		
		var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);		
		var marker = new google.maps.Marker({
		position: myLatlng,
		title:"You are here!"
		});
		// To add the marker to the map, call setMap();
		
		marker.setMap(map);*/
		
		document.getElementById("myForm").submit();
	  }
	 
	 function sendInfo() {		
	 var lat = document.getElementById('lat').value;
	 document.getElementById('lat').value = "";
	 var long = document.getElementById('long').value;
	 document.getElementById('long').value = "";
	// var time = document.getElementById('time').value;
	// document.getElementById('time').value = returnTime();
	// var username = document.getElementById('username').value;
	// document.getElementById('username').value = returnUsername();
	// var title = document.getElementById('title').value;
	// document.getElementById('title').value = "";
	// var offerdetail = document.getElementById('offer-detail').value;
	// document.getElementById('offer-detail').value = "";
	// var contactdetail = document.getElementById('contact-detail').value;
	// document.getElementById('contact-detail').value = "";
	 
	  var myLatlng = new google.maps.LatLng(lat, long);
	  var mapOptions = {
		zoom: 13,
		center: myLatlng
		}
	  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);		
	
	/*  var contentString = '<div id="content">'+
		  '<div id="siteNotice">'+
		  '</div>'+
		  '<h1>'+title+'</h1>'+
		  '<div>'+
		  '<strong>Username: </strong>'+username+'<br/>'+
		  '<strong>Offer Details: </strong>'+offerdetail+'<br/>'+
		  '<strong>Contact Details: </strong>'+contactdetail+'<br/>'+
		  '</div>'+
		  '</div>';
	
	  var infowindow = new google.maps.InfoWindow({
		  content: contentString
	  });
	*/
	  var marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  title: title
	  });
	  google.maps.event.addListener(marker, 'click', function() {
	//	infowindow.open(map,marker);
	  });
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
		
	
    </script>

</head>
<body>

<style>
#map-canvas {
	margin-left:10%;
	margin-right: 10%;
	width: 80%;
	height: 300px;
	background:#FF9;
}

#offer-list {
	width: 35%;
	height:100%;
	background:#FCF;
	overflow:scroll;
	font-size:18px;
	text-align:center;
}
h2 {
	font-size: 20px;
	margin-left: 65px;
}
#logo-header {
	background-color:#313030;
}
#form {
	width: 80%;
	height: 48%;
	background-color: white;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 10px;
}
#message-board {
	margin-left: 10%;
	margin-right: 10%;
	text-align: left;
	overflow: auto;	
}
.float-box {
	float:left;
	width: 45%;
	margin-left: 10px;
}
</style>



<!-- HOME PAGE -->
<div data-role="page" data-theme="b" id="home">	

  <div data-role="header">
    <h1> Findr Mobile</h1>
  </div>

  <div data-role="content">
	<ul data-role="listview" data-inset="true" data-divider-theme="b">
      <li data-role="list-divider">Links</li>
      <!-- <li><a href="#home">Home</a></li> -->
      <li><a href="#about">About Findr</a></li>
      <li><a href="#abstract">Project Abstract</a></li>
    </ul>
    	
	<div id="logo-header">
    
	<img src="http://csci303.ricksphp.com/morla/final-project/img/logo.png" width="300" height="100" alt="findr logo" />
	
    </div> <!-- end of header -->

    <div id="message-board">
    	<p> Welcome to Findr Mobile. Use the forms below to post right from your <?php echo $deviceType;?>! Find you location by clicking the find
        me button near the form below. If you have any questions or security concerns please email: <a href="mailto:anthonymorla@gmail.com"> wedontcare@findr.com 					        </a></p>
    </div> <!-- end of message-board -->
    
    <h2> View Offers in Your Area </h2>
    
 	<div id="map-canvas">Your device does not support Google Maps API.. uhhh.. this is awkward....</div>
    
    <h2> Post an Offer </h2>
    <div id="form">
    
    <form>
    
    <div class="float-box">
    	<strong>Where are you?</strong><button type="button" onClick="getLocation()">Find</button> 
        
        Latitude <input type="text" id="lat">  Longitude<input type="text" id="long"><br/><br/>
        
        <strong>Your User Name (Auto-Generated)</strong><br/>
        <input type="text" id="username" readonly><br> <br/>
        
        <strong>Time of Post</strong> (in milliseconds)<br/>
        <input type="text" id="time" readonly><br> <br/>
       
   </div>
   <div class="float-box"> <br/>
   		<strong>Offer Title</strong> (What best describes your offer?)<br/>
        <input type="text" id="title" size="65"><br>
        <strong>What's your offer?</strong> <br/>
        <TEXTAREA Name="content" ROWS=10 COLS=90 id="offer-detail"></TEXTAREA> <br/>
        <strong>How Can Somone Contact You?</strong> (Phone, Email, Kik, etc.)<br/>
        <TEXTAREA Name="content" ROWS=8 COLS=90 id="contact-detail"></TEXTAREA>
    	<button type="button" onClick="sendInfo()">Post</button> <br/>
    </div>
    </form>
 
    </div> <!-- end of form -->
    
   
  </div>
  
  <div id="back-btn" data-role="footer">
  	By: Anthony Morla 	
  </div>
</div>


<!-- About PAGE  -->
<div data-role="page" data-theme="b" id="about">	

  <div data-role="header">
    <h1>About Findr Mobile</h1>
  </div>

  <div data-role="content">
  		<img src="http://csci303.ricksphp.com/morla/final-project/img/logo.png" width="300" height="100" alt="findr logo" />
  		
        <p>Findr is your one stop shop to find people in your area. Want to catch a movie, with someone who likes them as much as you? Simply post
        the activity here on findr anonymously and meet real people in your area! Findr is the best way to connect to people about anything!<br/> <br/>
        
        To start, simply post an offer using the form below. Or search through the "Your Offers" list to see offers from real people in your area! That's 
        pretty much it that's findr! Not a social network but a social experiement. Meet people, do stuff.</p>
        	
      
  </div> <!-- end of content --> 
  <br/> 
  <div id="back-btn" data-role="footer" data-position=fixed>
  	<a href="#home">&laquo; Go Back</a>
  </div>
</div>

<!-- Abstract Page -->
<div data-role="page" data-theme="b" id="abstract">	

  <div data-role="header">
    <h1>Abstract - Findr Mobile</h1>
  </div>

  <div data-role="content">
        <p>Findr is a meet-up app that allows you to find people in your area through "offers". This will leverage the geolocation features of a phone or laptop and allow you too see offers made by people in your area. Then you can read the details of the offer and see if you want to join/see that persons contact info. These offers will expire after 1 hour, so you only see offers you can actually attend. <br/> <br/>

I will use a database to store the information collected from the geolocation. It will also store a gernated user id, contact info, offer dtails and the location of the offer. The site will be designed as a non-mobile and a JQuery mobile site. A stand-alone app is not set in stone since databses using phonegap can be tricky. </p>
        	
      
  </div> <!-- end of content --> 
  <br/> 
  <div id="back-btn" data-role="footer" data-position=fixed>
  	<a href="#home">&laquo; Go Back</a>
  </div>
</div>

<!-- end -->
</body>
</html>

<body>
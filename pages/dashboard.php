<style>
  #map{
	width: 100%;
	height: 420px;
  }
</style>
<section class="content-header">
  <h1>
	Dashboard
	<small>Penjahit</small>
  </h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Dashboard</li>
  </ol>
</section>
<section class="content"> 
	<div class="box box-primary">
		<div class="box-header with-border">
			<b>Daftar Penjahit</b>
		</div>
		<div class="box-body">
			<div id="map"></div>
		</div>
	  </div>
</section>
<script>
	$(document).ready(function() {
	  setInterval(function() {
		window.location.reload(true);
	  }, 100000);
	});
	var baseUrl	='pages/marker.php'
	var myIcon	='asset/core/img/marker.png'
	
	function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
	  center: new google.maps.LatLng(-6.208554,106.8864773),
	  zoom: 11
	});
	
	var infoWindow = new google.maps.InfoWindow;
	  downloadUrl(baseUrl, function(data) {
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName('marker');
		Array.prototype.forEach.call(markers, function(markerElem) {
		  var id = markerElem.getAttribute('id');
		  var name = markerElem.getAttribute('name');
		  var alamat = markerElem.getAttribute('alamat');
		  var phone = markerElem.getAttribute('phone');
		  var email = markerElem.getAttribute('email');
		  var point = new google.maps.LatLng(
			  parseFloat(markerElem.getAttribute('lat')),
			  parseFloat(markerElem.getAttribute('lng')));

		  var infowincontent = document.createElement('div');
		  var strong = document.createElement('strong');
		  strong.textContent = name+' - '+phone+' - '+email
		  infowincontent.appendChild(strong);
		  infowincontent.appendChild(document.createElement('br'));

		  var text = document.createElement('text');
		  text.textContent = alamat
		  infowincontent.appendChild(text);
		  var marker = new google.maps.Marker({
			map: map,
			position: point,
			icon:myIcon
		  });
		  marker.addListener('click', function() {
			infoWindow.setContent(infowincontent);
			infoWindow.open(map, marker);
		  });
		});
	  });
	}

  function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
		new ActiveXObject('Microsoft.XMLHTTP') :
		new XMLHttpRequest;

	request.onreadystatechange = function() {
	  if (request.readyState == 4) {
		request.onreadystatechange = doNothing;
		callback(request, request.status);
	  }
	};
	request.open('GET', url, true);
	request.send(null);
  }
  
  function doNothing() {  
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcrJ0zhWWdaXaIPOy55Tn5Idq-Ih-K2GI&callback=initMap"></script>
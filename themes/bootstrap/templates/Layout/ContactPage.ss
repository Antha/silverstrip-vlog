<!-- External -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Hero Section -->
<section class="hero git d-flex align-items-center text-center text-white"
	style="background:url($BannerImage.URL) center/cover no-repeat;">
	<div class="container">
		<h1 class="fw-bold">$MainTitle_Banner</h1>
		<p class="lead">
		$LeadTitle_Banner
		</p>
	</div>
</section>

<!-- Contact Section -->
<section class="contact py-5 bg-dark text-light">
	<div class="container">
		<div class="row align-items-center">
			<!-- Contact Info -->
			<div class="col-md-6 mb-4 mb-md-0">
				<h2 class="fw-bold mb-4">$Title_Info</h2>
				<% loop $InfoObjects %>
				<p class="mb-2"><strong>$Title:</strong> $Value</p>
				<% end_loop %>
				<% loop $SubinfoObjects %>
				<h5 class="fw-bold mt-4">$Title</h5>
				<p>$Description</p>
				<% end_loop %>
			</div>

			<!-- Map -->
			<div class="col-md-6">
				<div class="map-container shadow-sm">
					<div id="map" style="height:400px;"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		// contoh koordinat: Monas Jakarta
		var lat = $Lat_Map;
		var lng = $Long_Map;
		var address = "Monumen Nasional, Jakarta";

		var map = L.map('map').setView([lat, lng], 15);

		// Dark theme tiles
		L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
			subdomains: 'abcd',
			maxZoom: 20
		}).addTo(map);

		L.marker([lat, lng]).addTo(map)
			.bindPopup("$Address_Map")
			.openPopup();
	});
</script>
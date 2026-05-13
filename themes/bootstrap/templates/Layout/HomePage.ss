<section class="hero d-flex align-items-center text-center text-white" 
	style="background:url($BannerImage.URL) center/cover no-repeat;">
	<div class="container">
		<h1 class="fw-bold">$MainTitle_Banner</h1>
			<p class="lead">
			$LeadTitle_Banner
			</p>
		<a href="$ButtonLink_Banner" class="btn btn-warning btn-lg mt-3">$ButtonText_Banner</a>
	</div>
</section>

<!-- Features Section -->
<section class="features py-5 bg-light">
	<div class="container">
		<h2 class="text-center fw-bold mb-5">Why Choose Us?</h2>
		<div class="row g-4">
			<% loop WcuObjects %>
				<div class="col-md-3">
					<div class="feature-box shadow-sm p-4 text-center h-100">
						<div class="icon mb-3">
							<i class="bi bi-award-fill"></i>
						</div>
						<h5 class="fw-bold">$Title</h5>
						<p>$Subtitle</p>
					</div>
				</div>
			<% end_loop %>
		</div>
	</div>
</section>

<!-- Explore Product Range Section -->
<section class="explore py-5 bg-light">
	<div class="container">
		<div class="text-center mb-5">
			<h2 class="fw-bold">Explore Our Product Range</h2>
				<p class="lead">
					Browse through our complete catalog of business-ready products 
					designed to support your company’s needs.
				</p>
			</div>
			<div class="row g-4">
				<!-- Product 1 -->
				<% loop $ProductObjects %>
				<div class="col-md-4">
					<div class="card h-100 shadow-sm">
						<img src="$Thumbnail.URL" class="card-img-top product-thumb" alt="$Title">
						<div class="card-body text-center">
							<h6 class="fw-bold">$Title</h6>
							<p class="text-muted">$Description</p>
						</div>
					</div>
				</div>
			<% end_loop %>
		</div>
	</div>
</section>

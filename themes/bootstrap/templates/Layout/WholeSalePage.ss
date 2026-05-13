<!-- Hero Section -->
<section class="hero wholesale d-flex align-items-center text-center text-white"
	style="background:url($BannerImage.URL) center/cover no-repeat;">
	<div class="container">
		<h1 class="fw-bold">$MainTitle_Banner</h1>
		<p class="lead">
		$LeadTitle_Banner
		</p>
	</div>
</section>

<!-- Register Section -->
<section class="register py-5">
	<div class="container">
		<div class="row align-items-center">
			<!-- Image -->
			<div class="col-md-6 mb-4 mb-md-0">
				<img src="$TermConditionImage.URL" alt="Bakery Team" class="img-fluid rounded shadow">
			</div>
			<!-- Steps -->
			<div class="col-md-6">
				<h2 class="fw-bold mb-4">Term & Condition</h2>
				<ol class="list-group list-group-numbered">
				<% loop TermObjects %>
					<li class="list-group-item">$Text</li>
				<% end_loop %>
				</ol>
			</div>
		</div>
	</div>
	</section>

	<!-- Wholesale Solutions Section -->
	<section class="wholesale py-5 bg-dark text-light">
	<div class="container">
		<div class="row align-items-center">
			<!-- Info Boxes -->
			<div class="col-md-6">
				<h2 class="fw-bold mb-3"> $SiteConfig.Title</h2>
				<h4 class="fw-bold mb-4"> $SiteConfig.Title Wholesale Solutions</h4>
				<p class="mb-4">
					$SolutionsLeadTitle
				</p>

				<% loop SolutionObjects %>
				<div class="info-box mb-3 p-3">
					<h6 class="fw-bold">$Title</h6>
					<p class="mb-0">$Description</p>
				</div>
				<% end_loop %>
			</div>

			<!-- Image -->
			<div class="col-md-6">
				<img src="$SolutionsImage.URL" 
					alt="Bakery Wholesale" class="img-fluid rounded shadow">
			</div>
		</div>
	</div>
</section>
<!-- Banner -->
<section class="banner d-flex align-items-center text-center" style="background:url($BannerImage.URL) center/cover no-repeat;">
	<div class="container">
		<h2 class="fw-bold">$MainTitle_Banner</h2>
		<p class="lead">
			$LeadTitle_Banner
		</p>
	</div>
</section>

<!-- Product Section -->
<section class="products py-5">
	<div class="container">
		<div class="row">
			<!-- Sidebar Filter -->
			<div class="col-md-3">
				<div class="card shadow-sm mb-4">
					<div class="card-body">
						<form method="get" action="$Link(search)">
							<h5 class="fw-bold mb-3">Search Our Product Here</h5>
							<input type="text" name="q" class="form-control mb-3" placeholder="Search...">
							<button type="submit" class="btn btn-primary w-100">Search</button>
						</form>
						<!-- Price Range -->
						<h6 class="fw-bold mt-4">Price Range</h6>
						<form method="get" action="$Link(range)" >
							<div class="row">
								<div class="col">
									<label for="minPrice">Min Price</label>
									<input type="number" id="minPrice" name="minPrice" class="form-control" placeholder="0" />
								</div>
								<div class="col">
									<label for="maxPrice">Max Price</label>
									<input type="number" id="maxPrice" name="maxPrice" class="form-control" placeholder="100000" />
								</div>
							</div>
							<button type="submit" class="btn btn-primary mt-3 w-100">Filter</button>		
						</form>	
						<h6 class="fw-bold mt-4">Category</h6>
						<form method="get" action="$Link(filter)" class="p-4 bg-light rounded shadow-sm">
							<ul class="list-unstyled">
								<% loop $CategoryObjects %>
									<li class="mb-2">
										<div class="form-check">
											<input class="form-check-input" 
												type="checkbox" 
												name="categories[]" 
												id="cat-$ID" 
												value="$ID"
												<% if $Top.SelectedCategories.filter('ID',$ID).exists %>checked="checked"<% end_if %>>
												<label class="form-check-label" for="cat-$ID">
												$Title
											</label>
										</div>
									</li>
								<% end_loop %>
							</ul>
							<button type="submit" class="btn btn-primary w-100 mt-3">
								Filter
							</button>
						</form>
					</div>
				</div>
			</div>
			<!-- Product Grid -->
			<div class="col-md-9">
				<div class="row g-4">
					<!-- Product Card -->
					<% if $Results %>
						<% loop $Results %>
							<div class="col-md-4">
								<div class="card h-100 shadow-sm">
									<img src="$Thumbnail.URL" class="card-img-top product-thumb" alt="$Title">
									<div class="card-body">
										<h6 class="fw-bold">$Title</h6>
										<p class="text-muted">Rp. $Price</p>
										<a href="$AddToWhitelistLink" class="btn btn-primary">Add to Whitelist</a>
									</div>
								</div>
							</div>
						<% end_loop %>
					<% else %>
						<p class="text-muted">This category not available</p>
					<% end_if %>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
  // ambil parameter dari URL
  const urlParams = new URLSearchParams(window.location.search);
  const status = urlParams.get('status');

  if (status === 'success') {
    Swal.fire({
      icon: 'success',
      title: 'Succesc!',
      text: 'Products have been added to whitelist',
      showConfirmButton: false,
      timer: 2000
    });
  }
</script>
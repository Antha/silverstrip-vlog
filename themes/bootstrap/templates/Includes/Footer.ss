<!-- Subscribe Section -->
<section class="subscribe py-5" style="background:url($SiteConfig.BackgroundImage.URL) center/cover no-repeat">
  <div class="container">
    <div class="row align-items-center">
      <!-- Text -->
      <div class="col-md-6 mb-3 mb-md-0">
        <h2 class="fw-bold text-white">$SiteConfig.SubscribeHeading</h2>
        <p class="text-light">
          $SiteConfig.SubscribeSubheading
        </p>
      </div>
      <!-- Form -->
      <div class="col-md-6">
        <form class="d-flex">
          <input type="email" class="form-control me-2" placeholder="$SiteConfig.SubscribePlaceholder">
          <button class="btn btn-danger">$SiteConfig.SubscribeButtonText</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer py-5 bg-dark text-light">
  <div class="container">
    <div class="row">
      <% loop $SiteConfig.ContactItems %>
         <div class="col-md-4">
          <h5 class="fw-bold">$Title</h5>
          <p>$Subtitle</p>
        </div>
      <% end_loop %>
    </div>
    <div class="text-center mt-4">
      <p>$SiteConfig.FooterText</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
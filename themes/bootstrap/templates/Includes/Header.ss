<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="$ThemeDir/css/style.css">
  <% if $SiteConfig.Favicon %>
    <link rel="icon" href="$SiteConfig.Favicon.URL" type="image/png" />
  <% end_if %>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="">$SiteConfig.Title</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <% if $CustomMenu('main-menu') %>
            <% loop $CustomMenu('main-menu') %>
              <li class="$LinkingMode nav-item<% if $isCurrent || $isSection %> active <% end_if %>"><a class="nav-link" href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
            <% end_loop %>
          <% else %>
            <% loop $Menu(1) %>
              <li class="$LinkingMode nav-item<% if $isCurrent || $isSection %> active <% end_if %>"><a class="nav-link" href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
            <% end_loop %>
          <% end_if %>
        </ul>
      </div>
      <div class="d-flex ms-auto">
        <% if $CurrentUserName %>
          <div class="dropdown">
            <a class="navbar-text dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              👤 $CurrentUserName
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
              <li><a class="dropdown-item" href="/wishlist">Wishlist</a></li>
              <li><a class="dropdown-item" href="/checkout">Checkout</a></li>
              <li><a class="dropdown-item" href="/in-progress">In Progress</a></li>
              <li><a class="dropdown-item" href="/sending">Sending</a></li>
              <li><a class="dropdown-item" href="/delivered">Delivered</a></li>
              <li><a class="dropdown-item" href="/Security/logout?BackURL=/">Logout</a></li>
            </ul>
          </div>
        <% else %>
          <div class="d-flex justify-content-center gap-3 my-3">
            <a href="/login?BackURL=/shop" class="btn btn-outline-primary px-4">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
            <a href="/register" class="btn btn-outline-primary px-4">
              <i class="bi bi-person-plus"></i> Register
            </a>
          </div>
        <% end_if %>
      </div>
    </div>
  </nav>
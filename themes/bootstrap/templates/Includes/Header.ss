<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="$ThemeDir/css/style.css">
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
  </div>
</nav>
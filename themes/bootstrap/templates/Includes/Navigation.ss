<nav class="col navbar navbar-expand-lg navbar-light navbar-main">  
	<div class="collapse navbar-collapse" id="MainNav">
	  <ul class="navbar-nav ml-sm-auto">
			<% loop $HeaderMenuItem %>
				<li class="nav-item<% if $isCurrent || $isSection %> active<% end_if %>"><a class="nav-link" href="$Link" title="">$Title</a></li>
			<% end_loop %>
	  </ul>
	</div>
</nav>


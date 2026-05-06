<div class="video-search-page container>
    <% include Pagination %>

    <div class="row">
        <div class="col-lg-12">
            <div class="search-form">
                $VideoSearchForm
                <% if $ActiveFilters %>
                    <p>Searching
                    <% loop $ActiveFilters %>
                        <p><% if $Label %> for $Label <% end_if %><% if $Category %> in $Category <% end_if %></p>
                    <% end_loop %>
                <% end_if%>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="search-results">
                <% include VideoSearchResults%>
            </div>
        </div>
    </div>

    <% include Pagination %>
</div>
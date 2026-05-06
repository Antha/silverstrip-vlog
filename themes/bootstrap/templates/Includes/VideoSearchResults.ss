<% if $Results %>
    <% loop Results %>
        <a class="d-flex my-2" href="$VideoPage.link">
            <div class="col-4">
                $VideoThumbnail.Fill(400,225)
            </div>
            <div class="col-6">
                <h2>$Title</h2>
            </div>
        </a>
    <% end_loop %>
<% else %>
    <p>No results found</p>
<% end_if %>
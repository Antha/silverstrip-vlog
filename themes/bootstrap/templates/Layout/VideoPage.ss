<div class="container">
    <% loop $VideoObjects.Limit(1) %>
        <h3>$Title</h3>
        <% if $Description %>
            <p>
                $Description
            </p>
        <% end_if %>
        <video height="325" controls>
            <source src="$VideoSource.URL" type="video/mp4">
        </video>
        <ul>
            <% loop $VideoCategories %>
                <li>$Title</li>
            <% end_loop%>
        </ul>
    <% end_loop %>
</div>

<div class="container">
    <ul>
        <% loop $VideoComments %>
            <li class="media">
                <b>$Name</b> - $Comment
            </li>
        <% end_loop %>
    </ul>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            $CommentForm
        </div>
    </div>
</div>

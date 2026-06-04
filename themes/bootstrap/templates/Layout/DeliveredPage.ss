<!-- Wish List Section -->
<section class="features py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Delivered Orders</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Time Checked</th>
                    </tr>
                    </thead>
                <tbody>
                    <% if $DeliveredObjects %>
                        <% loop $DeliveredObjects %>
                            <tr>
                                <td>$ID</td>
                                <td class="text-start">
                                    <img src="$Product.Thumbnail.URL" 
                                        class="card-img-top product-thumb" 
                                        style="width: 128px; height: 128px; padding:5px" 
                                        alt="$Product.Title">
                                    $Product.Title
                                </td>
                                <td><span class="status-badge status-{$Status}">$Status</span></td>
                                <td>$DateTime</td>
                            </tr>
                        <% end_loop %>
                    <% else %>
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No checkout data available.
                            </td>
                        </tr>
                    <% end_if %>
                </tbody>
            </table>
        </div>
        <div style="display: flex; justify-content: center;" class="mt-3">
            <a id="checkoutBtn" href="$Link('changeStatusToCheckout')/$CurrentUserID" class="btn btn-warning">
                Checkout
            </a>
        </div>
    </div>
</section>

<script>
    //Confirmation Dialog
    document.getElementById('checkoutBtn').addEventListener('click', function(e) {
        e.preventDefault(); // cegah langsung redirect

        const url = this.getAttribute('href');

        Swal.fire({
            title: 'Checkout Confirmation',
            text: 'Are you sure you want to checkout all orders?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Checkout',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // jalankan link jika user konfirmasi
            }
        });
  });
</script>

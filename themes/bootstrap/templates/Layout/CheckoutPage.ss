<!-- White List Section -->
<section class="features py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Checked Out Items</h2>
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
                <% loop CheckoutObjects %>
                    <tr>
                        <td>$ID</td>
                        <td class="text-start"> <img src="$Product.Thumbnail.URL" class="card-img-top product-thumb" style="width: 128px; height: 128px; padding:5px" alt="$Product.Title">$Product.Title</td>
                        <td><span class="status-badge status-{$Status}">$Status</span></td>
                        <td>$DateTime</td>
                    </tr>
                <% end_loop %>
                </tbody>
            </table>
        </div>
        <div style="display: flex; justify-content: center;" class="mt-3">
           <button id="confirmPaymentBtn" class="btn btn-success">
                Confirm Your Payment
            </button>
        </div>
    </div>
</section>

<script>
    document.getElementById('confirmPaymentBtn').addEventListener('click', function() {
        Swal.fire({
            title: 'Confirm Payment?',
            text: 'Do you want to proceed with payment?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                    title: 'Scan to Pay',
                    html: '<img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=DummyPayment123" alt="QR Code">',
                    icon: 'info',
                    confirmButtonText: 'Done',
                    title: 'This is a fake payment'
                }).then((qrResult) => {
                    if (qrResult.isConfirmed) {
                        Swal.fire({
                            title: 'Payment Confirmed',
                            text: 'Thank you, your payment has been recorded.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Jika user klik No → tampilkan pesan batal
                Swal.fire({
                    title: 'Payment Cancelled',
                    text: 'You have cancelled the payment process.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
</script>

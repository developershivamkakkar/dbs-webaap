<!-- Thank You Modal -->
<div class="modal fade" id="thankYouModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header with Close Button -->
            <div class="modal-header border-0">
                <h4 class="modal-title">🎉 Thank You!</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-center p-4">
                <p>Your details have been submitted successfully.</p>
                <p>Please download Your Brochure</p>
                <a href="{{ asset('brochures/dbels-brochure.pdf') }}" class="btn btn-success mt-3" download>Download</a>
            </div>

        </div>
    </div>
</div>


@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Show modal
            var modalEl = document.getElementById('thankYouModal');
            var myModal = new bootstrap.Modal(modalEl);
            myModal.show();

            // Create hidden iframe to trigger download
            var iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = "{{ asset('brochures/dbels-brochure.pdf') }}";
            document.body.appendChild(iframe);

            // Close modal automatically after 10s
            setTimeout(() => {
                myModal.hide();
            }, 30000);
        });
    </script>
@endif

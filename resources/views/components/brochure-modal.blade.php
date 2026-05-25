<div>
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-labelledby="brochureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('brochure.submit') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="brochureModalLabel">Fill the form to download School Brochure</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger"> *</span></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email <span class="text-danger"> *</span></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone <span class="text-danger"> *</span></label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City <span class="text-danger"> *</span></label>
                            <select name="city" class="form-select" required>
                                <option value="">-- Select City --</option>
                                <option>Panchkula</option>
                                <option>Chandigarh</option>
                                <option>Mohali</option>
                                <option>Zirakpur</option>
                                <option>Derabassi</option>
                                <option>Kalka</option>
                                <option>Pinjore</option>
                                <option>Manimajra</option>
                                <option>Kharar</option>
                                <option>Baddi</option>
                                <option>Solan</option>
                                <option>Ambala</option>
                                <option>Kurukshetra</option>
                                <option>Patiala</option>
                                <option>Rajpura</option>
                                <option>Ludhiana </option>
                                <option>Ferozepur </option>
                                <option>Ambala </option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Submit & Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('home.header')    
        <!-- Header Start -->
        <div class="container-fluid header bg-dark p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4 text-primary me-3" >Deal Supports</h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="img/equipment.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Supoort Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4>GET OUR SUPPORT</h4>
                </div>
                <div class="row g-4">
                    <div class="col-md-8 mx-auto">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form id="supportForm">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                <label for="name">Your Name</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                <label for="email">Your Email</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required>
                <label for="subject">Subject</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating deal-select">
                <select class="form-select" name="type" id="type" required>
                    <option value="">-- Support-Type --</option>
                    <option>Jingle Production</option>
                    <option>Content Creation</option>
                    <option>Campaign Planning Assistance</option>
                    <option>Payment Support</option>
                    <option>Customer Support</option>
                    <option>Dispute Resolution</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <button id="submitBtn" class="btn deal-btn btn-primary w-100 py-3 bg-dark text-primary fw-bold" type="submit">
                <span class="spinner-border spinner-border-sm me-2 d-none" id="btnSpinner" role="status" aria-hidden="true"></span>
                <span id="btnText">Request Support</span>
            </button>

        </div>
    </div>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <script>
            document.getElementById('supportForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const submitBtn = document.getElementById('submitBtn');
                const btnSpinner = document.getElementById('btnSpinner');
                const btnText = document.getElementById('btnText');

                // Show spinner + disable button
                submitBtn.disabled = true;
                btnSpinner.classList.remove('d-none');
                btnText.innerText = "Sending...";

                const formData = {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    subject: document.getElementById('subject').value,
                    type: document.getElementById('type').value,
                };

                try {
                    let res = await fetch('/support-request', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(formData)
                    });

                    let data = await res.json();

                    if (res.ok) {
                        showToast(data.message, 'success');
                        document.getElementById('supportForm').reset();
                    } else {
                        showToast(data.message || 'Something went wrong', 'danger');
                    }
                } catch (err) {
                    showToast('Error sending request', 'danger');
                } finally {
                    // Reset button
                    submitBtn.disabled = false;
                    btnSpinner.classList.add('d-none');
                    btnText.innerText = "Request Support";
                }
            });

            function showToast(message, type) {
                const toastContainer = document.createElement('div');
                toastContainer.className = 'position-fixed top-0 end-0 p-3';
                toastContainer.style.zIndex = '1055';

                const toastHTML = `
                <div class="toast align-items-center text-bg-${type} border-0 show" role="alert">
                    <div class="d-flex">
                    <div class="toast-body fw-bold">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto"
                            data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                `;

                toastContainer.innerHTML = toastHTML;
                document.body.appendChild(toastContainer);

                setTimeout(() => {
                    toastContainer.remove();
                }, 4000);
            }
        </script>



@include('home.footer')
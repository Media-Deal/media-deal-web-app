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
                        <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control"  name="name" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating deal-select">
                                            <select class="form-select">
                                              <option>-- Support-Type --</option>
                                              <option>Jingle Production</option>
                                              <option>Content Creation</option>
                                              <option>Campaign Planning Assistance</option>
                                              <option>Payment Support</option>
                                              <option>⁠Customer Support</option>
                                              <option>Dispute Resolution</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn deal-btn btn-primary w-100 py-3 bg-dark text-primary fw-bold" type="submit">Request Support</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
@include('home.footer')
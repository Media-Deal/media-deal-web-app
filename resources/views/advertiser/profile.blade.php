@include('advertiser.header')
    
        
<!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Profile 2</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Update Personal Profile</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    <h4 class="mb-0 mt-2">John Doe</h4>
                                    <p class="text-muted font-14">Founder</p>

                                    <div class="text-start mt-3">
                                       
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva
                                                John Doe</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Phone Number :</strong><span class="ms-2">(123)
                                                123 1234</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">user@email.domain</span></p>

                                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                                    </div>

                                    
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->

                           

                        </div> <!-- end col-->

                        <div class="col-xl-8 col-lg-7">
                            <div class="card">
                                

                                        </div> <!-- end tab-pane -->
                                        <!-- end about me section content -->

                                        <!-- end timeline content-->

                                        <div class="tab-pane" id="settings">
                                            <form>
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Full Name</label>
                                                            <input type="text" class="form-control" id="firstname" placeholder="Enter Full Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="lastname" class="form-label">Phone Number</label>
                                                            <input type="number" class="form-control" id="lastname" placeholder="Enter Phone Number">
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Address</label>
                                                            <input type="text" class="form-control" id="firstname" placeholder="Enter Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="lastname" class="form-label">Date Of Birth</label>
                                                            <input type="date" class="form-control" id="lastname" placeholder="Enter Date Of Birth">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="useremail" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                                            <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                            <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Business Details</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="companyname" class="form-label">Company Name</label>
                                                            <input type="text" class="form-control" id="companyname" placeholder="Enter company name">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="userbio" class="form-label">Description</label>
                                                        <textarea class="form-control" id="userbio" rows="4" placeholder=" Enter Description..."></textarea>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="cwebsite" class="form-label">Store Address</label>
                                                            <input type="text" class="form-control" id="cwebsite" placeholder="Enter Store Address">
                                                        </div>

                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                               
                                                </div> <!-- end row -->

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

             
 @include('advertiser.footer')
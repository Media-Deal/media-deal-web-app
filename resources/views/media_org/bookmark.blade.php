@include('home.header')
<main id="main" class="main-img">
        
    
        <section class="property-details-section">
            <div class="property-details-banner">
                <div class="container">
            <div class="pt-5 s-pb-80 section-bg">
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-8 pe-xl-5 order-lg-1 order-2">
                            <div class="property-details-wrapper mt-5" id="reviewBox">



                                <div class="content-box">
                                    <h4 class="title">Bookmark Plan</h4>
                                    <form method="post" action="{{url('/bookmark-email')}}">
                                          @csrf                                   
                                        <div class="row gy-4">

                                            <div class="col-lg-6">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Your Name" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Your Email" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="phone" name="phone" class="form-control"
                                                    placeholder="Your Phone" required>
                                            </div>
                                                                                        <div class="col-lg-6">
                                                <input type="text" name="country" class="form-control"
                                                    placeholder="Your Country" required>
                                            </div>
                                                                                        <div class="col-lg-6">
                                                                                            <label>Prospective Date</label>
                                                <input type="date" name="pDate" class="form-control"
                                                    placeholder="Prospective Date" required>
                                            </div>

                                            <div class="col-lg-12">
                                                <button type="submit" class="cmn-btn">Bookmark</button>
                                            </div>
                                        </div>
                                    </form>
    
                                </div><!-- content-box end -->
                            </div>
                        </div>
                    </div>
    
                                      
                       
            </div>
            </div>
        </section>

        <!-- property details banner section end -->
    
        <div class="modal fade" id="invest" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="investmentplan/invest" method="post">
                    <input type="hidden" name="_token" value="6V9gjvnjexYGtU9gJPdxEQpvS0PEqwmKVlk6Fzwa">                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Invest Now</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label for="">Invest Amount</label>
                                    <input type="text" name="amount" class="form-control">
                                    <input type="hidden" name="plan_id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn cmn-btn">Invest Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Social Share</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="social-share-list">
                            <div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=investment/plan/details/4" class="social-button " id="" title="" rel=""><span class="fab fa-facebook-square"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=Share&url=investment/plan/details/4" class="social-button " id="" title="" rel=""><span class="fab fa-twitter"></span></a></li><li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=investment/plan/details/4&title=Share&summary=" class="social-button " id="" title="" rel=""><span class="fab fa-linkedin"></span></a></li><li><a target="_blank" href="https://telegram.me/share/url?url=investment/plan/details/4&text=Share" class="social-button " id="" title="" rel=""><span class="fab fa-telegram"></span></a></li><li><a target="_blank" href="https://wa.me/?text=investment/plan/details/4" class="social-button " id="" title="" rel=""><span class="fab fa-whatsapp"></span></a></li><li><a target="_blank" href="https://www.reddit.com/submit?title=Share&url=investment/plan/details/4" class="social-button " id="" title="" rel=""><span class="fab fa-reddit"></span></a></li></ul></div>                    </ul>
                    </div>
                </div>
            </div>
        </div>
    
    
    
    
        <div class="modal fade" id="bookmark" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="" method="post">
                    <input type="hidden" name="_token" value="6V9gjvnjexYGtU9gJPdxEQpvS0PEqwmKVlk6Fzwa">                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Bookmarked Plan</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="bookmark-text">Are You Sure To Bookmark This Plan For Future Invest ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Bookmark</button>
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    
    
    
    
        <div class="modal fade" id="bookmark-remove" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="" method="post">
                    <input type="hidden" name="_token" value="6V9gjvnjexYGtU9gJPdxEQpvS0PEqwmKVlk6Fzwa">                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Bookmarked Remove</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="bookmark-text">Are You Sure To Remove Bookmark ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Remove</button>
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    
        </main>
    
@include('home.footer')
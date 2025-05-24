<section id="blog">
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Cental<span class="text-primary"> Blog & News</span></h1>
                <p class="mb-0">Welcome to our blog page, where we share helpful tips, travel guides, and the latest
                    news related to car rentals. Whether you're planning a road trip or looking for the best rental
                    deals, our blog offers valuable insights to make your journey smoother. Stay updated with expert
                    advice and useful information for a hassle-free car rental experience.
                </p>
            </div>

            <!-- Only first six blog post -->
            <div id="show_first">
                <div class="row g-4" id="">
                    <!-- calling data in reverse to show the latest one first -->
                    <?php $blogPost = $post->reverse(); ?>
                    <!-- Show only the first 6 blog posts initially -->
                    @foreach ($blogPost->take(6) as $data)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{$data->image}}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="blog-content rounded-bottom p-4">
                                <div class="blog-date">{{$data->created_at->format('d M Y')}}</div>
                                <div class="blog-comment my-3">
                                    <div class="small">
                                        <span class="fa fa-user text-primary"></span>
                                        <span class="ms-2">{{$data->author}}</span>
                                    </div>
                                    <div class="small">
                                        <span class="fa fa-list text-primary"></span>
                                        <span class="ms-2">{{$data->category->category_name}}</span>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="h4 d-block read-more mb-3" data-id="{{ $data->id }}"
                                    id="read-more-btn-{{ $data->id }}"> {{$data->title}} </a>
                                <p class="mb-3">{{ Str::limit($data->details, 70) }}</p>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="read-more" data-id="{{ $data->id }}" id="read-more-btn">Read More <i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Load More Button -->
                    <div class="loading-btn text-center mt-5" id="show-more-btn">
                        <a href="#blog" class="btn btn-primary rounded-pill" id="showMore">Show More</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Blog Post's details</h1>
                            <button type="button" class="btn-close text-danger" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modal-content">
                            <!-- Content will be populated dynamically via AJAX -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All data of the blog post -->
            <div id="show_after" style="display: none">
                <div class="row g-4">
                    <!-- calling data in reverse to show the letest one first -->
                    <?php $blogPost = $post->reverse();?>
                    @foreach ($blogPost as $data)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{$data->image}}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="blog-content rounded-bottom p-4">
                                <div class="blog-date">{{$data->created_at->format('d M Y')}}</div>
                                <div class="blog-comment my-3">
                                    <div class="small">
                                        <span class="fa fa-user text-primary"></span>
                                        <span class="ms-2">{{$data->author}}</span>
                                    </div>
                                    <div class="small">
                                        <span class="fa fa-list text-primary"></span>
                                        <span class="ms-2">{{$data->category->category_name}}</span>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="h4 d-block read-more mb-3" data-id="{{ $data->id }}"
                                    id="read-more-btn-{{ $data->id }}"> {{$data->title}} </a>
                                <p class="mb-3">{{ Str::limit($data->details, 70) }}</p>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="read-more" data-id="{{ $data->id }}" id="read-more-btn">Read More <i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="loading-btn text-center mt-5">
                        <a href="#blog" class="btn btn-primary rounded-pill" id="showLess">Show Less</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
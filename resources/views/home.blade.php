<x-header/>
 <!-- Hero Section-->
 <section style="background: url(images/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h1>Start Writing your Blog Posts to Glow your Skills</h1><a href="/write-blog" class="hero-link">Start Now</a>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fas fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">Some great intro here  </h2>
            <p class="text-big">Place a nice <strong>introduction</strong> here <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
          </div>
        </div>
      </div>
    </section>
    
    <section class="featured-posts no-padding-top">
      <div class="container">
        <!-- Post 1-->
        @if($blogs[0])
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="#"> {{$blogs[0]->cat}}</a></div><a href="blogs">
                    <h2 class="h4">{{$blogs[0]->title}}</h2></a>
                </header>
                <p>{{$blogs[0]->short_desc}}</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="images/avatar-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>{{$blogs[0]->name}}</span></div></a>
                  <div class="date"><i class="fas fa-clock "></i> 2 months ago</div>
                  <div class="comments"><i class="fas fa-comment-dots"></i>12</div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="images/{{$blogs[0]->image}}" alt="..."></div>
        </div>
        @elseif($blogs[1])
        <!-- Post  2  -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5"><img src="images/{{$blogs[1]->image}}" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="#">{{$blogs[1]->cat}}</a></div><a href="blogs">
                    <h2 class="h4">{{$blogs[1]->title}}</h2></a>
                </header>
                <p>{{$blogs[1]->short_desc}}</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="images/avatar-2.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>{{$blogs[1]->name}}</span></div></a>
                  <div class="date"><i class="fas fa-clock "></i> 2 months ago</div>
                  <div class="comments"><i class="fas fa-comment-dots"></i>12</div>
                </footer>
              </div>
            </div>
          </div>
        </div>
        @elseif($blogs[2])
        <!-- Post 3 -->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="#">{{$blogs[2]->cat}}</a></div><a href="blogs">
                    <h2 class="h4">{{$blogs[2]->title}}</h2></a>
                </header>
                <p>{{$blogs[2]->short_desc}}</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="images/avatar-3.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>{{$blogs[2]->name}}</span></div></a>
                  <div class="date"><i class="fas fa-clock "></i> 2 months ago</div>
                  <div class="comments"><i class="fas fa-comment-dots"></i>12</div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="images/{{$blogs[2]->image}}" alt="..."></div>
        </div>
        @else
          <h2>NO Post found</h2>
        @endif
      </div>
    </section>
    <!-- Divider Section-->
    <section style="background: url(images/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts"> 
      <div class="container">
        <header> 
          <h2>Latest from the blog</h2>
          <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </header>
        <div class="row">
        @foreach($blogs as $blog)
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="blogs"><img src="images/{{$blog->image}}" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">20 May | 2016</div>
                <div class="category"><a href="#">{{$blog->cat}}</a></div>
              </div><a href="blogs/{{$blog->id}}">
                <h3 class="h4">{{$blog->title}}</h3></a>
              <p class="text-muted">{{substr($blog->short_desc,0,100)}}...</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Newsletter Section-->
    <section class="newsletter no-padding-top bg-light">    
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-6">
            <h2>Subscribe to Newsletter</h2>
            <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-md-8">
            <div class="form-holder">
              <form action="#">
                <div class="form-group">
                  <input type="email" name="email" id="email" placeholder="Type your email address">
                  <button type="submit" class="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Gallery Section-->
    <section class="gallery no-padding">    
      <div class="row">
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="images/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="images/gallery-1.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="images/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="images/gallery-2.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="images/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="images/gallery-3.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="images/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="images/gallery-4.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
      </div>
    </section>
<x-footer/>
<x-header/>
<?php use App\Http\Controllers\BlogsController;?>
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item "><a href="#" class="text-info">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Blogs</li>
        </ol>
      </nav>
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
              <!-- post -->
              @foreach($blogs as $blog)
              <?php 
              $date=explode(" ", $blog->created_at);
              $timeago= BlogsController::Timeago($date[0]);
              $comment_count= BlogsController::comment_count($blog->id); ?>
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="{{ route('blogs.show',$blog->id) }}"><img src="../images/{{$blog->image}}" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{$date[0]}}</div>
                    <div class="category"><a href="#">{{$blog->cat}}</a></div>
                  </div><a href="{{ route('blogs.show',$blog->id) }}">
                    <h3 class="h4">{{$blog->title}}</h3></a>
                  <p class="text-muted">{{$blog->short_desc}}</p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="https://source.unsplash.com/50x50/?men,boy,girl,{{$blog->id}}" alt="..." class="img-fluid"></div>
                      <div class="title"><span>{{$blog->name}}</span></div></a>
                    <div class="date"><i class="fas fa-clock"></i> {{$timeago}}</div>
                    <div class="comments meta-last"><i class="fas fa-comment-dots"></i>{{$comment_count}}</div>
                  </footer>
                </div>
              </div>
              @endforeach
             
            </div>
            {{ $blogs->links() }}
            {{-- <!-- Pagination -->
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
                <li class="page-item"><a href="#" class="page-link active">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
              </ul>
            </nav> --}}
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header> 
            <form action="{{ url('search') }}" method="GET" class="search-form">
              <div class="form-group">
                <input type="search" name="query" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>
            <div class="blog-posts">
              @for ($i = 0; $i < 3; $i++)
             <?php $comment_count= BlogsController::comment_count($blogs[$i]->id); ?>
              <a href="blogs/{{$blogs[$i]->id}}">
                <div class="item d-flex align-items-center"> 
                  <div class="image"><img src="../images/{{$blogs[$i]->image}}" alt="..." class="img-fluid"></div>
                  <div class="title"><strong>{{$blogs[$i]->title}}</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="fas fa-comment-dots"></i>{{$comment_count}}</div>
                    </div>
                  </div>
                </div></a>
                @endfor
              </div>
          </div>
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
            @foreach ($categories as $cat)
            <?php $count= BlogsController::count_cat($cat->id);?>
            <div class="item d-flex justify-content-between"><a href="#">{{$cat->title}}</a><span>{{$count}}</span></div>
            @endforeach
          </div>
          <!-- Widget [Tags Cloud Widget]-->
          {{-- <div class="widget tags">       
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
            </ul>
          </div> --}}
        </aside>
      </div>
    </div>
<x-footer/>
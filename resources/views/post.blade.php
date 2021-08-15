<x-header/>
<?php use App\Http\Controllers\BlogsController;?>
<div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img src="../images/{{$blog[0]->image}}" alt="..." class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="#">{{$blog[0]->cat}}</a></div>
                </div>
                <?php 
                $date=explode(" ", $blog[0]->created_at);
                $timeago= BlogsController::Timeago($date[0]); ?>
                <h1>{{$blog[0]->title}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="../images/avatar-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>{{$blog[0]->name}}</span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="fas fa-clock"></i> {{$timeago}}</div>
                    <div class="views"><i class="icon-eye"></i> 50</div>
                    <div class="comments meta-last"><i class="fas fa-comment-dots"></i>{{count($comments)}}</div>
                  </div>
                </div>
                <div class="post-body">
                  {!! $blog[0]->post !!}
                </div>
                {{-- <div class="post-tags"><a href="#" class="tag">#Business</a><a href="#" class="tag">#Tricks</a><a href="#" class="tag">#Financial</a><a href="#" class="tag">#Economy</a></div>
                <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                    <div class="text"><strong class="text-primary">Previous Post </strong>
                      <h6>I Bought a Wedding Dress.</h6>
                    </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                    <div class="text"><strong class="text-primary">Next Post </strong>
                      <h6>I Bought a Wedding Dress.</h6>
                    </div>
                    <div class="icon next"><i class="fa fa-angle-right">   </i></div></a>
                </div> --}}
                <div class="post-comments">
                  <header>
                    <h3 class="h6">Post Comments<span class="no-of-comments">({{count($comments)}})</span></h3>
                  </header>
                  @foreach ($comments as $comment)
                  <div class="comment">
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"><img src="../images/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="title"><strong>{{$comment->name}}</strong><span class="date">{{date('j F, Y', strtotime($comment->created_at)) }}</span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      @if (isset(Auth::user()->id) && Auth::user()->id==$comment->u_id )
                      <p class="float-right"><a href=""class="text-info">Edit</a>&nbsp; 
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-transparent text-danger float-right  "> </form> </p>
                      @endif
                     
                      <p>{{$comment->comment}}</p>
                    </div>
                  </div>
                  @endforeach
                 
                </div>
                <div class="add-comment">
                  <header>
                    <h3 class="h6">Leave a reply</h3>
                  </header>
                  @if (Auth::check()) 
                    <form action=" {{ url('/comments') }}" method="POST" class="commenting-form">
                      @csrf
                      <div class="row">
                        <p class="text-info ml-3">You are login as: {{Auth::user()->name}}</p>
                        <div class="form-group col-md-12">
                          <input type="hidden" name="blog_id" value="{{$blog[0]->id}}">
                          <input type="hidden" name="u_id" value="{{Auth::user()->id}}">
                          <textarea name="comment" id="usercomment" placeholder="Type your comment" class="form-control border"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-secondary">Submit Comment</button>
                        </div>
                      </div>
                    </form>
                  @else
                  <div class="box p-3 bg-light border">
                    <p>Sorry, You need to login first to post comment on it</p>
                    <a href="/login" class="text-info">Login Now</a>
                  </div>
                  @endif
                  
                </div>
              </div>
            </div>
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
              <?php $comment_count= BlogsController::comment_count($blogs[$i]->id);?>
              <a href="../blogs/{{$blogs[$i]->id }}"> 
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="../images/{{$blogs[$i]->image}}" alt="..." class="img-fluid"></div>
                  <div class="title"><strong>{{$blogs[$i]->title}}</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="fas fa-eye"></i> 50</div>
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
<x-header/>

 <!-- Profile Section-->
 @if(Auth::check())
    <section class="container py-0 ">
     @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="font-size: 2rem; position: absolute; top: 11px; right: 10px;">&times;</span>
            </button>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="font-size: 2rem; position: absolute; top: 11px; right: 10px;">&times;</span>
            </button>
        </div>
    @endif
        <div class="row ">
            @include('components.dashboard', ['myblogs' => "1"])
            {{-- <x-dashboard /> --}}
            <div class="col-md-9 p-2 border" style="background: aliceblue">
               <h5> Here is Your Blogs </h5>
                <div class="tab-content" id="v-pills-tabContent">
                <!-- //Profile Tab -->
                <div class="tab-pane fade  show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card-body">
                        <div class="row ">
                            @if (count($blogs)>0)
                            @foreach ($blogs as $blog)
                                <div class="post col-md-4 bg-white  border"> 
                                    <div class="post-thumbnail "><a href="/blogs/"><img src="images/{{$blog->image}}" alt="..." style="height:200px" class="w-100 img-fluid"></a></div>
                                    <div class="post-details  ">
                                    <div class="post-meta d-flex justify-content-between">
                                        <div class="date">{{$blog->created_at}}.</div>
                                        <div class="category"><a href="#">{{$blog->cat}}</a></div>
                                    </div><a href="/blogs/">
                                        <h5 class="text-dark">{{$blog->title}}</h5></a> <br>
                                        <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <a href="edit_blog/{{$blog->id}}" class="btn btn-sm btn-warning">Edit</a> 
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                            {{ $blogs->links() }}
                            @else
                                <h6 class="text-danger"> No Blog is Yet Posted. <a href="write-blog"> Write Now</a></h6>
                            @endif
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@else
<script type="text/javascript">
    window.location = "{{url('/home') }}";
</script>
@endif
<x-footer/>
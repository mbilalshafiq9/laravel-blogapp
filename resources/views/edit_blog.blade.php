<x-header/>

 <!-- Profile Section-->
 @if(Auth::check())
    <section class="container py-0 ">
        <div class="row ">
            <script src="https://cdn.tiny.cloud/1/ikvailo94gk8xdd5dkwiq3b4jsr7bvi4sj6lhv1dh8o7agu2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
       
            @include('components.dashboard', ['myblogs' => "1"])
            {{-- <x-dashboard /> --}}
            <div class="col-md-9 p-2 border">
               <h5> Edit Your Blog </h5>
               <div class="box p-3 bg-light  " style="height:50rem">
                <form method="POST" action="{{ route('blogs.update',$blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="blogtitle">Blog Title </label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}" placeholder="Blog title goes here...">
                    </div>
                    <div class="form-group">
                        <label for="blogtitle">Short Description</label>
                        <input type="text" class="form-control" value="{{$blog->short_desc}}"  name="short_desc" placeholder="Write Short Description here...">
                    </div>
                    <div class="form-group w-50 float-right">
                        <label for="">Select Category</label>
                        <select name="cat_id" id="" class="form-control">
                            @foreach ($categories as $cat)
                            <option value="{{$cat->id}}" {{($blog->cat_id)?"selected": ""}}>{{$cat->title}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group w-50 float-left">
                        <label for="">Blog Images</label>
                        <input type="hidden" name="pre_image" value="{{$blog->image}}" id="">
                          <input type="file" name="image" class="form-control" id="image" placeholder="Upload blog image">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Blog Post</label>
                        <textarea id="basic-example" name="post" class="form-control">{!! $blog->post !!}</textarea>
                     </div>
                    <div class="form-group">
                        <input type="submit" class=" btn btn-success w-25 " placeholder="Submit">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
<script>
    tinymce.init({
        selector: 'textarea#basic-example',
        height: 500,
        menubar: false,
        plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    
    
    </script>
@else
<script type="text/javascript">
    window.location = "{{url('/home') }}";
</script>
@endif
<x-footer/>
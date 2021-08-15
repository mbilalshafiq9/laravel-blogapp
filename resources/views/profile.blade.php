<x-header/>

 <!-- Profile Section-->
 @if(Auth::check())
    <section class="container py-0 ">
        <div class="row ">
          {{-- <x-dashboard/> --}}
          @include('components.dashboard', ['profile' => "1"])
            <div class="col-md-9 p-4 border ">
               <h5> Hi, {{ Auth::user()->name  }} Welcome to Your Profile</h5>
                <div class="tab-content" id="v-pills-tabContent">
                <!-- //Profile Tab -->
                <div class="tab-pane fade  show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email  }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-secondary w-100">Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
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
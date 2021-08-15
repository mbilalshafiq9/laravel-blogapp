<div class="col-md-3 bg-light p-3 shadow pb-5">
                <div class="pic mx-auto text-center">
                <img class="image-rounded " style="border: 3px solid gray;border-radius: 50%; width: 100px; height: 100px;" src="{{ url('images/avatar-1.jpg') }}" alt="" srcset=""> <br> <br>
                <h3 >{{ Auth::user()->name  }}</h3> </div> 
                <br>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link {{ isset($profile) ? 'active': '' }}" href="/profile">Profile</a> 
                <a class="nav-link {{ isset ($myblogs) ? 'active': '' }}" href="/my-blogs" >MY Blogs</a>
                <a class="nav-link {{ isset ($writeblog) ? 'active': '' }}" href="/write-blog" >Write Blog</a>
                <a class="nav-link"  href="/comments" >Comments</a>
                <a class="nav-link " href="/change-password" >Change Password</a>
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
                </div>
            </div>
<nav class="navbar navbar-expand-lg navbar-light fixed-top yellow">
  <a class="navbar-brand brand" href="{{route('index')}}">Rasana Shakya</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @if(auth::check())  
  <ul class="navbar-nav ml-auto">
    <li >
      <a class="nav-link" href="{{route ('logout')}}">Logout</a>
    </li>
    <li >
      <a class="nav-link disabled" href="{{route ('dashboard')}}">Dashboard</a>
    </li>
    <li >
      <a class="nav-link disabled" href="{{route ('category.index')}}">Category</a>
    </li>
  @else
  <ul class="navbar-nav ml-auto">
    <li >
      <a class="nav-link" href="{{route ('login')}}">Login </a>
    </li>
    <li >
      <a class="nav-link disabled" href="{{route ('register')}}">Register</a>
    </li>
    
    @endif
    <li>
      <form class="form-inline" action="{{route ('search') }}" method="post">
        {{ csrf_field() }}
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" href="{{ route ('search') }}"><i class="fa fa-search"></i></button>
      </form>
    </li> 
  </ul>
 
</nav>
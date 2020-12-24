

@extends('layouts.app')
@section( 'content')

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Discussions <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Topics</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="shadow-sm" >
                    <div class="card-body">
                        <ul class="card-text">
                            <li><a href="{{ route('question.create') }}" class="btn btn-primary "> Add New Discussion</a></li>
                            <li><a href="#" class="btn btn-outline-info" > Pupular</a></li>
                            <li><a href="#" class="btn btn-outline-info"> Solved</a></li>
                            <li><a href="#" class="btn btn-outline-info"> Unsolved</a></li>
                            <li><a href="#" class="btn btn-outline-info"> No Reply Yet</a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 " style="max-height:100vh;overflow-y:scroll; overflow-y: hidden; ">
                <div class="card shadow-sm ">
                  <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
            </div>

        </div>

    </main><!-- /.container -->
<style>
    ul{
        list-style:none;
    }
li{
    padding-top: .5rem;
}

    a{
        style:none;
        min-width:15vw;
    }
</style>
@endsection

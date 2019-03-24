@extends('products.layout')



@section('content')



    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{--<div class="row">--}}

        {{--<div class="col-lg-12 margin-tb">--}}

            {{--<div class="pull-left">--}}
                {{--<br>--}}
                {{--<a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>--}}
            {{--</div>--}}

        {{--</div>--}}

    {{--</div>--}}

    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" class="form-control" placeholder="Name">
                    <input type="hidden" name="id_user" class="form-control" value="{{ Auth::user()->id }}">
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Description:</strong>

                    <input type="text" name="description" class="form-control" placeholder="Description">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Stock:</strong>

                    <input type="number" name="stock" class="form-control" placeholder="Stock">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>
    </form>

    <br>
    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>

        </div>

    @endif



    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($products as $product)
            @if($product->id_user == Auth::user()->id)
            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $product->name }}</td>

                <td>

                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">



                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show Detail</a>



                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>



                        @csrf

                        @method('DELETE')



                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>

                </td>

            </tr>
            @endif
        @endforeach

    </table>
    {{--{!! $products->links() !!}--}}
@endsection

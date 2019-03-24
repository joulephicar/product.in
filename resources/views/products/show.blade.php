@extends('products.layout')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <br>
                <h2> Show Product</h2>

            </div>

            <div class="pull-right">

                <br>
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>

            </div>

        </div>

    </div>



    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $product->name }}

            </div>

            <div class="form-group">

                <strong>Description:</strong>

                {{ $product->description }}

            </div>

            <div class="form-group">

                <strong>Stock:</strong>

                {{ $product->stock}}

            </div>

            <example-component></example-component>


        </div>

    </div>

@endsection


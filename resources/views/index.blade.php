@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-left"> <br>
                <h2 style="color:#004d00;font-weight:bold;">Products</h2>
                <br>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ url('create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $product->image }}" width="100px"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <form action="{{ route('destroy',$product->id) }}" method="POST">
      
                    <a class="btn btn-info" href="{{ route('show',$product->id) }}">Show</a>
       
                    <a class="btn btn-primary" href="{{ route('edit',$product->id) }}">Edit</a>
      
                    @csrf
                    @method('DELETE')
         
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
     
    {!! $products->links() !!}
 
@endsection
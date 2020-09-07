@extends('backendtemplate')


@section('content')
	<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Brand Detail List</h1>
            <div class="text-right">
            	<a href="{{route('items.index')}}"  class="btn btn-success">
            		Go Back
            	</a>
            </div>
          </div>

          <!-- Content Row -->
        <div class="container">
         	<div class="row pt-5">
         		<div class="col-md-6">
                    <img src="{{asset($brand->photo)}}" width="300px" height="250px">
                </div>
                <div class="col-md-6">
                    <p>brand Name: &nbsp; &nbsp; &nbsp;{{$brand->name}}</p>
                   {{--  <p>brand Price:  &nbsp; &nbsp; &nbsp;{{$brand->price}}</p>
                    <p>brand CodeNumber:  &nbsp; &nbsp; &nbsp;{{$brand->codeno}}</p>
                    <p>brand Discount:  &nbsp; &nbsp; &nbsp;{{$brand->discount}}</p>
                    <p>brand Description:  &nbsp; &nbsp; &nbsp;{{$brand->description}}</p>
                    <p>SubCategory Name:  &nbsp; &nbsp; &nbsp;{{$item->subcategory->name}}</p>
                    <p>Brand Name:  &nbsp; &nbsp; &nbsp;{{$item->brand->name}}</p> --}}
                </div>
         	</div>
        </div>
        <!-- /.container-fluid -->
	</div>
@endsection 
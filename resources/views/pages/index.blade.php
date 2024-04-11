@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Inventory Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('inventory_items.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="ProductName">
                        </div>
                        <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="Quantity">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Price</label>
                            <input type="text" class="form-control" name="Price">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Add Item">
                        </div>

                    </div>
                </form>
            </div>

                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($inventory_items as $key => $item)

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $item->ProductName }}</td>
                            <td scope="col">{{ $item->Quantity }}</td>
                            <td scope="col">{{ $item->Price }}</td>
                            <td scope="col">

                            <a href="{{  route('inventory_items.edit', $item->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>

                            <form action="{{ route('inventory_items.destroy', $item->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>

                          </tr>

                        @endforeach




                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background-color:#FFFF00;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush
<a href="{{ route('inventory.index', ['sort_by' => 'name', 'sort_order' => 'asc']) }}">Sort by Name (ASC)</a>
<a href="{{ route('inventory.index', ['sort_by' => 'price', 'sort_order' => 'desc']) }}">Sort by Price (DESC)</a>

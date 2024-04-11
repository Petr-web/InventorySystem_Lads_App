@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Inventory Item Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('inventory_items.update', $inventoryItem->id) }}">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Item Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $inventoryItem->name }}">
                        </div>
                        <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $inventoryItem->quantity }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $inventoryItem->price }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update Item">
                        </div>
                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
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

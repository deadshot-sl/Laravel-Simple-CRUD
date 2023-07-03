@extends('layouts.app')
@section('content')
    <main class="container">
        <section>
            <div class="titlebar">
                <h1>Products</h1>
                <a href="{{ route('products.create') }}" class="btn-link">Add Product</a>
            </div>
            @if ($message = Session::get('success'))
                <ul>
                    <li>{{ $message }}</li>
                </ul>
            @endif
            <div class="table">
                <div class="table-filter">
                    <div>
                        <ul class="table-filter-list">
                            <li>
                                <p class="table-filter-link link-active">All</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{ route('products.index') }}" accept-charset="UTF-8" role="search" method="GET"
                    accept.charset="UTF-8">
                    <div class="table-search">
                        <div>
                            <button class="search-select">
                                Search Product
                            </button>
                            <span class="search-select-arrow">
                                <i class="fas fa-caret-down"></i>
                            </span>
                        </div>
                        <div class="relative">
                            <input class="search-input" type="text" name="search" placeholder="Search product..."
                                value="{{ request('search') }}">
                        </div>
                    </div>
                </form>
                <div class="table-product-head">
                    <p>Image</p>
                    <p>Name</p>
                    <p>Category</p>
                    <p>Inventory</p>
                    <p>Actions</p>
                </div>
                <div class="table-product-body">
                    @if ($products->count() > 0)
                        @foreach ($products as $product)
                            <img src="{{ asset('images/' . $product->image) }}" />
                            <p> {{ $product->name }}</p>
                            <p>{{ $product->category }}</p>
                            <p>{{ $product->quantity }}</p>
                            <div>
                                <button class="btn btn-success">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <p>No product found</p>
                    @endif
                </div>
                <div class="table-paginate">
                    {{ $products->links('layouts.pagination') }}

                </div>
            </div>
        </section>
    </main>
@endsection

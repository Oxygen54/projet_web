@section('title', 'BDE - Shop')
@extends('layouts.header')
@section('content')

    <div class="flex-center" style="margin-bottom: 15px; margin-top: -10px;">

        <a href="" class="btn btn-outline-success btn-md add_product" style="margin-right: 5px;">Add
            a product</a>
        <a href="" class="btn btn-outline-danger btn-md" style="margin-right: 5px;">Delete product</a>
        <a href="{{ route('shop.category') }}" class="btn btn-outline-warning btn-md" style="margin-right: 5px;">Filter
            by category</a>
        <a href="{{ route('shop.shoppingCart')}}" class="btn btn-outline-info btn-md">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
            <span class="badge badge-danger"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} </span>
        </a>
    </div>
    @if(Session::has('success'))
        <div class="row">
            <div class="col-md-4 col-md-4"></div>
            <div id="charge-message" class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
        </div>
        </div>
    @endif

    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="card" style="text-align: center;margin-left: 15px;margin-right: 15px;">
                            <div class="card-body">
                                <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                                <h3>{{ $product->title }}</h3>
                                <p class="description"> {{ $product->description }} </p>
                                <div class="clearfix">
                                    <div class="pull-left price">{{ $product->price }}€</div>
                                    <a href="{{ route('shop.addToCart', ['id' => $product->id])}}"
                                       class="btn btn-outline-success pull-right"
                                       style="margin-top: 10px;margin-bottom: -5px;"
                                       role="button">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    @if (Route::has('login'))
        @auth
            <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add a product</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="title" style="text-align: left;">Product title</label>
                                    <input type="text" name="title" id="title" placeholder="The coutchi bag" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label for="price">Product price</label>
                                    <input type="text" name="price" id="price" placeholder="$100" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Product description</label>
                                    <textarea name="description" id="description" rows="5" placeholder="The best bag in the world!" class="form-control"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imagePath">Image's url of the Product</label>
                                    <input type="text" name="imagePath" id="imagePath" placeholder="http://www.bde.fr/image.jpg" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="catproducts_id">Product categorie</label>
                                    <select id="catproducts_id" name="catproducts_id" class="form-control">
                                        <option value="1">Textile</option>
                                        <option value="2">Cup</option>
                                        <option value="3">Bag</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">Close
                            </button>
                            <button type="button" class="btn btn-outline-success"
                                    id="modal-save">Add product
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- EVENT BOX -->
        @else
        @endauth
    @endif
    <script src="{{ asset('/js/add_product.js') }}"></script>
    <script type="text/javascript">
        var urlAdd = '{{ route('shop.add-product') }}';
    </script>
@endsection

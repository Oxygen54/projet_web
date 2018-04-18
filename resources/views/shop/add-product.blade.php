@section('title', 'Shop - Add a product')
@extends('layouts.header')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card" style="text-align: center;margin-left: 15px;margin-right: 15px;">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <label for="title" style="text-align: left;">Product title</label>
                            <input type="text" name="title" placeholder="Product title" class="form-control"/>
                            <label for="price">Product price</label>
                            <input type="text" name="price" placeholder="Product price" class="form-control"/>

                            <label for="description">Product description</label>
                            <textarea name="description" rows="10" cols="50"
                                         placeholder="Product description" class="form-control"> </textarea>

                            <label for="imagePath">image's Url of Product</label>
                            <input type="text" name="imagePath" placeholder="http://www.bde.fr/image.jpg" class="form-control"/>

                            <label for="catproducts_id">Product categorie</label>
                            <select id="catproducts_id" name="catproducts_id" class="form-control">
                                <option value="1">Textile</option>
                                <option value="2">Cup</option>
                                <option value="3">Bag</option>
                            </select>
                            <br><br>
                            <button type="submit" class="btn btn-outline-success btn-md">Add product</button>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

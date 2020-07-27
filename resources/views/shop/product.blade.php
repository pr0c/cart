@extends('shop.base')
@section('stylesheets')
    <style>
        .content {
            padding: 25px;
        }

        .product-info {
            display: flex;
            flex-direction: row;
            padding: 15px;
        }

        .product-info .info {
            padding-left: 25px;
        }

        .product-info .image img {
            width: 20vw;
        }

        .comments {
            margin-top: 15px;
            width: 70%;
            max-height: 400px;
            overflow-y: auto;
            padding: 15px;
        }

        .comments .card {
            padding: 15px;
            margin-top: 10px;
        }

        .new-comment {
            margin-top: 5px;
            padding: 10px;
            width: 70%;
        }

        .new-comment form {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .new-comment form .msg {
            width: 40%;
        }

        .new-comment form input {
            width: 100%;
        }

        .new-comment form .msg {
            width: 100%;
        }

        .new-comment form textarea {
            padding-right: 100px;
            padding-left: 5px;
            resize: none;
            width: 100%;
        }

        .new-comment .send {
            position: absolute;
            right: 2vw;
        }

        .comment {
            display: flex;
            flex-direction: column;
        }

        .comment .info {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-weight: 600;
            opacity: .7;
            font-size: .9rem;
            padding-bottom: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="card product-info">
        <div class="image">
            <img src="{{ asset('images/products/' . $product->image) }}" alt="product image">
        </div>
        <div class="info">
            <div class="cost">Cost: ${{ $product->cost }}</div>
            <div class="description">Description: {{ $product->description }}</div>
        </div>
    </div>
    <div class="card comments">
        @foreach($product->comments as $comment)
            @include('shop._partial.comment', ['comment' => $comment])
        @endforeach
    </div>
    <div class="card new-comment">
        <form id="new-comment">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="msg">
                <textarea name="text" rows="3"></textarea>
            </div>
            <div class="send">
                <button id="send-comment" class="btn btn-light">Send</button>
            </div>
        </form>
    </div>
@endsection

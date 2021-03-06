@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            @foreach($stocks as $stock)
            @section('title', $stock->name)
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">
                {{$stock->name}}</h1>
            @endforeach

            @include('layouts.searchform')

            @foreach($stocks as $stock)
            <p class="text-center">{{ session('message') ?? '' }}</p>
            <div class="row">
                <div class="col-sm-8">
                    <img src="/image/{{$stock->path}}" alt="" class="ditail_image">
                </div>
                <div class="col-sm-4">
                    <form style="display:inline-block;" action="/favorite"artComposer method="post">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <button class="btn btn-outline-secondary"><i class="far fa-heart">お気に入りに保存</i></button>
                    </form>

                    <form style="display:inline-block;" action="/favorite"artComposer method="post">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <button class="btn btn-outline-secondary"><i class="far fa-heart">サンプルダウンロード</i></button>
                    </form>

                    <form action="/mycart" method="post">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <button class="btn btn-warning cart_button btn-lg btn-primary btn-lg btn-block"><i
                                class="fas fa-cart-arrow-down">カートに追加</i></button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
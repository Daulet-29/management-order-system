@extends('home')
@section('content')

    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <div class="container">
            <section class="cart-section section-b-space">
                        <div class="container">
                            @if($products->Count() > 0)
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <table class="table cart-table">
                                            <thead>
                                            <tr class="table-head">
                                                <th scope="col">ID товара</th>
                                                <th scope="col">Наименование товара</th>
                                                <th scope="col">Цена</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td><h4>{{$item->id}}</h4></td>
                                                    <td><h4>{{$item->name}}</h4></td>
                                                    <td><h4>{{$item->price}}</h4></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                            @endif
                        </div>
                    </section>
        </div>
    </section>
@endsection

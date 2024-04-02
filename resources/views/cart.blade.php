@extends('home')
@section('content')

    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="cart-tab" data-bs-toggle="tab" data-bs-target="#cart" type="button" role="tab" aria-controls="cart" aria-selected="true">Корзина</button>
                </li>
{{--                <li class="nav-item" role="presentation">--}}
{{--                    <button class="nav-link" id="purchased-tab" data-bs-toggle="tab" data-bs-target="#purchased" type="button" role="tab" aria-controls="purchased" aria-selected="false">Купленные</button>--}}
{{--                </li>--}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="cart" role="tabpanel" aria-labelledby="cart-tab">
                    <section class="cart-section section-b-space">
                        <div class="container">
                            @if($cartItems->Count() > 0)
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <table class="table cart-table">
                                            <thead>
                                            <tr class="table-head">
                                                <th scope="col">Наименование товара</th>
                                                <th scope="col">Количество</th>
                                                <th scope="col">Цена</th>
                                                <th scope="col">Сумма</th>
                                                <th scope="col">Статус</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($cartItems as $item)
                                                <tr>
                                                    <td><h4>{{$item->product->name}}</h4></td>
                                                    <td><h4>{{$item->quantity}}</h4></td>
                                                    <td><h4>${{$item->product->price}}</h4></td>
                                                    <td><h4>${{$item->sum}}</h4></td>
                                                    <td><h4>{{$item->status}}</h4></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="cart-checkout-section">
                                        <div class="row g-4 justify-content-end">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="checkout-button text-end">
                                                    <button class="btn btn-solid-default btn fw-bold">
                                                        Купить<i class="fas fa-arrow-right ms-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                            @endif
                        </div>
                    </section>
                </div>
{{--                <div class="tab-pane fade" id="purchased" role="tabpanel" aria-labelledby="purchased-tab">--}}
{{--                    <section class="purchased-section section-b-space">--}}
{{--                        <div class="container">--}}
{{--                            @if($purchasedItems->Count() > 0)--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12 text-center">--}}
{{--                                        <table class="table purchased-table">--}}
{{--                                            <thead>--}}
{{--                                            <tr class="table-head">--}}
{{--                                                <th scope="col">Наименование товара</th>--}}
{{--                                                <th scope="col">Количество</th>--}}
{{--                                                <th scope="col">Цена</th>--}}
{{--                                                <th scope="col">Сумма</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            @foreach ($purchasedItems as $item)--}}
{{--                                                <tr>--}}
{{--                                                    <td><h4>{{$item->product->name}}</h4></td>--}}
{{--                                                    <td><h4>{{$item->quantity}}</h4></td>--}}
{{--                                                    <td><h4>${{$item->product->price}}</h4></td>--}}
{{--                                                    <td><h4>${{$item->sum}}</h4></td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @else--}}
{{--                                <p>Нет купленных товаров</p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cartTab = document.getElementById('cart-tab');
        // var purchasedTab = document.getElementById('purchased-tab');
        var cartContent = document.getElementById('cart');
        var purchasedContent = document.getElementById('purchased');

        cartTab.addEventListener('click', function() {
            // Показываем контент корзины и скрываем контент купленных товаров
            cartContent.classList.add('show', 'active');
            purchasedContent.classList.remove('show', 'active');
        });
        //
        // purchasedTab.addEventListener('click', function() {
        //     // Показываем контент купленных товаров и скрываем контент корзины
        //     purchasedContent.classList.add('show', 'active');
        //     cartContent.classList.remove('show', 'active');
        // });

        var checkoutButton = document.querySelector('.checkout-button button');

        if (checkoutButton) {
            checkoutButton.addEventListener('click', function() {
                var requestData = {
                    // Ваши данные для отправки на сервер
                };

                fetch('URL_вашего_API', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(requestData),
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        // Обработка успешного ответа от сервера
                        // Обновление cartItems после успешного сохранения
                        // Например, обновление данных с помощью получения новых данных от сервера
                    })
                    .catch(error => {
                        // Обработка ошибок при выполнении запроса
                    });
            });
        }
    });
</script>

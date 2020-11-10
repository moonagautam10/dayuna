@extends('site.template')
@section('content')
	<div class="banner-wrapper has_background">
    <img src="{{ asset('site/assets/images/banner-for-all2.jpg') }}"
         class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title">Dashboard</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="index-2.html"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Dashboard</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<main class="site-main  main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="dayuna">
                        <nav class="dayuna-MyAccount-navigation">
                            <ul>
                                <li class="dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--orders">
                                    <a href="{{route('getUserOrder')}}">Orders</a>
                                </li>
                               
                                <li class="dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--edit-address">
                                    <a href="">Profile</a>
                                </li>
                                <li class="dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--edit-account">
                                    <a href="">Shipping Address</a>
                                </li>
                                <li class="dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--customer-logout">
                                    <a href="">Logout</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="dayuna-MyAccount-content">
                            <div class="dayuna-notices-wrapper"></div>
                            <table class="dayuna-orders-table dayuna-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                                <thead>
                                <tr>
                                    <th class="dayuna-orders-table__header dayuna-orders-table__header-order-number"><span class="nobr">Order</span></th>
                                    <th class="dayuna-orders-table__header dayuna-orders-table__header-order-date"><span class="nobr">Date</span></th>
                                    <th class="dayuna-orders-table__header dayuna-orders-table__header-order-status"><span class="nobr">Status</span></th>
                                    <th class="dayuna-orders-table__header dayuna-orders-table__header-order-total"><span class="nobr">Total</span></th>
                                    <th class="dayuna-orders-table__header dayuna-orders-table__header-order-actions"><span class="nobr">Actions</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <?php $getitems = App\Models\Cart::where('cart_code', $order->cartcode)->get(); ?>
                                <tr class="dayuna-orders-table__row dayuna-orders-table__row--status-on-hold order">
                                    <td class="dayuna-orders-table__cell dayuna-orders-table__cell-order-number" data-title="Order">
                                        <a href="#"># {{$order->cartcode}}</a>
                                    </td>
                                    <td class="dayuna-orders-table__cell dayuna-orders-table__cell-order-date" data-title="Date">
                                        <time>{{$order->created_at->format('d, M Y')}}</time>
                                    </td>
                                    <td class="dayuna-orders-table__cell dayuna-orders-table__cell-order-status" data-title="Status">
                                        On hold
                                    </td>
                                    <td class="dayuna-orders-table__cell dayuna-orders-table__cell-order-total" data-title="Total">
                                        <span class="dayuna-Price-amount amount"><span class="dayuna-Price-currencySymbol">RM </span>{{$order->totalcost}}</span> for {{$getitems->count()}} items
                                    </td>
                                    <td class="dayuna-orders-table__cell dayuna-orders-table__cell-order-actions" data-title="Actions">
                                        <a href="#" class="dayuna-button button view">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>IQUICK</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Invoice</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Invoice Id : <span class="gray-color">{{$order->code}}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Invoice Date : <span class="gray-color">{{$order->created_at}}</span></p>
        </div>
        <div class="w-50 float-left logo mt-10">
            <img src="https://www.nicesnippets.com/image/imgpsh_fullsize.png"> <span>IQUICK</span>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Payment Method</th>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th>#</th>
                <th>@lang('admin.code')</th>
                <th>@lang('admin.name')</th>
                <th>@lang('admin.total_price')</th>
                <th>@lang('admin.type_order')</th>
                <th>@lang('admin.order')</th>
            </tr>
            <tr align="center">
                <td>1</td>
                <td>{{ $order->code }}</td>
                <td>{{ $order->user->firstname.' '.$order->user->lastname }}</td>
                <td>{{ $order->total_price }} $</td>
                <td>
                    @if ($order->type_order == 'service')
                    @lang('admin.services')
                    @else
                    @lang('admin.packages')
                    @endif
                </td>
                <td>
                    @if ($order->type_order == 'service')
                    {{ $order->service->name }}
                    @else
                    {{ $order->package->name }}
                    @endif
                </td>
            </tr>
        </table>
    </div>

</html>

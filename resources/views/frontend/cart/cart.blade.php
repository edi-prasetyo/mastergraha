@extends('layouts.app')
@section('title', 'Cart')
@section('content')
@include('layouts.inc.frontend.header')
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="row">

                <div class="col-md-8">
                    <div class="p-3 mb-3">
                        <div class="table-responsive">
                            <div class="card">
                                <table id="cart" class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th style="width:50%">Product</th>
                                            <th style="width:22%" class="text-center">Subtotal</th>
                                            <th style="width:10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * 1 @endphp
                                        <tr data-id="{{ $id }}">
                                            <td data-th="Product">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <img class="img-fluid" src="{{$details['photo']}}">
                                                        <input type="hidden" value="1"
                                                            class="form-control quantity update-cart" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                      
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Subtotal" class="text-center">IDR {{
                                                number_format($details['price']) }}
                                            </td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-link text-danger remove-from-cart"><i
                                                        class='bx bx-trash'></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 mb-3">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <a href="{{ url('/') }}" class="btn btn-warning text-start"><i class='bx bx-cart'></i>
                                Continue Shopping</a>


                            <h3>Total Rp. {{ number_format($total) }}</h3>

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="border rounded p-3 mb-3 bg-white">
                        <h6>Pembayaran</h6>
                        <hr class="mx-n3">
                        <div class="form-check custom-option custom-option-basic  rounded">
                            <label class="form-check-label custom-option-content" for="payment1">
                                <input name="payment" class="form-check-input" type="radio" value="" id="payment1"
                                    checked="">
                                <span class="custom-option-header">
                                    <div class="fw-semibold">Transfer</div>
                                </span>
                                <span class="custom-option-body">
                                    <small>Metode Pembayaran Transfer bank, di cek secara manual, dengan
                                        menunjukan bukti transfer di halaman berikutnya</small>
                                </span>
                            </label>
                        </div>


                        <div class="d-grid gap-2 mx-auto mt-3">
                            <a class="btn btn-primary" href="{{url('checkout')}}">Checkout</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection








{{-- @section('scripts')
<script type="text/javascript">
    $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
</script>
@endsection --}}
@extends('layouts.app')
@section('title', 'Graha Studio')
@include('layouts.inc.frontend.header')
@section('content')

<div class="container py-5">

    {{-- @php $date = date('Y-m-d');
    $newDate = date('Y-m-d', strtotime($date. ' + 6 months'));
    echo $newDate;
    @endphp --}}

    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="my-3">Cari Nama Domain Untuk Website Anda</h4>
                <form action="{{url('subscription/order/'.$website->uuid)}}" method="GET">
                    @csrf

                    <div id="domain-search-input">
                        <div class="input-group">
                            <input type="text" class="form-control" name="domain_name" placeholder="Domain Name"
                                required>
                            <select name="suffix" class="btn btn-warning">
                                <option value=".com">.com</option>
                                <option value=".net">.net</option>
                                <option value=".org">.org</option>
                                <option value=".biz">.biz</option>
                                <option value=".info">.info</option>
                                <option value=".id">.id</option>
                                <option value=".co.id">.co.id</option>
                            </select>
                            <input type="submit" class="btn btn-primary" name="check" value="Check">
                        </div>
                    </div>
                </form>

                @if(isset($_GET['check']))

                @if (!empty($_GET['domain_name']))
                <?php $name_domain = trim($_GET['domain_name']).$_GET['suffix'];?>

                @if ( gethostbyname($name_domain) != $name_domain )
                <span class='text-danger'>Domain <b>{{$name_domain}}</b> telah digunakan, silahkan cari nama
                    atau gunakan extensi lain.</span>

                {{-- <form action="{{url('orders')}}" method="POST">
                    @csrf
                    <input type="hidden" name="website_id" value="{{$website->id}}">

                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="product_name" value="{{$product->name}}">

                    <input type="hidden" name="domain_name" value="{{$name_domain}}">
                    <input type="hidden" name="customer_name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="customer_email" value="{{ Auth::user()->email }}">
                    <input type="hidden" name="customer_whatsapp" value="{{ Auth::user()->phone }}">
                    <input type="hidden" name="discount" value="0">
                    <input type="hidden" name="amount" value="{{$website->price}}">
                    <input type="hidden" name="payment_type" value="transfer">
                    <input type="hidden" name="payment_status" value="0">
                    <input type="hidden" name="status" value="0">

                    <input type="hidden" name="website_name" value="{{$website->name}}">

                    <div class="alert alert-success my-3">
                        <h6> Harga Paket :</h6>
                        <span class="fs-2">Rp. {{number_format($website->price)}}</span>
                        <span>/{{$website->period}}</span>
                    </div>

                    <div class="form-group">
                        <label>Pilih Lama Kontrak</label>
                        <select class="form-select" aria-label="Default select example" name="tot_pin_requested"
                            onchange="calculateAmount(this.value)" required>
                            <option value="">Pilih Lama Kontrak</option>
                            <option value="6">6 Bulan</option>
                            <option value="12">12 Bulan</option>
                            <option value="24">24 Bulan</option>
                        </select>
                    </div>

                    <div class="my-3">
                        <h6> Total Harga :</h6>
                        Rp. <input class="form-control-lg border-0" name="tot_amount" id="tot_amount" type="text"
                            readonly>
                    </div>

                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Proses Order</button>
                    </div>

                </form> --}}
                @else
                <span class='text-success'>Domain <b>{{$name_domain}}</b> Tersedia, Lanjutkan untuk order.</span>


                <form action="{{url('orders')}}" method="POST">
                    @csrf
                    <input type="hidden" name="website_id" value="{{$website->id}}">

                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="product_name" value="{{$product->name}}">

                    <input type="hidden" name="domain_name" value="{{$name_domain}}">
                    <input type="hidden" name="customer_name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="customer_email" value="{{ Auth::user()->email }}">
                    <input type="hidden" name="customer_whatsapp" value="{{ Auth::user()->phone }}">
                    <input type="hidden" name="discount" value="0">
                    <input type="hidden" name="amount" value="{{$website->price}}">
                    <input type="hidden" name="payment_type" value="transfer">
                    <input type="hidden" name="payment_status" value="0">
                    <input type="hidden" name="status" value="0">

                    <input type="hidden" name="website_name" value="{{$website->name}}">

                    <div class="alert alert-success my-3">
                        <h6> Harga Paket :</h6>
                        <span class="fs-2">Rp. {{number_format($website->price)}}</span>
                        <span>/{{$website->period}}</span>
                    </div>

                    <div class="form-group">
                        <label>Pilih Lama Kontrak</label>
                        <select class="form-select" aria-label="Default select example" name="tot_pin_requested"
                            onchange="calculateAmount(this.value)" required>
                            <option value="">Pilih Lama Kontrak</option>
                            <option value="6">6 Bulan</option>
                            <option value="12">12 Bulan</option>
                            <option value="24">24 Bulan</option>
                        </select>
                    </div>

                    <div class="my-3">
                        <h6> Total Harga :</h6>
                        Rp. <input class="form-control-lg border-0" name="tot_amount" id="tot_amount" type="text"
                            readonly>
                    </div>

                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Proses Order</button>
                    </div>

                </form>


                @endif

                @endif

                @else
                {{-- <h4 style='color:red;'>Error: Masukan Nama Domain.</h4> --}}

                @endif



            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function calculateAmount(val) {  
        var price = {{$website->price}};
        var tot_price = val * price;  
        var divobj = document.getElementById('tot_amount');  
        
        divobj.value = tot_price.toLocaleString();  
        
    }  
</script>
@endsection
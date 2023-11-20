{{-- <form action="{{url('helps/search')}}" method="GET">
    @csrf
    <input type="text" name="search" placeholder="Cari Pegawai .." value="{{ old('search') }}">
    <input type="submit" value="CARI">
</form> --}}
<form action="{{url('helps/search')}}" method="GET">
    @csrf
    <div class="input-group mb-4 border rounded-pill p-1 bg-light">

        <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon3"
            class="form-control bg-transparent border-0" name="search" value="{{ old('search') }}">
        <div class="input-group-append border-0">
            <button id="button-addon3" type="submit" class="btn btn-link text-muted"><i
                    class='bx bx-search fs-5'></i></button>
        </div>

    </div>
</form>

<div class="alert alert-primary text-center">
    Apabila Anda mengalami kendala, silakan hubungi kami melalui Pusat Bantuan atau email cs@grahastudio.com atau
    hubungi Call
    Center di {{$option_nav->whatsapp}}.
</div>
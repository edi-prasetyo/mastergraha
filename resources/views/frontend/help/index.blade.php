@extends('layouts.app')
@include('layouts.inc.frontend.header')
@section('title', 'Product Aplikasi Web')
@section('content')

<div class="container my-5 col-md-8 mx-auto">
    {{-- @foreach($helps as $help)
    <ul id="list">
        {{$help->name}}
        @foreach($helpItems as $item)
        @if($item->help_id == $help->id)
        <li class="list_item {{$item->title}}">
            {{$item->title}}
        </li>
        @endif
        @endforeach
    </ul>
    @endforeach --}}






    @include('frontend.help.searchbar')


    <div class="accordion" id="accordionExample">

        @foreach($helps as $help)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne{{$help->id}}" aria-expanded="true" aria-controls="collapseOne">
                    <i class='bx bx-food-menu fs-5 me-3'></i>
                    <div class="border-start"></div> {{$help->name}}
                </button>
            </h2>

            <div id="collapseOne{{$help->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="list-group list-group-flush">
                        @foreach($helpItems as $item)

                        @if($item->help_id == $help->id)

                        <li class="list-group-item {{$item->title}}">
                            <i class='bx bx-right-arrow-alt fs-5 me-2'></i> <a href="{{url('helps/'.$item->slug)}}"
                                class="text-decoration-none text-muted">
                                {{$item->title}} </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach



    </div>

</div>
@endsection
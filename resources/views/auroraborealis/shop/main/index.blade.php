@extends(env('THEME').'.layouts.app')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('slider')
    {!! $sliders !!}
@endsection

@section('newDishes')
    {!! $newDishesContentBlock !!}
@endsection

@section('menu')
    {!! $menuContentBlock !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection

@extends('datatables.html.template')

@section('demo')
    {!! $html->table() !!}
@endsection

@section('controller')
@include('datatables.html.docs.basic-controller')
@endsection

@section('view')
@include('datatables.html.docs.view')
@stop

@section('scripts')
    {!! $html->scripts() !!}
@endsection

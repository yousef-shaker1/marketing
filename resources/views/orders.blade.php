@extends('layout.master')
@section('css')

    @livewireStyles
@endsection

@section('title')
    الاوردرات 
@endsection

@section('content')

@livewire('orders')

    @livewireScripts
@endsection

@section('js')

<script>
  window.addEventListener('close-modal', event => {
      $('#addOrderModal').modal('hide');
      $('#updateOrderModal').modal('hide');
      $('#deleteOrderModal').modal('hide');
  });
</script>
@endsection

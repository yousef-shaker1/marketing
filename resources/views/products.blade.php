@extends('layout.master')
@section('css')

    @livewireStyles
@endsection

@section('title')
    الجروبات 
@endsection

@section('content')
        @livewire('products')
    {{-- </div>
    </div> --}}
    @livewireScripts
@endsection

@section('js')

<script>
  window.addEventListener('close-modal', event => {
      $('#addProductModal').modal('hide');
      $('#updateProductModal').modal('hide');
      $('#deleteProductModal').modal('hide');
  });
</script>
@endsection

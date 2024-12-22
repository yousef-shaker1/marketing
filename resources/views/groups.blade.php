@extends('layout.master')
@section('css')

    @livewireStyles
@endsection

@section('title')
    الجروبات 
@endsection

@section('content')
        @livewire('groups')
    {{-- </div>
    </div> --}}
    @livewireScripts
@endsection

@section('js')

<script>
  window.addEventListener('close-modal', event => {
      $('#addGroupModal').modal('hide');
      $('#updateGroupModal').modal('hide');
      $('#deleteGroupModal').modal('hide');
  });
</script>
@endsection

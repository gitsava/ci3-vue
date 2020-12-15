@extends('layouts.base')

@push('css')
<style type="text/css">

</style>
@endpush

@section('content')
<div class="container-fluid">
	<form>
		@include ('wilayah.form')
	</form>
</div>
@endsection

@push('js')
<script>
window.addEventListener('DOMContentLoaded', function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $(function () {
        $('#kecamatan').on('change', function () {
            $.ajax({
                url: '{{ route('wilayah.store') }}',
                method: 'POST',
                data: {id: $(this).val()},
                success: function (response) {
                    $('#kelurahan').empty();

                    $.each(response, function (id, name) {
                        $('#kelurahan').append(new Option(name, id))
                    })
                }
            })
        });
    });
});
</script>
@endpush
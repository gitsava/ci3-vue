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
$(function () {
    $('#kecamatan').on('change', function () {
        axios.post('{{ route('wilayah.store') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kelurahan').empty();

                $.each(response.data, function (id, name) {
                    $('#kelurahan').append(new Option(name, id))
                })
            });
    });
});
</script>
@endpush
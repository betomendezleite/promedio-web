@if ($data)
@foreach ($data['data'] as $subscription)
<p>ID: {{ $subscription['id'] }}</p>
<p>Name: {{ $subscription['name'] }}</p>
<p>Name: {{ $subscription['price'] }}</p>
{{-- Agregar más campos según sea necesario --}}
@endforeach
@else
<p>No se pudieron obtener los datos de la API.</p>
@endif
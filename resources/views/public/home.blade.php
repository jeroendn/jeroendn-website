@extends('app')

@section('content')
<div class="container mb-5">
  <h2>Welkom op mijn portfolio site!</h2>
  <p>Mijn naam is Jeroen de Nijs ({{ date_diff(date_create('2001-07-02'), date_create('today'))->y }} jaar). Ik ben momenteel 3de jaars student Applicatie & Media-ontwikkelaar op het Technova College in Ede en focus mij voornamelijk op gebied van webdevelopment.</p>
</div>

<div class="container">
  <h2>Schoolprojecten</h2>
  <p>Ga naar <a href="{{ route('projects') }}">{{ route('projects') }}</a> om mijn projecten te bekijken.</p>
</div>
@endsection

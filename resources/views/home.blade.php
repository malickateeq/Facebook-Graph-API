@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Facobook Graph APIs</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b> Facebook App ID: </b> {{ $data['id'] }} <br>
                    <b> FB Full Name: </b> {{ $data['first_name'] }} {{ $data['last_name'] }} <br>
                    <b> FB Email: </b> {{ $data['email'] }}  <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // $('*').hide();
</script>
@endsection

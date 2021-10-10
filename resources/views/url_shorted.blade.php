@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Your shorted url
                    <a class="btn btn-primary pull-right" href="{{ route('home') }}">{{ __('Shorted New One') }}</a>
                </div>
                
                <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Your Real URL:') }}</label>
                                <a href="{{ url('/url_short/'.$url->short) }}" target="_blank">{{ $url->url }}</a>
                               
                            </div>
                            <div class="col-md-12">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Your Shorted URL:') }}</label>
                                <a href="{{ url('/url_short/'.$url->short) }}" target="_blank">{{ $url->short }}</a>
                               
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

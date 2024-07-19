@extends('errors::bootstrap')


@if(Request::url() === 'https://beta.digitizedmedievalmanuscripts.org/')
    @section('title', __('Service Unavailable'))
    @section('code', '503')
    @section('message', __('The DMMapp beta environment is currently closed'))
    @section('latin-message', __('extra omnes'))
    @section('translation', __('outside, all of you'))
    @section('source', __('It is issued by the Master of the Papal Liturgical Celebrations before a session of the papal conclave which will elect a new pope'))

    @section('button')
        <a href="https://digitizedmedievalmanuscripts.org" type="button" class="btn btn-primary">Go home</a>
    @endsection

@else

    @section('title', __('Service Unavailable'))
    @section('code', '503')
    @section('message', __('The DMMapp is unavailable while we perform maintenance and upgrades'))
    @section('latin-message', __('extra omnes'))
    @section('translation', __('outside, all of you'))
    @section('source', __('It is issued by the Master of the Papal Liturgical Celebrations before a session of the papal conclave which will elect a new pope'))

    @section('status')
        <a href="https://dmmapp.statuspage.io/" target="_blank" type="button" class="btn btn-primary">Check the DMMapp status</a>
    @endsection

    @section('button')
        <button class="btn btn-primary" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        </button>
    @endsection
@endif


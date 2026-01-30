@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Contact Us</div>

                    <div class="card-body">
                        <div class="mb-4">
                            <p>We're passionate about connecting people with the beauty of medieval manuscripts — and
                                always working to make DMMapp better. If you have feedback, ideas, or questions, we'd be
                                happy to hear from you. Just drop us a message. We're listening!</p>

                            <p>Use the form below to get in touch, and we'll get back to you as soon as we can!</p>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            {{-- Honeypot field: invisible to humans, likely filled by bots --}}
                            <div style="display:none !important; position:absolute; left:-9999px;">
                                <label for="website">Website</label>
                                <input type="text" name="website" id="website" tabindex="-1" autocomplete="off"/>
                            </div>
                            {{-- Timestamp field for time-based spam protection --}}
                            <input type="hidden" name="form_timestamp" value="{{ time() }}"/>

                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>
                                <div class="col-md-6">
                                    <input id="subject" type="text"
                                           class="form-control @error('subject') is-invalid @enderror" name="subject"
                                           value="{{ old('subject') }}" required>
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>
                                <div class="col-md-6">
                                    <textarea id="message" class="form-control @error('message') is-invalid @enderror"
                                              name="message" required rows="6">{{ old('message') }}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

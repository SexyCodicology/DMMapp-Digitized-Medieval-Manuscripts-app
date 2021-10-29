@extends('layouts.app')
@section('css')
@endsection
@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li>Admin</li>
                <li>Edit</li>
            </ol>
            <h2>{{ $modify == 1 ? 'Update institution' : 'Add a new institution'}}</h2>
        </div>
    </section>

@endsection
@section('content')
        <form action="{{ $modify == 1 ? route('update_library', [ 'library_id' => $library_id ]) : route ('create_library')}}"
            method="post">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form>
                <div class="mb-3">
                    <label for="library" class="form-label">Institution</label>
                    <input name="library" type="text" class="form-control" id="library" placeholder="The British Library, The Getty Museum..."
                        value="{{ $library }}" required>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nation" class="form-label">Nation</label>
                    <input name="nation" type="text" class="form-control" id="nation" placeholder="Italy, France, Japan..."
                        value="{{ $nation }}" required>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input name="city" type="text" class="form-control" id="city" placeholder="Rome, Paris, Tokyo..."
                        value="{{ $city }}" required>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lat" class="form-label">Latitude</label>
                    <input name="lat" type="text" class="form-control" id="lat" placeholder="13.5723"
                        value="{{ $lat }}" required>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="lng" class="form-label">Longitude</label>
                    <input name="lng" type="text" class="form-control" id="lng" placeholder="123.2235"
                        value="{{ $lng }}" required>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <select name="quantity" class="form-select" id="quantity" required>
                        <option>{{$quantity}}</option>
                        <option>Unknown</option>
                        <option>Few ( < 10 digitized manuscripts)</option>
                        <option>Some (between 10 and 50 digitized manuscripts)</option>
                        <option>Many (Between 50 and 100 digitized manuscripts)</option>
                        <option>Hundreds (between 100 and 500 digitized manuscripts)</option>
                        <option>More than half-thousand digitized manuscripts (between 500 and 1000)</option>
                        <option>Thousands (more than 1000 digitized manuscripts)</option>
                    </select>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <select name="quantity" class="form-select" id="quantity" required>
                        <option>{{$quantity}}</option>
                        <option>Unknown</option>
                        <option>Few ( < 10 digitized manuscripts)</option>
                        <option>Some (between 10 and 50 digitized manuscripts)</option>
                        <option>Many (Between 50 and 100 digitized manuscripts)</option>
                        <option>Hundreds (between 100 and 500 digitized manuscripts)</option>
                        <option>More than half-thousand digitized manuscripts (between 500 and 1000)</option>
                        <option>Thousands (more than 1000 digitized manuscripts)</option>
                    </select>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <select name="quantity" class="form-select" id="quantity" required>
                        <option>{{$quantity}}</option>
                        <option>Unknown</option>
                        <option>Few ( < 10 digitized manuscripts)</option>
                        <option>Some (between 10 and 50 digitized manuscripts)</option>
                        <option>Many (Between 50 and 100 digitized manuscripts)</option>
                        <option>Hundreds (between 100 and 500 digitized manuscripts)</option>
                        <option>More than half-thousand digitized manuscripts (between 500 and 1000)</option>
                        <option>Thousands (more than 1000 digitized manuscripts)</option>
                    </select>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <select name="quantity" class="form-select" id="quantity" required>
                        <option value="1" @if (old('active') == 1) selected @endif>True</option>
                        <option value="0" @if (old('active') == 0) selected @endif>False</option>
                    </select>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input name="website" type="url" class="form-control" id="website" placeholder="https://..."
                        value="{{ $website }}" required>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="copyright" class="form-label">Copyright</label>
                    <input name="copyright" type="text" class="form-control" id="copyright" placeholder="CC-0, CC-BY-SA, etc."
                        value="{{ $copyright }}" required>
                    <div class="invalid-feedback">
                        Please fill in this field.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea name="notes" class="form-control" id="notes" rows="3" placeholder="Notes about this library..."
                        >{{ $notes }}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Update library <i class="fas fa-plus"></i></button>
                <a class="btn btn-danger pull-right" href="/admin">
                    Cancel <i class="fas fa-ban"></i></a>
            </form>
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function (form) {
                            form.addEventListener('submit', function (event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();

            </script>
@endsection
@section('javascript')
@endsection

@extends('layouts.app') 
@section('css')
@endsection
 
@section('content')
<!-- SECTION left column -->
<div class="col-12 col-lg-8">
    <div class="well">
        <h4>{{ $modify == 1 ? 'Update Library' : 'Add a new library'}}</h4>
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
            <div class="form-group">
                <label for="formControlInput1">Nation</label>
                <input name="nation" type="text" class="form-control" id="formControlInput1" placeholder="Italy, France, Japan..."
                    value="{{ $nation }}" required>
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlInput1">City</label>
                <input name="city" type="text" class="form-control" id="formControlInput1" placeholder="Rome, Paris, Tokyo..." value="{{ $city }}"
                    required>
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlInput1">Instituion</label>
                <input name="library" type="text" class="form-control" id="formControlInput1" placeholder="The British Library, The Getty Muesum..."
                    value="{{ $library }}" required>
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlInput1">Latitude</label>
                <input name="lat" type="text" class="form-control" id="formControlInput1" placeholder="13.5723" value="{{ $lat }}"
                    required>
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlInput1">Longitude</label>
                <input name="lng" type="text" class="form-control" id="formControlInput1" placeholder="123.2235" value="{{ $lng }}"
                    required>
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlSelect1">Quantity</label>
                <select name="quantity" class="form-control" id="formControlSelect1" required>
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
            <div class="form-group">
                <label for="formControlInput1">Website</label>
                <input name="website" type="url" class="form-control" id="formControlInput1" placeholder="https://..." value="{{ $website }}"
                    required>
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlSelect1">IIIF</label>
                <select name="iiif" class="form-control" id="formControlSelect1" required>
                        <option>{{$iiif}}</option>
                    <option>Unknown</option>
                    <option>IIIF Repository</option>
                    <option>Not a IIIF Repository</option>
                </select>
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlInput1">Is part of</label>
                <input name="is_part_of" type="text" class="form-control" id="formControlInput1"
                    value="{{ old('is_part_of') ? old('is_part_of') : $is_part_of }}">
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlInput1">Copyright</label>
                <input name="copyright" type="text" class="form-control" id="formControlInput1" placeholder="CC-0, CC-BY-SA, etc."
                    value="{{ $copyright }}" required>
                <div class="invalid-feedback">
                    Please fill in this field.
                </div>
            </div>
            <div class="form-group">
                <label for="formControlTextarea1">Notes</label>
                <textarea name="notes" class="form-control" id="formControlTextarea1" rows="3" placeholder="Notes about this library...">{{ $notes }}</textarea>
            </div>
            <button class="btn btn-outline-success" type="submit">Update library <i class="fas fa-plus"></i></button>
            <a class="btn btn-outline-danger pull-right" href="/admin">
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
    </div>
</div>
@endsection
 
@section('javascript')
@endsection
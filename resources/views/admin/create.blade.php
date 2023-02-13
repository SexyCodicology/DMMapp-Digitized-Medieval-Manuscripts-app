@extends('layouts.app')
@section('css')
@endsection
@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('admin') }}">Admin</a></li>
                <li>Create Institution</li>
            </ol>
            <h2>Add a new institution to the DMMapp</h2>
        </div>
    </section>

@endsection
@section('content')
    <div id="main-data">
        <div class="container">
            <div class="card">
                <div class="card-header">Create institution</div>
                <div class="card-body">
                    <form id="createForm" class="row g-3 needs-validation" action="{{ route('create_library') }}"
                          method="post" novalidate>
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
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h3>Institution details</h3>
                        <div class="mb-4">
                            <label for="library" class="form-label">Institution name</label>
                            <input name="library" type="text" class="form-control" id="library" data-dmmapp="library"
                                   placeholder="The British Library, The Getty Museum..."
                                   value="{{ old('library') ? old('library') : '' }}"
                                   required>
                            <div class="invalid-feedback">
                                Please fill in this field.
                            </div>
                            <div id="libraryNote" class="form-text">Required - The name of the institution hosting the
                                digitized
                                items
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="form-label">Quantity of digitized items</label>
                            <select name="quantity" class="form-select" id="quantity" data-dmmapp="quantity">
                                <option>Unknown</option>
                                <option>Few ( < 10 digitized manuscripts)</option>
                                <option>Some (between 10 and 50 digitized manuscripts)</option>
                                <option>Many (Between 50 and 100 digitized manuscripts)</option>
                                <option>Hundreds (between 100 and 500 digitized manuscripts)</option>
                                <option>More than half-thousand digitized manuscripts (between 500 and 1000)</option>
                                <option>Thousands (more than 1000 digitized manuscripts)</option>
                            </select>
                            <div id="quantityNote" class="form-text">Required - An indication of how many digitized
                                items are
                                available at this institution
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="website" class="form-label">Digitized items URL</label>
                            <input name="website" type="url" class="form-control" id="website" data-dmmapp="website" placeholder="https://..."
                                   value="{{ old('website') ? old('website') : '' }}" required>
                            <div id="websiteNote" class="form-text">Required - The URL where the digitized items can be
                                accessed
                            </div>

                            <div class="invalid-feedback">
                                Please fill in this field.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="library_name_slug" class="form-label">URL Slug</label>
                            <input name="library_name_slug" type="text" class="form-control" id="library_name_slug" data-dmmapp="slug"
                                   placeholder="https://..."
                                   value="{{ old('library_name_slug') ? old('library_name_slug') : '' }}" required>
                            <div id="slugNote" class="form-text">Required - The part of a URL or link that comes after
                                our domain.
                                For example: https://digitizedmedievalmanuscripts.org/<b>url_slug</b></div>
                            <div class="invalid-feedback">
                                Please fill in this field.
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="hidden" name="iiif" value="0">
                                <input name="iiif" class="form-check-input" type="checkbox" id="iiif" data-dmmapp="iiif" value="1">
                                <label class="form-check-label" for="iiif">IIIF repository</label>
                            </div>
                            <div id="iiifNote" class="form-text">Indicates if this is a IIIF repository</div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="hidden" name="is_part_of" value="0">
                                <input name="is_part_of" class="form-check-input" type="checkbox" id="is_part_of" data-dmmapp="is-part-of"
                                       value="1">
                                <label class="form-check-label" for="is_part_of">Is part of a project</label>
                            </div>

                            <div id="isPartOfNote" class="form-text">Indicates is the repository is part of a project
                                made of
                                multiple repositories
                            </div>
                        </div>

                        <div id="is_part_of_display">
                            <div class="mb-4">
                                <label for="is_part_of_project_name" class="form-label">Home project name</label>
                                <input name="is_part_of_project_name" type="text" class="form-control"
                                       id="is_part_of_project_name" data-dmmapp="is-part-of-name"
                                       placeholder="e-Codices, Manuscripta, etc."
                                       value="{{ old('is_part_of_project_name') ? old('is_part_of_project_name') : '' }}">
                                <div id="libraryNote" class="form-text">The name of the project home to multiple
                                    repositories
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="is_part_of_url" class="form-label">Home project URL</label>
                                <input name="is_part_of_url" type="url" class="form-control" id="is_part_of_url" data-dmmapp="is-part-of-url"
                                       placeholder="https://..."
                                       value="{{ old('is_part_of_url') ? old('is_part_of_url') : '' }}">
                                <div id="isPartOfNote" class="form-text">The URL of the homepage of the project</div>
                                <div class="invalid-feedback">
                                    Please fill in this field.
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h3>Geographical information</h3>
                        <div class="mb-4">
                            <label for="nation" class="form-label">Country</label>
                            <input name="nation" type="text" class="form-control" id="nation" data-dmmapp="nation"
                                   placeholder="Italy, France, Japan..."
                                   value="{{ old('nation') ? old('nation') : '' }}" required>
                            <div id="nationNote" class="form-text">Required</div>

                            <div class="invalid-feedback">
                                Please fill in this field.
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="city" class="form-label">City</label>
                            <input name="city" type="text" class="form-control" id="city" data-dmmapp="city"
                                   placeholder="Rome, Paris, Tokyo..."
                                   value="{{ old('city') ? old('city') : '' }}" required>
                            <div id="cityNote" class="form-text">Required</div>

                            <div class="invalid-feedback">
                                Please fill in this field.
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="lat" class="form-label">Latitude</label>
                                    <input name="lat" type="text" class="form-control" id="lat" data-dmmapp="lat" placeholder="13.5723"
                                           value="{{ old('lat') ? old('lat') : '' }}" required>
                                    <div id="latNote" class="form-text">Required</div>

                                    <div class="invalid-feedback">
                                        Please fill in this field.
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="lng" class="form-label">Longitude</label>
                                    <input name="lng" type="text" class="form-control" id="lng" data-dmmapp="lng" placeholder="123.2235"
                                           value="{{ old('lng') ? old('lng') : '' }}" required>
                                    <div id="lngNote" class="form-text">Required</div>

                                    <div class="invalid-feedback">
                                        Please fill in this field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>Copyright</h3>
                        <div class="mb-4">
                            <label for="copyright" class="form-label">Copyright declaration</label>
                            <input name="copyright" type="text" class="form-control" id="copyright" data-dmmapp="copyright"
                                   placeholder="CC-0, CC-BY-SA, etc."
                                   value="{{ old('copyright') ? old('copyright') : '' }}" required>
                            <div id="copyrightNote" class="form-text">Required</div>
                            <div class="invalid-feedback">
                                Please fill in this field.
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="hidden" name="is_free_cultural_works_license" value="0">
                                <input name="is_free_cultural_works_license" class="form-check-input" type="checkbox"
                                       id="is_free_cultural_works_license" data-dmmapp="is-free-cultural-license" value="1">
                                <label class="form-check-label" for="is_free_cultural_works_license">Copyright is
                                    approved for Free
                                    Cultural Works</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea name="notes" class="form-control" id="notes" data-dmmapp="notes" rows="3"
                                      placeholder="Notes about this library...">{{ old('notes') ? old('notes') : '' }}</textarea>
                        </div>
                        <hr>
                        <h3>Blog post availability and links</h3>
                        <div class="mb-4">
                            <div class="form-check">
                                <input type="hidden" name="has_post" value="0">
                                <input name="has_post" class="form-check-input" type="checkbox" id="has_post" data-dmmapp="has-post" value="1">
                                <label class="form-check-label" for="has_post">Has a Sexy Codicology Blog post</label>
                            </div>
                        </div>

                        <div id="has_post_display">
                            <div class="mb-4">
                                <label for="post_url" class="form-label">Sexy Codicology Blog post URL</label>
                                <input name="post_url" type="text" class="form-control" id="post_url" data-dmmapp="post-url"
                                       placeholder="https://"
                                       value="{{ old('post_url') ? old('post_url') : '' }}">
                                <div class="invalid-feedback">
                                    Please fill in this field.
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">

                            <button class="btn btn-success" type="submit" data-dmmapp="submit"><i class="bi bi-plus-circle"></i> Add library
                            </button>
                            <a class="btn btn-danger float-end" href="{{ route('admin') }}"><i class="bi bi-slash-circle"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            let forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script>
        let form = $('#createForm'),
            checkbox = $('#has_post'),

            hasPostDisplay = $('#has_post_display');

        hasPostDisplay.hide();

        checkbox.on('click', function () {
            if ($(this).is(':checked')) {
                hasPostDisplay.show();
                hasPostDisplay.find('input').attr('required', true);
            } else {
                hasPostDisplay.hide();
                hasPostDisplay.find('input').attr('required', false);
            }
        })
    </script>
    <script>
        let form2 = $('#createForm'),
            checkbox2 = $('#is_part_of'),

            isPartOfProjectDisplay = $('#is_part_of_display');

        isPartOfProjectDisplay.hide();

        checkbox2.on('click', function () {
            if ($(this).is(':checked')) {
                isPartOfProjectDisplay.show();
                isPartOfProjectDisplay.find('input').attr('required', true);
            } else {
                isPartOfProjectDisplay.hide();
                isPartOfProjectDisplay.find('input').attr('required', false);
            }
        })
    </script>
@endsection

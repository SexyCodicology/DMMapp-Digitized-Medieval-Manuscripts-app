<?php

use App\Models\Library;
use function Pest\Laravel\get;

beforeEach(function () {
    // Create some libraries for testing
    $this->libraries = Library::factory()->count(3)->create();
});

it('shows the library data page', function () {
    $response = get('/data');
    $response->assertOk();

    foreach ($this->libraries as $library) {
        $response->assertSee($library->library, false);
    }
});

it('shows the library map page', function () {
    $response = get('/map');
    $response->assertOk();

    foreach ($this->libraries as $library) {
        $response->assertSee($library->library, false);
    }
});

it('shows the all libraries page', function () {
    $response = get('/all');
    $response->assertOk();

    foreach ($this->libraries as $library) {
        $response->assertSee($library->library, false);
    }
});

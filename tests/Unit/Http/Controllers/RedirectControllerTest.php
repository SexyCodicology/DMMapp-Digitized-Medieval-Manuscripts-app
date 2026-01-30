<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\RedirectController;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mockery;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    public function test_redirects_to_slug_when_id_is_valid()
    {
        // Arrange
        $library = new Library;
        $library->id = 1;
        $library->library_name_slug = 'test-slug';

        Cache::shouldReceive('remember')
            ->once()
            ->andReturn($library);

        $request = Request::create('/record/1', 'GET');
        $controller = new RedirectController;

        // Act
        $response = $controller($request, 1);

        // Assert
        $this->assertEquals(301, $response->getStatusCode());
        $this->assertEquals(url('/test-slug'), $response->getTargetUrl());
    }

    public function test_aborts_with_404_when_id_is_invalid()
    {
        // Arrange
        $request = Request::create('/record/invalid', 'GET');
        $controller = new RedirectController;

        // Assert
        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('Invalid library ID');

        // Act
        $controller($request, 'invalid');
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}

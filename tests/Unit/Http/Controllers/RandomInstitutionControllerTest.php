<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\RandomInstitutionController;
use App\Models\Library;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mockery;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class RandomInstitutionControllerTest extends TestCase
{
    public function test_invoke_redirects_to_random_library()
    {
        // Arrange
        $mockedLibrary = (object)['library_name_slug' => 'test-slug'];
        $libraryMock = Mockery::mock('alias:' . Library::class);
        $libraryMock->shouldReceive('where')
            ->with('is_disabled', false)
            ->once()
            ->andReturnSelf();
        $libraryMock->shouldReceive('inRandomOrder')
            ->once()
            ->andReturnSelf();
        $libraryMock->shouldReceive('first')
            ->once()
            ->andReturn($mockedLibrary);

        $controller = new RandomInstitutionController();
        $request = Request::create('/explore', 'GET');

        // Act
        $response = $controller($request);

        // Assert
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('show_library', ['library' => 'test-slug']), $response->getTargetUrl());
    }

    public function test_invoke_aborts_if_no_library_found()
    {
        // Arrange
        $libraryMock = Mockery::mock('alias:' . Library::class);
        $libraryMock->shouldReceive('where')
            ->with('is_disabled', false)
            ->once()
            ->andReturnSelf();
        $libraryMock->shouldReceive('inRandomOrder')
            ->once()
            ->andReturnSelf();
        $libraryMock->shouldReceive('first')
            ->once()
            ->andReturn(null);

        $controller = new RandomInstitutionController();
        $request = Request::create('/explore', 'GET');

        // Assert
        $this->expectException(NotFoundHttpException::class);

        // Act
        $controller($request);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}

<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\HomepageController;
use App\Models\Library;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Mockery;
use Tests\TestCase;

class HomepageControllerTest extends TestCase
{
    public function test_index_returns_view_with_latest_changes()
    {
        // Arrange
        $mockedLibraries = new Collection([
            (object)['id' => 1, 'library' => 'Lib1'],
            (object)['id' => 2, 'library' => 'Lib2'],
        ]);

        $libraryMock = Mockery::mock('alias:' . Library::class);
        $libraryMock->shouldReceive('orderBy')
            ->with('last_edited', 'desc')
            ->once()
            ->andReturnSelf();
        $libraryMock->shouldReceive('take')
            ->with(5)
            ->once()
            ->andReturnSelf();
        $libraryMock->shouldReceive('get')
            ->once()
            ->andReturn($mockedLibraries);

        $controller = new HomepageController;

        // Act
        $response = $controller->index();

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $this->assertArrayHasKey('latest_changes', $response->getData());
        $this->assertEquals($mockedLibraries, $response->getData()['latest_changes']);
    }

    public function test_index_returns_empty_collection_on_exception()
    {
        // Arrange
        $libraryMock = Mockery::mock('alias:' . Library::class);
        $libraryMock->shouldReceive('orderBy')
            ->andThrow(new Exception('DB error'));

        Log::shouldReceive('error')
            ->once()
            ->with(Mockery::type('string'));

        $controller = new HomepageController;

        // Act
        $response = $controller->index();

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $this->assertArrayHasKey('latest_changes', $response->getData());
        $this->assertInstanceOf(Collection::class, $response->getData()['latest_changes']);
        $this->assertTrue($response->getData()['latest_changes']->isEmpty());
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}

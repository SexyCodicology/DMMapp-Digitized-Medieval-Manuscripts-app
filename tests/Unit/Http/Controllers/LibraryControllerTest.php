<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\LibraryController;
use App\Models\Library;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Mockery;
use Tests\TestCase;

class LibraryControllerTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function test_index_returns_view_with_libraries_and_latest_changes()
    {
        // Arrange
        $mockedLibraries = new EloquentCollection([
            (object)['id' => 1, 'library' => 'Lib1'],
            (object)['id' => 2, 'library' => 'Lib2'],
        ]);
        $mockedLatest = new EloquentCollection([
            (object)['id' => 3, 'library' => 'Lib3'],
        ]);

        $libraryMock = Mockery::mock(Library::class);
        $libraryMock->shouldReceive('inRandomOrder->get')
            ->once()
            ->andReturn($mockedLibraries);
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
            ->andReturn($mockedLatest);

        $controller = new LibraryController($libraryMock);

        // Act
        $response = $controller->index();

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $data = $response->getData();
        $this->assertArrayHasKey('libraries', $data);
        $this->assertArrayHasKey('latest_changes', $data);
        $this->assertEquals($mockedLibraries, $data['libraries']);
        $this->assertEquals($mockedLatest, $data['latest_changes']);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_show_returns_view_with_library_data()
    {
        // Arrange
        $slug = 'test-slug';
        $mockedLibrary = (object)['id' => 1, 'library_name_slug' => $slug];

        $libraryMock = Mockery::mock(Library::class);
        $libraryMock->shouldReceive('where')
            ->with('library_name_slug', $slug)
            ->once()
            ->andReturnSelf();
        $libraryMock->shouldReceive('firstOrFail')
            ->once()
            ->andReturn($mockedLibrary);

        $controller = new LibraryController($libraryMock);

        // Act
        $response = $controller->show($slug);

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $data = $response->getData();
        $this->assertArrayHasKey('library_data', $data);
        $this->assertEquals($mockedLibrary, $data['library_data']);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_all_returns_view_with_sorted_libraries()
    {
        // Arrange
        $mockedLibraries = new EloquentCollection([
            (object)['id' => 1, 'library' => 'A'],
            (object)['id' => 2, 'library' => 'B'],
        ]);

        $libraryMock = Mockery::mock(Library::class);
        $libraryMock->shouldReceive('orderBy')
            ->with('library', 'asc')
            ->once()
            ->andReturnSelf();
        $libraryMock->shouldReceive('get')
            ->once()
            ->andReturn($mockedLibraries);

        $controller = new LibraryController($libraryMock);

        // Act
        $response = $controller->all();

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $data = $response->getData();
        $this->assertArrayHasKey('libraries', $data);
        $this->assertEquals($mockedLibraries, $data['libraries']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}

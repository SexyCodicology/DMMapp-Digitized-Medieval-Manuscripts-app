<?php

namespace App\DataTables;

use App\Models\Library;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

class LibrariesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     *
     * @throws Exception|\Exception
     */
    public function dataTable(): DataTableAbstract
    {
        $data = Library::all();

        return Datatables::of($data)
            ->editColumn('website', function (Library $library) {
                return '<a class="btn btn-outline-primary" href="'.$library->website.'"><i class="bi bi-link-45deg"></i> Digitized manuscripts <sup><i class="bi bi-box-arrow-up-right"></i></sup><a/> ';
            })
            ->editColumn('iiif', function (Library $library){
                if ($library->iiif === 1) {
                    return "<i class='bi bi-check-circle-fill text-success' style='font-size: 1.5rem;'></i>";

                } else {
                    return "<i class='bi bi-x-circle-fill text-danger' style='font-size: 1.5rem;'></i>";
                }
            })
            ->editColumn('is_free_cultural_works_license', function (Library $library){
                if ($library->iiif === 1) {
                    return "<p style='display:none'>yes</p><i class='bi bi-check-circle-fill text-success' style='font-size: 1.5rem;'></i>";

                } else {
                    return "<p style='display:none'>no</p><i class='bi bi-x-circle-fill text-danger' style='font-size: 1.5rem;'></i>";
                }
            })
            ->editColumn('library_name_slug', function (Library $library){
                return '<a class="btn btn-outline-primary" role="button" href="'.$library->library_name_slug.'" ><i class="bi bi-search"></i> Explore</a>';

            })
            ->editColumn('has_post',function (Library $library) {
                if ($library->has_post === 1) {
                    return '<a class="btn btn-outline-primary" href="'.$library->post_url.'" >Read <sup><i class="bi bi-box-arrow-up-right"></i></sup></a>';
                } else {
                    return '<p>No post available</p>';
                }
            })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Library $model
     * @return Builder
     */
    public function query(Library $model): Builder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
                    ->minifiedAjax()
                    ->dom('PBfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                    )
                    ->parameters([
                        'autoWidth' => false,
                        'responsive' => true,
                        'recalc' =>true,
                        'searchPanes' => true,
                    ])
                    ->columns($this->getColumns());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('library')
                ->title('Institutions')
                ->responsivePriority(1),

            Column::make('website')
                ->title('Links')
                ->searchable(false)
                ->searchPanes(false)
                ->responsivePriority(1),

            Column::make('quantity'),

            Column::make('iiif')
                ->title('IIIF repository'),

            Column::make('is_free_cultural_works_license')
                ->title('Uses free cultural license')
                ->searchable(),

            Column::make('nation')
                ->title('Country')
                ->visible(false)
                ->searchable(),


            Column::make('city')
                ->title('City')
                ->visible(false),

            Column::make('lat')
                ->visible(false)
                ->searchable(false)
                ->searchPanes(false),

            Column::make('lng')
                ->visible(false)
                ->searchable(false)
                ->searchPanes(false),

            Column::make('has_post')
                ->title('Related blog post')
                ->searchable(false),

            Column::make('library_name_slug')
                ->title('Additional data')
                ->searchable(false)
                ->searchPanes(false),

            Column::make('is_part_of_project_name')
                ->title('Part of a project'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Digitized_Medieval_Manuscripts_' . date('YmdHis');
    }
}

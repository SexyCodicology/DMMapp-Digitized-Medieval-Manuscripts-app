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
                return '<a class="btn btn-primary" href="' . $library->website . '"><i class="bi bi-link-45deg"></i> Digitized manuscripts <sup><i class="bi bi-box-arrow-up-right"></i></sup><a/> ';
            } )->escapeColumns([]);
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
            Column::make('library')->responsivePriority(1)->title('Institutions'),
            Column::make('website')->title('Links'),
            Column::make('quantity'),
            Column::make('iiif')->title('IIIF repository'),
            Column::make('copyright')
                ->visible(false)
                ->searchable()
                ->searchPanes(false),
            Column::make('is_free_cultural_works_license')
                ->searchable(),
            Column::make('nation')
                ->visible(false)
                ->searchable(),
            Column::make('city')->visible(false),
            Column::make('lat')
                ->visible(false)
                ->searchable(false)
                ->searchPanes(false),
            Column::make('lng')
                ->visible(false)
                ->searchable(false)
                ->searchPanes(false),
            Column::make('has_post'),
            Column::make('is_part_of_project_name'),
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

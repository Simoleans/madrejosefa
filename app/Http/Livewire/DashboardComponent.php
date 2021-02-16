<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Personas;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class DashboardComponent extends Component
{
    public $firstRun = true;
    public $showDataLabels = false;

    public $colors = [
        '#3CDC79',
        '#F0E512',
        '#E91313',
        '#66DA26',
        '#1340E9',
    ];
    public function render()
    {
        
        $queryPais = Personas::select('pais_origen',DB::raw('count(*) as total'))->groupBy('pais_origen')->get();

        $queryEstadoCivil = Personas::select('estado_civil',DB::raw('count(*) as total'))->groupBy('estado_civil')->get();

        $columnChartModel = $queryEstadoCivil
        ->reduce(function ($columnChartModel, $data) {
            $type = $data->estado_civil;
            $value = $data->total;

            return $columnChartModel->addColumn($type, $value, array_rand($this->colors,1));
        }, LivewireCharts::columnChartModel()
            ->setTitle('Total - Personas registradas por estado civil')
            ->setAnimated($this->firstRun)
            ->withOnColumnClickEventName('onColumnClick')
            ->setLegendVisibility(false)
            ->setDataLabelsEnabled($this->showDataLabels)
            ->setOpacity(0.50)
            ->setColors($this->colors)
            ->withGrid()
        );

        $pieChartModel = $queryPais
        ->reduce(function ($pieChartModel, $data) {
            $type = $data->pais_origen;
            $value = $data->total;

            return $pieChartModel->addSlice($type, $value, array_rand($this->colors,1));
        }, LivewireCharts::pieChartModel()
            ->setTitle('Total - Personas registradas por país')
            ->setAnimated($this->firstRun)
            ->withOnSliceClickEvent('onSliceClick')
            ->legendPositionBottom()
            ->legendHorizontallyAlignedCenter()
            ->setDataLabelsEnabled($this->showDataLabels)
            ->setColors($this->colors)
        );

        $today = Personas::select(['created_at','status'])->where('status',1)->whereDate('created_at', Carbon::today())->count();
        $month = Personas::select(['created_at','status'])->where('status',1)->whereMonth('created_at', Carbon::now()->format('m'))->count();
        $all = Personas::select('status')->where('status',1)->count();

        
        return view('livewire.dashboard-component',['chartsPais' => $pieChartModel,'chartsEstadocivil' => $columnChartModel,'today' => $today,'all' => $all,'month' => $month]);
    }
}

<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Expense;
use App\Models\KosPelupusanSampah;
use App\Models\Pbt;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Livewire\Component;

class ExecutiveDashboard extends Component
{
    public $search = "";
    public $selectedPbt;

    public $firstRun = true;

    public $showDataLabels = false;

    public function mount() 
    {

    }

    public function render()
    {
        $pbts = Pbt::notKKTP()->paginate(10);
        $expenses = KosPelupusanSampah::all();

        $this->firstRun = false;

        $columnChartModel = $expenses->groupBy('tapak_pelupusan_sampah_id')
            ->reduce(function ($columnChartModel, $data) {
                $type = $data->first()->type;
                $value = $data->sum('amount');

                return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
            }, LivewireCharts::columnChartModel()
                ->setTitle('Kos mengikut tapak pelupusan sampah')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                ->setColumnWidth(90)
                ->withGrid()
        );

        $pieChartModel = $expenses->groupBy('tapak_pelupusan_sampah_id')
            ->reduce(function ($pieChartModel, $data) {
                $type = $data->first()->type;
                $value = $data->sum('amount');

                return $pieChartModel->addSlice($type, $value, $this->colors[$type]);
            }, LivewireCharts::pieChartModel()
                //->setTitle('Expenses by Type')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                //->withoutLegend()
                ->legendPositionBottom()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
        );

        return view('livewire.dashboards.executive-dashboard')
            ->with('pbts', $pbts)
            ->with('columnChartModel', $columnChartModel)
            ->with('pieChartModel', $pieChartModel);

    }
}

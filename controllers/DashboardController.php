<?php

namespace app\controllers;

use app\controllers\classes\Helpers;
use UnemploymentQuery;
use PeopleQuery;
use Yii;
use yii\data\ActiveDataProvider;

use app\models\UnemploymentAR;
use app\models\PeopleAR;
use models;
use yii\helpers\ArrayHelper;

class DashboardController extends BaseDashboardController
{
    public function actionIndex()
    {
        $models = UnemploymentQuery::create();

        $yearSelected = Yii::$app->request->get('year');
        if ($yearSelected)
            $models->filterByYear($yearSelected);

        $models->find();

        $possibleYears = UnemploymentQuery::create()->distinct()->select('year')->find();

        $data = array();
        $dataChart = array();
        foreach ($models as $model) {
            $data[] = array(
                'hc-key' => 'kz-'.$model->getRegionId(),
                'value' => $model->getUnemploymentAdult()
            );
        }


        $dataChart[] = array(
            'name' => 'Серия',
            'data' => [$model->getUnemploymentAdult()]
        );

        var_dump($this->getFilter('filter_region'));



        return $this->render('index.php', [
            'models' => $models,
            'data' => $data,
            'dataChart' => $dataChart,

            'yearSelected' => $yearSelected, // filter
            'possibleYears' => $possibleYears, // filter
        ]);
    }

    public function actionTable()
    {
        $model = UnemploymentAR::find();
        $model2 = UnemploymentQuery::create();

        $regionFilter = $this->getFilter('filter_region');
        $regionFilter->setPossibleValues(UnemploymentQuery::create()->distinct()->select('region_name')->find());

        if ($regionFilter->isSelected()) {
            $model->where(['region_name' => $regionFilter->selectedValue]);
            $model2->filterByRegionName($regionFilter->selectedValue);
        }

        $model2 = $model2->orderByRegionName()->orderByYear()->find();

        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'unemployment_adult' => SORT_DESC
                ]
            ],
        ]);


        $w = $this->getWidget('widget_hist');
        $w->setCategories($model2->getColumnValues('RegionName'));
        $w->setSeries(Helpers::toKeyValueArray($model2, 'Year', 'UnemploymentYouth'));

        $w = $this->getWidget('widget_hist2');
        $w->setCategories($model2->getColumnValues('RegionName'));
        $w->setSeries(Helpers::toKeyValueArray($model2, 'Year', 'UnemploymentYouth'));


        $peopleModel = PeopleAR::find();
        $peopleModel2 = \PeopleQuery::create();

        $peopleFilter = $this->getFilter('filter_people');
        $peopleFilter->setPossibleValues(PeopleQuery::create()->distinct()->select('name')->find());

        if ($peopleFilter->isSelected()) {
            $peopleModel->where(['name' => $peopleFilter->selectedValues]);
            $peopleModel2->filterByName($peopleFilter->selectedValues);
        }

        $peopleModel2 = $peopleModel2->find();
        $dataProvider2 = new ActiveDataProvider([
            'query' => $peopleModel,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC
                ]
            ],
        ]);




        return $this->render('table.tpl', [
            'dataProvider' => $dataProvider,  // GridView
            'model2' => $model2,
            'peopleModel2' => $peopleModel2,
            'dataProvider2' => $dataProvider2
        ]);
    }
}
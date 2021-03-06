/**
 * Created by Ponomarev on 04.02.2016.
 */

var visiology = {};
visiology.internal = {};
visiology.defaults = {};
visiology.defaults.filters = {};
visiology.defaults.highcharts = {};

// Internal functions
visiology.internal.widgetGetData = function (data, model, widget) {
    var result = data;
    widget.depends_on.forEach(function (widget) {
        if (model[widget] !== undefined) {
            result = model[widget].getData(result);
        }
    });
    return result;
};

// Filter defaults
visiology.defaults.filterGetData = function (data, model, filter) {
    if (filter.ko_selected() === undefined)
        return data;

    var result = [];
    data.forEach(function (item) {
        if (item[filter.defaults.column_to_filter] == filter.ko_selected())
            result.push(item);
    });
    return result;
};
visiology.defaults.filterGetValues = function (data, model, filter) {
    var temp_data = visiology.internal.widgetGetData(data, model, filter);

    var result = [];
    temp_data.forEach(function (item) {
        if (result.indexOf(item[filter.defaults.column_to_filter]) < 0)
            result.push(item[filter.defaults.column_to_filter]);
    });

    return result;
};

// Highcharts bindings
visiology.defaults.highcharts.onKnockoutBindingUpdate = function(element, valueAccesor) {
    var chart = $(element).highcharts();
    var chart_data = valueAccesor()();

    chart_data.update(chart_data.data, chart_data.widget, element);
};

ko.bindingHandlers.highchart = {
    init: function(element) {
    },
    update: visiology.defaults.highcharts.onKnockoutBindingUpdate
};

// Highcharts defaults
visiology.defaults.highcharts.onInitColumn = function (element) {
    $(element).highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: []
    });
};
visiology.defaults.highcharts.onUpdateColumn = function (filtered, widget, element) {
    var chart = $(element).highcharts();

    var categories = [];
    var series_names = [];
    filtered.forEach(function (item) {
        if (categories.indexOf(item[widget.defaults.category_name]) < 0)
            categories.push(item[widget.defaults.category_name]);

        if (series_names.indexOf(item[widget.defaults.serie_name]) < 0)
            series_names.push(item[widget.defaults.serie_name]);
    });

    var series = [];
    series_names.forEach(function (serie_name) {
        var serie = {
            name: serie_name,
            data: new Array(categories.length)
        }
        serie.data.fill(0);

        filtered.forEach(function (item) {
            if (item[widget.defaults.serie_name] == serie_name) {
                serie.data[categories.indexOf(item[widget.defaults.category_name])] += item[widget.defaults.measure_name];
            }
        });

        series.push(serie);
    });

    var chart_data = {
        categories: categories,
        series: series
    };

    chart.setTitle({text: chart_data.title});
    chart.yAxis[0].setTitle({text: chart_data.yAxis_title});

    while (chart.series.length > 0) {
        chart.series[0].remove(false);
    }

    chart.xAxis[0].setCategories(chart_data.categories);
    chart_data.series.forEach(function (serie) {
        chart.addSeries(serie, false);
    });

    chart.redraw();
};

visiology.defaults.highcharts.onInitPie = function (element) {
    $(element).highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: ''
        },
        series: []
    });
};
visiology.defaults.highcharts.onUpdatePie = function (filtered, widget, element) {
    // Convert to highchart data
    var groupings = {};
    var all = 0;
    filtered.forEach(function (item) {
        var serie_name = item[widget.defaults.column_for_serie];

        if (groupings[serie_name] === undefined)
            groupings[serie_name] = {};

        groupings[serie_name].name = serie_name;
        if (groupings[serie_name].y === undefined)
            groupings[serie_name].y = 0;
        groupings[serie_name].y += item[widget.defaults.measure_name];
        all += item[widget.defaults.measure_name];
    });

    var series_data = [];
    Object.keys(groupings).forEach(function (key) {
        var data_cell = {
            name: key,
            y: groupings[key].y
        }
        series_data.push(data_cell);
    });

    var chart_data = {
        series: [{
            name: widget.defaults.measure_title,
            data: series_data
        }]
    };

    var chart = $(element).highcharts();

    while(chart.series.length > 0) {
        chart.series[0].remove(false);
    }

    chart_data.series.forEach(function (serie) {
        chart.addSeries(serie, false);
    });

    chart.redraw();
};

// *** Create model
visiology.model = {};

visiology.run = function ()
{
    if (onRequestVisiologyData !== undefined)
        visiology.data = onRequestVisiologyData(); // Sets global data
    else
        visiology.data = {};

    $("[data-visiology-name]").each(function(index, element) {
        var widget_name = $(element).attr("data-visiology-name");
        eval('onConstruct_' + widget_name + '(visiology)');

        if (eval("typeof onUser_" + widget_name + " === 'function'"))
            eval('onUser_' + widget_name + '(visiology.model.' + widget_name + ')');

        eval('onDeploy_' + widget_name + '(visiology)');
    });

    // Start knockout
    ko.applyBindings(visiology.model);
}

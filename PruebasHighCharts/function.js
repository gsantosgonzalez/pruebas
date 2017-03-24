$(function() {
    var chart = [],
        data = [],
        data1 = [{
                    data: newRandomData(10, 1),
                    name: 'Blue'
                }, {
                    data: newRandomData(10, -1),
                    name: 'Red'
                }];
    $(document).ready(function() {
        addChart('container1', 'abc');
        addChart('container2', 'def');
        addChart('container3', 'ghi');
    });
    var time = (new Date()).getTime();

    function newRandomData(n, sign) {
        // generate an array of random data
        var data = [],
            i;

        for (i = -1 * n; i <= 0; i++) {
            data.push([time + i * 3600 * 1000, sign * Math.random() * 512]);
        }
        return data;
    }

    function addChart(id, title) {

        chart.push(new Highcharts.Chart({
            chart: {
                renderTo: id,
                zoomType: 'x',
                type: 'area'
            },
            title: {
                text: title
            },
            rangeSelector: {
                selected: 8
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {

                labels: {
                    formatter: function() {
                        return Math.abs(this.value) + 'Points';
                    }
                }
            },
            tooltip: {
                valueSuffix: ' Points',
                useHTML: true,
                shared: true,
                formatter: function() {
                    var tooltip = '<span style="font-size:10px;">' + Highcharts.dateFormat('%A, %b %e %Y', this.x) + '</span><br/>';
                    $.each(this.points, function(i, e) {
                        tooltip += '<span style=" color:' + this.series.color + '">' + this.series.name + ':  </span><b>' + Highcharts.numberFormat(Math.abs(this.point.y), 2) + ' Points</b><br/>';
                    });

                    return tooltip;
                }

            },
            series: [{
                data: newRandomData(10, 1),
                name: 'Blue'
            }, {
                data: newRandomData(10, -1),
                name: 'Red'
            }]
        }));
    }

    function createChart(container, title, type, data){
        chart.push(new Highcharts.Chart({
            chart: {
                renderTo: container,
                zoomType: 'x',
                type: type
            },
            title: {
                text: title
            },
            rangeSelector: {
                selected: 8
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {

                labels: {
                    formatter: function() {
                        return Math.abs(this.value) + 'Points';
                    }
                }
            },
            tooltip: {
                valueSuffix: ' Points',
                useHTML: true,
                shared: true,
                formatter: function() {
                    var tooltip = '<span style="font-size:10px;">' + Highcharts.dateFormat('%A, %b %e %Y', this.x) + '</span><br/>';
                    $.each(this.points, function(i, e) {
                        tooltip += '<span style=" color:' + this.series.color + '">' + this.series.name + ':  </span><b>' + Highcharts.numberFormat(Math.abs(this.point.y), 2) + ' Points</b><br/>';
                    });

                    return tooltip;
                }

            },
            series: data
        }));
    }
});

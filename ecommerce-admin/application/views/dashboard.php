<?php
$i = 0;
foreach ($query_prod->result() as $prod) {
    $i++;

    $produk_nama[$i] = $prod->produk;
    $produk_qty[$i]  = $prod->qty;
    //  echo $produk_nama[$i] .'-'. $produk_qty[$i].'<br>';
}

?>

<script type="text/javascript">
    "use strict";

    // Shared Colors Definition
    const primary = '#6993FF';
    const success = '#1BC5BD';
    const info = '#8950FC';
    const warning = '#FFA800';
    const danger = '#F64E60';

    // Class definition
    function generateBubbleData(baseval, count, yrange) {
        var i = 0;
        var series = [];
        while (i < count) {
            var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
            var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
            var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

            series.push([x, y, z]);
            baseval += 86400000;
            i++;
        }
        return series;
    }

    function generateData(count, yrange) {
        var i = 0;
        var series = [];
        while (i < count) {
            var x = 'w' + (i + 1).toString();
            var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

            series.push({
                x: x,
                y: y
            });
            i++;
        }
        return series;
    }

    var KTApexChartsDemo = function() {
        // Private functions
        var _demo1 = function() {
            const apexChart = "#chart_1";
            var options = {
                series: [{
                    name: "Desktops",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                },
                colors: [primary]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo2 = function() {
            const apexChart = "#chart_2";
            var options = {
                series: [{
                    name: 'series1',
                    data: [31, 40, 28, 51, 42, 109, 100]
                }, {
                    name: 'series2',
                    data: [11, 32, 45, 32, 34, 52, 41]
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'datetime',
                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
                colors: [primary, success]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo3 = function() {
            const apexChart = "#chart_3";
            var options = {
                series: [{
                    name: 'Net Profit',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                }, {
                    name: 'Revenue',
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                }, {
                    name: 'Free Cash Flow',
                    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                },
                yaxis: {
                    title: {
                        text: '$ (thousands)'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "$ " + val + " thousands"
                        }
                    }
                },
                colors: [primary, success, warning]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo4 = function() {
            const apexChart = "#chart_4";
            var options = {
                series: [{
                    name: 'Marine Sprite',
                    data: [44, 55, 41, 37, 22, 43, 21]
                }, {
                    name: 'Striking Calf',
                    data: [53, 32, 33, 52, 13, 43, 32]
                }, {
                    name: 'Tank Picture',
                    data: [12, 17, 11, 9, 15, 11, 20]
                }, {
                    name: 'Bucket Slope',
                    data: [9, 7, 5, 8, 6, 9, 4]
                }, {
                    name: 'Reborn Kid',
                    data: [25, 12, 19, 32, 25, 24, 10]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                    },
                },
                stroke: {
                    width: 1,
                    colors: ['#fff']
                },
                title: {
                    text: 'Fiction Books Sales'
                },
                xaxis: {
                    categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014],
                    labels: {
                        formatter: function(val) {
                            return val + "K"
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: undefined
                    },
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + "K"
                        }
                    }
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: 40
                },
                colors: [primary, success, warning, danger, info]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo5 = function() {
            const apexChart = "#chart_5";
            var options = {
                series: [{
                    name: 'Income',
                    type: 'column',
                    data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
                }, {
                    name: 'Cashflow',
                    type: 'column',
                    data: [1.1, 3, 3.1, 4, 4.1, 4.9, 6.5, 8.5]
                }, {
                    name: 'Revenue',
                    type: 'line',
                    data: [20, 29, 37, 36, 44, 45, 50, 58]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [1, 1, 4]
                },
                title: {
                    text: 'XYZ - Stock Analysis (2009 - 2016)',
                    align: 'left',
                    offsetX: 110
                },
                xaxis: {
                    categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016],
                },
                yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: primary
                        },
                        labels: {
                            style: {
                                colors: primary,
                            }
                        },
                        title: {
                            text: "Income (thousand crores)",
                            style: {
                                color: primary,
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    {
                        seriesName: 'Income',
                        opposite: true,
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: success
                        },
                        labels: {
                            style: {
                                colors: success,
                            }
                        },
                        title: {
                            text: "Operating Cashflow (thousand crores)",
                            style: {
                                color: success,
                            }
                        },
                    },
                    {
                        seriesName: 'Revenue',
                        opposite: true,
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: warning
                        },
                        labels: {
                            style: {
                                colors: warning,
                            },
                        },
                        title: {
                            text: "Revenue (thousand crores)",
                            style: {
                                color: warning,
                            }
                        }
                    },
                ],
                tooltip: {
                    fixed: {
                        enabled: true,
                        position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
                        offsetY: 30,
                        offsetX: 60
                    },
                },
                legend: {
                    horizontalAlign: 'left',
                    offsetX: 40
                }
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo6 = function() {
            const apexChart = "#chart_6";
            var options = {
                series: [{
                    data: [{
                            x: 'Analysis',
                            y: [
                                new Date('2019-02-27').getTime(),
                                new Date('2019-03-04').getTime()
                            ],
                            fillColor: primary
                        },
                        {
                            x: 'Design',
                            y: [
                                new Date('2019-03-04').getTime(),
                                new Date('2019-03-08').getTime()
                            ],
                            fillColor: success
                        },
                        {
                            x: 'Coding',
                            y: [
                                new Date('2019-03-07').getTime(),
                                new Date('2019-03-10').getTime()
                            ],
                            fillColor: info
                        },
                        {
                            x: 'Testing',
                            y: [
                                new Date('2019-03-08').getTime(),
                                new Date('2019-03-12').getTime()
                            ],
                            fillColor: warning
                        },
                        {
                            x: 'Deployment',
                            y: [
                                new Date('2019-03-12').getTime(),
                                new Date('2019-03-17').getTime()
                            ],
                            fillColor: danger
                        }
                    ]
                }],
                chart: {
                    height: 350,
                    type: 'rangeBar'
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        distributed: true,
                        dataLabels: {
                            hideOverflowingLabels: false
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        var label = opts.w.globals.labels[opts.dataPointIndex]
                        var a = moment(val[0])
                        var b = moment(val[1])
                        var diff = b.diff(a, 'days')
                        return label + ': ' + diff + (diff > 1 ? ' days' : ' day')
                    },
                    style: {
                        colors: ['#f3f4f5', '#fff']
                    }
                },
                xaxis: {
                    type: 'datetime'
                },
                yaxis: {
                    show: false
                },
                grid: {
                    row: {
                        colors: ['#f3f4f5', '#fff'],
                        opacity: 1
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo7 = function() {
            const apexChart = "#chart_7";
            var options = {
                series: [{
                    data: [{
                            x: new Date(1538778600000),
                            y: [6629.81, 6650.5, 6623.04, 6633.33]
                        },
                        {
                            x: new Date(1538780400000),
                            y: [6632.01, 6643.59, 6620, 6630.11]
                        },
                        {
                            x: new Date(1538782200000),
                            y: [6630.71, 6648.95, 6623.34, 6635.65]
                        },
                        {
                            x: new Date(1538784000000),
                            y: [6635.65, 6651, 6629.67, 6638.24]
                        },
                        {
                            x: new Date(1538785800000),
                            y: [6638.24, 6640, 6620, 6624.47]
                        },
                        {
                            x: new Date(1538787600000),
                            y: [6624.53, 6636.03, 6621.68, 6624.31]
                        },
                        {
                            x: new Date(1538789400000),
                            y: [6624.61, 6632.2, 6617, 6626.02]
                        },
                        {
                            x: new Date(1538791200000),
                            y: [6627, 6627.62, 6584.22, 6603.02]
                        },
                        {
                            x: new Date(1538793000000),
                            y: [6605, 6608.03, 6598.95, 6604.01]
                        },
                        {
                            x: new Date(1538794800000),
                            y: [6604.5, 6614.4, 6602.26, 6608.02]
                        },
                        {
                            x: new Date(1538796600000),
                            y: [6608.02, 6610.68, 6601.99, 6608.91]
                        },
                        {
                            x: new Date(1538798400000),
                            y: [6608.91, 6618.99, 6608.01, 6612]
                        },
                        {
                            x: new Date(1538800200000),
                            y: [6612, 6615.13, 6605.09, 6612]
                        },
                        {
                            x: new Date(1538802000000),
                            y: [6612, 6624.12, 6608.43, 6622.95]
                        },
                        {
                            x: new Date(1538803800000),
                            y: [6623.91, 6623.91, 6615, 6615.67]
                        },
                        {
                            x: new Date(1538805600000),
                            y: [6618.69, 6618.74, 6610, 6610.4]
                        },
                        {
                            x: new Date(1538807400000),
                            y: [6611, 6622.78, 6610.4, 6614.9]
                        },
                        {
                            x: new Date(1538809200000),
                            y: [6614.9, 6626.2, 6613.33, 6623.45]
                        },
                        {
                            x: new Date(1538811000000),
                            y: [6623.48, 6627, 6618.38, 6620.35]
                        },
                        {
                            x: new Date(1538812800000),
                            y: [6619.43, 6620.35, 6610.05, 6615.53]
                        },
                        {
                            x: new Date(1538814600000),
                            y: [6615.53, 6617.93, 6610, 6615.19]
                        },
                        {
                            x: new Date(1538816400000),
                            y: [6615.19, 6621.6, 6608.2, 6620]
                        },
                        {
                            x: new Date(1538818200000),
                            y: [6619.54, 6625.17, 6614.15, 6620]
                        },
                        {
                            x: new Date(1538820000000),
                            y: [6620.33, 6634.15, 6617.24, 6624.61]
                        },
                        {
                            x: new Date(1538821800000),
                            y: [6625.95, 6626, 6611.66, 6617.58]
                        },
                        {
                            x: new Date(1538823600000),
                            y: [6619, 6625.97, 6595.27, 6598.86]
                        },
                        {
                            x: new Date(1538825400000),
                            y: [6598.86, 6598.88, 6570, 6587.16]
                        },
                        {
                            x: new Date(1538827200000),
                            y: [6588.86, 6600, 6580, 6593.4]
                        },
                        {
                            x: new Date(1538829000000),
                            y: [6593.99, 6598.89, 6585, 6587.81]
                        },
                        {
                            x: new Date(1538830800000),
                            y: [6587.81, 6592.73, 6567.14, 6578]
                        },
                        {
                            x: new Date(1538832600000),
                            y: [6578.35, 6581.72, 6567.39, 6579]
                        },
                        {
                            x: new Date(1538834400000),
                            y: [6579.38, 6580.92, 6566.77, 6575.96]
                        },
                        {
                            x: new Date(1538836200000),
                            y: [6575.96, 6589, 6571.77, 6588.92]
                        },
                        {
                            x: new Date(1538838000000),
                            y: [6588.92, 6594, 6577.55, 6589.22]
                        },
                        {
                            x: new Date(1538839800000),
                            y: [6589.3, 6598.89, 6589.1, 6596.08]
                        },
                        {
                            x: new Date(1538841600000),
                            y: [6597.5, 6600, 6588.39, 6596.25]
                        },
                        {
                            x: new Date(1538843400000),
                            y: [6598.03, 6600, 6588.73, 6595.97]
                        },
                        {
                            x: new Date(1538845200000),
                            y: [6595.97, 6602.01, 6588.17, 6602]
                        },
                        {
                            x: new Date(1538847000000),
                            y: [6602, 6607, 6596.51, 6599.95]
                        },
                        {
                            x: new Date(1538848800000),
                            y: [6600.63, 6601.21, 6590.39, 6591.02]
                        },
                        {
                            x: new Date(1538850600000),
                            y: [6591.02, 6603.08, 6591, 6591]
                        },
                        {
                            x: new Date(1538852400000),
                            y: [6591, 6601.32, 6585, 6592]
                        },
                        {
                            x: new Date(1538854200000),
                            y: [6593.13, 6596.01, 6590, 6593.34]
                        },
                        {
                            x: new Date(1538856000000),
                            y: [6593.34, 6604.76, 6582.63, 6593.86]
                        },
                        {
                            x: new Date(1538857800000),
                            y: [6593.86, 6604.28, 6586.57, 6600.01]
                        },
                        {
                            x: new Date(1538859600000),
                            y: [6601.81, 6603.21, 6592.78, 6596.25]
                        },
                        {
                            x: new Date(1538861400000),
                            y: [6596.25, 6604.2, 6590, 6602.99]
                        },
                        {
                            x: new Date(1538863200000),
                            y: [6602.99, 6606, 6584.99, 6587.81]
                        },
                        {
                            x: new Date(1538865000000),
                            y: [6587.81, 6595, 6583.27, 6591.96]
                        },
                        {
                            x: new Date(1538866800000),
                            y: [6591.97, 6596.07, 6585, 6588.39]
                        },
                        {
                            x: new Date(1538868600000),
                            y: [6587.6, 6598.21, 6587.6, 6594.27]
                        },
                        {
                            x: new Date(1538870400000),
                            y: [6596.44, 6601, 6590, 6596.55]
                        },
                        {
                            x: new Date(1538872200000),
                            y: [6598.91, 6605, 6596.61, 6600.02]
                        },
                        {
                            x: new Date(1538874000000),
                            y: [6600.55, 6605, 6589.14, 6593.01]
                        },
                        {
                            x: new Date(1538875800000),
                            y: [6593.15, 6605, 6592, 6603.06]
                        },
                        {
                            x: new Date(1538877600000),
                            y: [6603.07, 6604.5, 6599.09, 6603.89]
                        },
                        {
                            x: new Date(1538879400000),
                            y: [6604.44, 6604.44, 6600, 6603.5]
                        },
                        {
                            x: new Date(1538881200000),
                            y: [6603.5, 6603.99, 6597.5, 6603.86]
                        },
                        {
                            x: new Date(1538883000000),
                            y: [6603.85, 6605, 6600, 6604.07]
                        },
                        {
                            x: new Date(1538884800000),
                            y: [6604.98, 6606, 6604.07, 6606]
                        },
                    ]
                }],
                chart: {
                    type: 'candlestick',
                    height: 350
                },
                xaxis: {
                    type: 'datetime'
                },
                yaxis: {
                    tooltip: {
                        enabled: true
                    }
                },
                colors: [success, danger]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo8 = function() {
            const apexChart = "#chart_8";
            var options = {
                series: [{
                        name: 'Bubble1',
                        data: generateBubbleData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                            min: 10,
                            max: 60
                        })
                    },
                    {
                        name: 'Bubble2',
                        data: generateBubbleData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                            min: 10,
                            max: 60
                        })
                    },
                    {
                        name: 'Bubble3',
                        data: generateBubbleData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                            min: 10,
                            max: 60
                        })
                    },
                    {
                        name: 'Bubble4',
                        data: generateBubbleData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                            min: 10,
                            max: 60
                        })
                    }
                ],
                chart: {
                    height: 350,
                    type: 'bubble',
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    opacity: 0.8
                },
                xaxis: {
                    tickAmount: 12,
                    type: 'category',
                },
                yaxis: {
                    max: 70
                },
                colors: [primary, success, warning, danger]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }



        var _demo9 = function() {
            const apexChart = "#chart_9";
            var options = {
                series: [{
                    name: "SAMPLE A",
                    data: [
                        [16.4, 5.4],
                        [21.7, 2],
                        [25.4, 3],
                        [19, 2],
                        [10.9, 1],
                        [13.6, 3.2],
                        [10.9, 7.4],
                        [10.9, 0],
                        [10.9, 8.2],
                        [16.4, 0],
                        [16.4, 1.8],
                        [13.6, 0.3],
                        [13.6, 0],
                        [29.9, 0],
                        [27.1, 2.3],
                        [16.4, 0],
                        [13.6, 3.7],
                        [10.9, 5.2],
                        [16.4, 6.5],
                        [10.9, 0],
                        [24.5, 7.1],
                        [10.9, 0],
                        [8.1, 4.7],
                        [19, 0],
                        [21.7, 1.8],
                        [27.1, 0],
                        [24.5, 0],
                        [27.1, 0],
                        [29.9, 1.5],
                        [27.1, 0.8],
                        [22.1, 2]
                    ]
                }, {
                    name: "SAMPLE B",
                    data: [
                        [36.4, 13.4],
                        [1.7, 11],
                        [5.4, 8],
                        [9, 17],
                        [1.9, 4],
                        [3.6, 12.2],
                        [1.9, 14.4],
                        [1.9, 9],
                        [1.9, 13.2],
                        [1.4, 7],
                        [6.4, 8.8],
                        [3.6, 4.3],
                        [1.6, 10],
                        [9.9, 2],
                        [7.1, 15],
                        [1.4, 0],
                        [3.6, 13.7],
                        [1.9, 15.2],
                        [6.4, 16.5],
                        [0.9, 10],
                        [4.5, 17.1],
                        [10.9, 10],
                        [0.1, 14.7],
                        [9, 10],
                        [12.7, 11.8],
                        [2.1, 10],
                        [2.5, 10],
                        [27.1, 10],
                        [2.9, 11.5],
                        [7.1, 10.8],
                        [2.1, 12]
                    ]
                }, {
                    name: "SAMPLE C",
                    data: [
                        [21.7, 3],
                        [23.6, 3.5],
                        [24.6, 3],
                        [29.9, 3],
                        [21.7, 20],
                        [23, 2],
                        [10.9, 3],
                        [28, 4],
                        [27.1, 0.3],
                        [16.4, 4],
                        [13.6, 0],
                        [19, 5],
                        [22.4, 3],
                        [24.5, 3],
                        [32.6, 3],
                        [27.1, 4],
                        [29.6, 6],
                        [31.6, 8],
                        [21.6, 5],
                        [20.9, 4],
                        [22.4, 0],
                        [32.6, 10.3],
                        [29.7, 20.8],
                        [24.5, 0.8],
                        [21.4, 0],
                        [21.7, 6.9],
                        [28.6, 7.7],
                        [15.4, 0],
                        [18.1, 0],
                        [33.4, 0],
                        [16.4, 0]
                    ]
                }],
                chart: {
                    height: 350,
                    type: 'scatter',
                    zoom: {
                        enabled: true,
                        type: 'xy'
                    }
                },
                xaxis: {
                    tickAmount: 10,
                    labels: {
                        formatter: function(val) {
                            return parseFloat(val).toFixed(1)
                        }
                    }
                },
                yaxis: {
                    tickAmount: 7
                },
                colors: [primary, success, warning]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo10 = function() {
            const apexChart = "#chart_10";
            var options = {
                series: [{
                        name: 'Jan',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    },
                    {
                        name: 'Feb',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    },
                    {
                        name: 'Mar',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    },
                    {
                        name: 'Apr',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    },
                    {
                        name: 'May',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    },
                    {
                        name: 'Jun',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    },
                    {
                        name: 'Jul',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    },
                    {
                        name: 'Aug',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    },
                    {
                        name: 'Sep',
                        data: generateData(20, {
                            min: -30,
                            max: 55
                        })
                    }
                ],
                chart: {
                    height: 350,
                    type: 'heatmap',
                },
                plotOptions: {
                    heatmap: {
                        shadeIntensity: 0.5,

                        colorScale: {
                            ranges: [{
                                    from: -30,
                                    to: 5,
                                    name: 'low',
                                    color: success
                                },
                                {
                                    from: 6,
                                    to: 20,
                                    name: 'medium',
                                    color: primary
                                },
                                {
                                    from: 21,
                                    to: 45,
                                    name: 'high',
                                    color: warning
                                },
                                {
                                    from: 46,
                                    to: 55,
                                    name: 'extreme',
                                    color: danger
                                }
                            ]
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo11 = function() {
            const apexChart = "#chart_11";
            var options = {
                series: [44, 55, 41, 17, 15],
                chart: {
                    width: 380,
                    type: 'donut',
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: [primary, success, warning, danger, info]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo12 = function() {
            const apexChart = "#chart_12";
            var options = {
                series: [<?= $produk_qty[1] ?>,
                         <?= $produk_qty[2] ?>,
                         <?= $produk_qty[3] ?>,
                         <?= $produk_qty[4] ?>,
                         <?= $produk_qty[5] ?>,
                ],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['<?= $produk_nama[1] ?>', 
                         '<?= $produk_nama[2] ?>', 
                         '<?= $produk_nama[3] ?>', 
                         '<?= $produk_nama[4] ?>', 
                         '<?= $produk_nama[5] ?>'
                        ],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: [primary, success, warning, danger, info]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo13 = function() {
            const apexChart = "#chart_13";
            var options = {
                series: [44, 55, 67, 83],
                chart: {
                    height: 350,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        dataLabels: {
                            name: {
                                fontSize: '22px',
                            },
                            value: {
                                fontSize: '16px',
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function(w) {
                                    // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                    return 249
                                }
                            }
                        }
                    }
                },
                labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
                colors: [primary, success, warning, danger]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        var _demo14 = function() {
            const apexChart = "#chart_14";
            var options = {
                series: [{
                    name: 'Series 1',
                    data: [80, 50, 30, 40, 100, 20],
                }, {
                    name: 'Series 2',
                    data: [20, 30, 40, 80, 20, 80],
                }, {
                    name: 'Series 3',
                    data: [44, 76, 78, 13, 43, 10],
                }],
                chart: {
                    height: 350,
                    type: 'radar',
                    dropShadow: {
                        enabled: true,
                        blur: 1,
                        left: 1,
                        top: 1
                    }
                },
                stroke: {
                    width: 0
                },
                fill: {
                    opacity: 0.4
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    categories: ['2011', '2012', '2013', '2014', '2015', '2016']
                },
                colors: [primary, success, warning]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        return {
            // public functions
            init: function() {
                _demo1();
                _demo2();
                _demo3();
                _demo4();
                _demo5();
                _demo6();
                _demo7();
                _demo8();
                _demo9();
                _demo10();
                _demo11();
                _demo12();
                _demo13();
                _demo14();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTApexChartsDemo.init();
    });
</script>


<div class="d-flex flex-column-fluid bgi-size-cover bgi-position-top bgi-no-repeat"  style="background-image: url('assets/media/bg/bg-311.jpg');">
    <div class=" container mt-n7">
     <div class="col-lg-12 col-xxl-4">
        <div class="card card-custom bg-gray-100 card-stretch gutter-b mt-10">
            <div class="card-body p-0 position-relative overflow-hidden">
                <div class="card-rounded-bottom " style="height: 75px"></div>
                <div class="card-spacer mt-n25">
                    <div class="row m-0">
                        <div class="col bg-light-success px-6 py-8 rounded-xl mr-6">
                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1" />
                                        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1" />
                                        <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                            <a href="" class="text-success font-weight-bold font-size-h6 mt-2">Earnings</a><br>
                            <span class="text-success font-weight-bold font-size-h2 m">
                                Rp.<?php echo number_format("$total_earn", 0, ",", "."); ?>
                            </span>
                        </div>
                        <div class="col bg-light-primary px-6 py-8 rounded-xl mr-6">
                            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                            </span>
                            <a href="" class="text-primary font-weight-bold font-size-h6 mt-2">Customers</a><br>
                            <span class="text-primary font-weight-bold font-size-h1 m">
                                <?php echo $jml_cust ?>
                            </span>
                        </div>
                        <div class="col bg-light-secondary px-6 py-8 rounded-xl  mr-6 ">
                            <div class="col-8">
                                <span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3" />
                                            <polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912" />
                                        </g>
                                    </svg>
                                </span>
                                <a href="main/product" class="text-info font-weight-bold font-size-h6">Product</a><br>
                                <span class="text-info font-weight-bold font-size-h1 m">
                                    <?php echo $jml_produk ?>
                                </span>
                            </div>


                        </div>
                        <div class="col bg-light-danger px-6 py-8 rounded-xl ">
                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                            <a href="" class="text-danger font-weight-bold font-size-h6 mt-2">Transactions</a><br>
                            <span class="text-danger font-weight-bold font-size-h1 m">
                                <?php echo $jml_transaksi ?>

                            </span>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <?php
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == 6) {
        ?>
            <div class="row mt-n4">
                <div class="col-lg-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label font-weight-bolder">Produk Terlaris</h3>
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-pie.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
                                </g>
                            </svg>
<!--end::Svg Icon--></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="chart_12" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
             

                	<div class="col-lg-6">
										<!--begin::List Widget 2-->
										<div class="card card-custom  card-stretch gutter-b">
											<div class="card-header ">
												<h3 class="card-title font-weight-bolder">Admin</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="main/admin/form" class="btn btn-clean btn-hover-success btn-sm btn-icon" >
															<i class="fas fa-plus text-primary"></i>
														</a>
														
													</div>
												</div>
											</div>
											<div class="card-body pt-2">
                                                 <?php
                                                        $no    = 0;
                                                        foreach ($query_admin->result() as $cust) {
                                                            $no++;
                                                            $admin_id        = $cust->admin_id;
                                                            $admin_nama        = $cust->admin_nama;
                                                            $admin_foto        = $cust->admin_foto;
                                                            $admin_email       = $cust->admin_email;
                                                            $admin_no_telp       = $cust->admin_no_telp;
                                                            $admin_alamat        = $cust->admin_alamat;



                                                        ?>
												<div class="d-flex align-items-center mb-5 mt-3">
                                                     
                                             <div class="row">
													<div class="symbol symbol-40 symbol-light-white mr-5">
														<div class="symbol-label">
															<img src="assets/media/foto_admin/<?php echo $admin_foto; ?>" class="h-75 align-center-end" alt="" />
														</div>
													</div>
													<div class="d-flex flex-column font-weight-bold mr-10">
												    <span href="#" class="text-dark mb-1 font-size-lg"><?php echo $admin_nama?>                            <a href="https://api.whatsapp.com/send?phone=<?= $admin_no_telp; ?>" target="_blank" class="btn btn-xs btn-success btn-icon"><i class="fab fa-whatsapp icon-md"></i></a></span>
													<span class="text-muted"><?php echo $admin_email; ?></span>
													</div>
                                                </div>
                                            </div>
                                            <div class="separator separator-dashed my-5"></div>
                                               <?php
                                            }
                                            ?>
													<!--end::Text-->
												

                                                
											
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 2-->
									</div>
            </div>
        <?php
        }
        ?>

    </div>
  </div>
</div>

    


<script>
    var _initStatsWidget7 = function() {
        var element = document.getElementById("kt_stats_widget_7_chart");

        if (!element) {
            return;
        }

        var options = {
            series: [{
                name: 'Net Profit',
                data: [30, 45, 32, 70, 40]
            }],
            chart: {
                type: 'area',
                height: 150,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {},
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [KTApp.getSettings()['colors']['theme']['base']['success']]
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false,
                    style: {
                        colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    }
                },
                crosshairs: {
                    show: false,
                    position: 'front',
                    stroke: {
                        color: KTApp.getSettings()['colors']['gray']['gray-300'],
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    }
                }
            },
            yaxis: {
                labels: {
                    show: false,
                    style: {
                        colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px',
                    fontFamily: KTApp.getSettings()['font-family']
                },
                y: {
                    formatter: function(val) {
                        return "$" + val + " thousands"
                    }
                }
            },
            colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
            markers: {
                colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
                strokeColor: [KTApp.getSettings()['colors']['theme']['base']['success']],
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    }
</script>
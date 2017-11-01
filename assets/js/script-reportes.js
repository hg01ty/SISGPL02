/* $(document).ready(function () {

          // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
              text: 'Resumen del Status de la Empresa'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.y}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                  enabled: false
                },
                showInLegend: true
              }
            },
            series: [{
              name: 'Porcentaje',
              colorByPoint: true,
              data: [
                {
                  name: 'Ganados',
                  y: 60
                },
                {
                  name: 'Perdidos',
                  y: 30,
                  sliced: true,
                  selected: true
                }, 
                {
                  name: 'Inconclusos',
                  y: 10
                },
              ]
            }]
          });

      // Build Column Basic
      Highcharts.chart('detalles', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Status anual de la empresa'
        },
        subtitle: {
            text: 'detallado por meses'
        },
        xAxis: {
            categories: [
                'Ene',
                'Feb',
                'Mar',
                'Abr',
                'May',
                'Jun',
                'Jul',
                'Ago',
                'Sep',
                'Oct',
                'Nov',
                'Dic'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Ganados',
            data: [3, 5, 6, 3, 6, 5, 8, 5, 6, 9, 5, 6]

        }, {
            name: 'Perdidos',
            data: [2, 3, 1, 1, 2, 3, 4, 1, 2, 3, 6, 3]

        }, {
            name: 'Inconclusos',
            data: [1, 2, 2, 1, 1, 3, 2, 1, 3, 3, 3,2]

        }]
    });


 });*/
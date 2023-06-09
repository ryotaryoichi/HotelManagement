<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales', 'Expenses', 'Profit'],
          ['Jan', 1000, 400, 600],
          ['Feb', 1170, 460, 710],
          ['Mar', 660, 1120, -460],
          ['Apr', 1030, 540, 490]
        ]);

        var options = {
          chart: {
            title: 'Hotel Performance',
            subtitle: 'Sales, Expenses, and Profit: Jan - April (in thousand)',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>

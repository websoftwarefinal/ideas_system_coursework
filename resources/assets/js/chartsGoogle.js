// Source W3: https://www.w3schools.com/ai/ai_google_chart.asp

fetch('/Controller/QaManagerStatisticsController.php').then(response => {
  if (!response.ok) {
    throw new Error('Network response was not ok');
  }
  return response.json();
}).then(data => {
  if(data){
    drawChart(data);
  }
}).catch(error => {
  console.error('Fetch error:', error);
});


function drawChart(chart_data) {

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(() => {
      // Set Data
    const data = google.visualization.arrayToDataTable(chart_data);

    // Set Options
    const options = {
      title:'Ideas Per Department'
    };

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);
  });
}

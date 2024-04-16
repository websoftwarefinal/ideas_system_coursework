// Source W3: https://www.w3schools.com/ai/ai_google_chart.asp

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Department', 'Ideas'],
  ['Computer Science',54.8],
  ['Engineering',48.6],
  ['Medicine',44.4],
  ['Law',23.9],
 
]);

// Set Options
const options = {
  title:'Ideas Per Department'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}

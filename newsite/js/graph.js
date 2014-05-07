function arrayToPlot(arr) {
	var data = [];
	for(var i = 0; i < arr.length; i++) {
		data[i] = {};
		data[i].date = i;
		data[i].plot = arr[i];
	}
	return data;
}

function generateTestData(){
	// generate random graphing data for our test
	var x = Math.floor((Math.random()*10)+10); 
	var data = [];
	for(var i=0; i<x; i++){
		data[i] = {};
		data[i].date = i;
		var tmp = Math.floor((Math.random()*20)+1);
		data[i].plot = (tmp>30)?30:tmp; /* aiming for somewhere between -y and y */
	}
	return data;
}
  
function clearCanvas(context, canvas) {
	context.clearRect(0, 0, canvas.width, canvas.height);
	var w = canvas.width;
	canvas.width = 1;
	canvas.width = w;
}

function chartMax(data) {
	var size = data.length;
	var max = -1;
	for(var i = 0; i < size; i++) {
		if(data[i].plot > max)
			max = data[i].plot;
	}
	return max;
}
  
function plotGraph(args) {
	var chartEl = args['chartEl'];
	console.log(chartEl);
	var data = args['data'];

	var canvas = document.getElementById(chartEl);
    
	if (canvas && canvas.getContext) {
		var context = canvas.getContext('2d');
		var padding_top = 30;
		var padding_bottom = 40;
		var padding_sides = 30;
		var x = padding_sides; /* start inside the grid so we can show the line endings */
		var y = canvas.height - padding_bottom;
		var lineColor = "#0D8FE6";
		var baseColor = "#777";
		clearCanvas(context, canvas);
		context.translate(0.5,0.5);

		// Draw bottom line
		context.beginPath();
		context.moveTo(padding_sides, canvas.height - padding_bottom);
		context.lineTo(canvas.width-padding_sides, canvas.height - padding_bottom);
		context.lineCap = 'round';
		context.lineWidth = 1;
		context.strokeStyle = baseColor;
		context.stroke();

		// Draw bottom line end circle
		context.beginPath();
		context.arc(canvas.width-padding_sides, y, 4, 0, 2 * Math.PI, false);
		context.fillStyle = baseColor;
		context.fill();

  		// Compute needed vars
		var l = data.length; if(!l) return;
		var max = chartMax(data);
		var scalar = (canvas.height-(padding_top + padding_bottom))/max;
		var xspacing = (canvas.width-x*2)/l;

		// Draw white shadow line
		context.beginPath();
		context.moveTo(x,y);
		for(var i=0; i<l; i++){
			context.lineTo(x += xspacing, y-((data[i].plot * scalar)-2));
		}
		context.lineCap = 'round';
		context.lineWidth = 2;
		context.strokeStyle = 'white';
		context.stroke();

		// Draw main purple line
		x = padding_sides;
		context.beginPath();
		context.moveTo(x,y);
		for(var i=0; i<l; i++){
			context.lineTo(x += xspacing, y-(data[i].plot * scalar));
		}
		context.lineCap = 'round';
		context.lineWidth = 1;
		context.strokeStyle = lineColor;
		context.stroke();

		// Draw first circle
		context.beginPath();
		context.arc(padding_sides, canvas.height-padding_bottom, 4, 0, 2 * Math.PI, false);
		context.fillStyle = lineColor;
		context.fill();

		// Draw last circle
		context.beginPath();
		context.arc(canvas.width-padding_sides, y-(data[data.length-1].plot*scalar), 4, 0, 2 * Math.PI, false);
		context.fillStyle = lineColor;
		context.fill();

		// Draw text for starting label
		var text = "Jan 4th, 2004 2:14pm";
		context.fillStyle = baseColor;
		context.font = "14px Arial";
		context.fillText(text, padding_sides, canvas.height-(padding_bottom/2)+5);

		// Draw text for ending label
		text = "Apr 27th, 2014 6:35pm";
		context.fillStyle = baseColor;
		context.font = "14px Arial";
		var textWidth = context.measureText(text);
		context.fillText(text, (canvas.width-padding_sides)-textWidth.width, canvas.height-(padding_bottom/2)+5);

      
	} else {
		/* unsupported browser */
		alert("Couldn't get a reference to the HTML 5 canvas. Your browser doesn't appear to support this page.");
	}
}; 

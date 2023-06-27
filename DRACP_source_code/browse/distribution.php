<style>
#chartContainer{
border:solid 1px #999;
}
</style>

<script src="http://cloud.github.com/downloads/scottkiss/H5Draw/H5Draw.js"></script>
<script src="http://cloud.github.com/downloads/scottkiss/H5Draw/h5Charts.js"></script>

<?php 

		$sqlde="select * from amino_distrib  where  DRACP_ID='$tit'  order by DRACP_ID asc ";
		$rsde=mysqli_query($conn,$sqlde);
		$distrib_info=@mysqli_fetch_assoc($rsde)

?>



<script>
window.onload = function(){
var chart = new h5Charts.SerialChart();
chart.dataProvider = [{acid:"A",number:<?php echo "{$distrib_info['Alanine']}"; ?>},{acid:"R",number:<?php echo "{$distrib_info['Arginine']}"; ?>},{acid:"N",number:<?php echo "{$distrib_info['Asparagine']}"; ?>},{acid:"D",number:<?php echo "{$distrib_info['Aspartic_Acid']}"; ?>},{acid:"C",number:<?php echo "{$distrib_info['Cysteine']}"; ?>},{acid:"E",number:<?php echo "{$distrib_info['Glutamic_Acid']}"; ?>},{acid:"Q",number:<?php echo "{$distrib_info['Glutamine']}"; ?>},{acid:"G",number:<?php echo "{$distrib_info['Glycine']}"; ?>},{acid:"H",number:<?php echo "{$distrib_info['Histidine']}"; ?>},{acid:"I",number:<?php echo "{$distrib_info['Isoleucine']}"; ?>},{acid:"L",number:<?php echo "{$distrib_info['Leucine']}"; ?>},{acid:"K",number:<?php echo "{$distrib_info['Lysine']}"; ?>},{acid:"M",number:<?php echo "{$distrib_info['Methionine']}"; ?>},{acid:"F",number:<?php echo "{$distrib_info['Phenylalanine']}"; ?>},{acid:"P",number:<?php echo "{$distrib_info['Proline']}"; ?>},{acid:"S",number:<?php echo "{$distrib_info['Serine']}"; ?>},{acid:"T",number:<?php echo "{$distrib_info['Threonine']}"; ?>},{acid:"W",number:<?php echo "{$distrib_info['Tryptophan']}"; ?>},{acid:"Y",number:<?php echo "{$distrib_info['Tyrosine']}"; ?>},{acid:"V",number:<?php echo "{$distrib_info['Valine']}"; ?>}];
chart.categoryField = "acid";
chart.valueField = "number";
chart.type = "column";
chart.columnWidth = 30;
chart.colors = ["#f00","#0f0","#0ff","#d649b3","#00e0ee","#59266c","#00f","#0f0","#056a4c","#f00","#f00","#909648","#0ff","#c87ae5","#0ff","#0f0","#899508","#0f0","#056a4c","#f00","#6f1391"];
chart.addTo("chartContainer");
};
</script>



<canvas id="chartContainer" width="720" height="360">

</canvas>
<script type="text/javascript">
	function goBarChart(dataArr) {
		var canvas, ctx;
		var cWidth, cHeight, cMargin, cSpace;
		var originX, originY;
		var bMargin, tobalBars, bWidth, maxValue;
		var totalYNomber;
		var gradient;

		var ctr, numctr, speed;
		var mousePosition = {};

		canvas = document.getElementById("chartContainer");
		if (canvas && canvas.getContext) {
			ctx = canvas.getContext("2d");
		}
		initChart(); 

		function initChart() {
			cMargin = 15;
			cSpace = 25;
			cHeight = canvas.height - cMargin * 2 - cSpace;
			cWidth = canvas.width - cMargin * 2 - cSpace;
			originX = cMargin + cSpace;
			originY = cMargin + cHeight;

			bMargin = 15;
			tobalBars = dataArr.length;
			bWidth = parseInt(cWidth / tobalBars - bMargin);
			maxValue = 0;
			for (var i = 0; i < dataArr.length; i++) {
				var barVal = parseInt(dataArr[i][1]);
				if (barVal > maxValue) {
					maxValue = barVal;
				}
			}
			maxValue += 1;
			totalYNomber = maxValue;
			ctr = 1;
			numctr = 100;
			speed = 10;
// 			font = "12px Arial";

			gradient = ctx.createLinearGradient(0, 0, 0, 300);
			//gradient.addColorStop(0, 'rgba(99 184 255)');
	gradient.addColorStop(1, 'rgba(85,160,151,1)');

		}
		drawLineLabelMarkers();

		function drawLineLabelMarkers() {
			ctx.translate(0.5, 0.5); 
			ctx.font = "14px Arial";
			ctx.lineWidth = 1;
			ctx.fillStyle = "#000";
			ctx.strokeStyle = "#000";
			drawLine(originX, originY, originX, cMargin);
			drawLine(originX, originY, originX + cWidth, originY);

			drawMarkers();
			ctx.translate(-0.5, -0.5); 
		}

		function drawLine(x, y, X, Y) {
			ctx.beginPath();
			ctx.moveTo(x, y);
			ctx.lineTo(X, Y);
			ctx.stroke();
			ctx.closePath();
		}

		function drawMarkers() {
			ctx.strokeStyle = "#E0E0E0";
			var oneVal = parseInt(maxValue / totalYNomber);
			ctx.textAlign = "right";
			for (var i = 0; i <= totalYNomber; i++) {
				var markerVal = i * oneVal;
				var xMarker = originX - 5;
				var yMarker = parseInt(cHeight * (1 - markerVal / maxValue)) + cMargin;
				//console.log(xMarker, yMarker+3,markerVal/maxValue,originY);
				ctx.fillText(markerVal, xMarker, yMarker + 3, cSpace); 
				if (i > 0) {
					drawLine(originX, yMarker, originX + cWidth, yMarker);
				}
			}
			ctx.textAlign = "center";
			for (var i = 0; i < tobalBars; i++) {
				var markerVal = dataArr[i][0];
				var xMarker = parseInt(originX + cWidth * (i / tobalBars) + bMargin + bWidth / 2);
				var yMarker = originY + 15;
				ctx.fillText(markerVal, xMarker, yMarker, cSpace); 
			}
			ctx.save();
			ctx.rotate(-Math.PI / 2);
			ctx.fillText("Number", -canvas.height /2.2, cSpace - 10);
			ctx.restore();
// 			ctx.fillText("Amino Acid Distribution", originX + cWidth / 2, originY + cSpace / 2 + 20);


	//ctx.fillText("18261", originX + cWidth - 40, cSpace - 10);
		};
		drawBarAnimate();
		function drawBarAnimate(mouseMove) {
			for (var i = 0; i < tobalBars; i++) {
				var oneVal = parseInt(maxValue / totalYNomber);
				var barVal = dataArr[i][1];
				var barH = parseInt(cHeight * barVal / maxValue * ctr / numctr);
				var y = originY - barH;
				var x = originX + (bWidth + bMargin) * i + bMargin;
				drawRect(x, y, bWidth, barH, mouseMove); 
				ctx.fillText(parseInt(barVal * ctr / numctr), x + 10, y - 8); 
			}
			if (ctr < numctr) {
				ctr++;
				setTimeout(function () {
					ctx.clearRect(0, 0, canvas.width, canvas.height);
					drawLineLabelMarkers();
					drawBarAnimate();
				}, speed);
			}
		}
		function drawRect(x, y, X, Y, mouseMove) {

			ctx.beginPath();
			ctx.rect(x, y, X, Y);
			if (mouseMove && ctx.isPointInPath(mousePosition.x, mousePosition.y)) { 
				ctx.fillStyle = "#34a364";
			} else {
				ctx.fillStyle = gradient;
				ctx.strokeStyle = gradient;
			}
			ctx.fill();
			ctx.closePath();

		}
		var mouseTimer = null;
		canvas.addEventListener("mousemove", function (e) {
			e = e || window.event;
			if (e.offsetX || e.offsetX == 0) {
				mousePosition.x = e.offsetX;
				mousePosition.y = e.offsetY;
			} else if (e.layerX || e.layerX == 0) {
				mousePosition.x = e.layerX;
				mousePosition.y = e.layerY;
			}

			clearTimeout(mouseTimer);
			mouseTimer = setTimeout(function () {
				ctx.clearRect(0, 0, canvas.width, canvas.height);
				drawLineLabelMarkers();
				drawBarAnimate(true);
			},50);
		});
		canvas.onclick = function () {
			initChart(); 
			drawLineLabelMarkers(); 
			drawBarAnimate(); 
		};
	};
	goBarChart(
		[
			['Ala', <?php echo($distrib_info['Alanine']); ?>],
			['Arg', <?php echo($distrib_info['Arginine']); ?>],
			['Asn', <?php echo($distrib_info['Asparagine']); ?>],
			['Asp', <?php echo($distrib_info['Aspartic Acid']); ?>],
			['Cys', <?php echo($distrib_info['Cysteine']); ?>],
			['Glu', <?php echo($distrib_info['Glutamic Acid']); ?>],
			['Gln', <?php echo($distrib_info['Glutamine']); ?>],
			['Gly', <?php echo($distrib_info['Glycine']); ?>],
			['His', <?php echo($distrib_info['Histidine']); ?>],
			['Ile', <?php echo($distrib_info['Isoleucine']); ?>],
			['Leu', <?php echo($distrib_info['Leucine']); ?>],
			['Lys', <?php echo($distrib_info['Lysine']); ?>],
			['Met', <?php echo($distrib_info['Methionine']); ?>],
			['Phe', <?php echo($distrib_info['Phenylalanine']); ?>],
			['Pro', <?php echo($distrib_info['Proline']); ?>],
			['Ser', <?php echo($distrib_info['Serine']); ?>],
			['Thr', <?php echo($distrib_info['Threonine']); ?>],
			['Trp', <?php echo($distrib_info['Tryptophan']); ?>],
			['Tyr', <?php echo($distrib_info['Tyrosine']); ?>],
			['Val', <?php echo($distrib_info['Valine']); ?>]
		]
	)
</script>
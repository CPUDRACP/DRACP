

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Welcome To DRACP</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/public.css">
     <script language="Javascript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>

          <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="../js/jquery-1.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>       
    <script src="http://cdn.highcharts.com.cn/highcharts/highcharts.js"></script> 
    <script src="http://cdn.highcharts.com.cn/highcharts/modules/exporting.js"></script>
    <script src="http://dracp.cpu-bioinfor.org/static/highcharts/highcharts.js"></script>
    <script src="http://dracp.cpu-bioinfor.org/static/highcharts/exporting.js"></script>
    <script src="http://dracp.cpu-bioinfor.org/static/highcharts/variable-pie.js"></script>
    <script src="http://dracp.cpu-bioinfor.org/static/highcharts/wordcloud.js"></script>
    <script src="http://dracp.cpu-bioinfor.org/static/highcharts/oldie.js"></script>
    
	
	<!--<style>
body { font-family:Arial, Helvetica, sans-serif;}
h2 { text-align:center; font-weight:bold;}
.p_question { font-size:20px; padding-left:300px; font-weight:bold; padding-top:50px;}
img { padding-left:50px;}
.no { font-size:18px; font-family:"Arial Black", Gadget, sans-serif;}
</style> -->


   
</head>


<body style="background-color:#fff;">


<?php

          require_once ("../head/head_content.php");

?>

<div class="container" style="padding-bottom:100px;">


    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dracp.cpu-bioinfor.org">Home</a></li>
            <li class="active">Statistic</li>
        </ol>
    </div>
    <div class="row">
	<h2 style="text-align:center;color:#087d49;">Data statistics in DRACP (By May 2023)</h2>
	<br/>

    <!--<h4 style="font-weight: bold; ">1. Summary of information(By May 2023)</h4>-->
    
    <!--    <div class="container" style="margin:20px 40px 0;">-->
    <!--      <table class="table table-bordereddown text-center">-->
    <!--		<thead class="table-headerdown">-->
    <!--          <tr>-->
    <!--            <th rowspan="2" class="table-celldown">Basic information</th>-->
    <!--            <th colspan="3" class="table-celldown">Number</th>-->
    <!--          </tr>-->
    <!--        </thead>-->
    <!--		<tbody>-->
    <!--          <tr>-->
    <!--            <td class="table-inner-celldown">Total entries</td>-->
    <!--            <td class="table-inner-celldown">6920</td>-->
    <!--          </tr>-->
    <!--          <tr>-->
    <!--            <td class="table-inner-celldown">ACP entries</td>-->
    <!--            <td class="table-inner-celldown">6813</td>-->
    <!--          </tr>-->
    <!--          <tr>-->
    <!--            <td class="table-inner-celldown">Peptide drug preparations</td>-->
    <!--            <td class="table-inner-celldown">107</td>-->
    <!--          </tr>-->
              <!--<tr>-->
              <!--  <td class="table-inner-celldown">Unique ACP sequence</td>-->
              <!--  <td class="table-inner-celldown">1705</td>-->
              <!--</tr>-->
              <!--<tr>-->
              <!--  <td class="table-inner-celldown">Peptide drug active ingredients</td>-->
              <!--  <td class="table-inner-celldown">85</td>-->
              <!--</tr>-->
    <!--          <tr>-->
    <!--            <td class="table-inner-celldown">ACP entry annotation information</td>-->
    <!--            <td class="table-inner-celldown">56</td>-->
    <!--          </tr>-->
    <!--          <tr>-->
    <!--            <td class="table-inner-celldown">Peptide drug entry annotation information</td>-->
    <!--            <td class="table-inner-celldown">25</td>-->
    <!--          </tr>-->
    <!--		</tbody>-->
    <!--      </table> -->
    <!--    </div>-->

    <h4 style="font-weight: bold; ">1. Length distribution of ACP in DRACP</h2>
    <h4 style="margin-top: 20px; ">1) Pie chart</h4>
    <div id="length_distributionp" style="min-width: 600px; height:550px; margin:35px 40px 40px 30px;"></div>
    <script>
        var chart = Highcharts.chart('length_distributionp', {
        	chart: {
        		spacing : [40, 0 , 40, 0]
        	},
        	title: {
        		floating:true,
        		text: null
        	},
        	tooltip: {
        		headerFormat: '',
        		pointFormat: '<span style="color:{point.color}">\u25CF</span> Length<b style="color:{point.color}"> {point.name}</b><br>' + 
        		' Percent: <b>{point.y}%</b><br/>'
        	},
        	plotOptions: {
        		pie: {
        			allowPointSelect: true,
        			cursor: 'pointer',
        			dataLabels: {
        				enabled: true,
        				format: '<b>{point.name}</b>',
        				style: {
        					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        				}
        			},
        			point: {
        				events: {
        					mouseOver: function(e) {  // 鼠标滑过时动态更新标题
        						// 标题更新函数，API 地址：https://api.hcharts.cn/highcharts#Chart.setTitle
        						chart.setTitle({
        							text: e.target.name+ '\t'+ e.target.y + ' %'
        						});
        					}
        					, 
        					click: function(e) { // 同样的可以在点击事件里处理
        						chart.setTitle({
        							text: e.point.name+ '\t'+ e.point.y + ' %'
        						});
        					}
        				}
        			},
        		}
        	},
        	series: [{
        		type: 'pie',
        		innerSize: '30%',
        		name: 'Percent',
        		data: [ {
        			name: '2~8',
        			// color: '#fff',
        			y: 11.57,
        			// z: 1.1
        		}, {
        			name: '9-15',
        			color: '#b0b3f1',
        			y: 39.91,
        			// z: 1.2
        		}, {
        			name: '16-30',
        			// color: '#fff',
        			y: 41.39,
        			// z: 1.2
        		}, {
        			name: '31-50',
        			// color: '#fff',
        			y: 6.18,
        			// z: 1.3
        		}, {
        			name: '51~100',
        			// color: '#fff',
        			y: 0.95,
        			// z: 1.4
        		}]
        	}]
        }, function(c) { // 图表初始化完毕后的会掉函数
        	// 环形图圆心
        	var centerY = c.series[0].center[1],
        		titleHeight = parseInt(c.title.styles.fontSize);
        	// 动态设置标题位置
        	c.setTitle({
        		y:centerY + titleHeight/2
        	});
        });
    </script>
    
    <h4 style="margin-top: 20px; ">2) Histogram</h4>
    <div id="length_distributionc" style="min-width: 600px; height:550px; margin:35px 40px 40px 30px;"></div>
    <script>
        var chart = Highcharts.chart('length_distributionc', {
        	chart: {
        		type: 'column'
        	},
        	title: {
        		text: null
        	},
        	subtitle: {
        		text: null
        	},
        	xAxis: {
        		title:{
        			text:'Length'
        		},
        		type: 'category',
        		labels: {
        			rotation: -45  // 设置轴标签旋转角度
        		}
        	},
        	yAxis: {
        		min: 0,
        		title: {
        			text: 'Count'
        		}
        	},
        	legend: {
        		enabled: false
        	},
        	tooltip: {
        		headerFormat: '',
        		pointFormat: '<span style="color:{point.color}">\u25CF</span> Length<b style="color:{point.color}"> {point.name}</b><br>' + 
        		' Number: <b>{point.y}</b><br/>'
        	},
        	series: [{
        		colorByPoint: true,
        		name: 'Number',
        		showInLegend: false,
        		data: [
        			['2', 88],
        			['3', 32],
        			['4', 66],
        			['5', 124],
        			['6', 156],
        			['7', 155],
        			['8', 167],
        			['9', 586],
        			['10', 445],
        			['11', 330],
        			['12', 433],
        			['13', 359],
        			['14', 211],
        			['15', 355],
        			['16', 284],
        			['17', 287],
        			['18', 269],
        			['19', 241],
        			['20', 209],
        			['21', 139],
        			['22', 138],
        			['23', 134],
        			['24', 120],
        			['25', 79],
        			['26', 107],
        			['27', 425],
        			['28', 178],
        			['29', 108],
        			['30', 102],
        			['31', 50],
        			['32', 46],
        			['33', 34],
        			['34', 43],
        			['35', 29],
        			['36', 20],
        			['37', 46],
        			['38', 27],
        			['39', 18],
        			['40', 18],
        			['41', 7],
        			['42', 8],
        			['43', 7],
        			['44', 1],
        			['45', 15],
        			['46', 13],
        			['47', 21],
        			['48', 5],
        			['49', 4],
        			['50', 9],
        			['51-60', 19],
        			['61-70', 11],
        			['71-80', 17],
        			['81-100', 18],
        // 			['55', 2],
        // 			['56', 1],
        // 			['57', 1],
        // 			['58', 2],
        // 			['59', 1],
        // 			['60', 5],
        // 			['61', 2],
        // 			['62', 2],
        // 			['63', 1],
        // 			['64', 1],
        // 			['65', 2],
        // 			['66', 1],
        // 			['70', 2],
        // 			['71', 1],
        // 			['72', 3],
        // 			['74', 2],
        // 			['75', 7],
        // 			['77', 1],
        // 			['78', 3],
        // 			['81', 1],
        // 			['83', 2],
        // 			['84', 3],
        // 			['85', 1],
        // 			['86', 2],
        // 			['87', 4],
        // 			['88', 1],
        // 			['89', 2],
        // 			['91', 1]，
        // 			['97', 1]
        		],
        		dataLabels: {
        			enabled: true,
        			format: '{point.y}', 
        		}
        	}]
        });
    </script>
    
    <h4 style="font-weight: bold; ">2. Amino acid composition of ACP in DRACP</h2>
    <div id="amino_acid_composition" style="min-width: 600px; height:550px;margin:35px 40px 40px 30px;"></div>
    <script>
        var chart = Highcharts.chart('amino_acid_composition', {
        	chart: {
        		type: 'column'
        	},
        	title: {
        		text: null
        	},
        	subtitle: {
        		text: null
        	},
        	xAxis: {
        		title:{
        			text: null
        		},
        		type: 'category',
        		labels: {
        			rotation: -45  // 设置轴标签旋转角度
        		}
        	},
        	yAxis: {
        		title: {
        			text: 'Percent(%)'
        		}
        	},
        	legend: {
        		enabled: false
        	},
        	tooltip: {
        		headerFormat: '',
        		pointFormat: '<span style="color:{point.color}">\u25CF<b> {point.name}</b></span><br>' + 
        		' Percentage: <b>{point.y}%</b><br/>'
        	},
        	series: [{
        		colorByPoint: true,
        		name: 'Amino acid percentage',
        		// showInLegend: false,
        		data: [{
        			name: 'Alanine',
        			y: 7.17,
        		}, {
        			name: 'Arginine',
        			y: 11.45,
        		}, {
        			name: 'Asparagine',
        			y: 2.63,
        		}, {
        			name: 'Aspartic acid',
        			y: 2.56,
        		}, {
        			name: 'Cysteine',
        			y: 3.06,
        		}, {
        			name: 'Glutamine',
        			y: 2.32,
        		},{
        			name: 'Glutamic acid',
        			y: 3.28,
        		}, {
        			name: 'Glycine',
        			y: 6.18,
        		}, {
        			name: 'Histidine',
        			y: 1.63,
        		}, {
        			name: 'Isoleucine',
        			y: 5.82,
        		}, {
        			name: 'Leucine',
        			y: 9.72,
        		}, {
        			name: 'Lysine',
        			y: 11.62,
        		},{
        			name: 'Methionine',
        			y: 1.22,
        		}, {
        			name: 'Phenylalanine',
        			y: 4.54,
        		}, {
        			name: 'Proline',
        			y: 4.19,
        		},{
        			name: 'Serine',
        			y: 3.74,
        		}, {
        			name: 'Threonine',
        			y: 2.83,
        		}, {
        			name: 'Tryptophan',
        			y: 3.51,
        		}, {
        			name: 'Tyrosine',
        			y: 2.89,
        		}, {
        			name: 'Valine',
        			y: 4.82,
        		}, {
        			name: 'Unusal amino acid',
        			y: 4.82,
        		}],
        		dataLabels: {
        			enabled: true,
        			format: '{point.y}%',
        		}
        	}]
        });
    </script>
    
    <h4 style="font-weight: bold; ">3. Partial target statistics</h2>
    <div id="target" style="min-width: 600px; height:550px;margin:35px 40px 40px 30px;"></div>
    
    <script>
        var chart = Highcharts.chart('target', {
        		chart: {
            		type: 'bar'
            	},
            	title: {
            		text: null
            	},
            	subtitle: {
            		text: null
            	},
            	xAxis: {
            		title:{
            			text: null
            		},
            		type: 'category',
            		// labels: {
            		// 	rotation: -45  // 设置轴标签旋转角度
            		// }
            	},
            	yAxis: {
            		title: {
            			text: 'Count'
            		}
            	},
            	legend: {
            		enabled: false
            	},
            	tooltip: {
            		headerFormat: '',
            		pointFormat: '<span style="color:{point.color}">\u25CF<b> {point.name}</b></span><br>' + 
            		' Percentage: <b>{point.y}</b><br/>'
            	},
            	series: [{
            		colorByPoint: true,
            		name: 'Amino acid percentage',
            		// showInLegend: false,
            		data: [{
            			name: 'Bfl-1',
            			y: 4,
            		}, {
            			name: 'Bcl',
            			y: 394,
            		}, {
            			name: 'Chymotrypsin',
            			y: 8,
            		}, {
            			name: 'CXCR',
            			y: 7,
            		}, {
            			name: 'EGFR',
            			y: 11,
            		}, {
            			name: 'HLA',
            			y: 531,
            		},{
            			name: 'Integrin',
            			y: 34,
            		}, {
            			name: 'Metalloproteinases',
            			y: 8,
            		}, {
            			name: 'IL4 Receptor',
            			y: 4,
            		}, {
            			name: 'Mcl-1',
            			y: 371,
            		}, {
            			name: 'MDM2',
            			y: 51,
            		}, {
            			name: 'MDMX',
            			y: 24,
            		},{
            			name: 'TGFβ',
            			y: 2,
            		}, {
            			name: 'TfR',
            			y: 3,
            		}, {
            			name: 'Tubulin',
            			y: 14,
            		},{
            			name: 'RORs',
            			y: 4,
            		}, {
            			name: 'VEGF',
            			y: 23,
            		}, {
            			name: 'α9α10nAChR',
            			y: 117,
            		}, {
            			name: 'α-Glucosidase',
            			y: 6,
            		}, {
            			name: 'β-catenin',
            			y: 19,
            			// }, {
            			// 	name: 'Unusal amino acid',
            			// 	y: 4.82,
            		}],
            		dataLabels: {
            			enabled: true,
            			format: '{point.y}',
            		}
            	}]
            });
    </script>
    
    <h4 style="font-weight: bold; ">4. Percentage of hydrophobic residue of ACP in DRACP</h2>
    <div id="hydrophobic" style="min-width: 600px; height:550px;margin:35px 40px 40px 30px;"></div>
    <script>
        var chart = Highcharts.chart('hydrophobic', {
        	chart: {
        		type: 'column'
        	},
        	title: {
        		text: null
        	},
        	subtitle: {
        		text: null
        	},
        	xAxis: {
        		title:{
        			text: 'Percentage of hydrophobic residue(%)'
        		},
        		type: 'category',
        		labels: {
        			rotation: -45  // 设置轴标签旋转角度
        		}
        	},
        	yAxis: {
        		title: {
        			text: 'Percent(%)'
        		}
        	},
        	legend: {
        		enabled: false
        	},
        	tooltip: {
        		headerFormat: '',
        		pointFormat: '<span style="color:{point.color}">\u25CF<b> {point.name}</b></span><br>' + 
        		' Percentage: <b>{point.y}%</b><br/>'
        	},
        	series: [{
        		colorByPoint: true,
        		name: 'Amino acid percentage',
        		// showInLegend: false,
        		data: [{
        			name: '[0-10]',
        			y: 8.45
        			// sliced: true,
        			// selected: true
        		}, {
        			name: '(10-20]',
        			y: 10.54
        		}, {
        			name: '(20-30]',
        			y: 14.12
        		}, {
        			name: '(30-40]',
        			y: 23.34
        		}, {
        			name: '(40-50]',
        			y: 23.31
        		}, {
        			name: '(50-60]',
        			y: 12.07
        		}, {
        			name: '(60-70]',
        			y: 5.61
        		}, {
        			name: '(70-80]',
        			y: 1.86
        		}, {
        			name: '(80-90]',
        			y: 0.38
        		}, {
        			name: '(90-100]',
        			y: 0.32
        		}],
        		dataLabels: {
        			enabled: true,
        			format: '{point.y}%',	
        		}  
        	}]
        });
    </script>
    
    <h4 style="font-weight: bold; ">5. Top 20 Cancer Cell Lines in the DRACP Anticancer Activity Test</h2>
    <div id="cell_line" style="min-width: 600px; height:550px;margin:20px 40px 40px 30px;"></div>
    <script>
        var text = 'HeLa K562 A549 Jurkat K562 A549 Jurkat K562 A549 Jurkat K562 A549 Jurkat K562 A549 K562 K562 A549 A549 A549 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 Jurkat K562 K562 U-937 HeLa HeLa K562 K562 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HeLa HeLa HeLa CCRF-CEM MDA-MB-231 A549 CCRF-CEM MDA-MB-231 A549 CCRF-CEM MDA-MB-231 A549 K562 HeLa MCF-7 MDA-MB-231 A549 MDA-MB-231 A549 MDA-MB-231 A549 A549 PC-3 MCF-7 A549 PC-3 MCF-7 A549 PC-3 MCF-7 A549 PC-3 MCF-7 A549 MCF-7 A549 PC-3 MCF-7 A549 PC-3 MCF-7 A549 PC-3 MCF-7 HepG2 HepG2 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 HeLa Jurkat HL-60 A549 PC-3 HeLa MCF-7 HL-60 HepG2 PC-3 MCF-7 HL-60 Jurkat MCF-7 HL-60 Jurkat MCF-7 HL-60 Jurkat MCF-7 HL-60 Jurkat MCF-7 HL-60 Jurkat MCF-7 HL-60 Jurkat MCF-7 K562 HL-60 HepG2 PC-3 U-937 SW480 MCF-7 PC-3 MCF-7 MDA-MB-231 HeLa HT-29 MCF-7 HeLa HT-29 MCF-7 HeLa HT-29 MCF-7 HeLa HT-29 MCF-7 HeLa HT-29 MCF-7 HeLa HT-29 MCF-7 HeLa HT-29 MCF-7 HeLa HT-29 MCF-7 HeLa HT-29 MCF-7 A549 HCT-116 MCF-7 PC-3 A549 HCT-116 MCF-7 PC-3 A549 HCT-116 MCF-7 PC-3 HepG2 U-937 K562 U-937 K562 MCF-7 PC-3 U-937 K562 MCF-7 PC-3 U-937 K562 MCF-7 PC-3 U-937 K562 MCF-7 PC-3 U-937 K562 MCF-7 PC-3 U-937 K562 MCF-7 PC-3 A549 MCF-7 HeLa HeLa HeLa HeLa HeLa HeLa A549 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 HepG2 HepG2 Jurkat K562 U-937 U-937 U-937 U-937 HL-60 HL-60 MCF-7 Jurkat CCRF-CEM HL-60 K562 MCF-7 MDA-MB-231 A549 HCT-116 HT-29 PC-3 HCT-116 HCT-116 A549 A549 A549 A549 HeLa HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 MCF-7 MCF-7 MDA-MB-231 MCF-7 A549 HeLa HT-29 MDA-MB-231 MCF-7 A549 HeLa HT-29 MDA-MB-231 MCF-7 A549 HeLa HT-29 MDA-MB-231 MCF-7 A549 HeLa HT-29 MCF-7 MCF-7 HeLa MCF-7 K562 HeLa MCF-7 K562 HT-29 HT-29 HepG2 PC-3 K562 K562 K562 K562 K562 K562 K562 HT-29 U-937 U-937 U-937 HeLa HeLa HeLa HL-60 MDA-MB-231 HeLa PC-3 MCF-7 A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 NCI-H1299 HeLa A549 MCF-7 HeLa MDA-MB-231 MDA-MB-231 HeLa HepG2 HeLa HepG2 HeLa HepG2 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 HT-29 HT-29 HT-29 HeLa HeLa HeLa HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa K562 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 MDA-MB-231 MDA-MB-231 MCF-7 HeLa HeLa HL-60 HeLa HL-60 HeLa HL-60 RAW2647 HL-60 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HL-60 HL-60 HL-60 MDA-MB-231 MDA-MB-231 HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM SW480 SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM A549 MCF-7 A549 MCF-7 A549 MCF-7 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HepG2 A549 HeLa HepG2 A549 HeLa HepG2 A549 HeLa HepG2 A549 A549 HCT-116 PC-3 A549 HCT-116 PC-3 A549 HCT-116 PC-3 A549 HCT-116 PC-3 SW480 SW480 U-937 U-937 SW480 SW480 U-937 U-937 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa A549 A549 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 PC-3 MDA-MB-231 HeLa HepG2 HT-29 MCF-7 HepG2 HL-60 THP-1 HeLa HeLa HeLa HeLa HeLa MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 A549 HL-60 MCF-7 PC-3 HeLa MCF-7 HT-29 HepG2 HeLa K562 PC-3 HCT-116 HeLa HL-60 HeLa HL-60 HeLa HL-60 HeLa MCF-7 MCF-7 MCF-7 HeLa HeLa HeLa HeLa HeLa MDA-MB-231 MCF-7 A549 MCF-7 MCF-7 HepG2 PC-3 HepG2 HT-29 MCF-7 MCF-7 MCF-7 MCF-7 HepG2 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 A549 MDA-MB-231 HT-29 HT-29 A549 MDA-MB-231 THP-1 MDA-MB-231 THP-1 MDA-MB-231 HeLa A549 MDA-MB-231 HT-29 A549 MDA-MB-231 HT-29 A549 MDA-MB-231 HT-29 MCF-7 MDA-MB-231 Jurkat A549 MDA-MB-231 HT-29 A549 MDA-MB-231 HT-29 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa A549 A549 A549 A549 A549 PC-3 PC-3 PC-3 SW480 SW480 SW480 SW480 SW480 SW480 THP-1 THP-1 HeLa THP-1 HepG2 HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L HeLa MM96L A549 HepG2 HeLa HepG2 HeLa PC-3 U-937 THP-1 U-937 THP-1 HL-60 HepG2 A549 HT-29 HeLa A549 MDA-MB-231 HT-29 A549 MDA-MB-231 HT-29 PC-3 PC-3 A549 HeLa HeLa HeLa MCF-7 A549 HeLa MCF-7 A549 HeLa PC-3 HepG2 HeLa PC-3 HepG2 HeLa HeLa HeLa HeLa HeLa A549 A549 HeLa A549 MCF-7 U-937 U-937 U-937 U-937 U-937 U-937 U-937 PC-3 U-937 Jurkat Jurkat A549 A549 A549 A549 A549 A549 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 MCF-7 PC-3 HT-29 HeLa PC-3 HeLa PC-3 HeLa PC-3 HeLa PC-3 HeLa PC-3 HeLa PC-3 HeLa HeLa HeLa HeLa HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HeLa HepG2 A549 A549 A549 HepG2 THP-1 K562 U-937 THP-1 K562 U-937 THP-1 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HCT-116 HepG2 HepG2 HepG2 HepG2 A549 A549 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MDA-MB-231 HeLa HepG2 MDA-MB-231 HeLa HepG2 MDA-MB-231 HeLa HepG2 MDA-MB-231 HeLa HepG2 MDA-MB-231 HeLa HepG2 MDA-MB-231 HeLa HepG2 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 MCF-7 K562 HeLa HepG2 HepG2 A549 A549 A549 A549 MCF-7 K562 HeLa MCF-7 K562 HeLa MCF-7 K562 HeLa MCF-7 K562 HeLa MCF-7 K562 HeLa MCF-7 K562 HeLa MCF-7 K562 HeLa K562 HeLa MCF-7 MCF-7 K562 HeLa MCF-7 K562 HeLa MCF-7 K562 HeLa MCF-7 K562 HeLa PC-3 PC-3 MDA-MB-231 A549 HT-29 MDA-MB-231 A549 HT-29 MM96L HeLa MCF-7 K562 HL-60 MM96L HeLa K562 MM96L HeLa MCF-7 K562 MM96L HeLa K562 MM96L HeLa K562 MM96L HeLa MCF-7 K562 HL-60 MM96L HeLa K562 MM96L HeLa K562 MM96L HeLa MCF-7 K562 HL-60 MM96L HeLa MCF-7 K562 HL-60 MM96L HeLa MCF-7 K562 HL-60 MM96L HeLa MCF-7 K562 HL-60 MM96L HeLa MCF-7 K562 HL-60 MM96L HeLa MCF-7 K562 HL-60 MM96L HeLa K562 MM96L HeLa K562 MCF-7 MCF-7 MCF-7 MCF-7 PC-3 HCT-116 MCF-7 HeLa HepG2 A549 MCF-7 HeLa HepG2 A549 MCF-7 HeLa HepG2 A549 MCF-7 HeLa HepG2 A549 MCF-7 HeLa HepG2 A549 MCF-7 HeLa HepG2 A549 MCF-7 HepG2 MCF-7 A549 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 A549 K562 THP-1 A549 K562 THP-1 MCF-7 PC-3 HepG2 HepG2 HepG2 PC-3 PC-3 PC-3 HepG2 HepG2 HepG2 PC-3 MCF-7 K562 PC-3 MCF-7 PC-3 MCF-7 PC-3 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 A549 PC-3 PC-3 PC-3 HCT-116 PC-3 MCF-7 PC-3 MCF-7 PC-3 MCF-7 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 PC-3 MCF-7 HT-29 HL-60 HeLa A549 HL-60 HeLa A549 HL-60 HeLa A549 HL-60 HeLa A549 HL-60 HeLa A549 HL-60 HeLa A549 A549 MDA-MB-231 MCF-7 A549 MDA-MB-231 MCF-7 A549 MDA-MB-231 MCF-7 A549 MDA-MB-231 MCF-7 A549 MDA-MB-231 MCF-7 HL-60 HeLa PC-3 HeLa PC-3 HeLa PC-3 U-937 HCT-116 MDA-MB-231 A549 K562 K562 PC-3 MCF-7 HT-29 PC-3 MCF-7 HT-29 MDA-MB-231 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 K562 HeLa MM96L K562 HeLa K562 HeLa MM96L K562 HeLa MM96L MM96L K562 MCF-7 HeLa MM96L K562 MCF-7 HeLa K562 HeLa MM96L HeLa MM96L HeLa MM96L K562 K562 MCF-7 HeLa MM96L THP-1 MEC-1 MEC-1 MEC-1 Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat HeLa HeLa HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 K562 HeLa MCF-7 K562 HeLa MCF-7 HeLa K562 HeLa MCF-7 K562 HeLa MCF-7 MCF-7 MCF-7 PC-3 HeLa HeLa HCT-116 HCT-116 HeLa HeLa A549 A549 A549 HepG2 HepG2 HepG2 PC-3 HCT-116 PC-3 HCT-116 PC-3 HCT-116 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 THP-1 MCF-7 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa MDA-MB-231 MEC-1 MEC-1 MEC-1 MEC-1 MEC-1 A549 A549 A549 HeLa A549 K562 HeLa HepG2 HCT-116 MDA-MB-231 SW480 A549 HeLa A549 A549 MCF-7 HeLa A549 MCF-7 HeLa MDA-MB-231 HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa HT-29 HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa MDA-MB-231 K562 K562 U-937 Jurkat U-937 Jurkat U-937 Jurkat A549 A549 MCF-7 MCF-7 MCF-7 MCF-7 MDA-MB-231 PC-3 NCI-H1299 HeLa HT-29 HT-29 HepG2 HT-29 SW480 HCT-116 A549 MDA-MB-231 MCF-7 HeLa K562 MCF-7 MDA-MB-231 MCF-7 MCF-7 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 PC-3 PC-3 PC-3 PC-3 HCT-116 PC-3 MCF-7 MDA-MB-231 MDA-MB-231 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MCF-7 MDA-MB-231 MDA-MB-231 MDA-MB-231 MCF-7 MDA-MB-231 MDA-MB-231 MCF-7 MDA-MB-231 MDA-MB-231 MDA-MB-231 PC-3 PC-3 PC-3 U-937 U-937 MDA-MB-231 MDA-MB-231 HeLa A549 HeLa A549 MCF-7 HCT-116 A549 MCF-7 HCT-116 A549 MCF-7 HCT-116 A549 MDA-MB-231 K562 HL-60 HepG2 MCF-7 U-937 HT-29 HCT-116 Jurkat CCRF-CEM THP-1 A549 A549 A549 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HCT-116 HepG2 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 A549 HepG2 HCT-116 U-937 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MCF-7 HL-60 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 MCF-7 HeLa MCF-7 HeLa MCF-7 HeLa MCF-7 HeLa MCF-7 HeLa MCF-7 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa BMKC NCI-H1299 MCF-7 SW480 BMKC PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa SW480 MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa SW480 MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa SW480 BMKC MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa NCI-H1299 MCF-7 SW480 BMKC PC-3 HeLa SW480 MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 NCI-H1299 HeLa MCF-7 SW480 BMKC PC-3 HeLa BMKC NCI-H1299 PC-3 MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa BMKC MCF-7 SW480 BMKC MCF-7 SW480 BMKC MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 BMKC MCF-7 BMKC MCF-7 SW480 BMKC MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC MCF-7 SW480 BMKC MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 BMKC MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa MCF-7 SW480 BMKC NCI-H1299 PC-3 HeLa CCRF-CEM MCF-7 MDA-MB-231 HT-29 MDA-MB-231 HT-29 MCF-7 HL-60 MCF-7 HL-60 MCF-7 HL-60 MCF-7 HL-60 MCF-7 HL-60 MCF-7 HL-60 MCF-7 HL-60 Jurkat Jurkat HepG2 HepG2 HepG2 HepG2 A549 PC-3 HCT-116 A549 PC-3 HCT-116 A549 PC-3 HCT-116 A549 PC-3 HCT-116 K562 K562 K562 A549 HCT-116 PC-3 A549 HCT-116 PC-3 A549 HCT-116 PC-3 A549 HCT-116 PC-3 HeLa HeLa HeLa HeLa HeLa HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HeLa HCT-116 HeLa HCT-116 HeLa HeLa HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM HeLa SW480 CCRF-CEM Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat MCF-7 MCF-7 MCF-7 HT-29 HepG2 HepG2 HepG2 HepG2 HepG2 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 HeLa HeLa HeLa HeLa Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 HepG2 HepG2 HepG2 HepG2 HeLa HeLa HeLa A549 HepG2 HL-60 CCRF-CEM K562 MCF-7 HT-29 HL-60 CCRF-CEM HeLa RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa RAW2647 RAW2647 RAW2647 MDA-MB-231 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 HepG2 RAW2647 RAW2647 RAW2647 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 MDA-MB-231 A549 HeLa MDA-MB-231 A549 HeLa MDA-MB-231 A549 HeLa MDA-MB-231 A549 HeLa A549 MDA-MB-231 HT-29 HepG2 A549 A549 A549 A549 A549 A549 A549 MDA-MB-231 HT-29 HepG2 A549 MDA-MB-231 HT-29 HepG2 A549 A549 A549 MDA-MB-231 HT-29 HepG2 A549 MDA-MB-231 HT-29 HepG2 A549 A549 A549 A549 A549 A549 A549 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 HeLa HepG2 MDA-MB-231 MDA-MB-231 MDA-MB-231 HeLa HepG2 MDA-MB-231 HeLa HepG2 MDA-MB-231 HeLa HepG2 MDA-MB-231 HeLa HepG2 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 HeLa HepG2 MDA-MB-231 MDA-MB-231 HeLa HepG2 MDA-MB-231 MDA-MB-231 HeLa HepG2 Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat A549 A549 A549 A549 A549 K562 K562 K562 K562 K562 Jurkat Jurkat Jurkat Jurkat Jurkat HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 HeLa HeLa HeLa HeLa HeLa HeLa A549 A549 A549 A549 A549 A549 THP-1 K562 U-937 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 HeLa HeLa MDA-MB-231 MDA-MB-231 MDA-MB-231 HepG2 HepG2 HepG2 HepG2 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 A549 A549 A549 A549 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 HT-29 HT-29 HT-29 HT-29 HepG2 HepG2 HepG2 HepG2 A549 A549 A549 A549 A549 A549 A549 A549 A549 MDA-MB-231 MDA-MB-231 MDA-MB-231 MDA-MB-231 HT-29 HT-29 HT-29 HT-29 HepG2 HepG2 HepG2 HepG2 Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat Jurkat PC-3 PC-3 PC-3 THP-1 THP-1 THP-1 RAW2647 MDA-MB-231 SW480 SW480 K562 Jurkat RAW2647 K562 K562 HT-29 HT-29 HeLa HeLa HeLa HeLa HeLa RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 A549 A549 A549 A549 PC-3 A549 A549 A549 A549 A549 A549 A549 Jurkat Jurkat MDA-MB-231 HepG2 HepG2 HepG2 HCT-116 HCT-116 THP-1 MCF-7 HepG2 A549 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa RAW2647 RAW2647 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 A549 A549 A549 A549 A549 A549 A549 A549 MCF-7 MDA-MB-231 A549 HeLa HT-29 THP-1 MCF-7 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 THP-1 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 A549 A549 A549 A549 A549 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 MCF-7 PC-3 A549 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 HL-60 HL-60 HL-60 HL-60 HL-60 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 K562 K562 K562 K562 K562 HeLa HeLa HeLa HeLa HeLa HeLa HeLa MM96L MM96L MM96L MM96L MM96L MM96L K562 K562 K562 K562 K562 HeLa HeLa HeLa HeLa HeLa HepG2 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 A549 A549 A549 MDA-MB-231 PC-3 MDA-MB-231 PC-3 MDA-MB-231 PC-3 HepG2 HepG2 HepG2 HepG2 HepG2 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 K562 K562 K562 K562 K562 K562 K562 K562 K562 K562 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 HeLa HeLa HeLa RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 MDA-MB-231 MDA-MB-231 MDA-MB-231 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 HepG2 HeLa HepG2 HeLa HepG2 HeLa HepG2 HeLa HepG2 HeLa HepG2 HeLa HeLa HeLa HeLa HeLa HeLa HL-60 HL-60 HL-60 HL-60 HL-60 HL-60 RAW2647 RAW2647 RAW2647 RAW2647 RAW2647 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 MCF-7 MDA-MB-231 K562 K562 K562 K562 K562 K562 K562 K562 K562 K562 K562 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 U-937 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HCT-116 MM96L MM96L MM96L MM96L MCF-7 MCF-7 MCF-7 MDA-MB-231 MDA-MB-231 K562 K562 K562 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 THP-1 THP-1 THP-1 THP-1 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 A549 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HCT-116 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 A549 A549 A549 A549 HCT-116 HCT-116 HCT-116 HCT-116 HepG2 HepG2 HepG2 HepG2 HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa HeLa MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 A549 HCT-116 K562 MDA-MB-231 A549 HT-29 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 A549 HCT-116 K562 MDA-MB-231 HeLa HCT-116 RAW2647 HeLa RAW2647 HeLa RAW2647 HeLa RAW2647 HL-60 HeLa HCT-116 RAW2647 K562 K562 K562 K562 K562 K562 K562 K562 K562 K562 K562 K562 K562 K562 HeLa HeLa HeLa HeLa HeLa HeLa HT-29 HT-29 HT-29 HT-29 HT-29 HT-29 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 MCF-7 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 HepG2 K562 HL-60 U-937 K562 HL-60 U-937 K562 HL-60 U-937 ';
        // 注意：这里的代码只是对上面的句子进行分词并计算权重（重复次数）并构建词云图需要的数据，其中 arr.find 和 
        // 	reduce 函数可能在低版本 IE 中无法使用（属于ES6新增的函数），如果不能正常使用（对应的函数有报错），请自行加相应的 Polyfill
        //  array.find 的 ployfill 参见：https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Array/find#Polyfill
        // 	array.reduce 的 ployfill ：https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Array/reduce#Polyfill
        var data = text.split(/[,\. ]+/g)
        .reduce(function (arr, word) {
        	var obj = arr.find(function (obj) {
        		return obj.name === word;
        	});
        	if (obj) {
        		obj.weight += 1;
        	} else {
        		obj = {
        			name: word,
        			weight: 1
        		};
        		arr.push(obj);
        	}
        	return arr;
        }, []);
        Highcharts.chart('cell_line', {
        	series: [{
        		type: 'wordcloud',
        		data: data
        	}],
        	title: {
        		text: null
        	},
        	tooltip: {
        		headerFormat: '',
        		pointFormat: '<span style="color:{point.color}">\u25CF<b> {point.name}</b></span><br>' + 
        		' Entries: <b>{point.weight}</b><br/>'
        	},
        });
    </script>
    
    <h4 style="font-weight: bold; ">6. Percentage of various assay in the DRACP Anticancer Activity Test</h2>
    <div id="assay" style="min-width: 600px; height:550px;margin:35px 40px 40px 30px;"></div>
    <script>
        var chart = Highcharts.chart('assay', {
        	chart: {
        		spacing : [40, 0 , 40, 0]
        	},
        	title: {
        		floating:true,
        		text: null
        	},
        	tooltip: {
        	    headerFormat: '',
        		pointFormat: '<b style="color:{point.color}">{point.name}</b></br>{series.name}: <b>{point.percentage:.1f}%</b>'
        	},
        	plotOptions: {
        		pie: {
        			allowPointSelect: true,
        			cursor: 'pointer',
        			dataLabels: {
        				enabled: true,
        				format: '<b>{point.name}</b>',
        				style: {
        					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        				}
        			},
        			point: {
        				events: {
        					mouseOver: function(e) {  // 鼠标滑过时动态更新标题
        						// 标题更新函数，API 地址：https://api.hcharts.cn/highcharts#Chart.setTitle
        						chart.setTitle({
        							text: e.target.name+ '\t'+ e.target.y + ' %'
        						});
        					}, 
        					click: function(e) { // 同样的可以在点击事件里处理
        						chart.setTitle({
        							text: e.point.name+ '\t'+ e.point.y + ' %'
        						});
        					}
        				}
        			},
        		}
        	},
        	series: [{
        		type: 'pie',
        		innerSize: '50%',
        		name: 'Percentage',
        		data: [{
        				name: 'MTT',
        				y: 70.44,
        				// sliced: true,
        				// selected: true
        			}, {
        				name: 'Resazurin',
        				y: 4.46,
        			}, {
        				name: 'CellTiter-Glo',
        				y: 3.77,
        			}, {
        				name: 'MTS',
        				y: 2.41,
        			}, {
        				name: 'SRB',
        				y: 2.04,
        			}, {
        				name: 'Trypan blue',
        				y: 1.59
        			}, {
        				name: 'WST-8',
        				y: 1.59
        			}, {
        				name: 'WST-1',
        				y: 1.27
        			}, {
        				name: 'CytoTox 96',
        				y: 1.22
        			}, {
        				name: 'CCK-8',
        				y: 0.87
        			}, {
        				name: 'FMCA',
        				y: 0.64
        			}, {
        				name: 'Other',
        				y: 9.71
        			}]
        	}]
        }, function(c) { // 图表初始化完毕后的会掉函数
        	// 环形图圆心
        	var centerY = c.series[0].center[1],
        		titleHeight = parseInt(c.title.styles.fontSize);
        	// 动态设置标题位置
        	c.setTitle({
        		y:centerY + titleHeight/2
        	});
        });
    </script>

    </div>




</div>


<?php

	require_once ("../head/footer.php");


?>


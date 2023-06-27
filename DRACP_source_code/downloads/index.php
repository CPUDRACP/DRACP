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
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="./js/jquery-1.js"></script>
    <script type="text/javascript" src="./js/jquery.js"></script>   
</head>

<body>

<?php
    require_once ("../head/head_content.php");
?>

<div class="container" style="padding-bottom:50px;">
    <div class="row" style="padding-top:80px;">
        <div class="col-md-13">
            <ol class="breadcrumb">
                <li><a href="http://dracp.cpu-bioinfor.org">Home</a></li>
                <li class="active">Downloads</li>
            </ol>
        </div>
    </div>
</div>

<h2><p class="text-center" style="color:#087d49;margin-top:-50px">Downloads</p></h2>
<br/>

<div class="container">
    <table class="table table-bordereddown text-center">
		<thead class="table-headerdown">
          <tr>
            <th rowspan="2" class="table-celldown">Data</th>
            <th colspan="3" class="table-celldown">Download</th>
          </tr>
        </thead>
		<tbody>
          <tr>
            <td class="table-inner-celldown">Peptide library (excel)</td>
            <td class="table-inner-celldown"><a href="./peptide_library_all.xlsx">peptide_library_all.xlsx<a/></td>
          </tr>
          <tr>
            <td class="table-inner-celldown">Drug library (excel)</td>
            <td class="table-inner-celldown"><a href="./drug_library_all.xlsx">drug_library_all.xlsx<a/></td>
          </tr>
          <tr>
            <td class="table-inner-celldown">Peptide library (fasta)</td>
            <td class="table-inner-celldown"><a href="./peptide_library_all.fasta">peptide_library_all.fasta<a/></td>
          </tr>

		</tbody>
    </table>        
    <br>



		
    <table class="table table-bordereddown text-center">
		<thead class="table-headerdown">
          <tr>
            <th rowspan="2" class="table-celldown">Software</th>
            <th colspan="3" class="table-celldown">URL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="table-inner-celldown">BLAST</td>
            <td class="table-inner-celldown"><a href="https://blast.ncbi.nlm.nih.gov/Blast.cgi?CMD=Web&PAGE_TYPE=BlastDocs&DOC_TYPE=Download">Download BLAST Software and Databases<a/></td>
          </tr>
          <tr>
            <td class="table-inner-celldown">Clustal Omega</td>
            <td class="table-inner-celldown"><a href="http://www.clustal.org/omega/">Download Clustal Omega</a></td>
          </tr>
          <tr>
            <td class="table-inner-celldown">Clustal W/Clustal X</td>
            <td class="table-inner-celldown"><a href="http://www.clustal.org/clustal2/">Download Clustal W/X</a></td>
          </tr>
          <tr>
            <td class="table-inner-celldown">MUSCLE</td>
            <td class="table-inner-celldown"><a href="http://www.drive5.com/muscle/downloads.htm">Download MUSCLE</a></td>
          </tr>
		  <tr>
			<td class="table-inner-celldown">Conserved Domain Database(CDD)</td>
			<td class="table-inner-celldown"><a href="ftp://ftp.ncbi.nih.gov/pub/mmdb/cdd">Download CDD</a></td>
		  </tr>
          <tr>
            <td class="table-inner-celldown">FASTA</td>
            <td class="table-inner-celldown"><a href="https://www.ebi.ac.uk/seqdb/confluence/display/JDSAT/FASTA+Help+and+Documentation">Download FASTA</a></td>
          </tr>
        </tbody>
    </table>
	<br>
	<table class="table table-bordereddown text-center">
		<thead class="table-headerdown">
          <tr>
            <th rowspan="2" class="table-celldown">Source code</th>
            <th colspan="3" class="table-celldown">URL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="table-inner-celldown">Original DRACP</td>
            <td class="table-inner-celldown"><a href="http://dracp.cpu-bioinfor.org/Source_code/dracp.rar">Download the source code of DRACP<a/></td>
          </tr>
          <tr>
            <td class="table-inner-celldown">Original DRACP(Github)</td>
            <td class="table-inner-celldown"><a href="https://github.com/CPU-HORDB/DRACP">Download the source code of DRACP<a/></td>
          </tr>
        </tbody>
    </table>
</div>




<?php

    require_once ("../head/footer.php");

?>




</body>
</html>

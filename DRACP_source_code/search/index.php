<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>Simple-Search</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script language="Javascript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap_nav.css">

</head>

<body>

<?php
      require_once ("../head/head_content.php");
?>

<div class="container" style="padding-bottom:100px;">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dracp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dracp.cpu-bioinfor.org/search">Search</a></li>
            <li class="active">Simple Search</li>
        </ol>
    </div>

   <!-- the content -->
    
    <div class="col-md-3">
        <div class="panel panel-success" style="margin-top:30px; border: 1px solid #9dbaac;">
            <div class="panel-heading">
                <h3 class="panel-title" style="color: #a5642e;">Search menu</h3></a>
            </div>
            <div class="panel-body" >
                <span style="display: flex; justify-content: space-between;">
                    <p>Simple search</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                      <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                </span>
                <a href="http://dracp.cpu-bioinfor.org/search/advsearch.php">
                    <span style="display: flex; justify-content: space-between;">
                        <p>Advanced search</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                          <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
                        </svg>
                    </span>
                </a>
                <a href="http://dracp.cpu-bioinfor.org/search/drugsearch.php">
                    <span style="display: flex; justify-content: space-between;">
                        <p style="margin: 0;">Drug search</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                          <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
       
            <div style="width: 700px; height: 400px; margin-left: 75px; margin-top: 60px;">
                <div class="row highlight">
                      <p class="text-center text-info"><h2 class="text-center text-info" style="color:#087d49;">Simple Search</h2></p>
                      <form role="simple search" action="simple_search.php" method="get" name="login_userpw">
    
                        <div class="form-group">
                            <fieldset style="padding: 0">
                            <legend>Search Items</legend>
                            <select id="slt" name="slt" class="form-control input-lg">
                                <option value="Sequence">Sequence</option>
                                <option value="Binding_Target">Target</option>
                                <option value="Peptide_Name">Peptide Name</option>
    							<option value="Sequence_Length">Sequence Length</option>
    							<option value="Origin">Origin</option>
    							<option value="UniProt_ID">UniProt ID</option>
    							<option value="PDB_ID">PDB ID</option>
    							<option value="Linear_Cyclic">Linear/Cyclic</option>
    							<option value="Chiral">Chiral</option>
    							<option value="Cell_Line">Cell Line</option>
    							<option value="Patent_ID">Patent ID</option>
    							<option value="Literature">Pubmed ID</option>
    							<option value="Nature">Nature</option>
                            </select>
                            </fieldset>
                        </div>
    
                        <div class="form-group">
                          <fieldset style="padding: 0">
                          <legend>Enter the content</legend>
                          <textarea name="txtarea" id="txtarea" rows="5"  class="form-control"></textarea>  
                          </fieldset>
                        </div>
                        
                        <button type="submit" class="btn btn-submit">Submit</button>
                        
                      </form>
    
                </div>
            </div>
        
    </div>
    
</div>

<?php

require_once("../head/footer.php");

?>



</body>
</html>

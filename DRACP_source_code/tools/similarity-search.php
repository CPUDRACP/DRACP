<!DOCTYPE html>
<html>
<head>
    <title> DRACP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="head-style.css"/>

    <link rel="stylesheet" type="text/css" href="./cs/blast.css"/>
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script language="Javascript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
</head>
<body>
<?php
require_once ("../head/head_content.php");
?>

<div class="container" style="padding-bottom:100px;">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dracp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dracp.cpu-bioinfor.org/tools/similarity-search.php">Tools</a></li>
            <li class="active">Similarity search</li>
        </ol>
    </div>

    <!--<div class="col-md-3">-->
    <!--    <div class="panel panel-success" style="margin-top:30px; border: 1px solid #9dbaac;">-->
    <!--        <div class="panel-heading">-->
    <!--            <h3 class="panel-title" style="color: #a5642e;">Tools menu</h3></a>-->
    <!--        </div>-->
    <!--        <div class="panel-body" >-->
                <!--<a href="http://dracp.cpu-bioinfor.org/tools/similarity-search.php">-->
    <!--                <span style="display: flex; justify-content: space-between;">-->
    <!--                    <p>BLAST</p>-->
    <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">-->
    <!--                      <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>-->
    <!--                    </svg>-->
    <!--                </span>-->
                <!--</a>-->
    <!--            <a href="http://dracp.cpu-bioinfor.org/tools/similarity_search_drug.php">-->
    <!--                <span style="display: flex; justify-content: space-between;">-->
    <!--                    <p>BLAST (Drug)</p>-->
    <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">-->
    <!--                      <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>-->
    <!--                    </svg>-->
    <!--                </span>-->
    <!--            </a>-->
    <!--            <a href="http://dracp.cpu-bioinfor.org/tools/prediction.php">-->
    <!--                <span style="display: flex; justify-content: space-between;">-->
    <!--                    <p style="margin: 0;">ACP prediction</p>-->
    <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">-->
    <!--                      <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>-->
    <!--                    </svg>-->
    <!--                </span>-->
    <!--            </a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <div class="col-md-9" style="margin: 0 140px;">
        
        <div id="blast-content" style="width: 650px; height: 400px; margin-left: 90px; margin-top: 60px;">
            <!--<div class="p-blast"><h2> BLAST :</h2></div>-->
            <h2 class="text-center text-info" style="color:#087d49; margin-bottom: 15px; margin-top: 0;">BLAST</h2>
            <form method="get" action="http://dracp.cpu-bioinfor.org/cgi-bin/blast.cgi" style="display: flex; flex-direction: column;">
                <div class="wd_blast">
                    <div class="col-md-4">
                        <label for="seq_one" class="lb_blast">Sequence (FASTA): </label>
                    </div>
                    <div class="col-md-8">
                        <textarea  name="simi_area" rows="5" id="text_blast" placeholder="Enter sequence in FASTA format." class="form-control"></textarea>
                    </div>
                </div>
        
                <div class="wd_blast">
                    <div class="col-md-4">
                        <label for="seq_two" class="lb_blast" style="margin-top: 10px;">Scoring Matrix: </label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-control input-lg" style="width: 50%" name="matrix">
            
                            <option value="BLOSUM45">BLOSUM45</option>
                            <option value="BLOSUM50">BLOSUM50</option>
                            <option value="BLOSUM62" selected="selected">BLOSUM62</option>
                            <option value="BLOSUM80">BLOSUM80</option>
                            <option value="BLOSUM90">BLOSUM90</option>
                            <option value="PAM30">PAM30</option>
                            <option value="PAM70">PAM70</option>
                            <option value="PAM250">PAM250</option>
            
                        </select>
                    </div>
                </div>
                <div style="display: flex; margin-top: 40px; flex-direction: row; justify-content: space-evenly;">
                    <button type="reset" class="btn btn-submit" id="reset_blast" style="margin: 0;">Reset</button>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php
require_once("../head/footer.php");

?>
</body>
</html>
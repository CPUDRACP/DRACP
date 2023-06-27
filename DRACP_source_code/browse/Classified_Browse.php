<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dracp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');




?>

<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>Classified-Browse</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
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

            <li class="active">Classified Browse</li>
        </ol>
    </div>

<div class="row" style="display: flex; margin-top: 10px; justify-content: space-between;">
    
    <div class="col-sm-4">
        <div style="height: 75px; width: 300px; background-color: #a5bdbf; border: 5px solid #a5bdbf; border-radius:50px;">
            <h1 class="noneunderline" style="font-size: 30px;text-align: center;margin: 17px;font-weight: bold;"><a href="#peptide" style="color: #052439;">Peptide Library</a></h1>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div style="height: 75px; width: 300px; background-color: #f8d79b; border: 5px solid #f8d79b; border-radius:50px;">
            <h1 class="noneunderline" style="font-size: 30px;text-align: center;margin: 17px;font-weight: bold;"><a href="#drug" style="color: #165f37;">Drug Library</a></h1>
        </div>
    </div>
</div>

<br>
<hr style="border-top: 2px dashed #3a858b;" name="peptide" id="peptide">
<br>

<div class="row" style="display: flex; margin-top: 10px">
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; border: 3px solid #a5bdbf;">
            <div style="padding: 25px; width: 350px; color: #052439;">
                <h3 class="card-title">Classified by Peptide Type</h3>
                <ul class="card-text">
                    <li class="card-tag"><a href="Classfied_Information.php?a=1&b=Active ACP">Active ACP</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=1&b=Cancer targeted peptides">Cancer targeted peptides</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=1&b=Cell-penetrating peptides">Cell-penetrating peptides</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=1&b=Targeted peptide conjugates">Targeted peptide conjugates</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=1&b=Stapled Peptides">Stapled Peptides</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=1&b=Lipopeptides">Lipopeptides</a></li>
               
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; background-color: #a5bdbf;">
            <div style="padding: 32px;">
                <div style="text-align: center; padding-top: 55px;">
                    <svg style="color: #052439;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                    <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                    <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                    </svg>
                </div>
                <h1 style="text-align: center; font-family: Berlin Sans FB; font-size: 42px; color: #052439; line-height: 50px;">Peptide Library</h1>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; border: 3px solid #a5bdbf;">
            <div style="padding: 25px; width: 350px; color: #052439;">
                <h3 class="card-title">Classified by Mechanism</h3>
                <ul class="card-text">
                    <li class="card-tag"><a href="Classfied_Information.php?a=2&b=Membrane">Membrane-targeted</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=2&b=Apoptosis">Apoptosis</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=2&b=Antiangiogenic">Antiangiogenic</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=2&b=Immun">Immune mechanism</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=2&b=agonist">Agonist and Antagonist</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=2&b=inhibitor">Inhibitor</a></li>
                </ul>
            </div>
        </div>
    </div>
    
</div>


<div class="row" style="display: flex; margin-top:30px;">
    
    <div class="col-sm-4">
        <div class="card" style="height: 300px; width: 350px; background-color: #a5bdbf;">
            <div style="padding: 25px; width: 350px; color: #052439;">
                <h3 class="card-title">Classified by Source</h3>
                <ul class="card-text">
                    <li class="card-tags"><a href="Classfied_Information.php?a=3&b=Native peptide">Native peptide</a></li>
                    <li class="card-tags"><a href="Classfied_Information.php?a=3&b=Synthetic peptide">Synthetic peptide</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 300px; width: 350px; border: 3px solid #a5bdbf;">
            <div style="padding: 25px; width: 350px; color: #052439;">
                <h3 class="card-title">Classified by Length</h3>
                <ul class="card-text">
                    <li class="card-tag"><a href="Classfied_Information.php?a=4&b=2&c=5">2-5</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=4&b=6&c=30">6-30</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=4&b=31&c=50">31-50</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=4&b=51&c=100">51-100</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 300px; width: 350px; background-color: #a5bdbf;">
            <div style="padding: 25px; width: 350px; color: #052439;">
                <h3 class="card-title">Classified by Chiral</h3>
                <ul class="card-text">
                    <li class="card-tags"><a href="Classfied_Information.php?a=5&b=L">L</a></li>
                    <li class="card-tags"><a href="Classfied_Information.php?a=5&b=D">D</a></li>
                    <li class="card-tags"><a href="Classfied_Information.php?a=5&b=Mix">Mix</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="row" style="display: flex; margin-top:30px; margin-bottom:10px; ">
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; border: 3px solid #a5bdbf;">
            <div style="padding: 25px; width: 350px; color: #052439;">
                <h3 class="card-title">Classified by Cancer Type</h3>
                <ul class="card-text">
                    <li class="card-tag"><a href="Classfied_Information.php?a=6&b=Carcinoma&c=Carcinoma">Carcinoma</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=6&b=Sarcoma&c=Sarcoma">Sarcoma</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=6&b=Lymphoma">Lymphoma</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=6&b=Leukemia">Leukemia</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=6&b=Germ cell tumor">Germ cell tumor</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=6&b=Blastoma">Blastoma</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; background-color: #a5bdbf;">
            <div style="padding: 25px; width: 350px; color: #052439;">
                <h3 class="card-title">Classified by Data Source</h3>
                <ul class="card-text">
                    <li class="card-tags"><a href="Classfied_Information.php?a=7&b=Literature">Literature</a></li>
                    <li class="card-tags"><a href="Classfied_Information.php?a=7&b=Patent">Patent</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; border: 3px solid #a5bdbf;">
            <div style="padding: 25px; width: 350px; color: #052439;">
                <h3 class="card-title">Classified by Other Nature</h3>
                <ul class="card-text">
                    <li class="card-tag"><a href="Classfied_Information.php?a=8&b=Antimicrobial">Antimicrobial</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=8&b=Antibacterial">Antibacterial</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=8&b=Antifungal">Antifungal</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=8&b=Antiviral">Antiviral</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=8&b=Antioxidant">Antioxidant</a></li>
                    <li class="card-tag"><a href="Classfied_Information.php?a=8&b=Anti-Inflammatory">Anti-Inflammatory</a></li>
                </ul>
            </div>
        </div>
    </div>
    
</div>

<hr style="height: 3px; border-radius: 25px; border-top: none;" name="drug" id="drug">
<br>

<div class="row" style="display: flex; margin-top: 10px">
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; border: 3px solid #f8d79b;">
            <div style="padding: 25px; width: 350px; color: #165f37;">
                <h3 class="card-title">Classified by Type</h3>
                <ul class="card-text">
                    <li class="card-tagd"><a href="Classified_Drug.php?a=1&b=Small Molecule">Small Molecule</a></li>
                    <li class="card-tagd"><a href="Classified_Drug.php?a=1&b=Biotech">Biotech</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; background-color: #f8d79b;">
            <div style="padding: 55px;">
                <div style="text-align: center; padding-top: 35px;">
                    <svg style="color: #165f37;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                    <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                    <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                    </svg>
                </div>
                <h1 style="text-align: center; font-family: Berlin Sans FB; font-size: 42px; color: #165f37; line-height: 50px; margin-top: 10px; ">Drug Library</h1>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 350px; width: 350px; border: 3px solid #f8d79b;">
            <div style="padding: 25px; width: 350px; color: #165f37;">
                <h3 class="card-title">Classified by Chemical Taxonomy</h3>
                <ul class="card-text">
                    <li class="card-tagd"><a href="Classified_Drug.php?a=2&b=Amino">Amino acid and derivative</a></li>
                    <li class="card-tagd"><a href="Classified_Drug.php?a=2&b=Peptide">Peptide and derivative</a></li>
                    <li class="card-tagd"><a href="Classified_Drug.php?a=2&b=Cyclic">Cyclic structure</a></li>

                </ul>
            </div>
        </div>
    </div>
    
</div>

<div class="row" style="display: flex; margin-top:30px;">
    
    <div class="col-sm-4">
        <div class="card" style="height: 330px; width: 350px; background-color: #f8d79b;">
            <div style="padding: 25px; width: 350px; color: #165f37;">
                <h3 class="card-title">Classified by Drug Categories</h3>
                <ul class="card-text">
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=agonist">Agonist and Antagonist</a></li>
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=Inhibitor">Inhibitor</a></li>
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=Vaccine">Vaccine</a></li>
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=Radio">Radiopharmaceuticals</a></li>
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=Antiangiogenesi">Antiangiogenesis agent</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 330px; width: 350px; border: 3px solid #f8d79b;">
            <div style="padding: 25px; width: 350px; color: #165f37;">
                <h3 class="card-title">Classified by State</h3>
                <ul class="card-text">
                    <li class="card-tagd"><a href="Classified_Drug.php?a=4&b=Yes">Approved</a></li>
                    <li class="card-tagd"><a href="Classified_Drug.php?a=4&b=No">Clinical</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="card" style="height: 330px; width: 350px; background-color: #f8d79b;">
            <div style="padding: 25px; width: 350px; color: #165f37;">
                <h3 class="card-title">Classified by Other</h3>
                <ul class="card-text">
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=Hormone and analogue">Hormone and analogue</a></li>
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=Somatostatin and analogues">Somatostatin and analogues</a></li>
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=Marine origin">Marine origin</a></li>
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=Immuno">Immune-related</a></li>
                    <li class="card-tagsd"><a href="Classified_Drug.php?a=2&b=conjugate">conjugates</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>




<div style="height: 300px"></div>

<?php

require_once("../head/footer.php");

?>



</body>
<script>
    function aa(a) {
        if(a==1){
            if(document.getElementById('a').style.display=='none'){
                document.getElementById('a').style.display='block';
                document.getElementById('aa').innerHTML='-';
            }else {
                document.getElementById('a').style.display='none';
                document.getElementById('aa').innerHTML='+';
            }
        }

        if(a==2){
            if(document.getElementById('b').style.display=='none'){
                document.getElementById('b').style.display='block';
                document.getElementById('bb').innerHTML='-';
            }else {
                document.getElementById('b').style.display='none';
                document.getElementById('bb').innerHTML='+';
            }
        }

        if(a==3){
            if(document.getElementById('c').style.display=='none'){
                document.getElementById('c').style.display='block';
                document.getElementById('cc').innerHTML='-';
            }else {
                document.getElementById('c').style.display='none';
                document.getElementById('cc').innerHTML='+';
            }
        }

        if(a==4){
            if(document.getElementById('d').style.display=='none'){
                document.getElementById('d').style.display='block';
                document.getElementById('dd').innerHTML='-';
            }else {
                document.getElementById('d').style.display='none';
                document.getElementById('dd').innerHTML='+';
            }
        }

        if(a==5){
            if(document.getElementById('e').style.display=='none'){
                document.getElementById('e').style.display='block';
                document.getElementById('ee').innerHTML='-';
            }else {
                document.getElementById('e').style.display='none';
                document.getElementById('ee').innerHTML='+';
            }
        }

        if(a==6){
            if(document.getElementById('f').style.display=='none'){
                document.getElementById('f').style.display='block';
                document.getElementById('ff').innerHTML='-';
            }else {
                document.getElementById('f').style.display='none';
                document.getElementById('ff').innerHTML='+';
            }
        }
    }
</script>
</html>

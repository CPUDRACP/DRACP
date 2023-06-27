<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dracp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');

@$tia=$_GET['a'];
@$tib=$_GET['b'];
@$tic=$_GET['c'];

@$page=isset($_GET['page'])?$_GET['page']:1;
function escapeString($content) {
    $pattern = "/(select[\s])|(insert[\s])|(update[\s])|(delete[\s])|(from[\s])|(where[\s])|(drop[\s])/i";
    if (is_array($content)) {
        foreach ($content as $key=>$value) {
            $content[$key] = addslashes(trim($value));
            if(preg_match($pattern,$content[$key])) {
                $content[$key] = '';
            }
        }
    } else {
        $content=addslashes(trim($content));
        if(preg_match($pattern,$content)) {
            echo '<script>location.href="http://dracp.cpu-bioinfor.org/"</script>';exit;
        }
    }
    return $content;
}
function safe_replace($string) {
    $string = str_replace('%20','',$string);
    $string = str_replace('%27','',$string);
    $string = str_replace('%2527','',$string);
    $string = str_replace('*','',$string);
    $string = str_replace('"','&quot;',$string);
    $string = str_replace("'",'',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(';','',$string);
    $string = str_replace('<','&lt;',$string);
    $string = str_replace('>','&gt;',$string);
    $string = str_replace("{",'',$string);
    $string = str_replace('}','',$string);
    $string = str_replace('\\','',$string);
    return $string;
}
$page=escapeString($page);
$page=safe_replace($page);

$tia=escapeString($tia);
$tia=safe_replace($tia);
$tib=escapeString($tib);
$tib=safe_replace($tib);
$tic=escapeString($tic);
$tic=safe_replace($tic);

$hdeh=$page;

if(!$tia){
    $tia=1;
}

?>

<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>Peptide Drug</title>
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
            <li><a href="http://dracp.cpu-bioinfor.org/browse/Classified_Browse.php">Classified Browse</a></li>
            <li class="active">Peptide Drug</li>
        </ol>
    </div>
    
    <div class=entries>
    <span>Total entries:</span>&nbsp; 
    <?php

        if($tia==1){
                $sq="select * from peptidedrug where Type like '%$tib%'  order by DRACPC_ID asc";
        }
        if($tia==2){
                $sq="select * from peptidedrug where Classification like '%$tib%'  order by DRACPC_ID asc";
        }
        if($tia==4){
                $sq="select * from peptidedrug where Approved like '%$tib%'  order by DRACPC_ID asc";
        }
        
        $r=mysqli_query($conn,$sq);
        $records=mysqli_num_rows($r);

        echo '<span>'.$records.'</span>'
        ?>
    </div>
    
    <div class="row">

            <?php
            $showpages=5;
            $page_eff=($showpages-1)/2;
            $pagesize=10;

            if($tia==1){
                $sq="select * from peptidedrug where Type like '%$tib%'  order by DRACPC_ID asc";
            }
            if($tia==2){
                $sq="select * from peptidedrug where Classification like '%$tib%'  order by DRACPC_ID asc";
            }
            if($tia==4){
                $sq="select * from peptidedrug where Approved like '%$tib%'  order by DRACPC_ID asc";
            }

            $r=mysqli_query($conn,$sq);
            $records=mysqli_num_rows($r);
            if(!$r){
                    printf("Error:%s\n",mysqli_error($conn));
                    exit();
            }
            $pagecount=ceil($records/$pagesize);
            $start=($page-1)*$pagesize;
            $i=1;
            $i=($page-1)*$pagesize+$i;

            if($tia==1){
                $sqld="select * from peptidedrug where Type like '%$tib%'  order by DRACPC_ID asc limit $start,$pagesize";
            }
            if($tia==2){
                $sqld="select * from peptidedrug where Classification like '%$tib%'  order by DRACPC_ID asc limit $start,$pagesize";
            }
            if($tia==4){
                $sqld="select * from peptidedrug where Approved like '%$tib%'  order by DRACPC_ID asc limit $start,$pagesize";
            }

            $rsd=mysqli_query($conn,$sqld);
            while($row=mysqli_fetch_assoc($rsd)) {



                echo '<div class="drugcard">
                    <div class="drugcard-con">
                        <p class="drugcard-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                              <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                            </svg>
                            <a href="content.php?id='.$row['DRACPC_ID'].'" style="color: #165f37;">'.$row['DRACPC_ID'].'</a>
                        </p>
                        <div style="display: flex;">
                            <div class="drugcard-str">';
                            if($row['Structure']=="No"){
                                echo '<img src="../Structure/drug/failed.png">';
                            }else{
                                echo '<a href="content.php?id='.$row['DRACPC_ID'].'">
                                <img src="../Structure/drug/'.$row['DRACPC_ID'].'.svg" style="width: 400px;">
                                </a>';
                            }
                            echo '</div>
                            <div class="drugcard-info">
                                <p>
                                    <span class="drugcard-text">Active Ingredients: </span>&nbsp;'.$row['Active_Ingredients'].'
                                </p>
                                <p>
                                    <span class="drugcard-text">Type: </span>&nbsp;'.$row['Type'].'
                                </p>
                                <p>
                                    <span class="drugcard-text">Active Sequence: </span>&nbsp;'.$row['Active_Sequence'].'
                                </p>
                                <p>
                                    <span class="drugcard-text">Molecular Formula:</span>&nbsp;'.$row['Molecular_Formula'].'
                                </p>
                                <p>
                                    <span class="drugcard-text">DrugBank Accession Number: </span>&nbsp;';
                                    if($row['DRUGBANK_Accession_Number']=="Not available"){
                                        echo "{$row['DRUGBANK_Accession_Number']}";
                                    }else{
                                        echo '<a target="_blank" href="https://go.drugbank.com/drugs/'.$row['DRUGBANK_Accession_Number'].'">'.$row['DRUGBANK_Accession_Number'].'</a>';
                                    }
                                echo '</p>
                                <p>
                                    <span class="drugcard-text">PubChem CID: </span>&nbsp;';
                                    if($row['PubChem_CID']=="Not available"){
                                        echo "{$row['PubChem_CID']}";
                                    }else{
                                        echo '<a target="_blank" href="https://pubchem.ncbi.nlm.nih.gov/compound/'.$row['PubChem_CID'].'">'.$row['PubChem_CID'].'</a>';
                                    }
                                echo '</p>
                                <p>
                                    <span class="drugcard-text">NCI Thesaurus Code: </span>&nbsp;';
                                    if($row['NCI_Thesaurus_Code']=="Not available"){
                                        echo "{$row['NCI_Thesaurus_Code']}";
                                    }else{
                                        $piecesc= explode("##", $row['NCI_Thesaurus_Code']);
                                        $numc = count($piecesc);
                                        $ic=0;
                                        while($ic<$numc){
                                              $linkc=$piecesc[$ic];
                                        
                                        echo '<a target="_blank" href="https://ncit.nci.nih.gov/ncitbrowser/ConceptReport.jsp?dictionary=NCI_Thesaurus&ns=ncit&code='.$linkc.'">'.$linkc.'</a>&nbsp;&nbsp; ';
                                        
                                        $ic++;
                                        }
                                    }
                                    
                                    
                                echo '</p>
                                <p>
                                    <span class="drugcard-text">Disease:</span>&nbsp;'.$row['Disease'].'
                                </p>
                            </div>
                        </div>
                        <div class="drugcard-bot">
                            <p style="margin: 0">
                                <a href="content.php?id='.$row['DRACPC_ID'].'" style="color: #fcf8e3;">'.$row['Active_Ingredients'].'</a>
                            </p>
                            <p style="margin: 0">
                                <a href="content.php?id='.$row['DRACPC_ID'].'" style="color: #fcf8e3; font-weight: bold;">View Details</a>
                            </p>
                        </div>
                    </div>
                </div>';
            }
            ?>

    </div>
</div>


<div class="container mt-5">

    <div class="text-right mb-5">



        <?php
        
        echo ' <a href="Classified_Drug.php?page=1&a='.$tia.'&b='.$tib.'" class="btn btn-default btn-page"><<</a> ';
        
        $start=1;
        $end=$pagecount;
        if($page>$start){
            $pagepre=$page-1;
            echo '<a href="Classified_Drug.php?page='.$pagepre.'&a='.$tia.'&b='.$tib.'" class="btn btn-default btn-page"><</a>';
        }else{
            echo ' <a href="Classified_Drug.php?page='.$start.'&a='.$tia.'&b='.$tib.'" class="btn btn-default btn-page"><</a> ';
        }

        if($pagecount>$showpages){
            if($page>$page_eff){
                $start=$page-$page_eff;
                $end=$pagecount>$page+$page_eff?$page+$page_eff:$pagecount;
            }else{
                $start=1;
                $end=$pagecount>$showpages?$showpages:$pagecount;
            }
            if($page+$page_eff>$pagecount){
                $start=$start-($page=$page_eff-$end);
            }
            for($i=$start;$i<=$end;$i++){
                if($i==$page){
                    echo ' <a href="Classified_Drug.php?page='.$i.'&a='.$tia.'&b='.$tib.'" class="btn btn-primary btn-page">'.$i.'</a> ';
                }else{
                    echo ' <a href="Classified_Drug.php?page='.$i.'&a='.$tia.'&b='.$tib.'" class="btn btn-default btn-page" >'.$i.'</a> ';
                }
            }
        }else{
            for($i=$start;$i<=$end;$i++) {
                if($i==$page){
                    echo ' <a href="Classified_Drug.php?page='.$i.'&a='.$tia.'&b='.$tib.'" class="btn btn-primary btn-page">'.$i.'</a> ';
                }else{
                    echo ' <a href="Classified_Drug.php?page='.$i.'&a='.$tia.'&b='.$tib.'" class="btn btn-default btn-page" >'.$i.'</a> ';
                }
            }
        }
        if($page<0){
            $uid=$end-$showpages+1;
            for($i=$uid;$i<=$end;$i++) {
                if($i==$hdeh){
                    echo ' <a href="Classified_Drug.php?page='.$i.'&a='.$tia.'&b='.$tib.'" class="btn btn-primary btn-page">'.$i.'</a> ';
                }else{
                    echo ' <a href="Classified_Drug.php?page='.$i.'&a='.$tia.'&b='.$tib.'" class="btn btn-default btn-page" >'.$i.'</a> ';
                }
            }
        }


        echo ' <a href="Classified_Drug.php?page='.$pagecount.'&a='.$tia.'&b='.$tib.'" class="btn btn-default btn-page">>></a> ';
        ?>



    </div>
</div>


<div style="height: 300px"></div>

<?php

require_once("../head/footer.php");

?>



</body>
</html>

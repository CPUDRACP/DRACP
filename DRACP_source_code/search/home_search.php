<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dracp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');

@$tit=$_GET['slt'];
@$tcont=$_GET['txtarea'];

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
$tit=escapeString($tit);
$tit=safe_replace($tit);
$tcont=escapeString($tcont);
$tcont=safe_replace($tcont);

$hdeh=$page;



?>

<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>Quick-search</title>
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
            <li><a href="http://dracp.cpu-bioinfor.org/search">Search</a></li>
                <li class="active">Quick Search</li>
        </ol>
    </div>
    
    <div class=entries>
    <span>Result entries:</span>&nbsp; 
    <?php
        $sq="select * from All_Information  where  (Sequence like '%$tcont%' or Binding_Target like '%$tcont%' or Peptide_Name like '%$tcont%' or DRACP_ID like '%$tcont%')  order by DRACP_ID asc";
        $r=mysqli_query($conn,$sq);
        if(!$r){
                    printf("Error:%s\n",mysqli_error($conn));
                    exit();
            }
        $records=mysqli_num_rows($r);
        
        $sqd="select * from peptidedrug where (Active_Ingredients like '%$tcont%' or Synonyms like '%$tcont%' or Active_Sequence like '%$tcont%' or DRACPC_ID like '%$tcont%')  order by DRACPC_ID asc";
        $rd=mysqli_query($conn,$sqd);
        if(!$rd){
                    printf("Error:%s\n",mysqli_error($conn));
                    exit();
            }
        $recordd=mysqli_num_rows($rd);
        
        $number=$records+$recordd;
    echo '<span>'.$number.'</span>'
    ?>
    </div>
    
    
        <div>
            <h3 style="font-weight: bold; color: #c04a2a;">Peptide Library</h3>
            <p style="margin: 15px 10px;">
        <?php
            echo '<b>'.$records.'</b>&nbsp; <span>Result</span>';
        ?>
            </p>
            </div>
        <?php
            if($records!==0){
                echo '

        <table class="table table-borderedinfor">
            <thead class="table-headerinfor">
            <tr>


                <th class="table-cellinfor">DRACP ID</th>
                <th class="table-cellinfor">Peptide Name</th>
                <th class="table-cellinfor">Sequence</th>
                <th class="table-cellinfor">Sequence Length</th>
                <th class="table-cellinfor">Origin</th>
               
            </tr>
            </thead>
            <tbody>';
            
            $sq="select * from All_Information  where  (Sequence like '%$tcont%' or Binding_Target like '%$tcont%' or Peptide_Name like '%$tcont%' or DRACP_ID like '%$tcont%')  order by DRACP_ID asc";
            $r=mysqli_query($conn,$sq);
            if(!$r){
                    printf("Error:%s\n",mysqli_error($conn));
                    exit();
            }
            
            while($row=mysqli_fetch_assoc($r)) {



                echo ' <tr>
                <td class="table-inner-cellinfor"><a href="../browse/Peptide_content.php?id='.$row['DRACP_ID'].'" >'.$row['DRACP_ID'].'</a></td>
                <td class="table-inner-cellinfor">'.$row['Peptide_Name'].'</td>
                <td class="table-inner-cellinfor" style="word-break: break-all;">'.$row['Sequence'].'</td>
                <td class="table-inner-cellinfor">'.$row['Sequence_Length'].'</td>
                <td class="table-inner-cellinfor">'.$row['Origin'].'</td>
            </tr>';
            }
            echo '</tbody>
        </table>';
            
            }
        ?>
        

    
        <div>
            <h3 style="font-weight: bold; color: #c04a2a;">Drug Library</h3>
            
        <?php
        
            echo '<p style="margin: 15px 10px;">
            <b>'.$recordd.'</b>&nbsp; <span>Result</span>
            </p>
            </div>';
            if($recordd!==0){
                echo '<div class="row">';
                
        $sqd="select * from peptidedrug where (Active_Ingredients like '%$tcont%' or Synonyms like '%$tcont%')  order by DRACPC_ID asc";
        $rd=mysqli_query($conn,$sqd);
        if(!$rd){
                    printf("Error:%s\n",mysqli_error($conn));
                    exit();
            }
        while($rowd=mysqli_fetch_assoc($rd)) {

                echo '<div class="drugcard">
                    <div class="drugcard-con">
                        <p class="drugcard-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                              <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                            </svg>
                            <a target="_blank" href="content.php?id='.$rowd['DRACPC_ID'].'" style="color: #165f37;">'.$rowd['DRACPC_ID'].'</a>
                        </p>
                        <div style="display: flex;">
                            <div class="drugcard-str">';
                            if($rowd['Structure']=="No"){
                                echo '<img src="../Structure/drug/failed.png">';
                            }else{
                                echo '<a href="content.php?id='.$rowd['DRACPC_ID'].'">
                                <img src="../Structure/drug/'.$rowd['DRACPC_ID'].'.svg" style="width: 400px;">
                                </a>';
                            }
                            echo '</div>
                            <div class="drugcard-info">
                                <p>
                                    <span class="drugcard-text">Active Ingredients: </span>&nbsp;'.$rowd['Active_Ingredients'].'
                                </p>
                                <p>
                                    <span class="drugcard-text">Type: </span>&nbsp;'.$rowd['Type'].'
                                </p>
                                <p>
                                    <span class="drugcard-text">Active Sequence: </span>&nbsp;'.$rowd['Active_Sequence'].'
                                </p>
                                <p>
                                    <span class="drugcard-text">Molecular Formula:</span>&nbsp;'.$rowd['Molecular_Formula'].'
                                </p>
                                <p>
                                    <span class="drugcard-text">DrugBank Accession Number: </span>&nbsp;';
                                    if($rowd['DRUGBANK_Accession_Number']=="Not available"){
                                        echo "{$rowd['DRUGBANK_Accession_Number']}";
                                    }else{
                                        echo '<a target="_blank" href="https://go.drugbank.com/drugs/'.$rowd['DRUGBANK_Accession_Number'].'">'.$rowd['DRUGBANK_Accession_Number'].'</a>';
                                    }
                                echo '</p>
                                <p>
                                    <span class="drugcard-text">PubChem CID: </span>&nbsp;';
                                    if($rowd['PubChem_CID']=="Not available"){
                                        echo "{$rowd['PubChem_CID']}";
                                    }else{
                                        echo '<a target="_blank" href="https://pubchem.ncbi.nlm.nih.gov/compound/'.$rowd['PubChem_CID'].'">'.$rowd['PubChem_CID'].'</a>';
                                    }
                                echo '</p>
                                <p>
                                    <span class="drugcard-text">NCI Thesaurus Code: </span>&nbsp;';
                                    if($row['NCI_Thesaurus_Code']=="Not available"){
                                        echo "{$rowd['NCI_Thesaurus_Code']}";
                                    }else{
                                        $piecesc= explode("##", $rowd['NCI_Thesaurus_Code']);
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
                                    <span class="drugcard-text">Disease:</span>&nbsp;'.$rowd['Disease'].'
                                </p>
                            </div>
                        </div>
                        <div class="drugcard-bot">
                            <p style="margin: 0">
                                <a href="content.php?id='.$rowd['DRACPC_ID'].'" style="color: #fcf8e3;">'.$rowd['Active_Ingredients'].'</a>
                            </p>
                            <p style="margin: 0">
                                <a href="content.php?id='.$rowd['DRACPC_ID'].'" style="color: #fcf8e3; font-weight: bold;">View Details</a>
                            </p>
                        </div>
                    </div>
                </div>';
            }
            }
    
        ?>
    </div>
    
</div>


<div class="container mt-5">

    <div class="text-right mb-5">

        <?php

        // $start=1;
        // $end=$pagecount;
        
        // echo '<a href="home_search.php?page=1&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page"><<</a> ';
        // if($page>$start){
        //     $pagepre=$page-1;
        //     echo '<a href="home_search.php?page='.$pagepre.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page"><</a>';
        // }else{
        //     echo '<a href="home_search.php?page='.$start.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page"><</a> ';
        // }


        // if($pagecount>$showpages){
        //     if($page>$page_eff){
        //         $start=$page-$page_eff;
        //         $end=$pagecount>$page+$page_eff?$page+$page_eff:$pagecount;
        //     }else{
        //         $start=1;
        //         $end=$pagecount>$showpages?$showpages:$pagecount;
        //     }
        //     if($page+$page_eff>$pagecount){
        //         $start=$start-($page=$page_eff-$end);
        //     }
        //     for($i=$start;$i<=$end;$i++){
        //         if($i==$page){
        //             echo ' <a href="home_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary btn-page">'.$i.'</a> ';
        //         }else{
        //             echo ' <a href="home_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page" >'.$i.'</a> ';
        //         }
        //     }
        // }else{
        //     for($i=$start;$i<=$end;$i++) {
        //         if($i==$page){
        //             echo ' <a href="home_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary btn-page">'.$i.'</a> ';
        //         }else{
        //             echo ' <a href="home_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page" >'.$i.'</a> ';
        //         }
        //     }
        // }
        // if($page<0){
        //     $uid=$end-$showpages+1;
        //     for($i=$uid;$i<=$end;$i++) {
        //         if($i==$hdeh){
        //             echo ' <a href="home_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary btn-page">'.$i.'</a> ';
        //         }else{
        //             echo ' <a href="home_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page" >'.$i.'</a> ';
        //         }
        //     }
        // }

        // if($page<$pagecount){
        //     $pagenext=$page+1;
        //     echo '<a href="home_search.php?page='.$pagenext.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page">></a>';
        // }else{
        //     echo ' <a href="home_search.php?page='.$pagecount.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page">></a> ';
        // // }
        // echo ' <a href="home_search.php?page='.$pagecount.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page">>></a> ';


        ?>



    </div>
</div>


<div style="height: 300px"></div>

<?php

require_once("../head/footer.php");

?>



</body>
</html>

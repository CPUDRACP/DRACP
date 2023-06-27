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
    <title>Simple-Search</title>
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
            <li class="active">Simple Search</li>
        </ol>
    </div>
    
    <div class=entries>
    <span>Total entries:</span>&nbsp; 
    <?php
        if($tit=="Cell_Line" and "Assay"){
                    $sq="SELECT DISTINCT
                    	All_Information.* 
                    FROM
                    	All_Information
                    	INNER JOIN ( peptideactivity ) ON All_Information.DRACP_ID = peptideactivity.DRACP_ID 
                    WHERE
                    	peptideactivity.$tit = '$tcont'
                    ORDER BY
                    	All_Information.DRACP_ID ASC";
        }else{
        $sq="select * from All_Information  where $tit like '%$tcont%'  order by DRACP_ID asc";
        }
        $r=mysqli_query($conn,$sq);
        $records=mysqli_num_rows($r);
        if(!$r){
                    printf("Error:%s\n",mysqli_error($conn));
                    exit();
            }
        echo '<span>'.$records.'</span>'
        ?>
    </div>
    
    <div class="row mt40" style="padding-top: 20px">



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
            <tbody>


            <?php
            $showpages=5;
            $page_eff=($showpages-1)/2;
            $pagesize=30;

            if($tit=="Cell_Line"){
                    $sq="SELECT DISTINCT
                    	All_Information.* 
                    FROM
                    	All_Information
                    	INNER JOIN ( peptideactivity ) ON All_Information.DRACP_ID = peptideactivity.DRACP_ID 
                    WHERE
                    	peptideactivity.$tit = '$tcont'
                    ORDER BY
                    	All_Information.DRACP_ID ASC";
            }else{
                $sq="select * from All_Information  where $tit like '%$tcont%'  order by DRACP_ID asc";
            }
            
                $r=mysqli_query($conn,$sq);
                $records=mysqli_num_rows($r);
                $pagecount=ceil($records/$pagesize);
                $start=($page-1)*$pagesize;
                $i=1;
                $i=($page-1)*$pagesize+$i;
                
            if($tit=="Cell_Line"){
                    $sqld="SELECT DISTINCT
                    	All_Information.* 
                    FROM
                    	All_Information
                    	INNER JOIN ( peptideactivity ) ON All_Information.DRACP_ID = peptideactivity.DRACP_ID 
                    WHERE
                    	peptideactivity.$tit = '$tcont'
                    ORDER BY
                    	All_Information.DRACP_ID ASC LIMIT $start,$pagesize";
            }else{
                $sqld="select * from All_Information  where $tit like '%$tcont%'  order by DRACP_ID asc limit $start,$pagesize";
            }

            
            $rsd=mysqli_query($conn,$sqld);
            while($row=mysqli_fetch_assoc($rsd)) {



                echo ' <tr>
                <td class="table-inner-cellinfor"><a href="../browse/Peptide_content.php?id='.$row['DRACP_ID'].'" >'.$row['DRACP_ID'].'</a></td>
                <td class="table-inner-cellinfor">'.$row['Peptide_Name'].'</td>
                <td class="table-inner-cellinfor" style="word-break: break-all;">'.$row['Sequence'].'</td>
                <td class="table-inner-cellinfor">'.$row['Sequence_Length'].'</td>
                <td class="table-inner-cellinfor">'.$row['Origin'].'</td>
            </tr>';
            }
            ?>



            </tbody>
        </table>

    </div>
</div>


<div class="container mt-5">

    <div class="text-right mb-5">

        <?php

        $start=1;
        $end=$pagecount;
        
        echo '<a href="simple_search.php?page=1&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page"><<</a> ';
        if($page>$start){
            $pagepre=$page-1;
            echo '<a href="simple_search.php?page='.$pagepre.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page"><</a>';
        }else{
            echo '<a href="simple_search.php?page='.$start.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page"><</a> ';
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
                    echo ' <a href="simple_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary btn-page">'.$i.'</a> ';
                }else{
                    echo ' <a href="simple_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page">'.$i.'</a> ';
                }
            }
        }else{
            for($i=$start;$i<=$end;$i++) {
                if($i==$page){
                    echo ' <a href="simple_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary btn-page">'.$i.'</a> ';
                }else{
                    echo ' <a href="simple_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page" >'.$i.'</a> ';
                }
            }
        }
        if($page<0){
            $uid=$end-$showpages+1;
            for($i=$uid;$i<=$end;$i++) {
                if($i==$hdeh){
                    echo '<a href="simple_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-primary btn-page">'.$i.'</a> ';
                }else{
                    echo '<a href="simple_search.php?page='.$i.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page" >'.$i.'</a> ';
                }
            }
        }


        echo ' <a href="simple_search.php?page='.$pagecount.'&slt='.$tit.'&txtarea='.$tcont.'" class="btn btn-default btn-page">>></a> ';


        ?>



    </div>
</div>


<div style="height: 300px"></div>

<?php

require_once("../head/footer.php");

?>



</body>
</html>

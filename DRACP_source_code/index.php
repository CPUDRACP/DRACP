<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

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
    <script src="https://3Dmol.org/build/3Dmol-min.js"></script>
    <script src="https://3Dmol.org/build/3Dmol.ui-min.js"></script>
</head>


<body>

<?php

	require_once("./head/head.php");

?>
<div>
<!-- 为头部元素添加链接 -->
    <div style="background:linear-gradient(45deg, #f3efbf52, #7da5aba3, #9cc6ae9e, #cae1af4d);margin-top:50px;height:340px;">
        <div class="container">
            <div class="row" style="display: flex; flex-direction: column; margin-top:20px;">

            <!-- (Browse, create and mining antimicrobial peptides) 部分-->
                <div class="col-md-12">
                    <div style="width:800px;margin:0 auto; text-align: center;">
                    <h1>
                    <!--<a style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>-->
                    <font style="color: #29955a; font-size: 42px;">Data Repository of</font>&nbsp;
                    <font style="color: #f9facd; font-size: 48px;">Anticancer Peptides</font></h1>
                    </div>
                </div>
                <br>
                <!-- 快速检索框 -->
                <div class="col-md-12" style="display: flex; justify-content: space-between;">
                    <div class="col-md-3" style="display: flex; align-items: center; flex-direction: column; padding-left:95px;">
                        <span>Target</span>
                        <h3 style="font-family: Lucida Calligraphy; font-weight: bold;">>60</h3>
                    </div>
                    <div style="width:600px;margin:20px auto; text-align: center;" class="col-md-6">
                        <form method="get" action="http://dracp.cpu-bioinfor.org/search/home_search.php" class="form-inline">
                            <div class="form-group" style="padding-top: 2px; position: relative;">
                                <input type="text" name="txtarea" style="width:360px; height:45px; border-color:#667e6b; padding: 0 3.75rem 0 .75rem; border-radius: 2rem;" class="form-control" id="exampleInputName2" placeholder="Sequence/Target/Peptide Name/DRACP ID">
                                <button style="display: inline-block; position: absolute; left: 324px; bottom: 7px;background: none; border: none;" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-3" style="display: flex; align-items: center; flex-direction: column;padding-right: 95px;">
                        <span>Cancer cell line</span>
                        <h3 style="font-family: Lucida Calligraphy; font-weight: bold;">>380</h3>
                    </div>
                </div>
                <br>
                <!--num-->
                
                <div style="display: flex; justify-content: space-between;">
                    <div class="col-md-4" style="display: flex; align-items: center; flex-direction: column; border-right: 1.5px solid #333;">
                        <span>Total</span>
                        <h1 style="font-family: Lucida Calligraphy; font-weight: bold;">6921</h1>
                    </div>
                    <div class="col-md-4" style="display: flex; align-items: center; flex-direction: column; border-right: 1.5px solid #333;">
                        <span>Peptide Library</span>
                        <h1 style="font-family: Lucida Calligraphy; font-weight: bold;">6813</h1>
                    </div>
                    <div class="col-md-4" style="display: flex; align-items: center; flex-direction: column;">
                        <span>Drug Library</span>
                        <h1 style="font-family: Lucida Calligraphy; font-weight: bold;">108</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



    <div class="clearfix"></div>
<div class="container"  style="margin-top:1%;">

    <div style="display: flex; justify-content: space-between; margin: 0 15px 10px;">
        <div style="width: 20%; padding: 0 14px;">
            <div class="guid noneunderline guidsize">
                <a target="_blank" href="http://dracp.cpu-bioinfor.org/browse/Classfied_Information.php?a=1&b=Active ACP">
                    <h2 style="padding-top: 24px; font-size: 32px;">ACP</h2>
                    <h4 style="margin:8px;">Active ACP</h4>
                </a>
            </div>
        </div>
        <div style="width: 20%; padding: 0 14px;">
            <div class="guid noneunderline guidsize">
                <a target="_blank" href="http://dracp.cpu-bioinfor.org/browse/Classfied_Information.php?a=1&b=Cancer targeted peptides">
                    <h2 style="padding-top: 15px; font-size: 32px;">CTP</h2>
                    <h4 style="margin: 8px;">Cancer targeted peptides</h4>
                </a>
            </div>
        </div>
        <div style="width: 20%; padding: 0 14px;">
            <div class="guidm noneunderline guidsize">
                <a target="_blank" href="http://dracp.cpu-bioinfor.org/browse/Classified_Browse.php">
                    <h2 style="padding-top: 20px;">More<br>classification</h2>
                    <!--<h4 style="margin: 0;">More classification</h4>-->
                </a>
            </div>
        </div>
        <div style="width: 20%; padding: 0 14px;">
            <div class="guid noneunderline guidsize">
                <a target="_blank" href="http://dracp.cpu-bioinfor.org/browse/Classfied_Information.php?a=1&b=Stapled Peptides">
                    <h2 style="padding-top: 24px; font-size: 32px;">SP</h2>
                    <h4 style="margin: 8px;">Stapled peptides</h4>
                </a>
            </div>
        </div>
        <div style="width: 20%; padding: 0 14px;">
            <div class="guid noneunderline guidsize">
                <a target="_blank" href="http://dracp.cpu-bioinfor.org/browse/Classified_Drug.php?a=4&b=Yes">
                    <h2 style="padding-top: 24px; font-size: 32px;">AD</h2>
                    <h4 style="margin: 8px;">Approved drug</h4>
                </a>
            </div>
        </div>
    </div>


    <div class="container">
        <!-- 欢迎词 -->
        <div class="">
            <h3>Welcome to DRACP</h3>
            <p style="font-size: 16px;">DRACP (Data repository of anticancer peptide) is an open data repository of anticancer peptide, composed of two sub libraries: Peptide Library and Drug Library. It has been developed to provide the scientists with the information for designing new anticancer peptides and targeted peptide conjugated anticancer agents with a high selectivity.</p>
            <P style="font-size: 16px;"><b>Peptide Library:</b> Active ACP, Cancer targeted peptides, Targeted peptide conjugates... In addition to traditional anticancer peptides that are part of antimicrobial peptides, DRACP also focuses on the collection of targeted peptides. These peptides can target receptors on cancer cell membranes or biomarkers related to cancer cell growth, invasion, and proliferation to exert antitumor effects. </P>
            <P style="font-size: 16px;"><b>Drug Library:</b> Approved and clinical drug peptides for cancer treatment.</P>
            
            <!--<p>As of April 2023, DRACP had <b>5155 entries</b>, including <b>5050 anticancer peptide entries</b> and <b>105 peptide drug entries</b>-->
            <!--</p>-->
            
            <p>Data in the DRACP is made available under an CCBY 4.0 License. You are entitled to access and use the services and download or extract data. The free services are offered for the purpose of providing access to summarized data, analytics, metadata, and bulk downloads.
            </p>



        </div>


        <div class="row">

           
            <div class="col-md-8">
                <!-- 机理 --> 
                <div class="panel panel-success" style="margin-top:30px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Active mechanism of anticancer peptide</h3>
                    </div>
                    <div class="panel-body">
                        <img src="./link_images/homepic.png" width="100%"/>
                    </div>
                </div>





        </div>

                 
            <div class="col-md-4">
                
                <!-- 最新数据 -->
                <div class="panel panel-success" style="margin-top:30px;">
                    <div class="panel-heading">
                        <a href="http://dracp.cpu-bioinfor.org/browse/PeptideDrug.php" style="color: #a5642e;"><h3 class="panel-title">Peptide drug </h3></a>
                    </div>
                    <div class="panel-body">
                        <div style="border: 2px dashed #eead96;">
                            <?php
                        
                            	require_once("carousel.html");
                        
                            ?>
                        </div>
                        
                        

                    </div>
                </div>
                 <!-- 额外链接  -->
                <div class="panel panel-success" style="margin-top:30px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">External Links</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row text-center">
                            <div class="col-md-6" style="padding: 10px">
                                <a target="_blank" href="http://dramp.cpu-bioinfor.org/"><img src="./link_images/dramp.png" width="70" height="30"/></a>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <a target="_blank" href="https://www.ebi.ac.uk/"><img src="./link_images/ebi.png" width="70" height="30" /></a>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <a target="_blank" href="https://www.ncbi.nlm.nih.gov/"><img src="./link_images/ncbi.png" width="70" height="30" /></a>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <a target="_blank" href="https://www.rcsb.org/"><img src="./link_images/pdb.png" width="70" height="30" /></a>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <a target="_blank" href="https://www.expasy.org/"><img src="./link_images/sib.png" width="70" height="30" /></a>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <a target="_blank" href="http://hordb.cpu-bioinfor.org//"><img src="./link_images/hordb.png" width="70" height="30" /></a>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <a target="_blank" href="http://pepbank.mgh.harvard.edu/"><img src="./link_images/pepbank.png" width="70" height="30" /></a>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <a target="_blank" href="https://webs.iiitd.edu.in/raghava/cancerppd"><img src="./link_images/cancerppd.png" width="70" height="30" /></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!--contact-->
                <div class="alert alert-warning" style="margin-top:30px;border-color: #9dbaac; background-color: #ffffff">
                    <b>Contact: Zheng Heng, Ph.D.</b></br>
                    <!--<p>School of Life Science and Technology, China Pharmaceutical University, Nanjing 210009, China. </p>-->
                    <span class="glyphicon glyphicon-envelope"> </span> 
                    <a href="mailto:zhengh18@hotmail.com">zhengh18@hotmail.com</a>
                </div>



            </div>

    </div>



         <!-- 更新说明 -->
        <div class="panel panel-success" style="margin-top:70px;">
            <div class="panel-heading">
                <h3 class="panel-title">NEWS & EVENTS</h3>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled" style="font-size:16px;line-height: 140%;">
                     <li> ➢ <b>May 17, 2023</b>    Database updated! Updated annotation information for entries existed in DRACP. </li>
 					 <br />
                     <li> ➢ <b>March 9, 2023</b>    Drug library updated! Field reorganization and added structure annotations. </li>
 					 <br />
                     <li> ➢ <b>January 6, 2023</b>    Database updated! Added 'classification' field.</li>
 					 <br />
 					 <li>➢<b>September 23, 2022</b>    Integrated Mol* Viewer to replace 3Dmol for web display and editing of predicted structures of anticancer peptide.</li>
                     <br />
 					 <li>➢<b>June 10, 2022</b>    Added 'Link' field, including the corresponding DRAMP ID, DBAASP ID, CancerPPD ID for the peptide entry...</li>
                     <br />
 					 <li>➢<b>April 22, 2022</b>    Peptide library updated!</li>
					 <br />
                     <li> ➢ <b>October 20, 2022</b>    Data collation. Set up two sub libraries: peptide library and drug library. Peptide libraries store anticancer active peptides, while drug libraries store anticancer drug peptides that enter clinical practice.</li>
 					 <br />
 					 <li>➢<b>January 1, 2022</b>    Database updated!</li>
                     <br />
					 <li>➢<b>November 7, 2021</b>    Integrated 3Dmol for web display and editing of 3D structures of anticancer peptide.</li>
                     <br />
                     <li>➢<b>August 8, 2021</b>    Added annotation information about peptide drugs, including 85 active ingredient annotation information of peptide drugs, and corresponding peptide drugs preparations.</li>
 					 <br />
 					 <li>➢<b>May 23, 2021</b>    Integrated BLAST Similarity search system for anticancer peptide sequence--"Similarity search".</li>
 					 <br />
                     <li> ➢ <b>March 1, 2021</b>    DRACP Setup! Welcome to comment and suggest!</li>
                </ul>
            </div>
        </div>



    </div>

</div>



<?php

    require_once("./head/footer.php");

?>


</body>

</html>


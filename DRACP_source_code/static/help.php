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
    <style>
        th,td{
            text-align:center;
            padding:7px 20px;
            /*background: #fff;*/
        }
    </style>
</head>


<body>

<?php

 require_once ("../head/head_content.php");

?>

<div class="container" style="padding-bottom:100px;">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dracp.cpu-bioinfor.org">Home</a></li>
            <li class="active">Help</li>
        </ol>
    </div>

    <div class="row">
        <h1 style="text-align:center;color:#087d49;">Help</h1>
        <br/>
        <!--<li>Find a list of all indexed fields in the drop down menu and choose one of your interested.</li>-->
        <div id="main">
            <div class="contents">
            <h2 name="top" style="color: #70452d;">Contents</h2>
            <h4>1 Data</h4>
            <ul>
                <li><a>1.1 Peptide Information</a></li>
                <li><a>1.2 Peptide Drug Information</a></li>
            </ul>
            <h4>2 Search help</h4>
            <ul>
                <li><a href="#001">2.1 Quick Search</a></li>
                <li><a href="#002">2.2 Simple Search</a></li>
                <li><a href="#003">2.3 Advanced Search</a></li>
                <li><a href="#004">2.4 Drug search</a></li>
            </ul>
            <h4><a href="#005">3 BLAST help</a></h4>
            <!--<ul>-->
            <!--    <li><a href="#005">3.1 Similarity search/Similarity search(Peptide Drug)</a></li>-->
            <!--    <li><a href="#006">3.2 Anticancer peptide prediction</a></li>-->
            <!--</ul>-->
            </div>
        </div>
    </div>
    <hr style="border-top: 2px dashed #087d49;">
    <div class="box_item">
        <h2 style="color: #377859;">1 Data</h2>
        <h3 style="color: #539a34;">1.1 Peptide Information</h3>
        <br>
            <table border="1" align="center" style="background: #fff;">
                <thead >
                    <tr>
                        <th>-</th>
                        <th>Fields</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="8">General information</td>
                        <td>DRACP ID</td>
                        <td>The field provides the unique accessing number linking to the corresponding DRACP entry.</td>
                    </tr>
                    <tr>
                        <td>Peptide Name</td>
                        <td>Name of each peptide in DRACP.</td>
                    </tr>
                    <tr>
                        <td>Sequence</td>
                        <td>The peptide sequence which is represented by single letter codes. L-amino acids are expressed in capital letters, and D-amino acids are expressed in small letters. X refers to modified amino acids.</td>
                    </tr>
                    <tr>
                        <td>Sequence Length</td>
                        <td>Number of resiudes in the peptide sequence.</td>
                    </tr>
                    <tr>
                        <td>Uniprot ID</td>
                        <td>Provide the accessing link(s) directing to external Uniprot entry(or entries). </td>
                    </tr>
                    <tr>
                        <td>Source</td>
                        <td>The organism where the peptides or proteins were extracted or isolated.</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>Peptides are divided into <strong>Native peptide</strong> and <strong>Synthetic peptide</strong> according to their origin.</td>
                    </tr>
                    <tr>
                        <td>Classification</td>
                        <td>Classificed by peptide type or mechanism. Including Molecularly targeted peptides, Cell-penetrating peptides, Tumor-homing peptides, Membrane-targeted mechanism, Apoptosis mechanism, Antiangiogenic mechanism...</td>
                    </tr>
                    <tr>
                        <td rowspan="7">Activity information</td>
                        <td>Anticancer activity</td>
                        <td>Anticancer or antitumor activity verified by experiment. Including Cell Line, Disease, Cancer Classified, Activity, Testing Assay and Time. Data from literature or patents.</td>
                    </tr>
                    <tr>
                        <td>Hemolytic Activity</td>
                        <td>Hemolytic activity information against red blood cells (RBCs).</td>
                    </tr>
                    <tr>
                        <td>Normal (non-cancerous) Cytotoxicity</td>
                        <td>Cytotoxicity information against normal (non-cancerous) cell line.</td>
                    </tr>
                    <tr>
                        <td>Target</td>
                        <td>The action site of peptides against cancer cell.</td>
                    </tr>
                    <tr>
                        <td>Affinity</td>
                        <td>Binding affinity between peptides and targets.</td>
                    </tr>
                    <tr>
                        <td>Mechanism</td>
                        <td>The mechanism of peptides acting as anticancer agents.</td>
                    </tr>
                    <tr>
                        <td>Nature</td>
                        <td>Biological activity classification. Except anticancer, it also includes Antibacterial, Antifungal, Antiviral...</td>
                    </tr>
                    <tr>
                        <td rowspan="8">Structure information</td>
                        <td>PDB ID</td>
                        <td>Provide accessing link(s) directing to the correspong PDB entry.</td>
                    </tr>
                    <tr>
                        <td>Predicted Structure</td>
                        <td>Structure predicted by Alphafold, Show with Mol*viewer, click can download the PDB files.</td>
                    </tr>
                    <tr>
                        <td>Helicity</td>
                        <td>α-helix percentage</td>
                    </tr>
                    <tr>
                        <td>Linear/Cyclic</td>
                        <td>Linear or cyclic of peptides</td>
                    </tr>
                    <tr>
                        <td>Disulfide/Other Bond</td>
                        <td>Disulfide bond (DSB) or other bond, such as sidechain-mainchain bond (SMB), N-C termini peptide bond (NCB).</td>
                    </tr>
                    <tr>
                        <td>N/C-terminal Modification</td>
                        <td>The modifications of N/C-terminal according to the references</td>
                    </tr>
                    <tr>
                        <td>Other Modification</td>
                        <td>Special amino acids (out of 20 common amino acids).</td>
                    </tr>
                    <tr>
                        <td>Chiral</td>
                        <td>The L/D amino acids consist peptides.</td>
                    </tr>
                    <tr>
                        <td>Physicochemical Information</td>
                        <td colspan="2">Formula, mass, pI, Net charge and other information.</td>
                    </tr>
                    <tr>
                        <td>Literature Information</td>
                        <td colspan="2">The information of peptides come from all kinds of literature or patents, and the section provides the way to find the full text.</td>
                    </tr>
                    <tr>
                        <td>Link</td>
                        <td colspan="2">Link to other peptide databases.</td>
                    </tr>
                </tbody>
            </table>
            <br>
    </div>
    
    <div class="box_item">
        <h3 style="color: #539a34;">1.2 Peptide Drug Information</h3>
        <br>
            <table border="1" align="center" style="background: #fff;">
                <thead >
                    <tr>
                        <th>-</th>
                        <th>Fields</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="7">General information</td>
                        <td>DRACPC ID</td>
                        <td>The field provides the unique accessing number linking to the corresponding DRACPC entry.</td>
                    </tr>
                    <tr>
                        <td>Active Ingredients</td>
                        <td>Active pharmaceutical ingredient. Substance in which the drug actually works.</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>Drug description.</td>
                    </tr>
                    <tr>
                        <td>Synonyms</td>
                        <td>Other names of drug.</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>Drug type, mainly including small molecule drug and biotech drug.</td>
                    </tr>
                    <tr>
                        <td>Disease</td>
                        <td>Applicable diseases.</td>
                    </tr>
                    <tr>
                        <td>Classification</td>
                        <td>Drug Categories.</td>
                    </tr>
                    <tr>
                        <td colspan="2">Structure information</td>
                        <td>Molecular Formula, Molecular Weight, Active Sequence, Sequence Length, Modification and other structure information.</td>
                    </tr>
                    <tr>
                        <td colspan="2">External Codes</td>
                        <td>External identification code, also provides the accessing link to PubChem, DrugBank, NCI Thesaurus and GSRS.</td>
                    </tr>
                    <tr>
                        <td colspan="2">Drug approval</td>
                        <td>Including drug approval and clinical information.</td>
                    </tr>
                </tbody>
            </table>
            <br>
    </div>
    
    <div class="box_item">
        <h2 style="color: #377859;" name="001" id="001">2 Search help</h2>
        <h3 style="color: #539a34;">2.1 Quick Search (Home page and Navigation bar)</h3>
        <!-- </ul> -->
        <p>Quick search allows keywords searches for sequence, peptide name and DRACP ID fields in the whole DRACP, including Peptide Library and Drug Library:</p>
        <ul>
            <li>Identify the keywords of interest for your search.</li>
            <li name="002" id="002">Enter the terms (or key concepts) in the search box.</li>
            <li>"Enter".</li>
        </ul>
        <!--<a href="#top"><div class="back_top">Top</div></a>-->
    </div>


    <div class="box_item">
        <h3 style="color: #539a34;">2.2 Simple Search</h3>
        <p>The Simple Search page allows you to search <strong>individual fields</strong> in Peptide Library.</p> 
        <ul>
            <li>Find a list of all indexed fields in the drop down menu and choose one of your interested.</li>
            <li>Enter the appropriate contents in the text area below.</li>
            <li>Click "Submit" (or click "Reset" to clear your input).</li>
        </ul>
        <!--<a href="#top"><div class="back_top">Top</div></a>-->
        <img src="../link_images/new/Simple_search.png" width="60%" style="margin: 0 228px;">
        <div class="box_table bs-example">
                    <div>
                            <ul>
                            <li>Sequence >>> <span>Single letter code (no space, mature peptide only) .e.g.<strong>FLPLLAGLAANFLPTIICKISYKC</strong></span></li>
                            <li>Peptide Name >>> <span>Name of peptides (full name or short name works) .e.g.<strong>Buforin IIb</strong> or <strong>Buforin</strong></span></li> 
                            <li>Sequence length >>> <span>Enter the peptide sequence length number. e.g.<strong>21</strong></span></li>
                            <!--<li>Mass >>> <span>Molecular weight(Unit is dalton) of input peptide. e.g.<strong>302071</strong></span></li>-->
                            <li>Origin >>> <span>Origin of peptides (full name or short name works). e.g.<strong>Skin secretions of Rana rugosa</strong> or <strong>Rana rugosa</strong></span></li>
                            <li>UniProt ID >>> <span>Accessing number and linking to UniProtKB/Swiss-Prot entries. e.g.<strong>P80400</strong></span></li>
                            <li>PDB ID >>> <span>Accessing numble of Protein Data Bank. e.g.<strong>1JMN</strong></span></li>
                            <li>Linear/Cyclic >>> <span>Structural properties of peptides, linear or cyclic. e.g.<strong>linear</strong></span></li>
                            <li>Chiral>>> <span>Stereochemical properties of amino acids. e.g.<strong>L</strong></span></li>
                            
                            <li>Cell Line >>> <span>Cancer cell lines used for activity determination. e.g.<strong>K562</strong></span></li>
                            <li>Pantent ID>>> <span>Anticancer peptide patent query, enter the patent number. e.g.<strong>US2018/0057532A1</strong></span></li>
                            <li>Pubmed ID>>> <span>Anticancer peptide literature query, enter the Pubmed ID. e.g.<strong>14499271</strong></span></li>
                            <li name="003" id="003">Nature >>> <span>By other Natrue searches for anticancer peptide. e.g.<strong>Antimicrobial</strong></span></li>
                            </ul>                        
                    </div>
        </div>
    </div>


    <div class="box_item">
        <h3 style="color: #539a34;">2.3 Advanced Search</h3>
        <p>Through any combination of keywords input panel retrieval. The relationship between each item is "and".</p>
        <!--<a href="#top" style="display: flex;"><div class="back_top">Top</div>-->
        </a>
        <img src="../link_images/new/Advanced_search.jpeg" width="60%" style="margin: 0 228px;">
       
    </div>
    <br name="004" id="004">
    <br>
    <div class="box_item">
        <h3 name="004" style="color: #539a34;">2.4 Drug search</h3>
        <p>The Drug search page allows you to search <strong>individual fields</strong> in Drug Library.</p> 
        <ul>
            <li>Find a list of all indexed fields in the drop down menu and choose one of your interested.</li>
            <li>Enter the appropriate contents in the text area below.</li>
            <li>Click "Submit" (or click "Reset" to clear your input).</li>
        </ul>
        <!--<a href="#top"><div class="back_top">Top</div></a>-->
        <img src="../link_images/new/Simple_search_drug.png" width="60%" style="margin: 0 228px;">
        <div class="box_table bs-example">
                    <div>
                            <ul>
                            <li>Active Sequence >>> <span>Single letter code. e.g. <strong> AGCKNFFWKTFTSC</strong></span></li>
                            <!--<li>Peptide Name >>> <span>Name of peptides in ACPDB (full name or short name works) .e.g.<strong>Buforin IIb</strong> or <strong>Buforin</strong></span></li> -->
                            <li>Sequence length >>> <span>Enter the peptide sequence length number. e.g. <strong>10</strong></span></li>
                            <li>Active Ingredients >>> <span>Name of active ingredient of the ACP drug. e.g. <strong>Triptorelin</strong></span></li>
                            <li>PubChem CID >>> <span>PubChem identification code. e.g. <strong>25074470</strong></li>
                            <li>DrugBank Accession Number >>> <span>DrugBank identification code. e.g. <strong>DB06825</strong></span></li>
                            <li>UNII >>> <span>UNII identification code. e.g. <strong>9081Y98W2V</strong></span></li>
                            <li>CAS >>> <span>CAS identification code. e.g. <strong>57773-63-4</strong></span></li>
                            </ul>                        
                    </div>
        </div>
    </div>
    
    
    
    <div class="box_item">
        <h2 style="color: #377859;">3 BLAST help</h2>
        <!--<h3 name="005" style="color: #539a34;">3.1 Similarity Search/Similarity search(Peptide Drug)</h3>-->
        <img src="../link_images/new/BLAST.png" width="60%" style="margin: 0 228px;">
        <p>The <strong>BLAST</strong> (Basic Local Alignment Search Tool) program uses a strategy based on matching sequence fragments by employing a powerful statistical model to find the best <strong>local alignments</strong> (For more information see <a href="http://www.ebi.ac.uk/Tools/sss/ncbiblast/">http://www.ebi.ac.uk/Tools/sss/ncbiblast/</a>). </p>
        <h3>Usage Introduction</h3>
        <h4>Step 1 – Sequence Input</h4>
        <ul>
            <li><strong>Sequence Input Window</strong>: The query sequence can be entered directly into text area. The sequence must be <strong>FASTA</strong> format.</li>
            <p><strong>FASTA format</strong>: FASTA formatted sequence records start with a definition line, which must start with a > character. The definition line must occupy one single line and followed by sequence data.</p>
            <p>Example: </p>
            <p>><br>
            FLPLLAGLAANFLPTIICKISYKC	</p>
        </ul>
        <h4>Step 2 – Parameters</h4>
        <ul>
            <li><strong>Matrix</strong>: This option allows you to choose the scoring matrix to be applied to the search.</li>
        </ul>
        <p>Default value is: <strong>BLOSUM62</strong></p>
        <p><strong>Tip</strong>: In general, higher value BLOSUM matrices (e.g. BLOSUM90) and lower value PAM matrices (e.g. PAM30) are more stringent than low value BLOSUM or high value PAM matrices. This implies that if you want to find more distantly related homologues, you should preferentially employ a low value BLOSUM or high value PAM matrix (For more information about scoring matrices see <a href="http://en.wikipedia.org/wiki/Matrix">http://en.wikipedia.org/wiki/Matrix</a>).</p>
        <!--<a href="#top"><div class="back_top">Top</div></a>-->
    </div>
    
    <!--<div class="box_item">-->
    <!--    <h3 name="006" style="color: #539a34;">3.2 Anticancer peptide prediction</a></h2>-->
    <!--    <img src="../link_images/new/pre.png" width="60%" style="margin: 0 228px;">-->
    <!--    <p>The tool is used for anticancer activity prediction of unmodified natural peptide sequences (only 20 natural amino acids), and one or more peptide sequences are submitted through an input box for prediction. Submission in the form of a document is also supported. The submitted form of the peptide sequence must be in fasta format and the identifier ">" cannot be followed by any description, as shown in the figure.</p>-->
    <!--    <h3>Usage Introduction</h3>-->
    <!--    <h4>Step 1 – Sequence Input</h4>-->
    <!--    <ul>-->
    <!--        <li><strong>Sequence Input Window</strong>: The query sequence can be entered directly into text area. The sequence must be <strong>FASTA</strong> format.</li>-->
    <!--        <p><strong>FASTA format</strong>: FASTA formatted sequence records start with a definition line, which must start with a > character. The definition line must occupy one single line and followed by sequence data.</p>-->
    <!--        <p>Example: </p>-->
    <!--        <p>></p>-->
    <!--        <p>FLPLLAGLAANFLPTIICKISYKC	</p>-->
    <!--    </ul>-->
    <!--    <h4>Step 2 – Parameters</h4>-->
    <!--    <ul>-->
    <!--        <li><strong>Matrix</strong>: This option allows you to choose the scoring matrix to be applied to the search.</li>-->
    <!--    </ul>-->
    <!--    <p>Default value is: <strong>BLOSUM62</strong></p>-->
    <!--    <p><strong>Tip</strong>: In general, higher value BLOSUM matrices (e.g. BLOSUM90) and lower value PAM matrices (e.g. PAM30) are more stringent than low value BLOSUM or high value PAM matrices. This implies that if you want to find more distantly related homologues, you should preferentially employ a low value BLOSUM or high value PAM matrix (For more information about scoring matrices see <a href="http://en.wikipedia.org/wiki/Matrix">http://en.wikipedia.org/wiki/Matrix</a>).</p>-->
        <!--<a href="#top"><div class="back_top">Top</div></a>-->
    <!--</div>-->

</div>
<?php

	require_once("../head/footer.php");

?>

</body>
</html>

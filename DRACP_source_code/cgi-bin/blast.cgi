#! /usr/bin/perl -w
use strict;

use CGI;
print "content-type: text/html","\n\n";

my $line;
my $edit;
my $flag;
my $result_num=1;

my $q= CGI->new;
my $area= $q->param('simi_area');
my $cpp = $area;
$cpp =~ s/>.*\s//;
my $cpp_length = length($cpp);	
#my $matrix =$q->param('matrix');
#print $area;
#print $matrix;
my $database="\./database/DRACP";

open EOF,">/www/wwwroot/dracp/tmp/simi_search_tmp/query.in" or die "Couldn't open: $!";
 print EOF $area;
close EOF;

my $query="blastp -query ../tmp/simi_search_tmp/query.in -db $database -out ../tmp/simi_search_tmp/tmp.out";
system($query);

my $content_line;
open LOL,"</www/wwwroot/dracp/tools/tools_result_static.html" or die "Counldn't open: $!";
	while (my $line = <LOL>){
		$content_line .= $line;
	}
close LOL;

my $line;
my $edit;
my $flag;
my $result_information;

if(-e "../tmp/simi_search_tmp/tmp.out"){
	open EOF,"</www/wwwroot/dracp/tmp/simi_search_tmp/tmp.out";
	my @my_line=<EOF>;
	
	foreach $edit(@my_line){
  		last if $edit =~ /Lambda/;
		$flag = "pp" if $edit=~/Query=/;
		if ($edit =~ />/){
			$edit =~ s/>/Database ID :/;
			$edit = "Result $result_num :<br>".$edit;
			$result_num ++ ;
                } 
		$edit =~  s/DRACP(\d+)/<a href\=\"http:\/\/dracp\.cpu-bioinfor.org\/browse\/Peptide_content.php\?id=DRACP$1\"\>DRACP$1\<\/a\>/ if $edit =~ /DRACP(\d+)/;
		$line = $line."</br>".$edit if ($flag);
		#last unless $edit =~ //;
	}
	close EOF;
}else{
	$line = "No Results";
}

my $result=$line;

my $content_command = $content_line;
$content_command =~ s/Lazysheep/$result/;
print qq($content_command);

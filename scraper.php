<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful

// require 'scraperwiki.php';
// require 'scraperwiki/simple_html_dom.php';
//
// // Read in a page
// $html = scraperwiki::scrape("http://foo.com");
//
// // Find something on the page using css selectors
// $dom = new simple_html_dom();
// $dom->load($html);
// print_r($dom->find("table.list"));
//
// // Write out to the sqlite database using scraperwiki library
// scraperwiki::save_sqlite(array('name'), array('name' => 'susan', 'occupation' => 'software developer'));
//
// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")

// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".3

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';



$Alpha	=	array('AB');
$url = 'http://islamabadexcise.gov.pk/VEH_REG/VEH_QUERY.asp?X=';


for ($outterloop = 0; $outterloop < sizeof($Alpha); $outterloop++) 
	{
		for ($innerloop = 101; $innerloop <102; $innerloop++) 
		{
			$NewLink	=	$url . $Alpha[$outterloop] . '&Y=' . $innerloop;
			$html 		= file_get_html($NewLink);
			foreach($html->find("/html/body/div/table/tbody/tr[1]/td/form/table/tbody/tr[7]/td/table/tbody") as $element)
			{

				if($element)
				{
					echo $reg_no 		= $element->find("tr/td[2]/font" ,1).text;
					echo $reg_date 		= $element->find("tr/td[2]/font" ,2).text;
					echo $maker 		= $element->find("tr/td[2]/font" ,4).text;
					echo $model 		= $element->find("tr/td[2]/font" ,6).text;
					echo $chassis_no	= $element->find("tr/td[2]/font" ,8).text;
					echo $engine_no 	= $element->find("tr/td[2]/font" ,10).text;
					echo $owner 		= $element->find("tr/td[2]/font" ,12).text;
					echo $sw 		= $element->find("tr/td[2]/font" ,14).text;
					echo $type 		= $element->find("tr/td[2]/font" ,16).text; 
					echo $NewLink;
					
				}
			}
			
		}
		
           
	}
	
	
?>




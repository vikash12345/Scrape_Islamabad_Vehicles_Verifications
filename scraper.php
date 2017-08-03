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
			for ($innerloop = 100; $innerloop <105; $innerloop++) 
			{
				$NewLink	=	$url . $Alpha[$outterloop] . '&Y=' . $innerloop;
				$html 		= file_get_html($NewLink);
				foreach($html->find("/html/body/div/table/tbody/tr[1]/td/form/table/tbody/tr[7]/td/table/tbody") as $element)
				{

						 $reg_no 		= $element->find("tr/td[2]/font" ,1)->plaintext;
						 $reg_date 		= $element->find("tr/td[2]/font" ,2)->plaintext;
						 $maker 		= $element->find("tr/td[2]/font" ,4)->plaintext;
						 $model 		= $element->find("tr/td[2]/font" ,6)->plaintext;
						 $chassis_no	= $element->find("tr/td[2]/font" ,8)->plaintext;
						 $engine_no 	= $element->find("tr/td[2]/font" ,10)->plaintext;
						 $owner 		= $element->find("tr/td[2]/font" ,12)->plaintext;
						 $sw 		= $element->find("tr/td[2]/font" ,14)->plaintext;
						 $type 		= $element->find("tr/td[2]/font" ,16)->plaintext; 
						 $NewLink;
					
					echo $reg_no<br>;
						if($reg_no != null)
						{
								scraperwiki::save_sqlite(array('name'), array('name' => $reg_no , 'regdate' => $reg_date, 'maker' => $maker, 'model' => $model, 'chas' => $chassis_no, 'engine' => $engine_no, 'owner' => $owner, 'sw' => $sw, 'type' => $type, 'link' => $NewLink));

						}
					

					
					
				}
			}
		

	}
					



		
	?>






	
	

				



	




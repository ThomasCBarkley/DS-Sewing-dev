<?php
//$html

function product_table( $prod_array, $tbl_header = false, $tbl_title = false, $add_info = '', $tbl_width = '600' ) {
	$clm_size = true;
	$html     = '<TABLE WIDTH="'.$tbl_width.'" BORDER="1" CELLSPACING="0" CELLPADDING="3">';


	if ( $tbl_title ) {
		if(!is_array($tbl_title)){
			$title['title'] = $tbl_title;
			$title['strong'] = true;
		}else{
			$title['title'] = $tbl_title['title'];
			$title['strong'] = $tbl_title['strong'];
		}

		$html .= '
      <TR>
        <TD COLSPAN="5" ALIGN="center">
        '.($title['strong'] ? '<strong>':'' ).'
            <FONT FACE="Arial">
              <a name="' . create_friedly_name( $title['title'], true ) . '">' . $title['title'] . '</a>
            </FONT>
          '.($title['strong'] ? '</strong>':'' ).'
          <br />
          ' . $add_info . '
        </TD>
      </TR>
    ';
	}
	if ( $tbl_header ) {
		$html .= '
    <TR>
        <TD WIDTH="15%" HEIGHT="50">
          <P ALIGN="left"><FONT SIZE="2"><STRONG>Part #</STRONG></FONT></P>
        </TD>
        <TD WIDTH="55%">
          <P ALIGN="left"><STRONG><SMALL>Product Description and</SMALL><BR>
              <SMALL>Dimensions Height x Width</SMALL></STRONG></P>
        </TD>
        <TD WIDTH="10%">
          <P ALIGN="left"><STRONG><SMALL>Shipping Wt.</SMALL></STRONG></P>
        </TD>
        <TD WIDTH="10%">
          <P ALIGN="left"><STRONG><SMALL>Price</SMALL></STRONG></P>
        </TD>
        <TD WIDTH="10%">
          <P ALIGN="left"><STRONG><SMALL>Buy</SMALL></STRONG></P>
        </TD>
      </TR>
    ';
		$clm_size=false;
	}
	$html .= product_table_iterator( $prod_array, $clm_size );

	$html .= '</TABLE>';

	return $html;
}

function product_table_iterator( $prod_array, $clm_size = false ) {
	//Original Code
	/*
	foreach ( $prod_array as $product ) {
		$tmp = product_tr( $product, $clm_size );
		$html .= $tmp[0];
		$clm_size = $tmp[1];
	}
	*/
	//echo ("product_table_iterator");

	//Added by Tom Barkley 8/1/2022
	foreach ( $prod_array as $product)
	{
		$tcb_tmp = getDetailLine($product);
		$html .= $tcb_tmp;
		//echo ("prod array");
	}

	return $html;
}

function product_tr( $id, $clm_size = false ) {

	$images = getImageLinks($id);
	$image_code = '';
	if ($images) {
		$image     = $images['image'];
		if ($image != '') {
			$image_code = "\"image\" :". json_encode($images['image']).",";
		}
	}

	$future_timestamp = strtotime("+1 month");
	$date = date('Y-m-d', $future_timestamp);
	

	$html = '
<tr itemscope itemtype="https://schema.org/Product">
  <td ' . ( $clm_size ? ' WIDTH="15%"' : '' ) . ' class="item_sku">' . $id . ' ' . getImages( $id ) . '
    <span itemprop="sku" class="hidden">'.$id.'</span>
    <span itemprop="brand" class="hidden">Merritt</span>
    <span itemprop="material" class="hidden">Aluminum</span>
    <span itemprop="itemCondition" class="hidden">NewCondition</span>
  </td>
  <td ' . ( $clm_size ? ' WIDTH="55%"' : '' ) . ' itemprop="name" class="item_description">' . getDescription( $id ) . '</td>
  <td ' . ( $clm_size ? ' WIDTH="10%"' : '' ) . ' itemprop="weight"  class="item_weight">' . getWeight( $id ) . '</td>
  <td ' . ( $clm_size ? ' WIDTH="10%"' : '' ) . ' itemprop="offers" itemscope itemtype="https://schema.org/Offer" class="item_price"><span itemprop="priceCurrency" class="item_currency">USD</span>$<span itemprop="price">' . getPrice( $id ) . '</span><link itemprop="availability" href="https://schema.org/InStock" />
  <span itemprop="priceValidUntil" class="hidden">'.$date.'</span></td>
  <td ' . ( $clm_size ? ' WIDTH="10%"' : '' ) . ' class="item_button">
      '. product_form($id) .'
      <span itemprop="aggregateRating" class="item_rating" itemscope itemtype="https://schema.org/AggregateRating">Rated: <span itemprop="ratingValue">5</span> based on <span itemprop="ratingCount">'. rand(1, 100).'</span></span>
      <img src="' . $image . '" itemprop="image" class="item_image" />
  </td>
</tr>
<script type="application/ld+json">
{
	"@content"			: "https://schema.org/Product",
	"@type"				: "Product",
	"name"				: ' . json_encode(getDescription( $id )) . ',
	"description"	    : ' . json_encode(getDescription( $id )) . ',
	"sku"               : ' . json_encode($id) . ',
	'.$image_code.'
	"offer"             : {
							"@type"             : "Offer",
							"price"             : '.json_encode(getPrice( $id )).',
							"priceCurrency"     : "USD",
							"priceValidUntil"   : '. json_encode($date) .',
							"availability"      : "https://schema.org/InStock"
							},
	"aggregateRating"   : {
							"@type"         : "AggregateRating",
							"ratingValue"   : "5",
							"ratingCount"   : '. json_encode(rand(1, 100)) .'
							}	
	
}
</script>
';

	return [$html, false];
}

function product_form($id){
	$html = '
	<form action="/s/incart" method="post" id="form1" name="form1">
        <input type="hidden" value="incart" name="action">
        <input type="hidden" value="' . $id . '" NAME="pid">
        <input type="submit" value="Buy" id="SUBMIT1" name="SUBMIT1">
      </form>
	';

	return $html;
}

function create_friedly_name( $name, $under = false ) {

	if ( $under ) {
		$repl = "_";
	} else {
		$repl = "-";
	}

	$name = str_replace( "-", $repl, $name );
	$name = str_replace( "?", "", $name );
	$name = str_replace( " ", $repl, $name );
	$name = str_replace( "/", $repl, $name );
	$name = str_replace( "&", "and", $name );
	$name = str_replace( ":", "", $name );
	$name = str_replace( ",", "", $name );
	$name = str_replace( "+", $repl, $name );
	$name = str_replace( "'", "", $name );
	$name = str_replace( "!", "", $name );

	$name = str_replace( "---", $repl, $name );
	$name = str_replace( "--", $repl, $name );

	return $name;
}


      
      
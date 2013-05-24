<?php
/**
 * @author VaL <vd@nxc.no>
 * @copyright Copyright (C) 2013 NXC AS
 * @license GNU GPL v2
 * @package nxc_ajax_search_example
 */

$http = eZHTTPTool::instance();
$q = $http->hasVariable( 'q' ) ? $http->variable( 'q' ) : false;
if ( !$q )
{
    echo '';
    eZExecution::cleanExit();
}
$params = array(
            "SearchSubTreeArray" => array( 2 ),
            "SearchLimit" => 10,
            "SearchOffset" => 0 );

$searchResult = eZSearch::search( $q, $params );

$tpl = eZTemplate::factory();
$tpl->setVariable( 'list', $searchResult['SearchResult'] );
$result = $tpl->fetch( 'design:ajax/search.tpl' );

echo $result;
eZExecution::cleanExit();

?>
<?php

OCP\JSON::checkAppEnabled('mycore_versions');
OCP\JSON::callCheck();

$file = $_GET['file'];
$revision=(int)$_GET['revision'];

if(OCA\MyCoRe_Versions\Storage::rollback( $file, $revision )) {
	OCP\JSON::success(array("data" => array( "revision" => $revision, "file" => $file )));
}else{
	$l = OC_L10N::get('mycore_versions');
	OCP\JSON::error(array("data" => array( "message" => $l->t("Could not revert: %s", array($file) ))));
}

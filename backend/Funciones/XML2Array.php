<?php

namespace Funciones;

use DOMDocument;
use DOMXPath;

class XML2Array
{
	public static function xml2Array($xpath = "/*", $xml_data = "", $context_node = null)
	{
		static $xp;

		if (!$xml_data) {
			return [];
		}

		if (!self::ereg("/\*$", $xpath)) {
			$xpath = self::eregReplace("/*$", "", $xpath) . "/*";
		}

		$xml = new DOMDocument();
		$xml->loadXML($xml_data);
		$xp = $xp ?: new DOMXPath($xml);
		$xp->registerNamespace('S', 'http://schemas.xmlsoap.org/soap/envelope/');
		$xp->registerNamespace('ns2', 'http://login.ws.consolidador.gi.com');

		$nodelist = ($context_node) ? $xp->query($xpath, $context_node) : $xp->query($xpath);
		$tmp_array = [];

		foreach ($nodelist as $node) {
			$nodeArray = self::getNodeArray($node, $xp);
			$nodeName = $node->nodeName;
			$tmp_array[$nodeName] = $nodeArray;
		}

		return $tmp_array;
	}

	private static function getNodeArray($node, $xp, $counter = [])
	{
		$nodeArray = [];
		$counter[$node->nodeName] = isset($counter[$node->nodeName]) ? $counter[$node->nodeName] + 1 : 0;

		if ($xp->evaluate('count(./*)', $node) > 0) {
			foreach ($node->childNodes as $childNode) {
				if ($childNode->nodeType == XML_ELEMENT_NODE) {
					$childArray = self::getNodeArray($childNode, $xp, $counter);
					$nodeArray[$childNode->nodeName][] = $childArray;
				}
			}
		} else {
			$nodeArray = $node->nodeValue;
		}

		return $nodeArray;
	}

	public static function ereg($pattern, $subject, &$matches = [])
	{
		return preg_match('/' . addcslashes($pattern, '/') . '/', $subject, $matches);
	}
	public static function eregReplace($pattern, $replacement, $string)
	{
		return preg_replace('/' . addcslashes($pattern, '/') . '/', $replacement, $string);
	}
}

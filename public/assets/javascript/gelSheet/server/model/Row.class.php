<?php
/*  Gelsheet Project, version 0.0.1 (Pre-alpha)
 *  Copyright (c) 2008 - Ignacio Vazquez, Fernando Rodriguez, Juan Pedro del Campo
 *
 *  Ignacio "Pepe" Vazquez <elpepe22@users.sourceforge.net>
 *  Fernando "Palillo" Rodriguez <fernandor@users.sourceforge.net>
 *  Juan Pedro "Perico" del Campo <pericodc@users.sourceforge.net>
 *
 *  Gelsheet is free distributable under the terms of an GPL license.
 *  For details see: http://www.gnu.org/copyleft/gpl.html
 *
 */
include_once("config/settings.php");
include_once($cnf['site']['path']."/model/CellContainer.class.php");

class Row extends CellContainer {

	/**
	 * @see CellContainer::load()
	 *
	 * @param unknown_type $SheetId
	 */
	public function load($sheetId,$index) {
		$sql = "select * from ".table('rows'). " where SheetId=$sheetId and ColumnIndex=$index" ;
		$result =  mysqli_query(DB::connection()->getLink(), $sql);
	}

	/**
	 * @see CellContainer::save()
	 *
	 * @param unknown_type $SheetId
	 */
	public function save($SheetId) {
		$sql = sprintf("insert into ".table('rows'). "(SheetId,RowIndex,RowSize,FontStyleId,LayoutStyleId,LayerStyleId) VALUES (%d,%d,%d,%d,%d,%d)",$this->sheetId,$this->index,$this->size,$this->fontStyleId,$this->layoutStyleId,$this->layerStyleId);
		$result =  mysqli_query(DB::connection()->getLink(), $sql);
		return $result;
	}

}

?>
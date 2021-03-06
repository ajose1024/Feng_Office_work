<?php
require_javascript("og/CustomProperties.js");

$fieldValues = array_var($configs, 'default_value');
$name = array_var($configs, 'name');
$genid = array_var($configs, 'genid');

$is_mem_cp = isset($configs['member_id']);
$disabled = (array_var($configs, 'property_perm') == 'view');
?>
<div id="<?php echo $genid ?>listValues<?php echo $cp->getId()?>" name="listValues<?php echo $cp->getId()?>" class="cp-multiple">
<?php 

$count = 0;
if (!is_array($fieldValues) || count($fieldValues) == 0) {
	$def_cp_value = new CustomPropertyValue();
	$def_cp_value->setValue($cp->getDefaultValue());
	$fieldValues = array($def_cp_value);
}

foreach($fieldValues as $value){
	$value = str_replace('|', ',', $value->getValue());
	if (!$value instanceof DateTimeValue) {
		$value = DateTimeValueLib::makeFromString($value);
	}
	?>
		<div id="value<?php echo $count?>" class="cp-val">
			<table id="table<?php echo $genid . $cp->getId()?>"><tr>
				<td id="td<?php echo $genid . $cp->getId() . $count?>" style="width:150px;">
	<?php
		echo pick_date_widget2($name.'['.$count.']', $value, $genid, null, null, $genid . 'cp' . $cp->getId(), null, $disabled);
	?>
			</td><td>
			<?php if (!$disabled) { ?>
				<a href="#" class="link-ico ico-delete"
				onclick="og.removeCPDateValue('<?php echo $genid?>', '<?php echo $cp->getId()?>', '<?php echo $genid?>', '<?php echo $count?>', <?php echo ($is_mem_cp ? "1" : "0")?>)" ></a>
			<?php } ?>
			</td></tr></table>
		</div>
<?php
	$count++;
}
?>
	<a href="#" class="link-ico ico-add" onclick="og.addCPDateValue('<?php echo $genid?>', <?php echo $cp->getId()?>, <?php echo ($is_mem_cp ? "1" : "0")?>)"><?php echo lang('add value')?></a>

</div>
<script>
if (!og.tmp_date_cps_amount) og.tmp_date_cps_amount = {};
og.tmp_date_cps_amount[<?php echo $cp->getId()?>] = <?php echo $count ?>;

</script>
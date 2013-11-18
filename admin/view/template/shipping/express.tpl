﻿<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
		  <tr>
				<td><?php echo $entry_de_cost; ?></td>
				<td><input name="de_cost" type="text" value="<?php echo $de_cost ?>" /></td>
			</tr>
		  <?php foreach ($geo_zones as $geo_zone) { ?>
			<tr>
				<td><?php echo $geo_zone['name']; ?>：</td>
				<td><input name="de_cost_<?php echo $geo_zone['geo_zone_id']; ?>" type="text" value="<?php $c='de_cost_'.$geo_zone['geo_zone_id']; echo $$c; ?>"/></td>
			</tr>
		 <?php } ?>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select name="express_status">
                <?php if ($express_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_sort_order; ?></td>
            <td><input type="text" name="express_sort_order" value="<?php echo $express_sort_order; ?>" size="1" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	
	
	
	
</script>
<?php echo $footer; ?> 
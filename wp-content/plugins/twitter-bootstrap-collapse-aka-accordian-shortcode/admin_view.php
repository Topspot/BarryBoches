<?php
/**
** A help section for the plugin
**/

/* Admin Help */
?>
<div class="wrap">
	<h2><?php echo  __( 'Twitter Bootstrap Collapse Shortcode Help', 'tbsca_trdom' ); ?></h2>
    <p>This plugin provides following shortcodes.</p>
    <strong>You must be using <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap Framework</a> for the accordian to work. </strong>
    <h2><?php echo __( '[collapse_group]', 'tbsca_trdom' ); ?></h2>
    <hr />
    <p>
    <strong>id:</strong> <br>
    (string) (optional) Specifid ID of the root element<br>
    <em>Default</em>: None</p>
    
    <p>
    <strong>class:</strong> <br>
    (string) (optional) Add additional class to the root element. Note: it is added after the "accordian" class.<br>
    <em>Default</em>: None</p>
    
    
    
    <h2><?php echo __( '[collapse]', 'tbsca_trdom' ); ?></h2>
    <hr />
    <p>
    <strong>id:</strong> <br>
    (string) (optional) Specifid ID of the root element<br>
    <em>Default</em>: None</p>
    
    <p>
    <strong>class:</strong> <br>
    (string) (optional) Add additional class to the root element. Note: it is added after the "accordian" class.<br>
    <em>Default</em>: None</p>
    
    <p>
    <strong>open:</strong> <br>
    (string) (optional) Whether the collapse should be opened by default.<br>
    <em>Possible values</em>: 'y' or 'n'
    <em>Default</em>: n</p>


	<h2><?php echo  __( 'Example', 'tbsca_trdom' ); ?></h2>
	<hr />
    <pre>
        [collapse_group id="optional_group_1" class="optional_class"]
            [collapse title="my heading1" id="optional_id" open="y/n"]some text[/collapse]
            [collapse title="my heading2" id="optional_id" open="y/n"]some text[/collapse]
        [/collapse_group]
    </pre>
	<h2><?php echo  __( 'HTML Output', 'tbsca_trdom' ); ?></h2>
    <hr />
    <pre>
	    <?php echo esc_attr('
<div class="accordion optional_class" id="optional_group_1">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#optional_id">my heading1</a>
		</div>
		<div id="optional_id" class="accordion-body collapse ">
			<div class="accordion-inner">some text</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#optional_id">my heading2</a>
		</div>
		<div id="optional_id" class="accordion-body collapse ">
			<div class="accordion-inner">some text</div>
		</div>
	</div>
</div>'); ?>
    </pre>
</div>

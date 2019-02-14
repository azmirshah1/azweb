<?php
/**
 * The template for displaying search forms
 *
 */
?>
<div class="panel-body">



<div class="container">

<section class="alignright" id="top-search">
	<a class="click_search " href="#0"></a>
</section>
</div>



	<div class="col-md-8 col-md-offset-2">

		<div class="widget_search" style="margin-top: 40px;">

			<form role="search" method="get"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="search-field big_search" placeholder="<?php echo esc_attr_x( __( 'Search', 'ilgelo' ), 'placeholder', '' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( '', 'label', '' ); ?>">
				<div class="textaligncenter xsmall_padding">
					<?php echo ''  . __('Filter your search by Category : Tag : Date', 'ilgelo') . ''; ?>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="container-select-box ">
							<?php wp_dropdown_categories("show_option_none=".esc_attr( __('Category', 'ilgelo'))."&id=cat&name=cat&class=postform"); ?>
						</div>
					</div><!--  END col-md-4 -->

					<div class="col-md-6">
						<div class="container-select-box">
							<select name="tag" id="tag" class="postform">
								<option value="0" selected="selected"><?php echo __('Tags', 'ilgelo' ); ?></option>
								<?php
								if ($tags=get_tags(array("orderby" => "name"))){
									foreach ($tags as $tag){
										echo "<option value='".$tag->slug."'>".$tag->name."</option>";
									}
								}
								?>
							</select>
						</div>
					</div><!--  END col-md-4 -->
				</div><!--  END row -->
			</form>

		</div><!--  END widget_search -->
	</div><!--  END col-md-8 col-md-offset-2 -->
</div><!-- End panel-body -->
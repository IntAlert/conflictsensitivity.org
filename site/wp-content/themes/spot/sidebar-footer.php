<?php
/**
 * Theme: Spot
 * 
 * The "sidebar" for the widgetized footer area. If no widgets added AND just preivewing
 * the theme, then display some widgets as samples. Once the theme is actually in use,
 * it will be empty until the user adds some actual widgets.
 *
 * @package spot
 */
?>

<?php 
/* If footer "sidebar" has widgets, then retreive them */
$sidebar_footer = get_dynamic_sidebar( 'Footer' );

/* If not, then display sample widgets, unless turned off in theme options */
global $theme_options;
if ( $theme_options['sample_widgets'] != false AND ! $sidebar_footer ) {
	$sidebar_footer = '<aside id="sample-text" class="widget col-sm-12 clearfix widget_text">'
		.'<div class="textwidget">'
		.'<center>'
		.'<a href="#"><span class="fa fa-twitter icon-lg"></span></a> &nbsp;  &nbsp; '
		.'<a href="#"><span class="fa fa-facebook icon-lg"></span></a> &nbsp;  &nbsp; '
		.'<a href="#"><span class="fa fa-google-plus icon-lg"></span></a>'
		.'</center>'
		.'</div><!-- textwidget -->'
		.'</aside>';
}

/* Apply filters and display the footer widgets */
if ( $sidebar_footer ) :
?>
	<div class="sidebar-footer clearfix">
	<div class="container">
		<div class="row">
		<?php echo apply_filters( 'xsbf_footer', $sidebar_footer ); ?>
		</div><!-- .row -->
	</div><!-- .container -->
	</div><!-- .sidebar-footer -->

<?php endif;?>
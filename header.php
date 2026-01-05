<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pmd
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:title" content="<?php bloginfo('name'); ?> <?php if (is_single()) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?>" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php if (have_rows('font_family', 'option')) : ?>
		<?php while (have_rows('font_family', 'option')) : the_row();
			$bodyfont =  get_sub_field('font_family_body', 'option');
			$titlefont =  get_sub_field('font_family_title', 'option');
			?>
			<style>
				@import url('https://fonts.googleapis.com/css?family=<?php echo $bodyfont['font']; ?><?php if (!empty($bodyfont['variants'])) {
																										echo ":" . implode(",", $bodyfont['variants']);
																									} ?>');
				@import url('https://fonts.googleapis.com/css?family=<?php echo $titlefont['font']; ?><?php if (!empty($titlefont['variants'])) {
																											echo ":" . implode(",", $titlefont['variants']);
																										} ?>');
			</style>
		<?php endwhile; ?>
	<?php endif; ?>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

	<!--custom favicon code-->
	<?php if (get_field('theme_favicon', 'option')) : ?>
		<?php $favicon = get_field('theme_favicon', 'option'); ?>
		<link rel="icon" href="<?php echo $favicon['url']; ?>" type="image/x-icon" />
	<?php else : { ?>
			<!-- Google icon -->
			<link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/assets/images/favicon.png" type="image/x-icon" />
		<?php } ?>
	<?php endif; ?>

	<?php wp_head(); ?>

	<!--Google Analytics code Start -->
	<?php if (get_field('google_analytics_code', 'option')) : ?>
		<script type="text/javascript">
			<?php the_field('google_analytics_code', 'option'); ?>
		</script>
	<?php endif; ?>
	<!--Google Analytics code end -->
</head>

<body <?php body_class('propeller-topbar-body'); ?>>

	<!-------------------------------
	Propeller Header
-------------------------------->
	<div class="propeller-topbar align-items-center">
		<a target="_blank" href="https://pro.propeller.in" class="navbar-brand">
			<svg version="1.1" x="0px" y="0px" width="173.968px" height="49.519px" viewBox="0.193 7.231 173.968 49.519" enable-background="new 0.193 7.231 173.968 49.519" xml:space="preserve">
                <g>
                    <g>
                        <path fill="#FFFFFF" d="M8.658,17.795c5.339,0,8.403,2.64,8.403,7.251c0,4.792-3.064,7.585-8.403,7.585H3.773v6.4h-3.58V17.795
            H8.658z M3.773,29.415h4.733c3.276,0,5.127-1.396,5.127-4.278c0-2.792-1.851-4.125-5.127-4.125H3.773V29.415z">
                        </path>
                        <path fill="#FFFFFF" d="M29.167,32.602c-0.304,0.03-0.637,0.03-0.971,0.03H23.16v6.4h-3.58V17.795h8.616
            c5.431,0,8.556,2.64,8.556,7.251c0,3.397-1.578,5.794-4.399,6.886l4.763,7.101H33.05L29.167,32.602z M28.196,29.415
            c3.276,0,5.158-1.396,5.158-4.278c0-2.792-1.881-4.125-5.158-4.125H23.16v8.403H28.196z"></path>
                        <path fill="#FFFFFF" d="M77.622,17.795c5.339,0,8.403,2.64,8.403,7.251c0,4.792-3.064,7.585-8.403,7.585h-4.884v6.4h-3.58V17.795
            H77.622z M72.738,29.415h4.732c3.277,0,5.127-1.396,5.127-4.278c0-2.792-1.85-4.125-5.127-4.125h-4.732V29.415z"></path>
                        <path fill="#FFFFFF" d="M92.124,21.012v5.733h10.375v3.217H92.124v5.854h11.953v3.217H88.544V17.795h15.169v3.216H92.124V21.012z">
                        </path>
                        <path fill="#FFFFFF" d="M120.188,35.786v3.246h-12.771V17.795h3.58v17.991H120.188z"></path>
                        <path fill="#FFFFFF" d="M135.355,35.786v3.246h-12.771V17.795h3.579v17.991H135.355z"></path>
                        <path fill="#FFFFFF" d="M141.333,21.012v5.733h10.376v3.217h-10.376v5.854h11.953v3.217h-15.533V17.795h15.17v3.216h-11.59V21.012
            z"></path>
                        <path fill="#FFFFFF" d="M166.212,32.602c-0.304,0.03-0.638,0.03-0.971,0.03h-5.037v6.4h-3.578V17.795h8.615
            c5.43,0,8.555,2.64,8.555,7.251c0,3.397-1.577,5.794-4.399,6.886l4.765,7.101h-4.065L166.212,32.602z M165.241,29.415
            c3.274,0,5.155-1.396,5.155-4.278c0-2.792-1.881-4.125-5.155-4.125h-5.037v8.403H165.241z"></path>
                    </g>
                    <path opacity="0.2" fill="#000001" enable-background="new    " d="M62.295,26.706c-0.529,4.162-1.91,7.709-3.951,10.194
            c-2.008,2.443-4.649,3.869-7.749,3.867c-3.078,0-5.549-1.311-7.413-3.635c-1.923-2.4-3.186-5.887-3.784-10.129l0.16-0.766
            l-0.035-0.928l5.57-1.039l5.709-0.359l4.412,0.115l6.468,1.056l0.701-0.109L62.295,26.706z"></path>
                    <path fill="#FDC672" d="M63.149,25.023c-0.557,4.404-2.009,8.156-4.156,10.787c-2.112,2.586-4.891,4.094-8.152,4.094
            c-3.237,0-5.836-1.387-7.797-3.846c-2.103-2.641-4.178-8.793-3.799-12.147c2.721-1.023,7.072-1.686,11.976-1.686
            c4.909,0,9.264,0.665,11.985,1.689L63.149,25.023z"></path>
                    <path opacity="0.2" fill="#2A100A" enable-background="new    " d="M61.876,31.167c-0.708,1.84-1.62,3.455-2.708,4.789
            c-1.093,1.338-2.363,2.392-3.785,3.104c-1.374,0.689-2.889,1.063-4.523,1.062c-1.624,0-3.09-0.343-4.401-0.99
            c-1.354-0.666-2.539-1.657-3.554-2.932c-1.026-1.287-1.84-2.873-2.476-4.703c-0.701-2.019-1.61-5.394-1.372-7.515v0.042
            c0.073-0.029,0.147-0.058,0.224-0.086c-0.377,3.349,1.694,9.494,3.794,12.126c1.941,2.437,4.511,3.816,7.706,3.84h0.078h0.08
            c3.221-0.022,5.968-1.524,8.06-4.086l0.048-0.061l0.015-0.018c0.065-0.08,0.129-0.162,0.192-0.246
            c2.455-3.191,3.748-7.563,3.951-11.554l-0.01-0.003c0.076,0.028,0.15,0.057,0.223,0.086C63.294,26.486,62.767,28.854,61.876,31.167
            L61.876,31.167z M62.993,23.863L62.993,23.863l0.069,0.024L62.993,23.863z"></path>
                    <path opacity="0.2" fill="#000001" enable-background="new    " d="M62.383,23.631l0.001,1.389
            c-2.568-1.02-5.091-2.174-9.881-2.174s-10.729,1.473-13.297,2.492l-0.009-1.408c2.718-1.033,7.092-1.704,12.024-1.704
            C55.661,22.226,59.648,22.769,62.383,23.631z"></path>
                    <path fill="none" stroke="#2A100A" stroke-width="1.167" stroke-linecap="round" stroke-miterlimit="2.6131" d="M48.769,34.872
            c0,0,2.086,1.539,5.132,0.008"></path>
                    <g>
                        <path fill="#2A100A" d="M50.51,37.077l0.119,0.465l-0.007,0.004l-0.007,0.006l-0.007,0.003l-0.007,0.004l-0.007,0.002
            l-0.008,0.002l-0.007,0.002h-0.007h-0.008l-0.007-0.002l-0.007-0.002l-0.008-0.002l-0.006-0.002l-0.007-0.002l-0.007-0.005
            l-0.006-0.004l-0.007-0.006l-0.006-0.004l-0.006-0.007l-0.006-0.008l-0.006-0.006l-0.006-0.008l-0.005-0.006l-0.005-0.01
            l-0.005-0.008l-0.004-0.01l-0.005-0.011l-0.004-0.01l-0.004-0.011l-0.003-0.012l-0.003-0.012l-0.003-0.012l-0.003-0.012
            l-0.002-0.013l-0.002-0.014l-0.001-0.013l-0.001-0.012l-0.001-0.014V37.32v-0.012V37.3v-0.012l0.001-0.013l0.001-0.012
            l0.001-0.014l0.002-0.01l0.002-0.014l0.003-0.013l0.002-0.01l0.003-0.013l0.003-0.01l0.004-0.012l0.004-0.01l0.004-0.01
            l0.004-0.008l0.005-0.011l0.005-0.01l0.005-0.008l0.005-0.009l0.006-0.008l0.006-0.006l0.007-0.008l0.006-0.006L50.51,37.077
            L50.51,37.077z M52.214,37.462l-0.231-0.317l-0.008,0.293l0.046,0.071l0.009,0.009l-0.008-0.007l-0.017-0.006l-0.025-0.01
            l-0.03-0.011l-0.036-0.008l-0.04-0.012l-0.045-0.01l-0.047-0.008l-0.051-0.01l-0.054-0.008l-0.056-0.009l-0.059-0.006l-0.06-0.006
            l-0.061-0.007L51.378,37.4l-0.063-0.004h-0.063l-0.063,0.002L51.127,37.4l-0.061,0.007l-0.06,0.008l-0.058,0.008l-0.056,0.011
            l-0.053,0.014l-0.051,0.014l-0.046,0.018L50.7,37.499l-0.038,0.021l-0.032,0.021l-0.119-0.465l0.052-0.035l0.054-0.029
            l0.057-0.025l0.059-0.021l0.061-0.018l0.062-0.017l0.064-0.012l0.065-0.012l0.066-0.006l0.067-0.006l0.067-0.002l0.067-0.002
            h0.068l0.067,0.002l0.065,0.004l0.066,0.004l0.063,0.006l0.062,0.008l0.06,0.008l0.057,0.01l0.055,0.01l0.052,0.011l0.048,0.01
            l0.044,0.013L52,36.986l0.037,0.013l0.034,0.012l0.031,0.013l0.029,0.016l0.033,0.027l0.06,0.088L52.214,37.462L52.214,37.462z
            M51.983,37.145l0.231,0.317l-0.005,0.011l-0.005,0.008l-0.005,0.01l-0.006,0.01l-0.006,0.006l-0.006,0.008l-0.006,0.008
            l-0.006,0.006l-0.006,0.007l-0.006,0.004l-0.007,0.004l-0.006,0.004l-0.007,0.004l-0.007,0.005h-0.007l-0.008,0.002l-0.007,0.002
            h-0.007h-0.007l-0.007-0.002H52.08l-0.007-0.002l-0.007-0.005l-0.007-0.002l-0.007-0.004l-0.007-0.004l-0.007-0.004l-0.006-0.007
            l-0.006-0.006l-0.006-0.008l-0.006-0.006l-0.006-0.01L52,37.491l-0.005-0.009l-0.005-0.01l-0.004-0.01l-0.005-0.01l-0.004-0.012
            l-0.004-0.01l-0.003-0.011l-0.003-0.012l-0.003-0.013l-0.002-0.012l-0.003-0.012l-0.001-0.01l-0.002-0.012l-0.001-0.015v-0.012
            v-0.013v-0.012v-0.012v-0.014v-0.012l0.001-0.013l0.001-0.012l0.002-0.013l0.001-0.014l0.002-0.01l0.003-0.012l0.003-0.012
            l0.003-0.013l0.004-0.01l0.004-0.013H51.983z"></path>
                    </g>
                    <path opacity="0.2" fill="#000001" enable-background="new    " d="M60.076,25.364c1.235,0.026,1.771,0.672,3.035,0.672
            c0.784-0.009,0.701,1.276,0.287,1.752c-0.565,0.553-0.752,0.772-0.83,1.471c-0.002,0.652-0.089,1.339-0.228,2.023
            c-1.384,5.896-9.588,3.791-10.522-1.796l-0.034-0.053c-0.152-0.424-0.432-0.709-0.753-0.709c-0.33,0-0.618,0.301-0.766,0.746
            c-0.921,5.598-9.139,7.713-10.525,1.812c-0.163-0.808-0.255-1.615-0.221-2.369c-0.009,0.121-0.013,0.233-0.015,0.346
            c-0.077-0.696-0.265-0.918-0.83-1.471c-0.414-0.476-0.497-1.761,0.288-1.752c1.539,0,3.899-1.017,6.289-1.017
            c2.371,0.141,3.624,0.49,4.296,1.06l-0.004-0.005c0.324,0.171,0.872,0.283,1.494,0.283c0.641,0,1.204-0.119,1.523-0.299
            c0.678-0.557,1.93-0.899,4.271-1.039C58.313,25.02,59.341,25.146,60.076,25.364z"></path>
                    <path fill="#2A100A" d="M60.874,24.703c1.304,0.027,1.868,0.673,3.203,0.673c0.828-0.008,0.741,1.276,0.303,1.751
            c-0.596,0.553-0.794,0.773-0.876,1.471c-0.002,0.652-0.094,1.338-0.24,2.021c-1.461,5.9-10.118,3.793-11.104-1.793l-0.036-0.053
            c-0.16-0.424-0.456-0.709-0.794-0.709c-0.349,0-0.652,0.301-0.809,0.746c-0.973,5.598-9.644,7.713-11.106,1.809
            c-0.171-0.805-0.269-1.613-0.233-2.369c-0.009,0.121-0.013,0.238-0.015,0.348c-0.082-0.697-0.279-0.918-0.875-1.471
            c-0.437-0.475-0.525-1.759,0.303-1.751c1.625,0,4.115-1.017,6.636-1.017c2.502,0.141,3.825,0.491,4.533,1.06l-0.004-0.005
            c0.342,0.171,0.92,0.284,1.576,0.284c0.677,0,1.271-0.12,1.607-0.3c0.715-0.556,2.037-0.899,4.506-1.039
            C59.014,24.359,60.098,24.487,60.874,24.703z"></path>
                    <path fill="#2A100A" d="M49.886,10.032c0.27-0.036,0.546-0.063,0.83-0.079L50.714,9.94c0-0.02,0-0.039,0-0.057
            c0-0.23,0.057-0.439,0.148-0.59l0,0l0,0c0.092-0.151,0.22-0.245,0.359-0.245c0.14,0,0.267,0.094,0.36,0.245l0,0
            c0.091,0.151,0.148,0.36,0.148,0.59c0,0.015,0,0.033-0.001,0.05V9.95c0.273,0.014,0.55,0.041,0.829,0.082
            c-0.101-0.965-0.572-1.719-1.162-1.844l0,0L51.36,8.181l0,0l-0.031-0.004l-0.002-0.001h-0.001h-0.002l-0.031-0.003h-0.001l0,0l0,0
            L51.257,8.17l0,0l0,0l0,0h-0.035h-0.035l0,0l0,0l0,0l-0.034,0.002l0,0l0,0h-0.001L51.12,8.176h-0.002h-0.001l-0.003,0.001
            l-0.031,0.004l0,0l-0.034,0.007l0,0C50.458,8.313,49.986,9.067,49.886,10.032z"></path>
                    <g>
                        <path fill="#2A100A" d="M42.527,7.231c-3.94,0-7.134,0.589-7.134,1.314c0,0.726,3.194,1.315,7.134,1.315s7.134-0.589,7.134-1.315
            C49.661,7.82,46.467,7.231,42.527,7.231z"></path>
                        <path fill="#2A100A" d="M59.916,7.231c3.939,0,7.134,0.589,7.134,1.315S63.856,9.86,59.916,9.86s-7.134-0.588-7.134-1.314
            S55.976,7.231,59.916,7.231z"></path>
                    </g>
                    <path fill="#FFCE88" d="M45.161,25.369c4.019,0.227,4.213,1.133,4.277,2.775c-0.064,5.01-7.675,7.154-8.901,2.201
            c-0.274-1.285-0.309-2.578,0.268-3.511C41.3,26.036,41.976,25.369,45.161,25.369z"></path>
                    <path fill="#FFCE88" d="M57.517,25.369c-4.02,0.227-4.213,1.133-4.277,2.775c0.064,5.01,7.674,7.154,8.901,2.201
            c0.273-1.285,0.308-2.578-0.268-3.511C61.377,26.036,60.702,25.369,57.517,25.369z"></path>
                    <polygon fill="#2A100A" points="61.347,29.12 58.06,27.25 57.79,28.128 59.439,29.114 57.812,30.081 58.083,30.979    ">
                    </polygon>
                    <polygon fill="#2A100A" points="56.937,26.886 57.635,26.886 56.293,31.023 55.595,31.023    ">
                    </polygon>
                    <polygon fill="#2A100A" points="42.54,29.139 45.899,27.227 46.176,28.122 44.49,29.132 46.153,30.12 45.877,31.038   ">
                    </polygon>
                    <g>
                        <path opacity="0.7" fill="#FFFFFF" enable-background="new    " d="M44.813,25.968c-2.095,0-2.64,0.313-3.086,0.69
            c-0.52,0.438-0.693,1.046-0.707,1.65c0.015,0.58,0.356,0.953,0.873,1.15c-0.195-0.203-0.313-0.469-0.321-0.801
            c0.014-0.605,0.188-1.215,0.707-1.652c0.447-0.376,0.992-0.689,3.087-0.689c0.895,0.037,1.481,0.109,1.857,0.224
            C47.042,26.223,46.43,26.034,44.813,25.968z"></path>
                        <path opacity="0.7" fill="#FFFFFF" enable-background="new    " d="M57.637,25.968c-2.095,0-2.641,0.313-3.087,0.69
            c-0.521,0.438-0.693,1.046-0.708,1.65c0.015,0.58,0.356,0.953,0.874,1.15c-0.196-0.203-0.313-0.469-0.321-0.801
            c0.014-0.605,0.188-1.215,0.707-1.652c0.447-0.376,0.993-0.689,3.087-0.689c0.895,0.037,1.481,0.109,1.858,0.224
            C59.864,26.223,59.252,26.034,57.637,25.968z"></path>
                    </g>
                    <path opacity="0.2" fill="#000001" enable-background="new    " d="M62.417,24.581l7.641,3.063
            c0.143,0.068,0.096,0.254,0.085,0.347c-0.011,0.09-1.248,2.254-4.252,2.877c-3.005,0.625-5.205-2.183-5.205-2.183l-4.928-5.515
            l3.181,0.438L62.417,24.581z"></path>
                    <path fill="#192866" d="M63.419,24.381l7.627,2.796c0.159,0.066,0.106,0.246,0.094,0.332c-0.012,0.087-1.38,2.164-4.705,2.767
            c-3.325,0.598-5.759-2.099-5.759-2.099l-5.79-5.634l6.488,0.9L63.419,24.381z"></path>
                    <path fill="#5ABD88" d="M51.221,9.932c6.738,0,12.2,5.462,12.2,12.201l0.001,1.866c-2.703-1.072-7.16-1.772-12.201-1.772
            s-9.498,0.7-12.201,1.772v-1.866C39.021,15.394,44.483,9.932,51.221,9.932z"></path>
                    <path fill="#192866" d="M60.089,23.044V22.47c0-6.094-3.009-11.184-7.021-12.399c5.861,0.891,10.352,5.952,10.352,12.062
            l0.001,1.866C62.5,23.632,61.374,23.31,60.089,23.044L60.089,23.044z M51.221,9.932L51.221,9.932
            c-2.272,0.001-4.118,5.559-4.156,12.459c1.319-0.107,2.714-0.165,4.156-0.165c1.442,0,2.836,0.058,4.156,0.165
            C55.339,15.49,53.493,9.932,51.221,9.932L51.221,9.932L51.221,9.932z M42.353,23.044c-1.284,0.266-2.41,0.588-3.332,0.954v-1.866
            c0-6.109,4.49-11.169,10.351-12.062c-4.01,1.217-7.019,6.305-7.019,12.399V23.044z"></path>
                    <path fill="#2A100A" d="M63.419,23.996v0.385c-3.474-1.376-8.462-1.827-12.199-1.827c-3.722,0-9.509,0.688-12.199,1.829v-0.385
            c3.333-1.333,8.672-1.809,12.2-1.809C54.747,22.188,60.236,22.692,63.419,23.996z"></path>
                </g>
                <polygon fill="#FFFFFF" points="130.83,43.25 130.83,56.75 174.161,56.75 169.628,50 173.217,43.25 ">
                </polygon>
                <g>
                    <path fill="#5ABD88" d="M140.226,46.594c0.584,0.488,0.876,1.24,0.876,2.256c0,1.017-0.298,1.761-0.895,2.232
            c-0.596,0.472-1.51,0.708-2.741,0.708h-1.488v2.46h-1.416v-8.388h2.88C138.714,45.862,139.642,46.106,140.226,46.594z
            M139.224,50.056c0.284-0.3,0.426-0.739,0.426-1.319s-0.18-0.99-0.54-1.23s-0.924-0.359-1.692-0.359h-1.439v3.359h1.644
            C138.405,50.506,138.939,50.356,139.224,50.056z"></path>
                    <path fill="#5ABD88" d="M150.065,48.586c0,1.384-0.604,2.256-1.813,2.616l2.196,3.048h-1.8l-2.004-2.82h-1.86v2.82h-1.416v-8.388
            h3.12c1.279,0,2.196,0.216,2.748,0.647C149.789,46.942,150.065,47.634,150.065,48.586z M148.181,49.774
            c0.288-0.248,0.433-0.646,0.433-1.194s-0.148-0.924-0.444-1.128s-0.824-0.306-1.584-0.306h-1.8v3h1.764
            C147.349,50.146,147.894,50.022,148.181,49.774z"></path>
                    <path fill="#5ABD88" d="M159.725,53.092c-0.848,0.828-1.896,1.242-3.144,1.242s-2.296-0.414-3.144-1.242
            c-0.849-0.828-1.272-1.859-1.272-3.096s0.424-2.269,1.272-3.096c0.848-0.828,1.896-1.242,3.144-1.242s2.296,0.414,3.144,1.242
            c0.849,0.827,1.272,1.859,1.272,3.096S160.573,52.264,159.725,53.092z M158.688,47.842c-0.572-0.592-1.274-0.888-2.106-0.888
            s-1.534,0.296-2.106,0.888c-0.571,0.593-0.857,1.311-0.857,2.154s0.286,1.562,0.857,2.154c0.572,0.592,1.274,0.888,2.106,0.888
            s1.534-0.296,2.106-0.888c0.571-0.593,0.857-1.311,0.857-2.154S159.259,48.435,158.688,47.842z"></path>
                </g>
            </svg>
			</a>
		<div class="ml-auto">
			<a class="btn btn-sm pmd-ripple-effect btn-primary" target="_blank" href="javascript:void(0);">View Detail</a>
			<a class="btn pmd-btn-fab pmd-ripple-effect btn-link btn-sm btn-link close-propeller-topbar" href="javascript:void(0);"><i class="material-icons md-light pmd-xs">close</i></a>
		</div>
	</div>

	<div id="page" class="site pmd-site">

		<!----------------------------
			Header
		----------------------------->
		<header class="fixed-top pmd-z-depth-light-1 p-0">
			<!-- Topbar Menu -->
			<section class="bg-primary">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-12 col-lg-5 top-menu-left">
							<ul class="nav justify-content-between justify-content-lg-start">
								<?php if (have_rows("contact_section", "option")) :
									while (have_rows("contact_section", "option")) : the_row();
										?>
										<?php if (have_rows("contact_email", "option")) :
											while (have_rows("contact_email", "option")) : the_row();
												?>
												<li class="nav-item mr-3">
													<i class="material-icons md-light pr-1"><?php the_sub_field("contact_email_icon", "option"); ?></i>
													<a href="mailto:<?php the_sub_field("contact_email_address", "option"); ?>"><?php the_sub_field("contact_email_address", "option"); ?></a>
												</li>
											<?php endwhile;
									endif;
									?>
										<?php if (have_rows("contact_no", "option")) :
											while (have_rows("contact_no", "option")) : the_row();
												?>
												<li class="nav-item">
													<i class="material-icons md-light pr-1"><?php the_sub_field("contact_no_icon", "option"); ?></i>
													<a href="tel:<?php the_sub_field("contact_telephone_no", "option"); ?>"><?php the_sub_field("contact_telephone_no", "option"); ?></a>
												</li>
											<?php endwhile;
									endif;
									?>
									<?php endwhile;
							endif;
							?>
							</ul>
						</div>
						<div class="col-lg-7 top-menu-right">
							<ul class="nav justify-content-end">
								<?php if (have_rows("change_city_dropdown", "option")) :
									while (have_rows("change_city_dropdown", "option")) : the_row();
										if (get_sub_field('hide_section') == false) :
											?>
											<li class="nav-item dropdown pmd-dropdown city-dropdown">
												<i class="material-icons md-light"><?php the_sub_field("material_icon"); ?></i>
												<a  href="javascript:void(0);" class="dropdown-selected" data-toggle="dropdown" aria-expanded="true"><?php the_sub_field("dropdown_label"); ?></a>
												<div class="dropdown-menu dropdown-menu-right">
													<?php if (have_rows("dropdown_option", "option")):
														while (have_rows("dropdown_option", "option")): the_row();
													?>
															<button class="dropdown-item"><?php the_sub_field("add_city"); ?></button>
														<?php endwhile; ?>
													<?php endif; ?>
												</div>
											</li>
										<?php endif;
								endwhile;
							endif;
							?>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- End Topbar Menu -->

			<!-- Main Navigation -->
			<nav id="masthead" class="navbar navbar-expand-lg navbar-light pmd-navbar bg-white">
				<div class="container">

					<!-- Navbar Logo -->
					<a class="navbar-brand" title="Impactery" href="<?php bloginfo('url') ?>">
						<?php if (get_field('theme_logo', 'option')) : ?>
							<?php while (has_sub_field('theme_logo', 'option')) :
								$logo_dark = get_sub_field('logo_dark', 'option');
								?>
								<img class="img-fluid" src="<?php echo $logo_dark['url']; ?>" alt="<?php echo $logo_dark['alt']; ?>" width="280">
							<?php endwhile;
					endif;
					?>
					</a>

					<!-- Responsive Menu Toggler -->
					<button class="navbar-toggler pmd-navbar-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-placement="right" data-position='fixed'>
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Main Theme Menu -->
					<div class="collapse navbar-collapse pmd-navbar-sidebar" id="navbarSupportedContent">
						<div class="navbar-nav ml-auto">
							<?php
								if(is_front_page()) {
									wp_nav_menu(array(
										'theme_location'  => 'primary',
										'depth'	          =>  2,
										'container'       => 'div',
										'container_id'    => 'bs-example-navbar-collapse-1',
										'menu_class'      => 'navbar-nav mr-auto',
										'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
										'walker'          => new WP_Bootstrap_Navwalker(),
									));
								} else   {
									wp_nav_menu(array(
										'theme_location'  => 'innerpage-menu',
										'depth'	          =>  2,
										'container'       => 'div',
										'container_id'    => 'bs-example-navbar-collapse-1',
										'menu_class'      => 'navbar-nav mr-auto',
										'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
										'walker'          => new WP_Bootstrap_Navwalker(),
									));
								}
							?>
							<ul class="navbar-nav main-nav-adv">
								<li class="nav-item">
									<?php if (get_field('header_button', 'option')) :
										while (has_sub_field('header_button', 'option')) :
											$sap_link_img = get_sub_field('icon_image', 'option');
											?>
											<a href="<?php the_sub_field('button_url'); ?>" class="nav-link">
												<img class="img-fluid" src="<?php echo $sap_link_img['url']; ?>" alt="<?php echo $sap_link_img['alt']; ?>" width="180">
											</a>
										<?php endwhile;
								endif;
								?>
								</li>
							</ul>
						</div>
					</div>

					<!-- Mobile Menu Overlay -->
					<div class="pmd-sidebar-overlay"></div>
				</div>
			</nav>
			<!-- End Main Navigation -->
		</header>

		<div id="content" class="site-content page-content">
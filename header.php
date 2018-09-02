<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '-', true, 'right' ); bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen"/>
	<?php wp_head(); ?>
</head>
<body>

<header>
    <div class="header-container">
        <div class="header-func-button">
            <svg width="30" height="30" viewBox="0 0 24 24">
                <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
            </svg>
        </div>
        <a class="header-logo logo" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ) ?></a>
        <nav class="header-nav">
			<?php wp_nav_menu( array( 'menu' => 'header-menu', 'depth' => 1 ) ); ?>
        </nav>

        <div class="header-search">
            <div class="site-search-area">
                <form role="search" method="get" class="searchform"
                      action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="text" value="" name="s">
                    <button type="submit">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="header-mobile-search-button">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="#ffffff">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
            </svg>
        </div>
    </div>
    <div class="header-func-menu">
        <div class="hfm-background"></div>
        <div class="hfm-content">
            <div class="hfm-logo logo"><?php bloginfo( 'name' ) ?></div>
            <ul class="hfm-list">
                <li><a href="<?php echo home_url( '/' ); ?>">首页</a></li>
                <li><a href="javascript:;" class="toc-switch-button">
						<?php if ( $_COOKIE['tocOpened'] == 'true' || ! $_COOKIE['tocOpened'] ) : ?>
                            关闭目录
						<?php else: ?>
                            打开目录
						<?php endif; ?>
                    </a></li>
                <div class="hfm-nav">
		            <?php wp_nav_menu( array( 'menu' => 'header-menu', 'depth' => 1 ) ); ?>
                </div>
            </ul>
        </div>
    </div>
    <div class="header-mobile-search-container">
        <div class="hmsc-background"></div>
        <div class="hmsc-content">
            <form role="search" method="get"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text" value="" name="s">
                <button type="submit">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>

<div class="sidebar-search-icon">
    <button class="search-close"><span class="ti-close"></span></button>
</div>
<div class="sidebar-search-input">
    <form method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>" id="search">
        <div class="form-search">
            <input type="text" name="s" id="search" class="input-text" placeholder="<?php esc_html_e( 'Search Your Desire Product', 'craftcog' ) ?>" value="<?php get_search_query() ?>">
            <button>
                <i class="ti-search"></i>
            </button>
        </div>
    </form>
</div>

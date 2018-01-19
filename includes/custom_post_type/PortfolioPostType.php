<?php
    
namespace includes\custom_post_type;

class PortfolioPostType {
    public function __construct() {
        error_log( 'plugin ' . MFW_PLUGIN_NAME . ' portfolio' );
        add_action( 'init', array( $this, 'portfolio_cpt' ) );
        
        add_action( 'pre_get_posts', array( $this, 'portfolio_pagesize') );
    }
    
    function portfolio_pagesize( $query ) {
        if( $query->is_post_type_archive( 'portfolio' ) ) {
            $query->set( 'posts_per_page', -1 );
        }
    }
    
    function portfolio_cpt() {

        $labels = array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
            'add_new' => 'Add Item',
            'all_items' => 'All Items',
            'add_new_item' => 'Add Item',
            'edit_item' => 'Edit Item',
            'new_item' => 'New Item',
            'view_item' => 'View Item',
            'search_item' => 'Search Portfolio',
            'not_found' => 'No items found',
            'not_found_in_trash' => 'No items found in trash',
            'parent_item_colon' => 'Parent Item'
        );
        $args = array(
            'labels'  => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions',
            ),
            'taxonomies' => array('category', 'post_tag'),
            'menu_position' => 5,
            'exclude_from_search' => false
            
        );
        
        register_post_type( 'portfolio', $args );
//        register_post_type( 'portfolio');
    }
}


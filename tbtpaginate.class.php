<?php

    class TBTestimonialPaginate
    {
        public $per_page;

        /**
        * magic
        *
        * @param mixed $per_page - testimonials to show per page
        * @return TBTestimonialPaginate
        */
        public function __construct( $per_page )
        {
            add_action( 'tbt_template_functions', array( &$this, 'add_vars' ) );
            $this->per_page = intval( $per_page );
        }

        /**
        * add pagination vars to testimonial templates
        *
        * @param mixed $twig
        */
        public function add_vars( $twig )
        {
            $twig->addGlobal( 'paged', call_user_func( 'TBTestimonialPaginate::get_testimonial_page' ) );
            $twig->addGlobal( 'testimonials', call_user_func( 'TBTestimonialPaginate::get_testimonials' ) );
            $twig->addGlobal( 'next_testimonial_link', call_user_func( 'TBTestimonialPaginate::get_next_testimonial_link' ) );
            $twig->addGlobal( 'prev_testimonial_link', call_user_func( 'TBTestimonialPaginate::get_prev_testimonial_link' ) );
        }

        /**
        * get current page testimonials page
        *
        */
        public static function get_testimonial_page(){
            return isset( $_GET['paged_testimonials'] ) ? intval( $_GET['paged_testimonials'] ) : 1;
        }

        /**
        * get testimonials for a specific page
        *
        */
        public static function get_testimonials()
        {
            global $tbtpaginate;
            $q = new wp_query( array(
                'posts_per_page' => $tbtpaginate->per_page,
                'post_type' => 'testimonial',
                'paged' => self::get_testimonial_page(),
                'post_status' => 'publish'
            ) );

            if( $q->have_posts() )
            {
                # we loop through each testimonial (post) adding in a filtered content version to be used in the output - testimonial.post_content_html
                foreach( $q->posts as $k => $p ){
                    $p->post_content_html = apply_filters( 'the_content', $p->post_content );
                    $q->posts[$k] = $p;
                }

                return $q->posts;
            }

            return array();
        }

        /**
        * link for next testimonial in pagination
        *
        */
        public static function get_next_testimonial_link()
        {
            $page = self::get_testimonial_page();
            $total = self::get_total_testimonial_pages();

            if( ++$page > $total )
                return false;

            return add_query_arg( array( 'paged_testimonials' => $page ) );
        }

        /**
        * link for previous testimonial in pagination
        *
        */
        public static function get_prev_testimonial_link()
        {
            $page = self::get_testimonial_page();

            if( --$page <= 0 )
                return false;

            return add_query_arg( array( 'paged_testimonials' => $page ) );
        }

        /**
        * get total page count
        *
        */
        public static function get_total_testimonial_pages()
        {
            global $tbtpaginate;
            $q = new wp_query( array(
                'posts_per_page' => -1,
                'post_type' => 'testimonial',
                'paged' => self::get_testimonial_page(),
                'post_status' => 'publish'
            ) );

            if( $q->have_posts() )
                return ceil( count( $q->posts ) / $tbtpaginate->per_page );

            return 0;
        }
    }

    $tbtpaginate = new TBTestimonialPaginate(5); # 5 testimonials per page. note that variable $tbtpaginate is used in TBTestimonialPaginate::get_testimonials and in TBTestimonialPaginate::get_total_testimonial_pages
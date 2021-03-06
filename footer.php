<footer class="footer"><div class="title"><?php _e( 'Suivez nous sur', 'dd8' ); ?></div>
<?php
foreach ( array( 'twitter' => 'Twitter', 'facebook' => 'Facebook', 'instagram' => 'Instagram' ) as $r => $reseau ) {
    if ( $option = get_option( $r ) ) {
        switch( $r ) {
            case 'facebook':
                $image = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><title>  Facebook</title><g fill="none"><g fill="#4829A1"><path d="M25.6 48L2.6 48C1.2 48 0 46.8 0 45.4L0 2.6C0 1.2 1.2 0 2.6 0L45.4 0C46.8 0 48 1.2 48 2.6L48 45.4C48 46.8 46.8 48 45.4 48L33.1 48 33.1 29.4 39.4 29.4 40.3 22.2 33.1 22.2 33.1 17.5C33.1 15.4 33.7 14 36.7 14L40.5 14 40.5 7.5C39.9 7.4 37.6 7.2 35 7.2 29.4 7.2 25.6 10.6 25.6 16.8L25.6 22.2 19.4 22.2 19.4 29.4 25.6 29.4 25.6 48 25.6 48Z"/></g></g></svg>';
                break;
            case 'twitter':
                $image = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="40" viewBox="0 0 48 40"><title>  twitter</title><g fill="none"><g fill="#4829A1"><path d="M48 4.7C46.2 5.5 44.3 6.1 42.3 6.3 44.4 5.1 45.9 3.1 46.7 0.7 44.8 1.9 42.7 2.7 40.4 3.2 38.6 1.2 36.1 0 33.2 0 27.8 0 23.4 4.5 23.4 10.1 23.4 10.9 23.5 11.7 23.6 12.4 15.5 12 8.2 8 3.3 1.8 2.5 3.3 2 5.1 2 6.9 2 10.4 3.7 13.5 6.4 15.3 4.8 15.3 3.3 14.8 1.9 14.1L1.9 14.2C1.9 19.1 5.3 23.2 9.8 24.1 9 24.3 8.1 24.5 7.2 24.5 6.6 24.5 6 24.4 5.4 24.3 6.6 28.3 10.3 31.2 14.6 31.3 11.2 34 7 35.6 2.3 35.6 1.6 35.6 0.8 35.6 0 35.5 4.4 38.3 9.5 40 15.1 40 33.2 40 43.1 24.6 43.1 11.3 43.1 10.8 43.1 10.4 43.1 10 45 8.5 46.7 6.8 48 4.7"/></g></g></svg>';
                break;
            case 'instagram':
                $image = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><title>  instagram</title><g fill="none"><g fill="#4829A1"><path d="M24 0C17.5 0 16.7 0 14.1 0.1 11.6 0.3 9.8 0.7 8.3 1.3 6.7 1.9 5.4 2.7 4 4 2.7 5.4 1.9 6.7 1.3 8.3 0.7 9.8 0.3 11.6 0.1 14.1 0 16.7 0 17.5 0 24 0 30.5 0 31.3 0.1 33.9 0.3 36.4 0.7 38.2 1.3 39.7 1.9 41.3 2.7 42.6 4 44 5.4 45.3 6.7 46.1 8.3 46.7 9.8 47.3 11.6 47.7 14.1 47.9 16.7 48 17.5 48 24 48 30.5 48 31.3 48 33.9 47.9 36.4 47.7 38.2 47.3 39.7 46.7 41.3 46.1 42.6 45.3 44 44 45.3 42.6 46.1 41.3 46.7 39.7 47.3 38.2 47.7 36.4 47.9 33.9 48 31.3 48 30.5 48 24 48 17.5 48 16.7 47.9 14.1 47.7 11.6 47.3 9.8 46.7 8.3 46.1 6.7 45.3 5.4 44 4 42.6 2.7 41.3 1.9 39.7 1.3 38.2 0.7 36.4 0.3 33.9 0.1 31.3 0 30.5 0 24 0ZM24 4.3C30.4 4.3 31.2 4.3 33.7 4.5 36 4.6 37.3 5 38.2 5.3 39.3 5.7 40.1 6.2 40.9 7.1 41.8 7.9 42.3 8.7 42.7 9.8 43 10.7 43.4 12 43.5 14.3 43.7 16.8 43.7 17.6 43.7 24 43.7 30.4 43.7 31.2 43.5 33.7 43.4 36 43 37.3 42.7 38.2 42.3 39.3 41.8 40.1 40.9 40.9 40.1 41.8 39.3 42.3 38.2 42.7 37.3 43 36 43.4 33.7 43.5 31.2 43.7 30.4 43.7 24 43.7 17.6 43.7 16.8 43.7 14.3 43.5 12 43.4 10.7 43 9.8 42.7 8.7 42.3 7.9 41.8 7.1 40.9 6.2 40.1 5.7 39.3 5.3 38.2 5 37.3 4.6 36 4.5 33.7 4.3 31.2 4.3 30.4 4.3 24 4.3 17.6 4.3 16.8 4.5 14.3 4.6 12 5 10.7 5.3 9.8 5.7 8.7 6.2 7.9 7.1 7.1 7.9 6.2 8.7 5.7 9.8 5.3 10.7 5 12 4.6 14.3 4.5 16.8 4.3 17.6 4.3 24 4.3ZM24 11.7C17.2 11.7 11.7 17.2 11.7 24 11.7 30.8 17.2 36.3 24 36.3 30.8 36.3 36.3 30.8 36.3 24 36.3 17.2 30.8 11.7 24 11.7ZM24 32C19.6 32 16 28.4 16 24 16 19.6 19.6 16 24 16 28.4 16 32 19.6 32 24 32 28.4 28.4 32 24 32ZM39.7 11.2C39.7 12.8 38.4 14.1 36.8 14.1 35.2 14.1 33.9 12.8 33.9 11.2 33.9 9.6 35.2 8.3 36.8 8.3 38.4 8.3 39.7 9.6 39.7 11.2Z"/></g></g></svg>';
                break;
        }
        printf( '<a href="%s" class="%s social-link"><span>%s</span>%s</a>', esc_attr( $option ), $r, $reseau, $image );
    }
}
?>
<div><small>Copyright © <?php echo date('Y'); ?> - WP TECH | LYON 2018</small></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
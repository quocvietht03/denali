<?php
/**
 * Import pack theme requirements
 *
 * @package Import Pack
 * @author BePlus
 */

function let_to_num( $size ) {
	$l   = substr( $size, -1 );
	$ret = (int) substr( $size, 0, -1 );
	switch ( strtoupper( $l ) ) {
		case 'P':
			$ret *= 1024;
			// No break.
		case 'T':
			$ret *= 1024;
			// No break.
		case 'G':
			$ret *= 1024;
			// No break.
		case 'M':
			$ret *= 1024;
			// No break.
		case 'K':
			$ret *= 1024;
			// No break.
	}
	return $ret;
}

$environment = array(
  'home_url'                  => get_option( 'siteurl' ),
  'wp_memory_limit'           => let_to_num( @ini_get( 'memory_limit' ) ),
  'php_version'               => phpversion(),
  'php_post_max_size'         => let_to_num( ini_get( 'post_max_size' ) ),
  'php_max_execution_time'    => (int) ini_get( 'max_execution_time' ),
  'php_max_input_vars'        => (int) ini_get( 'max_input_vars' ),
  'max_upload_size'           => wp_max_upload_size(),
  'gzip_enabled'              => is_callable( 'gzopen' ),
  );

?>

<?php do_action( 'denali/import_pack/theme_requirements/before' ); ?>

<div class="ip-theme_requirements">
  <div class="info-item">
    <div class="title">
      <h3 data-export-label="WordPress address (URL)"><?php esc_html_e( 'WordPress address (URL)', 'denali' ); ?>:</h3>
      <div class="help"><?php echo esc_html__( 'The root URL of your site.', 'denali' ); ?></div>
    </div>
    <div class="value">
      <?php echo esc_html( $environment['home_url'] ); ?>
    </div>
  </div>

  <div class="info-item">
    <div class="title">
      <h3 data-export-label="PHP Version"><?php esc_html_e( 'PHP version', 'denali' ); ?></h3>
      <div class="help"><?php echo esc_html__( 'Information about the web server that is currently hosting your site.', 'denali' ); ?></div>
    </div>
    <div class="value">
      <?php
        if ( version_compare( $environment['php_version'], '7.4', '>=' ) ) {
          echo '<mark class="yes">' . esc_html( $environment['php_version'] ) . '</mark>';
        } else {
          echo '<mark class="error">' . esc_html( $environment['php_version'] ) . '</mark>';
        }
      ?>
    </div>
  </div>

  <div class="info-item">
    <div class="title">
      <h3 data-export-label="WP Memory Limit"><?php esc_html_e( 'WordPress memory limit', 'denali' ); ?>:</h3>
  		<div class="help"><?php echo esc_html__( 'The maximum amount of memory (RAM) that your site can use at one time.', 'denali' ); ?></div>
    </div>
		<div class="value">
			<?php
			if ( $environment['wp_memory_limit'] < 536870912 ) { //512M
				echo '<mark class="error">' . sprintf( esc_html__( '%1$s - We recommend setting memory to at least 512MB. See: %2$s', 'denali' ), esc_html( size_format( $environment['wp_memory_limit'] ) ), '<a href="https://wordpress.org/support/article/editing-wp-config-php/#increasing-memory-allocated-to-php" target="_blank">' . esc_html__( 'Increasing memory allocated to PHP', 'denali' ) . '</a>' ) . '</mark>';
			} else {
				echo '<mark class="yes">' . esc_html( size_format( $environment['wp_memory_limit'] ) ) . '</mark>';
			}
			?>
		</div>
	</div>

  <?php if ( function_exists( 'ini_get' ) ) : ?>
    <div class="info-item">
      <div class="title">
        <h3 data-export-label="PHP Post Max Size"><?php esc_html_e( 'PHP post max size', 'denali' ); ?>:</h3>
        <div class="help"><?php echo esc_html__( 'The largest filesize that can be contained in one post.', 'denali' ); ?></div>
      </div>
      <div class="value">
				<?php
					if ( $environment['php_post_max_size'] < 268435456 ) { //256M
						echo '<mark class="error">' . sprintf( esc_html__( '%1$s - We recommend setting post max size to at least 256MB.', 'denali' ), esc_html( size_format( $environment['php_post_max_size'] ) ) ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( size_format( $environment['php_post_max_size'] ) ) . '</mark>';
					}
				?>
      </div>
    </div>

    <div class="info-item">
      <div class="title">
        <h3 data-export-label="PHP Time Limit"><?php esc_html_e( 'PHP time limit', 'denali' ); ?>:</h3>
        <div class="help"><?php echo esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'denali' ); ?></div>
      </div>
      <div class="value">
        <?php
					if ( $environment['php_max_execution_time'] < 300 ) { //300
						echo '<mark class="error">' . sprintf( esc_html__( '%1$s - We recommend setting time limit to at least 300.', 'denali' ), esc_html( $environment['php_max_execution_time'] ) ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( $environment['php_max_execution_time'] ) . '</mark>';
					}
				?>
      </div>
    </div>

    <div class="info-item">
      <div class="title">
        <h3 data-export-label="PHP Max Input Vars"><?php esc_html_e( 'PHP max input vars', 'denali' ); ?>:</h3>
        <div class="help"><?php echo esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'denali' ); ?></div>
      </div>
      <div class="value">
        <?php
					if ( $environment['php_max_input_vars'] < 3000 ) { //3000
						echo '<mark class="error">' . sprintf( esc_html__( '%1$s - We recommend setting input vars to at least 300.', 'denali' ), esc_html( $environment['php_max_input_vars'] ) ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( $environment['php_max_input_vars'] ) . '</mark>';
					}
				?>
      </div>
    </div>
  <?php endif; ?>

  <div class="info-item">
    <div class="title">
      <h3 data-export-label="Max Upload Size"><?php esc_html_e( 'Max upload size', 'denali' ); ?>:</h3>
      <div class="help"><?php echo esc_html__( 'The largest filesize that can be uploaded to your WordPress installation.', 'denali' ); ?></div>
    </div>
    <div class="value">
      <?php
				if ( $environment['max_upload_size'] < 268435456 ) { //256M
					echo '<mark class="error">' . sprintf( esc_html__( '%1$s - We recommend setting upload size to at least 256MB.', 'denali' ), esc_html( size_format( $environment['max_upload_size'] ) ) ) . '</mark>';
				} else {
					echo '<mark class="yes">' . esc_html( size_format( $environment['max_upload_size'] ) ) . '</mark>';
				}
			?>
    </div>
  </div>

  <div class="info-item">
    <div class="title">
      <h3 data-export-label="GZip"><?php esc_html_e( 'GZip', 'denali' ); ?>:</h3>
      <div class="help"><?php echo esc_html__( 'GZip (gzopen) is used to open the GEOIP database from MaxMind.', 'denali' ); ?></div>
    </div>
    <div class="value">
      <?php
	      if ( $environment['gzip_enabled'] ) {
	        echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
	      } else {
	        echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( 'Your server does not support the %s function - this is required to use the GeoIP database from MaxMind.', 'denali' ), '<a href="https://php.net/manual/en/zlib.installation.php">gzopen</a>' ) . '</mark>';
	      }
      ?>
    </div>
  </div>

</div> <!-- .ip-theme-requirements -->

<?php do_action( 'denali/import_pack/theme_requirements/after' ); ?>

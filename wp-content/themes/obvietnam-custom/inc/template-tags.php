<?php
/**
 * Custom template tags for this theme
 *
 * @package OB_Vietnam_Custom
 */

if ( ! function_exists( 'obvietnam_custom_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function obvietnam_custom_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'obvietnam-custom' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'obvietnam_custom_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function obvietnam_custom_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'obvietnam-custom' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'obvietnam_custom_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function obvietnam_custom_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'obvietnam-custom' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'obvietnam-custom' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'obvietnam-custom' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'obvietnam-custom' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'obvietnam-custom' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'obvietnam-custom' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'obvietnam_custom_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function obvietnam_custom_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

/**
 * Custom menu walker for dropdown menus
 */
class OB_Vietnam_Menu_Walker extends Walker_Nav_Menu {
    /**
     * Starts the element output.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Check if the item has children
        $has_children = in_array( 'menu-item-has-children', $classes );

        // Add custom classes based on depth and children
        if ( $depth === 0 ) {
            $classes[] = 'main-nav-item';
        } else {
            $classes[] = 'sub-menu-item';
        }

        if ( $has_children && $depth === 0 ) {
            $classes[] = 'relative group';
        }

        /**
         * Filters the arguments for a single nav menu item.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        /**
         * Filters the CSS classes applied to a menu item's list item element.
         */
        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
         * Filters the ID applied to a menu item's list item element.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts           = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        if ( '_blank' === $item->target && empty( $item->xfn ) ) {
            $atts['rel'] = 'noopener';
        } else {
            $atts['rel'] = $item->xfn;
        }
        $atts['href']         = ! empty( $item->url ) ? $item->url : '';
        $atts['aria-current'] = $item->current ? 'page' : '';

        // Add custom attributes for dropdown toggles
        if ( $has_children && $depth === 0 ) {
            $atts['class'] = 'main-nav-item cursor-pointer flex items-center';
        } elseif ( $depth > 0 ) {
            $atts['class'] = 'block px-4 py-2 hover:bg-gray-100';
        }

        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        /**
         * Filters a menu item's title.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output  = $args->before;
        
        // For dropdown parent items at top level
        if ( $has_children && $depth === 0 ) {
            $item_output .= '<span' . $attributes . '>';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= ' <i class="fas fa-chevron-down text-xs ml-1"></i>';
            $item_output .= '</span>';
            
            // Add dropdown container
            $item_output .= '<div class="absolute left-0 top-full mt-2 w-48 bg-white shadow-lg rounded-md py-2 z-50 hidden group-hover:block">';
        } else {
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
        }
        
        $item_output .= $args->after;

        /**
         * Filters a menu item's starting output.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
     * Ends the element output, if needed.
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        
        // Check if item has children and is at top level
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes );
        
        if ( $has_children && $depth === 0 ) {
            $output .= "</div>"; // Close dropdown container
        }
        
        $output .= "</li>{$n}";
    }
}

/**
 * Fallback for footer services menu
 */
function obvietnam_custom_footer_services_fallback() {
    echo '<ul class="space-y-2">';
    echo '<li><a href="#" class="footer-link flex items-center"><i class="fas fa-truck mr-2"></i> Vận chuyển hàng hoá</a></li>';
    echo '<li><a href="#" class="footer-link flex items-center"><i class="fas fa-warehouse mr-2"></i> Dịch vụ kho bãi</a></li>';
    echo '<li><a href="#" class="footer-link flex items-center"><i class="fas fa-globe mr-2"></i> Dịch vụ xuất nhập khẩu</a></li>';
    echo '<li><a href="#" class="footer-link flex items-center"><i class="fas fa-chart-line mr-2"></i> Tư vấn chuỗi cung ứng</a></li>';
    echo '<li><a href="#" class="footer-link flex items-center"><i class="fas fa-box mr-2"></i> Phân phối hàng hoá</a></li>';
    echo '</ul>';
}

/**
 * Fallback for footer links menu
 */
function obvietnam_custom_footer_links_fallback() {
    echo '<ul class="space-y-2">';
    echo '<li><a href="#" class="footer-link">Giới thiệu</a></li>';
    echo '<li><a href="#" class="footer-link">Tin tức & Sự kiện</a></li>';
    echo '<li><a href="#" class="footer-link">Cơ hội nghề nghiệp</a></li>';
    echo '<li><a href="#" class="footer-link">Khách hàng tiêu biểu</a></li>';
    echo '<li><a href="#" class="footer-link">Đối tác chiến lược</a></li>';
    echo '<li><a href="#" class="footer-link">Chính sách bảo mật</a></li>';
    echo '<li><a href="#" class="footer-link">Điều khoản sử dụng</a></li>';
    echo '</ul>';
}

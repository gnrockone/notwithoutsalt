<?php
/*
    ==================================================
    | Creating Custom Breadcrumbs Function
    ==================================================
 */

// Retain this for template/guide - This function can be use but has errors
// function custom_breadcrumbs()
// {
//     $separator = '&gt;';
//     $breadcrums_id = 'breadcrumbs';
//     $breadcrums_class = 'breadcrumbs';
//     $home_title = 'Homepage';
//     $class = '';
//     $custom_taxonomy = 'product_cat';

//     global $post, $wp_query;
//     if (!is_front_page()) {
//         echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
//         if (is_archive() && !is_tax() && !is_category()) {
//             echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title(null,
//                     true) . '</strong></li>';
//         } else {
//             if (is_archive() && is_tax() && !is_category()) {
//                 $post_type = get_post_type();
//                 if ($post_type != 'post') {
//                     $post_type_object = get_post_type_object($post_type);
//                     $post_type_archive = get_post_type_archive_link($post_type);
//                     echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
//                     echo '<li class="separator"> ' . $separator . ' </li>';
//                 }
//                 $custom_tax_name = get_queried_object()->name;
//                 echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
//             } else {
//                 if (is_single()) {
//                     $post_type = get_post_type();
//                     if ($post_type === 'person') {
//                         echo '<li><a href="' . get_the_permalink(get_page_by_title('Sealy People')->ID) . '">Sealy People</a></li>';
//                         echo '<li class="separator"> ' . $separator . ' </li>';
//                         echo '<li><a href="' . get_the_permalink(get_page_by_title('Sealy Family')->ID) . '">Sealy Family</a></li>';
//                         echo '</ul>';
//                         return;
//                     }
//                     if ($post_type === 'news') {
//                         echo '<li><a href="' . get_home_url() . '">Latest News</a></li>';
//                         echo '<li class="separator"> ' . $separator . ' </li>';
//                         echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
//                         echo '</ul>';
//                         return;
//                     }
//                     if ($post_type != 'post') {
//                         $post_type_object = get_post_type_object($post_type);
//                         $post_type_archive = get_post_type_archive_link($post_type);
//                         echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
//                         echo '<li class="separator"> ' . $separator . ' </li>';
//                     }
//                     $category = get_the_category();
//                     $category_reference = array_values($category);
//                     $last_category = end($category_reference);
//                     $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
//                     $cat_parents = explode(',', $get_cat_parents);
//                     $cat_display = '';
//                     foreach ($cat_parents as $parents) {
//                         $cat_display .= '<li class="item-cat">' . $parents . '</li>';
//                         $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
//                     }
//                     $taxonomy_exists = taxonomy_exists($custom_taxonomy);
//                     if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
//                         $taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
//                         $cat_id = $taxonomy_terms[0]->term_id;
//                         $cat_nicename = $taxonomy_terms[0]->slug;
//                         $cat_link = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
//                         $cat_name = $taxonomy_terms[0]->name;
//                     }
//                     if (!empty($last_category)) {
//                         echo $cat_display;
//                         echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
//                     } else {
//                         if (!empty($cat_id)) {
//                             echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
//                             echo '<li class="separator"> ' . $separator . ' </li>';
//                             echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
//                         } else {
//                             echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
//                         }
//                     }
//                 } else {
//                     if (is_category()) {
//                         $category = get_the_category();
//                         $category_reference = '';
//                         $category_reference = array_values($category);
//                         $last_category = end($category_reference);
//                         $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
//                         $cat_parents = explode(',', $get_cat_parents);
//                         $cat_display = '';
//                         $count = count($cat_parents);
//                         $i = 0;
//                         foreach ($cat_parents as $parents) {
//                             $i++;
//                             if ($i < $count) {
//                                 $cat_display .= '<li class="item-current item-cat">' . $parents . '</li>';
//                             } else {
//                                 $cat_display .= '<li class="item-cat">' . $parents . '</li>';
//                             }
//                             if ($i < $count) {
//                                 $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
//                             }
//                         }
//                         echo $cat_display;
//                     } else {
//                         if (is_page()) {
//                             if ($post->post_parent) {
//                                 $anc = get_post_ancestors($post->ID);
//                                 $anc = array_reverse($anc);
//                                 foreach ($anc as $ancestor) {
//                                     $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
//                                     $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
//                                 }
//                                 echo $parents;
//                                 echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
//                             } else {
//                                 echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
//                             }
//                         } else {
//                             if (is_tag()) {
//                                 $term_id = get_query_var('tag_id');
//                                 $taxonomy = 'post_tag';
//                                 $args = 'include=' . $term_id;
//                                 $terms = get_terms($taxonomy, $args);
//                                 echo '<li class="item-current item-tag-' . $terms->term_id . ' item-tag-' . $terms[0]->slug . '"><strong class="bread-current bread-tag-' . $terms->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</strong></li>';
//                             } elseif (is_day()) {
//                                 echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
//                                 echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
//                                 echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'),
//                                         get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
//                                 echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
//                                 echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
//                             } else {
//                                 if (is_month()) {
//                                     echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
//                                     echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
//                                     echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
//                                 } else {
//                                     if (is_year()) {
//                                         echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
//                                     } else {
//                                         if (is_author()) {
//                                             global $author;
//                                             $userdata = get_userdata($author);
//                                             echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
//                                         } else {
//                                             if (get_query_var('paged')) {
//                                                 echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">' . __('Page') . ' ' . get_query_var('paged') . '</strong></li>';
//                                             } else {
//                                                 if (is_search()) {
//                                                     echo '<li class="item-current item-current-' . get_search_query() . '">Search results for: ' . get_search_query() . '</li>';
//                                                 } elseif (is_404()) {
//                                                     echo '<li>' . 'Error 404' . '</li>';
//                                                 }
//                                             }
//                                         }
//                                     }
//                                 }
//                             }
//                         }
//                     }
//                 }
//             }
//         }
//         echo '</ul>';
//     }
// }
// 







/**
 * Display template for breadcrumbs.
 * Got from bootstrapwp wordpress theme
 */
// function bootstrapwp_breadcrumbs()
// {
//     $home      = __('Home', 'bootstrapwp'); // text for the 'Home' link
//     $before    = '<li class="active">'; // tag before the current crumb
//     $sep       = '';
//     $after     = '</li>'; // tag after the current crumb

//     if (!is_home() && !is_front_page() || is_paged()) {

//         echo '<ul class="breadcrumb">';

//         global $post;
//         $homeLink = home_url();
//             echo '<li><a href="' . $homeLink . '">' . $home . '</a> '.$sep. '</li> ';
//             if (is_category()) {
//                 global $wp_query;
//                 $cat_obj   = $wp_query->get_queried_object();
//                 $thisCat   = $cat_obj->term_id;
//                 $thisCat   = get_category($thisCat);
//                 $parentCat = get_category($thisCat->parent);
//                 if ($thisCat->parent != 0) {
//                     echo get_category_parents($parentCat, true, $sep);
//                 }
//                 echo $before . __('Archive by category', 'bootstrapwp') . ' "' . single_cat_title('', false) . '"' . $after;
//             } elseif (is_day()) {
//                 echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
//                     'Y'
//                 ) . '</a></li> ';
//                 echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
//                     'F'
//                 ) . '</a></li> ';
//                 echo $before . get_the_time('d') . $after;
//             } elseif (is_month()) {
//                 echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
//                     'Y'
//                 ) . '</a></li> ';
//                 echo $before . get_the_time('F') . $after;
//             } elseif (is_year()) {
//                 echo $before . get_the_time('Y') . $after;
//             } elseif (is_single() && !is_attachment()) {
//                 if (get_post_type() != 'post') {
//                     $post_type = get_post_type_object(get_post_type());
//                     $slug      = $post_type->rewrite;
//                     echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ';
//                     echo $before . get_the_title() . $after;
//                 } else {
//                     $cat = get_the_category();
//                     $cat = $cat[0];
//                     echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
//                     echo $before . get_the_title() . $after;
//                 }
//             } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
//                 $post_type = get_post_type_object(get_post_type());
//                 echo $before . $post_type->labels->singular_name . $after;
//             } elseif (is_attachment()) {
//                 $parent = get_post($post->post_parent);
//                 $cat    = get_the_category($parent->ID);
//                 $cat    = $cat[0];
//                 echo get_category_parents($cat, true, $sep);
//                 echo '<li><a href="' . get_permalink(
//                     $parent
//                 ) . '">' . $parent->post_title . '</a></li> ';
//                 echo $before . get_the_title() . $after;

//             } elseif (is_page() && !$post->post_parent) {
//                 echo $before . get_the_title() . $after;
//             } elseif (is_page() && $post->post_parent) {
//                 $parent_id   = $post->post_parent;
//                 $breadcrumbs = array();
//                 while ($parent_id) {
//                     $page          = get_page($parent_id);
//                     $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
//                         $page->ID
//                     ) . '</a>' . $sep . '</li>';
//                     $parent_id     = $page->post_parent;
//                 }
//                 $breadcrumbs = array_reverse($breadcrumbs);
//                 foreach ($breadcrumbs as $crumb) {
//                     echo $crumb;
//                 }
//                 echo $before . get_the_title() . $after;
//             } elseif (is_search()) {
//                 echo $before . __('Search results for', 'bootstrapwp') . ' "'. get_search_query() . '"' . $after;
//             } elseif (is_tag()) {
//                 echo $before . __('Posts tagged', 'bootstrapwp') . ' "' . single_tag_title('', false) . '"' . $after;
//             } elseif (is_author()) {
//                 global $author;
//                 $userdata = get_userdata($author);
//                 echo $before . __('Articles posted by', 'bootstrapwp') . ' ' . $userdata->display_name . $after;
//             } elseif (is_404()) {
//                 echo $before . __('Error 404', 'bootstrapwp') . $after;
//             }
//             // if (get_query_var('paged')) {
//             //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
//             //     ) {
//             //         echo ' (';
//             //     }
//             //     echo __('Page', 'bootstrapwp') . $sep . get_query_var('paged');
//             //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
//             //     ) {
//             //         echo ')';
//             //     }
//             // }

//         echo '</ul>';

//     }
// }
?>
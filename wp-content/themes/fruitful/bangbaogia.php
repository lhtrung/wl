<?php /* Template Name: BangBaoGia */ ?>
<?php

get_header(); ?>
<!--Search KeyWordbangbaogia-->
<div id="filterbangbaogiaid">
Nhập model/sản phẩm: <input type="text" name="keywordbangbaogia" id="keywordbangbaogia" onkeyup="fetch()"></input>

<!--Danh muc dropdown-->
<?php
$orderby = 'name';
$order = 'asc';
$hide_empty = true ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);
 
$product_categories = get_terms( 'product_cat', $cat_args );
?>
<select name="danhmucbangbaogia" id="danhmucbangbaogia" onchange="fetch()">
  <option value="Alls"> Tất Cả </option>
<?php
if( !empty($product_categories) ){
    foreach ($product_categories as $key => $category) {
        echo '<option value=\"' . $category->slug .'\">'.$category->name . '</option>';
    }
}
?>
</select> 
</div>

<!--default data load-->
<?php 
    static $i = 1;
    if ($i == 1) {
        $i++;
        echo '<div id ="defaultdatabangbaogia">';
        echo '<table id="bangbaogiaid">';
            
            echo '
            <tr> 
            <th>Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Giá</th>
            </tr>
            ';
        if( !empty($product_categories) ) {
            foreach($product_categories as $key => $category) {

                $args = array('post_type'   => 'product',
                'post_status' => 'publish',
                'orderby'   => 'title',
                'order' => ASC,
                'tax_query'   => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category->name,
                    )
                ),
                'posts_per_page' => -1);
                $wc_query = new WP_Query($args);
            
            
                    while ($wc_query->have_posts()) : // (4)
                                    $wc_query->the_post(); // (4.1)
                        echo '
                        <tr>
                            <td><a href="';  the_permalink(); echo '">'; the_title();  echo'</a></td>';
                            echo '<td>';
                            global $post, $product; $cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) ); 
                            echo str_replace("Danh mục:", "", $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ))
                            .'</td>';
            
                            echo '</td>
                            <td>'; 
                                echo number_format((double)get_post_meta(get_the_ID(), '_regular_price', true ));
                            echo '</td>
                        </tr>
                        ';
                        
                    endwhile;
            }
        }
        echo '</table>'
            . '</div>';
        wp_reset_postdata();
    }
?>


<div id="datafetch"></div>


<!--Danh Muc Bang Bao Gia-->
	
      
    <!DOCTYPE html>
<html>
<head>
<style>
#bangbaogiaid {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#keywordbangbaogia {
    line-height:1;
}

#defaultdatabangbaogia, #datafetch {
    padding-top: 4px;
}

#bangbaogiaid td, #bangbaogiaid th {
    border: 1px solid #ddd;
    padding: 8px;
}

#bangbaogiaid tr:nth-child(even){background-color: #f2f2f2;}

#bangbaogiaid tr:hover {background-color: #ddd;}

#bangbaogiaid th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>

</body>
</html>


	
<?php get_footer(); ?>
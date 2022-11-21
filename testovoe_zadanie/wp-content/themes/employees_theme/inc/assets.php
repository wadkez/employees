<?php 
    add_shortcode( 'employees', 'employees_func' );

    //$atts -  содержит все аттрибуты шорткода в виде массива или пустую строку если параметров нет
    //$content - контент шорткода
    //$tag - имя шорткода
    function employees_func( $atts, $content = null, $tag = '' ){
        //echo "salary_min = ". $atts['salary_min'] . " salary_max=". $atts['salary_max'] ;
        if ( have_posts() ) {
            ?>
                   <p>Минимальное число выборки SALARY: <?php echo $atts['salary_min'] ?></p>
                    <p>Максимальное число выборки SALARY: <?php echo $atts['salary_max']  ?></p> 
                    
                    

                        <?php 

                        if(!empty($atts['sort'])){

                            echo '<p>СОРТИРОВКА: ' .$atts['sort'] .'</p>'; 
                            
                            
                            //ВЫВЕСТИ ВСЕ ПОСТЫ С УКАЗАННОЙ СОРТИРОВКОЙ
                            $meta_query = array(
            
                                'post_type' => 'employees',			
                                'meta_key' => 'Salary',				        //вывод по полю SALARY
                                'orderby'  => 'meta_value_num',		        //Получить значения
                                'order'    => $atts['sort'],				//Сортировка параметр указан в шорткоде
                                'posts_per_page'=>'-1',
                
                                //WHERE Salary BETWEEN (array_value) (meta_query = 'WHERE')
                                'meta_query' => array(
                                    'key'     => 'Salary',
                                    'value'   => array( $atts['salary_min'], $atts['salary_max'] ),	
                                    'compare' => 'BETWEEN',
                                    'type'    => 'NUMERIC',
                                ),
                
                            );
                
                
                            $query = new WP_Query($meta_query);
                            ?>
                    


 

                         

                    <div class="row">
                        
                            <div class="row">
                                <div class="col-md-6">NAME</div>
                                <div class="col-md-6">SALARY</div>
                            </div>
                            <?php
        
                            global $post;
                            
                            while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="col-md-6">
                                    <a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, 'Name', true) ?></a>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, 'Salary', true) ?></a>
                                </div>
                            <?php endwhile; ?>   
                        
                    </div>             
                            <?php
                            

                        } else  {
                            //СОРТИРОВКА ПО ДАТЕ ДОБАВЛЕНИЯ
                            echo '<p>СОРТИРОВКА В ШОРТКОДЕ НЕ УКАЗАНА - ВЫВОД ПО ДАТЕ</p>';
                            $meta_query = array(
                                'post_type'         => 'employees',
                                'orderby'           => 'date',
                                'order'             => 'DESC'
                            );

                            $query = new WP_Query($meta_query);
                        
                            ?>
                
                            <ul>
                            <?php
                                global $post;

                            ?>

                            <?php
                                while ($query->have_posts()) : $query->the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>">
                                    
                                    <?php echo 'NAME: '  .get_post_meta($post->ID, 'Name', true) . '=========>' . 'SALARY = ' .
                                    get_post_meta($post->ID, 'Salary', true).  '=========>' ?><?php echo get_the_modified_time('F jS, Y'); ?> - <?php the_time() ?></a></li>

                                <?php endwhile; ?>
                          


                            <?php
                                wp_reset_query(); 
                                
                            
                        
                }
            
            }

    }

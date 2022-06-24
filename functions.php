<?php
function scripts_do_template() {
    // Bootstrap core JavaScript
    wp_register_script('bootstrap-js', get_template_directory_uri().'/lib/js/bootstrap.min.js', array('jquery.js'));
   
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'scripts_do_template');

//register custom nav walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

//register nav_menus
register_nav_menus(array(
    'principal' => __('Menu Principal', 'meu-tema')));

//criar tipo de post para banner
function create_post_type(){
    register_post_type('banners', 
    array( 
        'labels' => array(
            'name'=> ('Banners'),
            'singular_name' => __('Banners')
        ),
        'supports' => array(
            'title','editor','thumbnail'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'rewrite' => array('slug' => 'banners'),
    ));
}
//iniciar tipo de post
add_action('init','create_post_type');

// Chamar a tag Title e adicionar os formatos de posts
function meutema_theme_support() {

    // Adicionar links de feed RSS de posts e comentários padrão ao cabeçalho.
    add_theme_support( 'automatic-feed-links' );

    // Chamar a tag Title
    add_theme_support('title-tag');

    // Adicionar os formatos de posts
    add_theme_support('post-formats', array('aside', 'image'));
    add_theme_support( 'post-thumbnails' );

    // Adicionar o logotipo
    add_theme_support( 'custom-logo' );
}
add_action('after_setup_theme', 'meutema_theme_support');

// Criar a barra lateral e widgets footer

function meu_tema_widgets_init() {
register_sidebar(array(
    'name' => esc_html__( 'Barra lateral', 'meu-tema' ),
    'id' => 'sidebar',
    'description'   => esc_html__( 'Adicionar widgets aqui.', 'meu-tema' ),
    'before_widget' => '<div class="card mb-4">',
    'after_widget' => '</div></div>',
    'before_title' => '<h5 class="card-header">',
    'after_title' => '</h5><div class="card-body">',
));
register_sidebar( array(
    'name'          => esc_html__( 'Rodapé 1', 'meu-tema' ),
    'id'            => 'footer-1',
    'description'   => esc_html__( 'Adicionar widgets aqui.', 'meu-tema' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) );
register_sidebar( array(
    'name'          => esc_html__( 'Rodapé 2', 'meu-tema' ),
    'id'            => 'footer-2',
    'description'   => esc_html__( 'Adicionar widgets aqui.', 'meu-tema' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) );
register_sidebar( array(
    'name'          => esc_html__( 'Rodapé 3', 'meu-tema' ),
    'id'            => 'footer-3',
    'description'   => esc_html__( 'Adicionar widgets aqui.', 'meu-tema' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) );
register_sidebar( array(
    'name'          => esc_html__( 'Rodapé 4', 'meu-tema' ),
    'id'            => 'footer-4',
    'description'   => esc_html__( 'Adicionar widgets aqui.', 'meu-tema' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) );

}
add_action( 'widgets_init', 'meu_tema_widgets_init' );

// Definir o tamanho o resumo
add_filter( 'excerpt_length', function($length) {
    return 50;

} );

// Definir o estilo da paginação
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-outline-my-color-5"';
}

// Criar o campo de busca
register_sidebar(
    array(
        'name' => 'Busca',
        'id' => 'busca',
        'before_widget' => '<div class="blog-search">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

// Ativar o fomrulário para respostas nos comentários
function theme_queue_js() {
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) wp_enqueue_script('comment-reply');
}
add_action('wp_print_scripts', 'theme_queue_js');

// Personalizar os comentários
function format_comment($comment, $args, $depth) {
    
    $GLOBALS['comment'] = $comment; ?>

    <div <?php comment_class('ml-4'); ?> id="comment-<?php comment_ID(); ?>">
 
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
            <a class="pull-left" href="#">
                <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </a>
            <div class="media-body">
                <div class="media-body-wrap card">

                    <div class="card-header">
                        <div class="comment-meta">
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                <time datetime="<?php comment_time( 'c' ); ?>">
                                    <h5 class="card-title"><?php printf(__('%s'), get_comment_author_link()) ?></h5>
                                    <h6 class="card-subtitle mb-3 text-muted">Comentou em <?php printf(__('%1$s'), get_comment_date('d/m/y'), get_comment_time()) ?>
                                        <?php edit_comment_link( __( '<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span> Editar' ), '<span class="edit-link">', '</span>' ); ?>
                                    </h6>
                                </time>
                            </a>
                        </div>
                    </div>

                    <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'meu-tema' ); ?></p>
                    <?php endif; ?>

                    <div class="comment-content card-block">
                        <?php comment_text(); ?>
                    </div><!-- .comment-content -->

                    <?php comment_reply_link(
                        array_merge(
                            $args, array(
                                'add_below' => 'div-comment',
                                'depth' 	=> $depth,
                                'max_depth' => $args['max_depth'],
                                'before' 	=> '<footer class="reply comment-reply card-footer">',
                                'after' 	=> '</footer><!-- .reply -->'
                            )
                        )
                    ); ?>

                </div>
            </div><!-- .media-body -->

        </article><!-- .comment-body -->

    <?php
}

// Incluir as funções de personalização
require get_template_directory(). '/inc/customizer.php';

//WOOCOMMERCE

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

add_filter('woocommerce_form_field_args','wc_form_field_args',10,3);

function wc_form_field_args( $args, $key, $value = null ) {


switch ( $args['type'] ) {

    case "select" : /* Segmenta todos os elementos de tipo de entrada selecionados, exceto os tipos de entrada selecionados de país e estado */
        $args['class'][] = 'form-group'; // Adicione uma classe ao wrapper de elemento html do campo - os tipos de entrada woocommerce (campos) geralmente são incluídos em uma tag <p> </p>
        $args['input_class'] = array('form-control', 'input-lg'); // Adicionar uma classe à própria entrada do formulário
        //$args['custom_attributes']['data-plugin'] = 'select2';
        $args['label_class'] = array('control-label');
        $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
        break;

    case 'country' : /* Por padrão, WooCommerce preencherá uma seleção com os nomes dos países - $ args definidos para este tipo de entrada específico segmenta apenas o elemento de seleção de país */
        $args['class'][] = 'form-group single-country';
        $args['label_class'] = array('control-label');
        break;

    case "state" : /* Por padrão, WooCommerce preencherá uma seleção com nomes de estado - $ args definidos para este tipo de entrada específico segmenta apenas o elemento de seleção de país */
        $args['class'][] = 'form-group'; // Adicionar classe ao wrapper de elemento html do campo
        $args['input_class'] = array('form-control', 'input-lg'); // adicionar classe à própria entrada do formulário
        //$args['custom_attributes']['data-plugin'] = 'select2';
        $args['label_class'] = array('control-label');
        $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
        break;


    case "password" :
    case "text" :
    case "email" :
    case "tel" :
    case "number" :
        $args['class'][] = 'form-group';
        //$args['input_class'][] = 'form-control input-lg'; // irá retornar um array de classes, o mesmo que abaixo
        $args['input_class'] = array('form-control', 'input-lg');
        $args['label_class'] = array('control-label');
        break;

    case 'textarea' :
        $args['input_class'] = array('form-control', 'input-lg');
        $args['label_class'] = array('control-label');
        break;

    case 'checkbox' :
        break;

    case 'radio' :
        break;

    default :
        $args['class'][] = 'form-group';
        $args['input_class'] = array('form-control', 'input-lg');
        $args['label_class'] = array('control-label');
        break;
}

return $args;
}

// Criação do widget
class mt_widget extends WP_Widget {
  
    function __construct() {
    parent::__construct(
      
    // ID de base do seu widget
    'mt_widget', 
      
    // O nome do widget aparecerá na IU
    __('mteginner Widget', 'mt_widget_domain'), 
      
    // Widget descrição
    array( 'description' => __( 'Sample widget based on mteginner Tutorial', 'mt_widget_domain' ), ) 
    );
    }
      
    // Criação de interface de widget
      
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
      
    // Antes e depois dos argumentos do widget são definidos por temas
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
      
    // É aqui que você executa o código e exibe a saída
    echo __( 'Hello, World!', 'mt_widget_domain' );
    echo $args['after_widget'];
    }
              
    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'New title', 'mt_widget_domain' );
    }
    // Widget formulário admin 
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
    }
          
    // Atualizar widget substituindo instâncias antigas por novas
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
     
    // Class mt_widget termina aqui
    } 

     
?>



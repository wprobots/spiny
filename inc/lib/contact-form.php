<?php
if( is_file( __DIR__ . '/../vendor/simple_html_dom.php' ) ) {

    add_filter( 'wpcf7_form_elements', 'imp_wpcf7_form_textarea' );
    function imp_wpcf7_form_textarea( $content ) {
        $content = str_replace( '<textarea', '<textarea type="text"', $content);
        return $content;
    }

    add_filter( 'wpcf7_form_elements', 'imp_wpcf7_form_radio' );
    function imp_wpcf7_form_radio( $content ) {

        $html = str_get_html($content);

        $radio_parents = $html->find('.radio_buttons');

        foreach($radio_parents as $radio_parent) {
            $labels = $radio_parent->find('label');

            foreach($labels as $label) {
                $label->class = 'mdl-radio mdl-js-radio mdl-js-ripple-effect';

                $label->find('input', 0)->class = 'mdl-radio__button';
                $label->find('span', 0)->class = 'mdl-radio__label';
            }

        }

        return $html;
    }
//
//    add_filter( 'wpcf7_form_elements', 'imp_wpcf7_form_remove_span' );
//    function imp_wpcf7_form_remove_span( $content ) {
//
//        $html = str_get_html($content);
//
//        $fucking_spans = $html->find('span.wpcf7-form-control-wrap');
//
//        foreach($fucking_spans as $fucking_span) {
//            $inner_html = $fucking_span->innertext;
//
//            $fucking_span->outertext = $inner_html;
//        }
//
//        return $html;
//    }

}
<?php
 
class KBSlider_Widget extends WP_Widget {
	
    public function __construct(){
    	
        // widget actual processes
     	$widget_ops = array('classname' => 'widget_kbslider', 'description' => __('Displays a kb slider on the page') );
        $this->WP_Widget('kb-slider-widget', __('KenBurns Slider'), $widget_ops);
    }
 
    /**
     * 
     * the form
     */
    public function form($instance) {
	
		$slider = new KBSlider();
    	$arrSliders = $slider->getArrSlidersShort();
    	
    	$sliderID = UniteFunctions::getVal($instance, "kb_slider");
    	
		if(empty($arrSliders))
			echo __("No sliders found, Please create a slider");
		else{
			$field = "kb_slider";
			$fieldID = $this->get_field_id( $field );
			$fieldName = $this->get_field_name( $field );

			$select = UniteFunctions::getHTMLSelect($arrSliders,$sliderID,'name="'.$fieldName.'" id="'.$fieldID.'"',true);
		}
		echo "Choose slider: ";
		echo $select;
    }
 
    /**
     * 
     * update
     */
    public function update($new_instance, $old_instance) {
    	
        return($new_instance);
    }

    
    /**
     * 
     * widget output
     */
    public function widget($args, $instance) {
		$sliderID = $instance["kb_slider"];
		if(empty($sliderID))
			return(false);
			
		KBSliderOutput::putSlider($sliderID);
    }
 
}


?>
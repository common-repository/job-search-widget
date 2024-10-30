<?php
/*
Plugin Name: Job Search Widget
Plugin URI: https://wordpress.org/plugins/job-search-widget/
Description: Job Search Form Widget that produces results from  JustJobs.com family of websites.
Version: 1.0.3
Author: Otavio Fonseca
License: GPL2
*/

// The widget class

class justjobscom_jobsearch extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'justjobscom_jobsearch',
			__( 'Job Search Widget', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'title'    => '',
			'defaultsearch'     => '',
			'defaultlocale'     => '',
			'jobboard'   => '',

		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>
<?php // Widget Title ?>

<p>Set defaults below or leave blank:<br />
  <br />
  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
    <?php _e( '<b>Widget Title</b>: (example: <em>Job Search</em>)', 'text_domain' ); ?>
  </label>
  <br />
  <input  id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php // Default Search ?>
<p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'defaultsearch' ) ); ?>">
    <?php _e( '<b>Default Search</b>: (example: <em>engineer</em>)', 'text_domain' ); ?>
  </label>
  <br />
  <input  id="<?php echo esc_attr( $this->get_field_id( 'defaultsearch' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'defaultsearch' ) ); ?>" type="text" value="<?php echo esc_attr( $defaultsearch ); ?>" />
</p>
<?php // Default Locale ?>
<p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'defaultlocale' ) ); ?>">
    <?php _e( '<b>Default Locale</b>: (example: <em>California</em>)', 'text_domain' ); ?>
  </label>
  <br />
  <input  id="<?php echo esc_attr( $this->get_field_id( 'defaultlocale' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'defaultlocale' ) ); ?>" type="text" value="<?php echo esc_attr( $defaultlocale ); ?>" />
</p>
<?php // Job Board Selector?>
<p>
  <label for="<?php echo $this->get_field_id( 'jobboard' ); ?>">
    <?php _e( '<b>Choose Job Board:</b> (defaults to <em>JustJobs.com</em>)', 'text_domain' ); ?>
  </label>
  <br />
  <select name="<?php echo $this->get_field_name( 'jobboard' ); ?>" id="<?php echo $this->get_field_id( 'jobboard' ); ?>" >
    <?php
		// Your options array
	
		$options = array(
			'JustJobs.com'        => __( 'Select Board', 'text_domain' ),
			'JustJobs.com' => __( 'JustJobs.com', 'text_domain' ),
			'DiversityJobs.com' => __( 'DiversityJobs.com', 'text_domain' ),
			'VeteranJobs.net' => __( 'VeteranJobs.net', 'text_domain' ),
			'LatinoJobs.org' => __( 'LatinoJobs.org', 'text_domain' ),		
			'AfricanAmericanHires.com' => __( 'AfricanAmericanHires.com', 'text_domain' ),
			'AllAirportJobs.com' => __( 'AllAirportJobs.com', 'text_domain' ),
			'AllAnalystJobs.com' => __( 'AllAnalystJobs.com', 'text_domain' ),
			'AllAutomotiveJobs.com' => __( 'AllAutomotiveJobs.com', 'text_domain' ),
			'AllBilingualJobs.com' => __( 'AllBilingualJobs.com', 'text_domain' ),
			'AllConstructionJobs.com' => __( 'AllConstructionJobs.com', 'text_domain' ),
			'AllCounselingJobs.com' => __( 'AllCounselingJobs.com', 'text_domain' ),
			'AllDialysisJobs.com' => __( 'AllDialysisJobs.com', 'text_domain' ),
			'AllEducationJobs.com' => __( 'AllEducationJobs.com', 'text_domain' ),
			'AllHispanicJobs.com' => __( 'AllHispanicJobs.com', 'text_domain' ),
			'AllJobsInNursing.com' => __( 'AllJobsInNursing.com', 'text_domain' ),
			'alljobsinnursing.com' => __( 'alljobsinnursing.com', 'text_domain' ),
			'AllLanguageJobs.com' => __( 'AllLanguageJobs.com', 'text_domain' ),
			'AllLGBTJobs.com' => __( 'AllLGBTJobs.com', 'text_domain' ),
			'AllOutdoorJobs.com' => __( 'AllOutdoorJobs.com', 'text_domain' ),
			'alloutdoorjobs.com' => __( 'alloutdoorjobs.com', 'text_domain' ),
			'AllSchoolJobs.com' => __( 'AllSchoolJobs.com', 'text_domain' ),
			'AllSpanishJobs.com' => __( 'AllSpanishJobs.com', 'text_domain' ),
			'ArchitectureJobs.org' => __( 'ArchitectureJobs.org', 'text_domain' ),
			'architecturejobs.org' => __( 'architecturejobs.org', 'text_domain' ),
			'AsianHires.com' => __( 'AsianHires.com', 'text_domain' ),
			'ButlerJobs.org' => __( 'ButlerJobs.org', 'text_domain' ),
			'butlerjobs.org' => __( 'butlerjobs.org', 'text_domain' ),
			'CableJobs.org' => __( 'CableJobs.org', 'text_domain' ),
			'cablejobs.org' => __( 'cablejobs.org', 'text_domain' ),
			'CivilEngineeringJobs.org' => __( 'CivilEngineeringJobs.org', 'text_domain' ),
			'civilengineeringjobs.org' => __( 'civilengineeringjobs.org', 'text_domain' ),
			'CollegeFacultyJobs.com' => __( 'CollegeFacultyJobs.com', 'text_domain' ),
			'CommercialConstructionJobs.org' => __( 'CommercialConstructionJobs.org', 'text_domain' ),
			'commercialconstructionjobs.org' => __( 'commercialconstructionjobs.org', 'text_domain' ),
			'ComputerJobs.net' => __( 'ComputerJobs.net', 'text_domain' ),
			'computerjobs.net' => __( 'computerjobs.net', 'text_domain' ),
			'DisabilityJobs.net' => __( 'DisabilityJobs.net', 'text_domain' ),
			'DriverJobs.org' => __( 'DriverJobs.org', 'text_domain' ),
			'EngineeringJobs.org' => __( 'EngineeringJobs.org', 'text_domain' ),
			'EthanolJobs.org' => __( 'EthanolJobs.org', 'text_domain' ),
			'ethanoljobs.org' => __( 'ethanoljobs.org', 'text_domain' ),
			'FacilitiesJobs.org' => __( 'FacilitiesJobs.org', 'text_domain' ),
			'facilitiesjobs.org' => __( 'facilitiesjobs.org', 'text_domain' ),
			'FieldJobs.org' => __( 'FieldJobs.org', 'text_domain' ),
			'FindFarmJobs.com' => __( 'FindFarmJobs.com', 'text_domain' ),
			'findfarmjobs.com' => __( 'findfarmjobs.com', 'text_domain' ),
			'FortWayneJobs.org' => __( 'FortWayneJobs.org', 'text_domain' ),
			'fortwaynejobs.org' => __( 'fortwaynejobs.org', 'text_domain' ),
			'GeriatricJobs.org' => __( 'GeriatricJobs.org', 'text_domain' ),
			'geriatricjobs.org' => __( 'geriatricjobs.org', 'text_domain' ),
			'HorticultureJobs.org' => __( 'HorticultureJobs.org', 'text_domain' ),
			'horticulturejobs.org' => __( 'horticulturejobs.org', 'text_domain' ),
			'InsuranceJobs.org' => __( 'InsuranceJobs.org', 'text_domain' ),
			'JobsInAccounting.org' => __( 'JobsInAccounting.org', 'text_domain' ),
			'JobsInBanking.com' => __( 'JobsInBanking.com', 'text_domain' ),
			'JobsInFinance.org' => __( 'JobsInFinance.org', 'text_domain' ),
			'JobsInHealthcare.com' => __( 'JobsInHealthcare.com', 'text_domain' ),
			'JobsInHealthcare.com' => __( 'JobsInHealthcare.com', 'text_domain' ),
			'jobsinhealthcare.com' => __( 'jobsinhealthcare.com', 'text_domain' ),
			'jobsinhealthcare.com' => __( 'jobsinhealthcare.com', 'text_domain' ),
			'JobsInHospitality.net' => __( 'JobsInHospitality.net', 'text_domain' ),
			'jobsinhospitality.net' => __( 'jobsinhospitality.net', 'text_domain' ),
			'JobsInHospitals.org' => __( 'JobsInHospitals.org', 'text_domain' ),
			'JobsInHR.org' => __( 'JobsInHR.org', 'text_domain' ),
			'JobsInIT.org' => __( 'JobsInIT.org', 'text_domain' ),
			'jobsinit.org' => __( 'jobsinit.org', 'text_domain' ),
			'JobsInNonProfit.org' => __( 'JobsInNonProfit.org', 'text_domain' ),
			'JobsInOperations.com' => __( 'JobsInOperations.com', 'text_domain' ),
			'JobsInScience.org' => __( 'JobsInScience.org', 'text_domain' ),
			'jobsinscience.org' => __( 'jobsinscience.org', 'text_domain' ),
			'JobsInSoftware.org' => __( 'JobsInSoftware.org', 'text_domain' ),
			'JobsInTeaching.org' => __( 'JobsInTeaching.org', 'text_domain' ),
			'JustPartTimeJobs.com' => __( 'JustPartTimeJobs.com', 'text_domain' ),
			'LatinoJobs.org' => __( 'LatinoJobs.org', 'text_domain' ),
			'LogisticsJobs.org' => __( 'LogisticsJobs.org', 'text_domain' ),
			'MarketingJobs.org' => __( 'MarketingJobs.org', 'text_domain' ),
			'MortgageConsultantJobs.org' => __( 'MortgageConsultantJobs.org', 'text_domain' ),
			'mortgageconsultantjobs.org' => __( 'mortgageconsultantjobs.org', 'text_domain' ),
			'NeonatologyJobs.org' => __( 'NeonatologyJobs.org', 'text_domain' ),
			'neonatologyjobs.org' => __( 'neonatologyjobs.org', 'text_domain' ),
			'neonatologyjobs.org' => __( 'neonatologyjobs.org', 'text_domain' ),
			'NursingWork.org' => __( 'NursingWork.org', 'text_domain' ),
			'nursingwork.org' => __( 'nursingwork.org', 'text_domain' ),
			'PayrollJobs.org' => __( 'PayrollJobs.org', 'text_domain' ),
			'payrolljobs.org' => __( 'payrolljobs.org', 'text_domain' ),
			'ProfessorJobs.org' => __( 'ProfessorJobs.org', 'text_domain' ),
			'QAJobs.com' => __( 'QAJobs.com', 'text_domain' ),
			'qajobs.com' => __( 'qajobs.com', 'text_domain' ),
			'RetailJobs.org' => __( 'RetailJobs.org', 'text_domain' ),
			'RockCountyJobs.org' => __( 'RockCountyJobs.org', 'text_domain' ),
			'rockcountyjobs.org' => __( 'rockcountyjobs.org', 'text_domain' ),
			'SalesJobs.org' => __( 'SalesJobs.org', 'text_domain' ),
			'SaltLakeCityJobs.net' => __( 'SaltLakeCityJobs.net', 'text_domain' ),
			'saltlakecityjobs.net' => __( 'saltlakecityjobs.net', 'text_domain' ),
			'SanAntonioJobs.net' => __( 'SanAntonioJobs.net', 'text_domain' ),
			'sanantoniojobs.net' => __( 'sanantoniojobs.net', 'text_domain' ),
			'SustainabilityJobs.org' => __( 'SustainabilityJobs.org', 'text_domain' ),
			'sustainabilityjobs.org' => __( 'sustainabilityjobs.org', 'text_domain' ),
			'TransportationJobs.org' => __( 'TransportationJobs.org', 'text_domain' ),
			'transportationjobs.org' => __( 'transportationjobs.org', 'text_domain' ),
			'TruckJobs.org' => __( 'TruckJobs.org', 'text_domain' ),
			'VeteranJobs.net' => __( 'VeteranJobs.net', 'text_domain' ),
			'WeHireWomen.com' => __( 'WeHireWomen.com', 'text_domain' ),
			
			
			
		);

		// Loop through options and add each one to the select dropdown
		foreach ( $options as $key => $name ) {
			echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $jobboard, $key, false ) . '>'. $name . '</option>';

		} ?>
  </select>
</p>
<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
	$instance['defaultsearch']     = isset( $new_instance['defaultsearch'] ) ? wp_strip_all_tags( $new_instance['defaultsearch'] ) : '';
	$instance['defaultlocale']     = isset( $new_instance['defaultlocale'] ) ? wp_strip_all_tags( $new_instance['defaultlocale'] ) : '';
	$instance['jobboard']   = isset( $new_instance['jobboard'] ) ? wp_strip_all_tags( $new_instance['jobboard'] ) : '';
		return $instance;
	return $instance;
	
	}

	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );

		// Check the widget options
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
	
		$defaultsearch     = isset( $instance['defaultsearch'] ) ? $instance['defaultsearch'] : '';
		$defaultlocale     = isset( $instance['defaultlocale'] ) ? $instance['defaultlocale'] : '';
		$jobboard     = isset( $instance['jobboard'] ) ? $instance['jobboard'] : '';


		// WordPress core before_widget hook (always include )
		echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

			// Display widget title if defined
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}


//get referring site to be used in UTM tags
$refsite = $_SERVER['HTTP_HOST'];


//  the search form ?>
<form class="search-form" action="https://<?=$jobboard; ?>/front?utm_source=<?=$refsite;?>&utm_medium=wp-widget&utm_campaign=widget-<?=$jobboard;?>" method="post">
  <p>
    <input placeholder="job title, keywords or company" type="text" maxlength="128" name="keyword" size="60" value="<?=$defaultsearch?>" class="form-text">
  </p>
  <input placeholder="city, state, zip"  type="text" maxlength="128" name="location" value="<?=$defaultlocale?>" autocomplete="off">
  <p align="center"> <br />
    <input type="submit" value="find jobs" name="op">
  </p>
  <input type="hidden" name="form_id" value="jj_frontpage_searchform">
</form>
<?

		echo '</div>';

		// WordPress core after_widget hook (always include )
		echo $after_widget;

	}

}

// Register the widget
function justjobscom_jobsearch_widget() {
	register_widget( 'justjobscom_jobsearch' );
}
add_action( 'widgets_init', 'justjobscom_jobsearch_widget' );



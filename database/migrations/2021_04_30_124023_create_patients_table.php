<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('no action');
            $table->date('screening_at')->nullable();
            $table->enum('screening_on',['Community_based', 'Others',''])->default('');
            $table->string('screening_area')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->enum('sex',['M', 'F',''])->default('');
            $table->enum('married',['Yes', 'No',''])->default('');
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();
            $table->enum('geo_location',['Native', 'Migrated',''])->default('');
            $table->string('migrated_from')->nullable();
            $table->date('migrated_year')->nullable();
            $table->enum('house_type',['Pucca', 'Semi Pucca','Tin','Kachcha','Wooden',''])->default('');
            $table->enum('education',['Yes', 'No',''])->default('');
            $table->string('grade')->nullable();
            $table->enum('work',['Office', 'Laborer/Farm','House', 'None','Others',''])->default('');

            $table->enum('diet',['Vegetarian', 'Non-vegetarian',''])->default('');
            $table->enum('fruit_veg_intake',['Everyday', '3-5 times a week','Once a week','None'])->default('None');
            $table->enum('smoking',['Yes', 'Yes, Former','No',''])->default('');
            $table->string('initiation_age')->nullable();
            $table->string('cessation_age')->nullable();
            $table->integer('cigarettes_per_day')->nullable();
            $table->enum('smoking_type',['Cigarette', 'Bidi', 'Khaini/Surti', 'Zarda','Ghutka','Others',''])->default('');
            $table->enum('alcohol',['Once a day', 'Once a week','Once a Month','No',''])->default('');
            $table->integer('alcol_duration')->default('0');
            $table->enum('alcol_type',['Homemade', 'Branded','Both',''])->default('');
            $table->enum('physical_activity',['>60 min/day', '30-60 min/day','<30 min/day','No',''])->default('');
            $table->enum('own_vehicle',['Yes', 'No',''])->default('');
            $table->enum('vehicle_type',['Bicycle', 'Motorcycle','Car','Other',''])->default('');
            $table->integer('family_member')->nullable();
            $table->string('serial_no_household')->nullable();

            $table->enum('family_kidney_disease',['Yes', 'No','Unknown'])->default('Unknown');
            $table->enum('family_high_bp',['Yes', 'No','Unknown'])->default('Unknown');
            $table->enum('family_diabetes',['Yes', 'No','Unknown'])->default('Unknown');
            $table->enum('family_heart_attack_stroke',['Yes', 'No','Unknown'])->default('Unknown');
            $table->enum('family_mem_death_in_5_year',['Yes', 'No',''])->default('');
            $table->enum('death_cause',['Unknown', 'Known',''])->default('');
            $table->string('death_by')->nullable();

            $table->enum('kidney_disease',['Yes', 'No','Unknown'])->default('Unknown');
            $table->enum('high_bp',['Yes', 'No','Unknown'])->default('Unknown');
            $table->enum('diabetes',['Yes', 'No','Unknown'])->default('Unknown');
            $table->enum('heart_attack_stroke',['Yes', 'No','Unknown'])->default('Unknown');
            
            $table->enum('present_kidney_disease',['Yes', 'No','Not Applicable'])->default('Not Applicable');
            $table->enum('present_high_bp',['Yes', 'No','Not Applicable'])->default('Not Applicable');
            $table->enum('present_diabetes',['Yes', 'No','Not Applicable'])->default('Not Applicable');
            $table->enum('present_heart_attack_stroke',['Yes', 'No','Not Applicable'])->default('Not Applicable');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('waist_circum')->nullable();
            $table->string('hip_cirum')->nullable();
            $table->string('systolic')->nullable();
            $table->string('diastolic')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->enum('pulse',['Regular', 'Irregular',''])->default('');
            $table->enum('u_leukocyte',['Negative', 'Trace','+','++','+++',''])->default('');
            $table->enum('u_nitrate',['Negative', 'Positive',''])->default('');
            $table->enum('u_glucose',['Negative', 'Trace','+','++','+++','++++',''])->default('');
            $table->enum('u_hb',['Negative', 'Trace','+','++','+++',''])->default('');
            $table->enum('u_protein',['Negative', 'Trace','+','++','+++','++++',''])->default('');

            $table->string('qty_u_albumin')->nullable();
            $table->string('qty_u_creatinine')->nullable();
            $table->string('qty_u_alb_creat')->nullable();
            $table->string('confm_u_albumin')->nullable();
            $table->string('confm_u_creatinine')->nullable();
            $table->string('confm_u_alb_creat')->nullable();
            $table->string('serum_creatinine')->nullable();
            $table->string('fasting_glucose')->nullable();
            $table->string('hba1c')->nullable();
            $table->string('tot_cholesterol')->nullable();
            $table->string('hdl_cholesterol')->nullable();
            $table->string('triglyceride')->nullable();
            $table->string('ldl_cholesterol')->nullable();
            $table->string('gross_family_income')->nullable();

            $table->enum('diagnosis1',['Chronic Kidney Disease','Hypertension','Diabetes Mellitus','Cardiovascular Disease',''])->default('');
            $table->enum('diagnosis2',['Chronic Kidney Disease','Hypertension','Diabetes Mellitus','Cardiovascular Disease',''])->default('');
            $table->enum('diagnosis3',['Chronic Kidney Disease','Hypertension','Diabetes Mellitus','Cardiovascular Disease',''])->default('');
            $table->enum('diagnosis4',['Chronic Kidney Disease','Hypertension','Diabetes Mellitus','Cardiovascular Disease',''])->default('');
            
            $table->enum('arthritis',['Yes', 'No',''])->default('');
            $table->enum('acid_peptic_disease',['Yes', 'No',''])->default('');
            $table->enum('chronic_back_ache',['Yes', 'No',''])->default('');
            $table->enum('stroke',['Yes', 'No',''])->default('');
            $table->enum('blindness',['Yes', 'No',''])->default('');
            $table->enum('deafness',['Yes', 'No',''])->default('');
            $table->enum('alcohol_disorder',['Yes', 'No',''])->default('');
            $table->enum('epilepsy',['Yes', 'No',''])->default('');
            $table->enum('thyroid_disease',['Yes', 'No',''])->default('');
            $table->enum('tb',['Yes', 'No',''])->default('');
            $table->enum('filariasis',['Yes', 'No',''])->default('');
            $table->enum('depression',['Yes', 'No',''])->default('');
            $table->enum('cancer',['Yes', 'No',''])->default('');
            $table->enum('pvt_health_ctr_before',['Yes', 'No',''])->default('');
            $table->enum('govt_health_facilities',['Yes', 'No',''])->default('');
            $table->enum('any_treatments',['Ayurveda', 'Traditional/Faith Healer','Ramdev Medicine','Home Remedy','Others','No',''])->default('');
            $table->enum('health_insurance',['Yes', 'No',''])->default('');
            $table->enum('covid_19_before',['Yes', 'No',''])->default('');
            $table->enum('family_covid_19',['Yes', 'No',''])->default('');
            $table->string('family_member_covid')->nullable();
            $table->enum('covid_outcome',['Improved', 'Still illness','Dealth',''])->default('');
            $table->enum('cronic_lung',['Yes', 'No',''])->default('');
            $table->enum('asthma',['Yes', 'No',''])->default('');
            $table->enum('adminted_hospital',['Yes', 'No',''])->default('');
            $table->enum('steroids_antibiotics',['Yes', 'No',''])->default('');
            $table->enum('on_medication',['Yes', 'No',''])->default('');
            $table->string('no_years_inhaler1')->nullable();
            $table->string('no_years_inhaler2')->nullable();
            $table->enum('copd_emphysema',['Yes', 'No',''])->default('');
            $table->string('diagnosed_yrs')->nullable();
            $table->enum('copd_medication',['Yes', 'No',''])->default('');
            $table->string('medication_name')->nullable();
            $table->enum('admitted_hos_with_copd',['Yes', 'No',''])->default('');
            $table->date('copd_admitted_at')->nullable();
            $table->integer('admitted_times')->nullable();
            $table->enum('ever_req_oral_steroids_antibiotics',['Yes', 'No',''])->default('');
            $table->enum('use_inhalers_now',['Yes', 'No',''])->default('');
            $table->string('which_inhaler')->nullable();
            $table->string('inhaler_fqy')->nullable();
            $table->string('inhaler_duration')->nullable();
            $table->string('oxygen_saturation')->nullable();
            $table->string('fev1')->nullable();
            $table->string('fev1_predicted')->nullable();
            $table->string('fvc')->nullable();
            $table->string('fvc_predicted')->nullable();
            $table->string('fev1_fvc_ratio')->nullable();
            $table->enum('cough_first_mrng_winter',['Yes', 'No',''])->default('');
            $table->enum('cough_day_night_winter',['Yes', 'No',''])->default('');
            $table->enum('cough_3mths_a_year',['Yes', 'No',''])->default('');
            $table->enum('bring_phlegm_form_mrng',['Yes', 'No',''])->default('');
            $table->enum('bring_phlegm_form_day_ngt',['Yes', 'No',''])->default('');
            $table->enum('bring_phlegm_like_3mth_a_year',['Yes', 'No',''])->default('');
            $table->enum('past_3yr_cough_phlegm_3wk',['Yes', 'No',''])->default('');
            $table->enum('had_more_than_one',['Yes', 'No',''])->default('');
            $table->enum('breathless_with_strenuous',['Yes', 'No',''])->default('');
            $table->enum('short_breath_on_walking_up',['Yes', 'No',''])->default('');
            $table->enum('iam_slower_walker',['Yes', 'No',''])->default('');
            $table->enum('istop_breath',['Yes', 'No',''])->default('');
            $table->enum('iam_breathless_to_leave_house',['Yes', 'No',''])->default('');
            $table->enum('main_fuel1',['Electricity', 'LPG','Gobar gas','Kerosene','Charcoal','Coal/coke','Dung cake','Wood','Crop residues','Others',''])->default('');
            $table->integer('fuel1_yr')->nullable();
            $table->enum('main_fuel2',['Electricity', 'LPG','Gobar gas','Kerosene','Charcoal','Coal/coke','Dung cake','Wood','Crop residues','Others',''])->default('');
            $table->integer('fuel2_yr')->nullable();
            $table->enum('main_fuel3',['Electricity', 'LPG','Gobar gas','Kerosene','Charcoal','Coal/coke','Dung cake','Wood','Crop residues','Others',''])->default('');
            $table->integer('fuel3_yr')->nullable();
            $table->enum('main_fuel4',['Electricity', 'LPG','Gobar gas','Kerosene','Charcoal','Coal/coke','Dung cake','Wood','Crop residues','Others',''])->default('');
            $table->integer('fuel4_yr')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
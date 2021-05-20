<template>
<div class="container-fluid mb-5">
<h3 class="text-start"> KHDC SCREENING PROGRAM </h3>
<h4 class="text-start">Update Screening data carefully</h4>

<form @submit.prevent="updatePatient">
  <fieldset class="" v-if="step == 1">
    <legend class="mb-3">Page 1 of 4: Screening</legend>
    <div class="containter-fluid">
      <!-- <input type="hidden" class="form-control" v-model="patient.created_by"> -->
      <div class="row mb-3">
        <label class="col-auto my-1 col-form-label" for="screening_at">Date:</label>
        <div class="col-auto my-1">
          <input type="date" id="screening_at" class="form-control" v-model="patient.screening_at">
        </div>
    
        <label class="col-auto my-1 col-form-label text-end" for="screening_on">Screening On:</label>
        <div class="col-auto my-1 text-center">
          <select class="form-select form-select-md" aria-label="Default" id="screening_on" v-model="patient.screening_on">
            <option value="Community_based" selected>Community-based</option>
            <option value="Others">Others</option>
          </select>
        </div>
        
        <label v-if="patient.screening_on =='Others'" class="col-auto my-1 col-form-label" for="screening_area">Specify If other:</label>
        <div v-if="patient.screening_on =='Others'" class="col-auto my-1">
          <input type="text" class="form-control" id="screening_area" v-model="patient.screening_area">
        </div>          
      </div>

      <hr><h3>DEMOGRAPHIC DATA</h3> <hr>
      <div class="row mb-2">          
        <label class="col-auto col-xs-3 my-1 col-form-label" for="firstname">First Name:</label>
        <div class="col-auto col-xs-9 my-1">
          <input type="text" id="firstname" class="form-control" v-model="patient.firstname" required>
        </div>
        <label class="col-auto col-xs-3 my-1 col-form-label" for="lastname">Last Name:</label>
        <div class="col-auto col-xs-9 my-1">
          <input type="text" id="lastname" class="form-control" v-model="patient.lastname" required>
        </div>
      </div>

      <div class="row mb-2"> 
        <label class="col-auto my-1 col-form-label" for="dob">DOB in AD:</label>
        <div class="col-auto my-1">
          <input type="date" id="dob" class="form-control" v-model="patient.dob">
        </div>        
        <label class="col-auto my-1 col-form-label" for="age">Age:</label>
        <div class="col-auto my-1">
          <input type="text" id="age" class="form-control" v-model="patient.age">
        </div>
      </div>

      <div class="row mb-2">
        <label class="col-auto my-1 col-form-label">Sex:</label>
        <div class="col-auto my-1">
          <input class="form-check-input m-3" type="radio" value="M" v-model="patient.sex">
        </div>
          &nbsp;<label class="col-auto my-1 ml-3 col-form-label">Male</label>
        <div class="col-auto my-1">
          <input class="form-check-input m-3" type="radio" value="F" v-model="patient.sex">
        </div>
          &nbsp;<label class="col-auto my-1 ml-3 col-form-label">Female</label>

        <label class="col-auto my-1 col-form-label">Married:</label>
        <div class="col-auto my-1">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.married">
        </div>
          &nbsp;<label class="col-auto my-1 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-1">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.married">
        </div>
          &nbsp;<label class="col-auto my-1 ml-3 col-form-label">No</label>
      </div>
          <input class="form-check-input m-3" type="radio" value="" v-model="patient.married">

      <div class="row mb-2 clearfix">
        <label class="col-auto col-sm-2 col-lg-1 my-1 col-form-label" for="address">Address:</label>
        <div class="col-auto col-sm-9 col-lg-6 my-1">
          <input type="text" id="address" class="form-control" v-model="patient.address" required>
        </div>
      </div>

      <div class="row mb-2">
        <label class="col-auto my-1 col-form-label" for="phone1">Contact No.1:</label>
        <div class="col-auto my-1">
          <input type="number" id="phone1" class="form-control" v-model="patient.phone1">
        </div>
        <label class="col-auto my-1 col-form-label" for="phone2">Contact No.2:</label>
        <div class="col-auto my-1">
          <input type="number" id="phone2" class="form-control" v-model="patient.phone2">
        </div>
      </div>
      
      <div class="row mb-2">
        <label class="col-auto my-1 col-form-label">Geographic location:</label>
        <div class="col-auto my-1">
          <input class="form-check-input m-3" type="radio" id="Native" value="Native" v-model="patient.geo_location">
        </div>
          &nbsp;<label class="col-auto my-1 ml-3 col-form-label" for="Native">Native</label>
        
        <div class="col-auto my-1">
          <input class="form-check-input m-3" type="radio" value="Migrated" id="Migrated" v-model="patient.geo_location">
        </div>
          &nbsp;<label class="col-auto my-1 ml-3 col-form-label" for="Migrated">Migrated</label>
        <div class="col"></div><div class="col"></div>
      </div>
      
      <div v-if="patient.geo_location =='Migrated'" class="row mb-2">
        <label class="col-auto col-xs-3 my-1 col-form-label" for="migrated_from">Migrated From:</label>
        <div class="col-auto col-xs-9 my-1">
          <input type="text" id="migrated_from" class="form-control" v-model="patient.migrated_from">
        </div>
        <label class="col-auto col-xs-3 my-1 col-form-label" for="migrated_year">Migrated Year (A.D.):</label>
        <div class="col-auto col-xs-9 my-1">
          <input type="text" id="migrated_year" class="form-control" v-model="patient.migrated_year">
        </div>
      </div>
      
      <div class="row mb-2">
        <label class="col-auto my-2 col-form-label">Type of House:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Pucca" value="Pucca" v-model="patient.house_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Pucca">Pucca</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Semi Pucca" id="Semi" v-model="patient.house_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Semi">Semi Pucca</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Tin" id="Tin" v-model="patient.house_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Tin">Tin</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Kachcha" id="Kachcha" v-model="patient.house_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Kachcha">Kachcha</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Wooden" id="Wooden" v-model="patient.house_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Wooden">Wooden</label>
          <input class="form-check-input m-3" type="radio" value="" id="" v-model="patient.house_type">
      </div>
      
      <div class="row mb-2">
        <label class="col-auto my-2 col-form-label">Education:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" id="EduYes" v-model="patient.education">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="EduYes">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" id="EduNo" v-model="patient.education">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="EduNo">No</label>

        <label v-if="patient.education =='Yes'" class="col-auto my-1 col-form-label" for="grade">If Yes, Grade then:</label>
        <div v-if="patient.education =='Yes'" class="col-auto my-1">
          <input type="text" class="form-control" id="grade" v-model="patient.grade">
        </div>      
      </div>

      <div class="row mb-2">
        <label class="col-auto my-2 col-form-label">Work:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="wOffice" value="Office" v-model="patient.work">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="wOffice">Office</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="wLabor" value="Laborer/Farm" v-model="patient.work">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="wLabor">Laborer/Farm</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="wHouse" value="House" v-model="patient.work">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="wHouse">House</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="wNone" value="None" v-model="patient.work">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="wNone">None</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="wOther" value="Others" v-model="patient.work">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="wOther">Others</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.work">
      </div>
        <hr><h4> Diet</h4> <hr>
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Diet:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="dVegetarian" value="Vegetarian" v-model="patient.diet">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="dVegetarian">Vegetarian</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="dNonVeg" value="Non-vegetarian" v-model="patient.diet">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="dNonVeg">Non-vegetarian</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Fruit or Vegetable Intake:</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="fEveryday" value="Everyday" v-model="patient.fruit_veg_intake">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="fEveryday">Everyday</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="f3times" value="3-5 times a week" v-model="patient.fruit_veg_intake">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="f3times">3-5 times a week</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="faWeek" value="Once a week" v-model="patient.fruit_veg_intake">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="faWeek">Once a week</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="fNone" value="None" v-model="patient.fruit_veg_intake">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="fNone">None</label>        
        <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.fruit_veg_intake">
    </div>
      <hr><h4> Smoking</h4> <hr>
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Smoking:</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="sYes1" value="Yes" v-model="patient.smoking">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="sYes1">Yes (within 1 year), current</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="sYesf" value="Yes, Former" v-model="patient.smoking">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="sYesf">Yes, Former</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="sNo9" value="No" v-model="patient.smoking">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="sNo9">No</label> 
        <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.smoking">
    </div>

    <div v-if="patient.smoking=='Yes'" class="row mb-3">
      <label class="col-auto my-1 col-form-label" for="initiation_age">If yes, age of initiation:</label>
      <div class="col-auto my-1">
        <input type="number" id="initiation_age" class="form-control" v-model="patient.initiation_age">
      </div>
      <label class="col-auto my-1 col-form-label" for="cigarettes_per_day">Number of Cigarettes per day:</label>
      <div class="col-auto my-1">
        <input type="number" id="cigarettes_per_day" class="form-control" v-model="patient.cigarettes_per_day">
      </div>
    </div>

    <div v-if="patient.smoking=='Yes, Former'" class="row mb-3">
      <label class="col-auto my-1 col-form-label" for="cessation_age">If former, age of cessation:</label>
      <div class="col-auto my-1">
        <input type="number" id="cessation_age" class="form-control" v-model="patient.cessation_age">
      </div>
      <label class="col-auto my-1 col-form-label" for="cigarettes_per_day">Number of Cigarettes per day:</label>
      <div class="col-auto my-1">
        <input type="number" id="cigarettes_per_day" class="form-control" v-model="patient.cigarettes_per_day">
      </div>
    </div>

    <div v-if="patient.smoking=='Yes'|| patient.smoking=='Yes, Former'" class="row mb-3">
      <label class="col-auto my-2 col-form-label">Smoking Type:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Cigarette" value="Cigarette" v-model="patient.smoking_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Cigarette">Cigarette</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Bidi" value="Bidi" v-model="patient.smoking_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Bidi">Bidi</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="KhainiSurti" value="Khaini/Surti" v-model="patient.smoking_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="KhainiSurti">Khaini/Surti</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Zarda" value="Zarda" v-model="patient.smoking_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Zarda">Zarda</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Ghutka" value="Ghutka" v-model="patient.smoking_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Ghutka">Ghutka</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="StOthers" value="Others" v-model="patient.smoking_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="StOthers">Others</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.smoking_type">
    </div>

    <hr><h4> Alcohol </h4> <hr>
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Alcohol Intake:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="AlaDay" value="Once a day" v-model="patient.alcohol">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="AlaDay">Once a day</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="AlWeek" value="Once a week" v-model="patient.alcohol">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="AlWeek">Once a week</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="AlaMonth" value="Once a Month" v-model="patient.alcohol">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="AlaMonth">Once a Month</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="AlNo1" value="No" v-model="patient.alcohol">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="AlNo1">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.alcohol">
    </div>

    <div v-if="patient.alcohol !='No'" class="row mb-3">
      <label class="col-auto my-1 col-form-label" for="alcol_duration">Duration in years:</label>
      <div class="col-auto my-1">
        <input type="number" id="alcol_duration" class="form-control" v-model="patient.alcol_duration">
      </div>
      <label class="col-auto my-2 col-form-label">Alcohol Type:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="HomeMade1" value="Homemade" v-model="patient.alcol_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="HomeMade1">Homemade</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Branded1" value="Branded" v-model="patient.alcol_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Branded1">Branded</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="alTboth" value="Both" v-model="patient.alcol_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="alTboth">Both</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.alcol_type">
    </div>

    <hr><h4>Physical Activity</h4> <hr>
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Physical Activity:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="pAgt60" value=">60 min/day" v-model="patient.physical_activity">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="pAgt60">&gt;60 min/day</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="pA30" value="30-60 min/day" v-model="patient.physical_activity">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="pA30">30-60 min/day</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="pAlt30" value="<30 min/day" v-model="patient.physical_activity">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="pAlt30">&lt;30 min/day</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="pANo1" value="No" v-model="patient.physical_activity">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="pANo1">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.physical_activity">
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Own's vehicle:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="ownVyes" value="Yes" v-model="patient.own_vehicle">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="ownVyes">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="ownVno" value="No" v-model="patient.own_vehicle">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="ownVno">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.own_vehicle">
    </div>

    <div v-if="patient.own_vehicle=='Yes'" class="row mb-3">
      <label class="col-auto my-2 col-form-label">If YES, type of vehicle:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Bycycle" value="Bicycle" v-model="patient.vehicle_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Bycycle">Bicycle</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Motorcycle" value="Motorcycle" v-model="patient.vehicle_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Motorcycle">Motorcycle</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Car" value="Car" v-model="patient.vehicle_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Car">Car</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="vtOther" value="Other" v-model="patient.vehicle_type">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="vtOther">Other</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.vehicle_type">
    </div>

    <hr><h4>Family History</h4> <hr>
    <div class="row mb-3">
      <label class="col-auto my-1 col-form-label" for="family_member">No. of Family Members:</label>
      <div class="col-auto my-1">
        <input type="number" id="family_member" class="form-control" v-model="patient.family_member">
      </div>
      <label class="col-auto my-1 col-form-label" for="serial_no_household">Serial No. of Household Card:</label>
      <div class="col-auto my-1">
        <input type="text" id="serial_no_household" class="form-control" v-model="patient.serial_no_household">
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Kidney disease:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="fkdYes" value="Yes" v-model="patient.family_kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="fkdYes">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="fkdNo" value="No" v-model="patient.family_kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="fkdNo">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="fkdUnknown" value="Unknown" v-model="patient.family_kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="fkdUnknown">Unknown</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.family_kidney_disease">
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">High blood pressure:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.family_high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.family_high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Unknown" v-model="patient.family_high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Unknown</label>
          <input class="form-check-input m-3" type="radio" value="" v-model="patient.family_high_bp">
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Diabetes:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.family_diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.family_diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Unknown" v-model="patient.family_diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Unknown</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Heart attack or stroke:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.family_heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.family_heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Unknown" v-model="patient.family_heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Unknown</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Death of family members in last 5 years:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.family_mem_death_in_5_year">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.family_mem_death_in_5_year">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
    </div>

    <div v-if="patient.family_mem_death_in_5_year=='Yes'" class="row mb-3">
      <label class="col-auto my-2 col-form-label">Cause of death:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Unknown" v-model="patient.death_cause">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Unknown</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Known" v-model="patient.death_cause">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Known</label>
          <input class="form-check-input m-3" type="radio" value="" v-model="patient.death_cause">

        <label v-if="patient.death_cause=='Known'" class="col-auto my-1 col-form-label" for="death_by">If known, specify:</label>
        <div v-if="patient.death_cause=='Known'" class="col-auto my-1">
          <input type="text" id="death_by" class="form-control" v-model="patient.death_by">
        </div> 
    </div>

      <!-- <div v-if="errors.length" class="alert alert-danger my-3">
        <p>
        <b>Please correct the following error(s):</b>
        <ul>
          <li v-for="error in errors" :key="error">{{ error }}</li>
        </ul>
      </p>
      </div> -->

      <hr>

      <div class="row my-3">
      <button @click.prevent="checkForm(); next()" class="btn btn-primary btn-xl col col-lg-3 col-sm-6 col-xs-12">Go Next Page</button>
      </div>      
    </div>
</fieldset>

<fieldset class="" v-if="step == 2">
    <legend class="mb-3">Page 2 of 4: Screening</legend>
    <div class="container-fluid">
    <hr><h4>MEDICAL HISTORY</h4> <hr>
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Kidney disease:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Unknown" v-model="patient.kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Unknown</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">High blood pressure:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Unknown" v-model="patient.high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Unknown</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Diabetes:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Unknown" v-model="patient.diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Unknown</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Heart attack or stroke:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Unknown" v-model="patient.heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Unknown</label>
    </div>

    <hr><h3>PRESENT TREATMENT</h3> <hr>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Kidney disease:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.present_kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.present_kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Not Applicable" v-model="patient.present_kidney_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Not Applicable</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">High blood pressure:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.present_high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.present_high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Not Applicable" v-model="patient.present_high_bp">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Not Applicable</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Diabetes:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.present_diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.present_diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Not Applicable" v-model="patient.present_diabetes">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Not Applicable</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Heart attack or stroke:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Yes" v-model="patient.present_heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="No" v-model="patient.present_heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">No</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" value="Not Applicable" v-model="patient.present_heart_attack_stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label">Not Applicable</label>
    </div>

    <hr><h3>PHYSICAL EXAMINATION</h3> <hr>

    <div class="row mb-3">
      <label class="col-auto my-1 col-form-label" for="height">Height (cm):</label>
      <div class="col-auto my-1">
        <input type="text" id="height" class="form-control" v-model="patient.height">
      </div>
      <label class="col-auto my-1 col-form-label" for="weight"> &nbsp; Weight (in kg): &nbsp; </label>
      <div class="col-auto my-1">
        <input type="text" id="weight" class="form-control" v-model="patient.weight">
      </div>
    </div>
    <div class="row mb-3">
      <label class="col-auto my-1 col-form-label" for="waist_circum">Waist circumference (cm):</label>
      <div class="col-auto my-1">
        <input type="text" id="waist_circum" class="form-control" v-model="patient.waist_circum">
      </div>
      <label class="col-auto my-1 col-form-label" for="hip_cirum">Hip circumference (cm):</label>
      <div class="col-auto my-1">
        <input type="text" id="hip_cirum" class="form-control" v-model="patient.hip_cirum">
      </div>
    </div>

    <hr><h4>BLOOD PRESSURE</h4> <hr>

    <div class="row mb-3">
      <label class="col-auto my-1 col-form-label" for="systolic">Systolic (mmHg):</label>
      <div class="col-auto my-1">
        <input type="text" id="systolic" class="form-control" v-model="patient.systolic">
      </div>
      <label class="col-auto my-1 col-form-label" for="diastolic">Diastolic (mmHg):</label>
      <div class="col-auto my-1">
        <input type="text" id="diastolic" class="form-control" v-model="patient.diastolic">
      </div>
      <label class="col-auto my-1 col-form-label" for="pulse_rate">Pulse rate:</label>
      <div class="col-auto my-1">
        <input type="text" id="pulse_rate" class="form-control" v-model="patient.pulse_rate"></div> <span class="col-auto my-1 col-form-label">/beats per min</span>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Pulse:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="PRegular1" value="Regular" v-model="patient.pulse">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="PRegular1">Regular</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Irregr1" value="Irregular" v-model="patient.pulse">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Irregr1">Irregular</label>
    </div>

    <hr><h4>URINE ANALYSIS</h4> <hr>

    <div class="row mb-2">
      <label class="col-auto my-2 col-form-label">Leukocyte:</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uLeuNeg" value="Negative" v-model="patient.u_leukocyte">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uLeuNeg">Negative</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="UleuTrace" value="Trace" v-model="patient.u_leukocyte">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="UleuTrace">Trace</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uLeuPlus" value="+" v-model="patient.u_leukocyte">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uLeuPlus">+</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="Uleupluss" value="++" v-model="patient.u_leukocyte">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Uleupluss">++</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="Uleuplusss" value="+++" v-model="patient.u_leukocyte">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Uleuplusss">+++</label>
        <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.u_leukocyte">
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Nitrate:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="UNeg" value="Negative" v-model="patient.u_nitrate">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="UNeg">Negative</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NPost" value="Positive" v-model="patient.u_nitrate">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NPost">Positive</label>
    </div>

    <div class="row mb-2">
      <label class="col-auto my-2 col-form-label">Glucose:</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uGluNeg" value="Negative" v-model="patient.u_glucose">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uGluNeg">Negative</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="UgluTrace" value="Trace" v-model="patient.u_glucose">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="UgluTrace">Trace</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uGluPlus" value="+" v-model="patient.u_glucose">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uGluPlus">+</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uGluPluss" value="++" v-model="patient.u_glucose">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uGluPluss">++</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uGluPlusss" value="+++" v-model="patient.u_glucose">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uGluPlusss">+++</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uGluPlussse" value="++++" v-model="patient.u_glucose">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uGluPlussse">++++</label>
    </div>

    <div class="row mb-2">
      <label class="col-auto my-2 col-form-label">Hb:</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="hbUNeg" value="Negative" v-model="patient.u_hb">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="hbUNeg">Negative</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uHbTrace" value="Trace" v-model="patient.u_hb">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uHbTrace">Trace</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uHbPlus" value="+" v-model="patient.u_hb">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uHbPlus">+</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uHbPlus2" value="++" v-model="patient.u_hb">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uHbPlus2">++</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uHbPlus3" value="+++" v-model="patient.u_hb">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uHbPlus3">+++</label>
    </div>

    <div class="row mb-2">
      <label class="col-auto my-2 col-form-label">Protein:</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uProNeg" value="Negative" v-model="patient.u_protein">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uProNeg">Negative</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uProTrace" value="Trace" v-model="patient.u_protein">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uProTrace">Trace</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uProPlus" value="+" v-model="patient.u_protein">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uProPlus">+</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uProPlus2" value="++" v-model="patient.u_protein">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uProPlus2">++</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uProPlus3" value="+++" v-model="patient.u_protein">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uProPlus3">+++</label>
      <div class="col-auto my-2">
        <input class="form-check-input m-3" type="radio" id="uProPlus4" value="++++" v-model="patient.u_protein">
      </div>
        &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="uProPlus4">++++</label>
    </div>

    <hr><h4>ALBUMINURIA</h4> <hr>

    <div class="row mb-3">
      <div class="col-sm-6">
      <div class="row">
      <h4>Quantitative</h4>
      <label class="col-auto col-sm-4 my-1 col-form-label" for="qty_u_albumin">Urine Albumin (mg/dl)</label>
      <div class="col-auto col-sm-8 my-1">
        <input type="text" id="qty_u_albumin" class="form-control" v-model="patient.qty_u_albumin">
      </div>

      <label class="col-auto col-sm-4 my-1 col-form-label" for="qty_u_creatinine">Urine Creatinine (g/l)</label>
      <div class="col-auto col-sm-8 my-1">
        <input type="text" id="qty_u_creatinine" class="form-control" v-model="patient.qty_u_creatinine">
      </div>

      <label class="col-auto col-sm-4 my-1 col-form-label" for="qty_u_alb_creat">Albumin/Creatinine (mg/g)</label>
      <div class="col-auto col-sm-8 my-1">
        <input type="text" id="qty_u_alb_creat" class="form-control" v-model="patient.qty_u_alb_creat">
      </div>
      </div>
      </div>

      <div class="col-sm-6">
        <div class="row">
        <h4>Confirmatory Test</h4>
        <label class="col-auto col-sm-4 my-1 col-form-label" for="confm_u_albumin">Urine Albumin (mg/dl)</label>
        <div class="col-auto col-sm-8 my-1">
          <input type="text" id="confm_u_albumin" class="form-control" v-model="patient.confm_u_albumin">
        </div>

        <label class="col-auto col-sm-4 my-1 col-form-label" for="confm_u_creatinine">Urine Creatinine (g/l)</label>
        <div class="col-auto col-sm-8 my-1">
          <input type="text" id="confm_u_creatinine" class="form-control" v-model="patient.confm_u_creatinine">
        </div>

        <label class="col-auto col-sm-4 my-1 col-form-label" for="confm_u_alb_creat">Albumin/Creatinine (mg/g)</label>
        <div class="col-auto col-sm-8 my-1">
          <input type="text" id="confm_u_alb_creat" class="form-control" v-model="patient.confm_u_alb_creat">
        </div>
      </div>
      </div>
    </div>

    <hr><h4>BLOOD INVESTIGATION</h4> <hr>

    <div class="row mb-3">
      <div class="col-sm-6">
      <label class="col-auto my-1 col-form-label" for="serum_creatinine">Serum Creatinine (mg/dl)</label>
      <div class="col-auto my-1">
        <input type="text" id="serum_creatinine" class="form-control" v-model="patient.serum_creatinine">
      </div>

      <label class="col-auto my-1 col-form-label" for="fasting_glucose">Fasting Glucose (mg/dl)</label>
      <div class="col-auto my-1">
        <input type="text" id="fasting_glucose" class="form-control" v-model="patient.fasting_glucose">
      </div>

      <label class="col-auto my-1 col-form-label" for="hba1c">HbA1C (%)</label>
      <div class="col-auto my-1">
        <input type="text" id="hba1c" class="form-control" v-model="patient.hba1c">
      </div>
      </div>

      <div class="col-sm-6">
        <label class="col-auto my-1 col-form-label" for="tot_cholesterol">Total Cholesterol (mg/dl)</label>
        <div class="col-auto my-1">
          <input type="text" id="tot_cholesterol" class="form-control" v-model="patient.tot_cholesterol">
        </div>

        <label class="col-auto my-1 col-form-label" for="hdl_cholesterol">HDL Cholesterol (mg/dl)</label>
        <div class="col-auto my-1">
          <input type="text" id="hdl_cholesterol" class="form-control" v-model="patient.hdl_cholesterol">
        </div>

        <label class="col-auto my-1 col-form-label" for="triglyceride">Triglyceride (mg/dl)</label>
        <div class="col-auto my-1">
          <input type="text" id="triglyceride" class="form-control" v-model="patient.triglyceride">
        </div>

        <label class="col-auto my-1 col-form-label" for="ldl_cholesterol">LDL Cholesterol (mg/dl)</label>
        <div class="col-auto my-1">
          <input type="text" id="ldl_cholesterol" class="form-control" v-model="patient.ldl_cholesterol">
        </div>
      </div>
        <label class="col-auto my-1 col-form-label" for="gross_family_income">Gross family income</label>
        <label class="col-auto col-form-label my-1">NPR</label><div class="col-auto my-1"><input type="text" id="gross_family_income" class="form-control" v-model="patient.gross_family_income"></div><label class="col-auto col-form-label my-1">per annum</label>       
        
    </div>

    <hr> <h4>DIAGNOSIS</h4> <hr>
    <div class="row mb-3">
      <div class="col-auto my-2">
          <input class="form-check-input m-3" type="checkbox" id="daigo1" true-value="Chronic Kidney Disease" false-value="" v-model="patient.diagnosis1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="daigo1">Chronic Kidney Disease</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="checkbox" id="diago2" true-value="Hypertension" false-value="" v-model="patient.diagnosis2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="diago2">Hypertension</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="checkbox" id="diago3" true-value="Diabetes Mellitus" false-value="" v-model="patient.diagnosis3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="diago3">Diabetes Mellitus</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="checkbox" id="diago4" true-value="Cardiovascular Disease" false-value="" v-model="patient.diagnosis4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="diago4">Cardiovascular Disease</label>
    </div>

    <hr>


      
    <button @click.prevent="prev()" class="btn btn-info">Previous</button>
    <button @click.prevent="next()" class="btn btn-primary">Next</button>

    </div>
</fieldset>
<fieldset class="" v-if="step == 3">
    <legend class="mb-3">Page 3 of 4: Screening</legend>
    <div class="container-fluid">
    <hr> <h4>SELECTED MULTI-MORBIDITY ASSESSMENT <small> Conditions - Yes/No</small></h4><hr>
    
    <div class="row mb-3">
      <div class="col-sm-6">

        <div class="row">        
        <label class="col-auto my-2 col-form-label">Arthritis:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesArth" value="Yes" v-model="patient.arthritis">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesArth">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoArth" value="No" v-model="patient.arthritis">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoArth">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Acid Peptic Disease:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesAcidPep" value="Yes" v-model="patient.acid_peptic_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesAcidPep">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoAcidPep" value="No" v-model="patient.acid_peptic_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoAcidPep">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Chronic Back Ache:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesChronic" value="Yes" v-model="patient.chronic_back_ache">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesChronic">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoChronic" value="No" v-model="patient.chronic_back_ache">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoChronic">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Stroke:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesStroke" value="Yes" v-model="patient.stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesStroke">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoStroke" value="No" v-model="patient.stroke">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoStroke">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Blindness:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesBlind" value="Yes" v-model="patient.blindness">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesBlind">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoBlind" value="No" v-model="patient.blindness">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoBlind">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Deafness:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Yesdeaf" value="Yes" v-model="patient.deafness">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Yesdeaf">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoDeaf" value="No" v-model="patient.deafness">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoDeaf">No</label>
        </div>

        <div class="row">
        <label class="col-auto my-2 col-form-label">Alcohol disorder:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesAlDis" value="Yes" v-model="patient.alcohol_disorder">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesAlDis">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoAlDis" value="No" v-model="patient.alcohol_disorder">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoAlDis">No</label>        
        </div>        
        
      </div>

      <div class="col-sm-6">
        <div class="row">
        <label class="col-auto my-2 col-form-label">Epilepsy:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesEpilepsy" value="Yes" v-model="patient.epilepsy">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesEpilepsy">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoEpilep" value="No" v-model="patient.epilepsy">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoEpilep">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Thyroid Disease:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesThy" value="Yes" v-model="patient.thyroid_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesThy">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoThy" value="No" v-model="patient.thyroid_disease">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoThy">No</label>
        </div>
        <div class="row">
        <label class="col-auto col-form-label">Tuberculosis:</label>
        <div class="col-auto">
          <input class="form-check-input m-3" type="radio" id="YesTB" value="Yes" v-model="patient.tb">
        </div>
          &nbsp;<label class="col-auto col-sm-2 col-md-1 my-2 ml-3 col-form-label" for="YesTB">Yes</label>
        <div class="col-auto">
          <input class="form-check-input m-3" type="radio" id="NoTB" value="No" v-model="patient.tb">
        </div>
          &nbsp;<label class="col-auto ml-3 col-form-label" for="NoTB">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Filariasis:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesFilari" value="Yes" v-model="patient.filariasis">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesFilari">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoFilaria" value="No" v-model="patient.filariasis">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoFilaria">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Depression:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesDepre" value="Yes" v-model="patient.depression">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesDepre">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoDepre" value="No" v-model="patient.depression">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoDepre">No</label>
        </div>
        <div class="row">
        <label class="col-auto my-2 col-form-label">Cancer:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesCanc" value="Yes" v-model="patient.cancer">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesCanc">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoCanc" value="No" v-model="patient.cancer">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoCanc">No</label>
        </div>


      </div>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Have you ever been to private health center for these above condition?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesPvtHealth" value="Yes" v-model="patient.pvt_health_ctr_before">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesPvtHealth">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoPvtHealth" value="No" v-model="patient.pvt_health_ctr_before">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoPvtHealth">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Have you ever been to government health facilities for this condition?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesGovtH" value="Yes" v-model="patient.govt_health_facilities">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesGovtH">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoGovtH" value="No" v-model="patient.govt_health_facilities">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoGovtH">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto col-12 my-2 col-form-label">Have you ever consulted any of the following treatments for this condition?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Ayurveda" value="Ayurveda" v-model="patient.any_treatments">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Ayurveda">Ayurveda</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Traditional" value="Traditional/Faith Healer" v-model="patient.any_treatments">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Traditional">Traditional/Faith Healer</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="RamdevM" value="'Ramdev Medicine" v-model="patient.any_treatments">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="RamdevM">'Ramdev Medicine</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="HomeRe" value="Home Remedy" v-model="patient.any_treatments">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="HomeRe">Home Remedy</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Other78e" value="Others" v-model="patient.any_treatments">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Other78e">Others</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoAnyTre" value="No" v-model="patient.any_treatments">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoAnyTre">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto col-12 my-2 col-form-label">Are you covered under any community health insurance scheme?
        (Nepal government’s health insurance or other insurance) </label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesHealthIns" value="Yes" v-model="patient.health_insurance">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesHealthIns">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NohealthIns" value="No" v-model="patient.health_insurance">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NohealthIns">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Have you ever been diagnosed with COVID-19 in the past ?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesCovidB" value="Yes" v-model="patient.covid_19_before">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesCovidB">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoCovB" value="No" v-model="patient.covid_19_before">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoCovB">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Have your family member(s) ever been diagnosed with COVID-19 ?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesFaCov" value="Yes" v-model="patient.family_covid_19">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesFaCov">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoFaCov" value="No" v-model="patient.family_covid_19">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoFaCov">No</label>
    </div>

    <div v-if="patient.family_covid_19 =='Yes'" class="row mb-3">
        <label class="col-auto my-1 col-form-label" for="family_member_covid">If yes, who are the family member(s):</label>
        <div class="col-auto col-8 my-1">
          <input type="text" class="form-control" id="family_member_covid" v-model="patient.family_member_covid">
        </div>
        <label class="col-auto my-1 col-form-label" for="family_member_covid">What was outcome ?:</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Improved" value="Improved" v-model="patient.covid_outcome">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Improved">Improved</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="StilIll" value="Still illness" v-model="patient.covid_outcome">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="StilIll">Still illness</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="DeathCov" value="Dealth" v-model="patient.covid_outcome">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="DeathCov">Dealth</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.covid_outcome">
    </div>

    <hr><h4>PART 2 : LUNG DISEASE</h4><hr>

    <div class="row mb-3">
      <div class="col-sm-12">
        <div class="row border border-secondary">
        <div class="col-auto my-2 col-form-label">Lung disease</div>
        <label class="col-auto my-2 col-form-label">Chronic lung diseases</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesCronic" value="Yes" v-model="patient.cronic_lung">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="YesCronic">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoChronic" value="No" v-model="patient.cronic_lung">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoChronic">No</label>        
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-sm-12">
        <div class="row border border-secondary">
        <div class="col-auto my-2 col-form-label">Asthama</div>
        <label class="col-auto my-2 col-form-label">Ever had asthma?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="yesAsthama" value="Yes" v-model="patient.asthma">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="yesAsthama">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoAsthama" value="No" v-model="patient.asthma">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoAsthama">No</label>        
        </div>
      </div>
    </div>

    <div v-if="patient.cronic_lung =='Yes'|| patient.asthma =='Yes'"  class="row mb-3 border border-secondary">
      <div class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label">If yes, ever been admitted to hospital?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesHosAd" value="Yes" v-model="patient.adminted_hospital">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="YesHosAd">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoHosAdm" value="No" v-model="patient.adminted_hospital">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoHosAdm">No</label>        
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.adminted_hospital">
        </div>
      </div>

      <div class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label">Ever required steroids or antibiotics?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YeStAn" value="Yes" v-model="patient.steroids_antibiotics">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="YeStAn">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoStAn" value="No" v-model="patient.steroids_antibiotics">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoStAn">No</label>        
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.steroids_antibiotics">
        </div>
      </div>

      <div class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label">Currently on medication?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YeMedit" value="Yes" v-model="patient.on_medication">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="YeMedit">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoMedi" value="No" v-model="patient.on_medication">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoMedi">No</label>  
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.on_medication">
        </div>
      </div>

      <div v-if="patient.on_medication =='Yes'" class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label">If yes, number of years for inhalers</label>
        <label class="col-auto my-1 col-form-label" for="no_years_inhaler1">Inhaler 1:</label>
        <div class="col-auto my-1">
          <input type="text" class="form-control" id="no_years_inhaler1" v-model="patient.no_years_inhaler1">
        </div> &nbsp; &nbsp; &nbsp; 
        <label class="col-auto my-1 col-form-label" for="no_years_inhaler2">Inhaler 2:</label>
        <div class="col-auto my-1">
          <input type="text" class="form-control" id="no_years_inhaler2" v-model="patient.no_years_inhaler2">
        </div> 
        </div>
      </div>

    </div>

    <div class="row mb-3">
      <div class="col-sm-12">
        <div class="row border border-secondary">
        <div class="col-auto my-2 col-form-label">COPD /Emphysema</div>
        <label class="col-auto my-2 col-form-label">Ever got COPD/Emphysema?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="" value="Yes" v-model="patient.copd_emphysema">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="CopdEmp">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoCopdEm" value="No" v-model="patient.copd_emphysema">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoCopdEm">No</label>        
        </div>
      </div>
    </div>

    <div v-if="patient.copd_emphysema =='Yes'"  class="row mb-3 border border-secondary">
      <div class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label" for="diagnosed_yrs">If yes, when diagnosed</label>
        <div class="col-auto my-2">
          <input type="text" class="form-control" id="diagnosed_yrs" v-model="patient.diagnosed_yrs">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label">Years ago</label>        
        </div>
      </div>

      <div class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label">Currently on medication?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YescopdMed" value="Yes" v-model="patient.copd_medication">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="YescopdMed">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoCopdMed" value="No" v-model="patient.copd_medication">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoCopdMed">No</label>        
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.copd_medication">
        </div>
      </div>

      <div v-if="patient.copd_medication =='Yes'" class="col-sm-12">
          <div class="row">
          <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
          <label class="col-auto my-2 col-form-label" for="medication_name">If yes, what</label>
          <div class="col-auto my-2">
            <input type="text" class="form-control" id="medication_name" v-model="patient.medication_name">
          </div>&nbsp; &nbsp;
            <label class="col-auto my-2 ml-3 col-form-label"></label>
          </div>
      </div>

      <div class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label">Ever admitted to hospital with COPD?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesAdmHosCopd" value="Yes" v-model="patient.admitted_hos_with_copd">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="YesAdmHosCopd">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoAdmHosCopd" value="No" v-model="patient.admitted_hos_with_copd">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoAdmHosCopd">No</label>  
        </div>
      </div>

      <div v-if="patient.admitted_hos_with_copd =='Yes'" class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label" for="copd_admitted_at">If yes, when was the last time? (in A.D.)</label>
        <div class="col-auto my-1">
          <input type="date" class="form-control" id="copd_admitted_at" v-model="patient.copd_admitted_at">
        </div> &nbsp; &nbsp; &nbsp; 
        <label class="col-auto my-1 col-form-label" for="admitted_times">In total how many times?</label>
        <div class="col-auto my-1">
          <input type="text" class="form-control" id="admitted_times" v-model="patient.admitted_times">
        </div>        
        </div>
      </div>

      <div class="col-sm-12">
        <div class="row">
        <div class="col-auto my-2 col-form-label">&nbsp; &nbsp; &nbsp;</div>
        <label class="col-auto my-2 col-form-label">Ever required course of oral steroids or antibiotics?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesEvReqOrStAn" value="Yes" v-model="patient.ever_req_oral_steroids_antibiotics">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="YesEvRqOrStAn">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoEvReqOrStAn" value="No" v-model="patient.ever_req_oral_steroids_antibiotics">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoEvReqOrStAn">No</label>    
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.ever_req_oral_steroids_antibiotics">
        </div>
      </div>      

    </div>

    <div class="row mb-3">
      <div class="col-sm-12">
        <div class="row border border-secondary">
        <div class="col-auto my-2 col-form-label">Current medication</div>
        <label class="col-auto my-2 col-form-label">Use of inhalers?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesInhalerNow" value="Yes" v-model="patient.use_inhalers_now">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="YesInhalerNow">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoInhalersNow" value="No" v-model="patient.use_inhalers_now">
        </div>&nbsp; &nbsp;
          <label class="col-auto my-2 ml-3 col-form-label" for="NoInhalersNow">No</label>        
        </div>
      </div>

      <div v-if="patient.use_inhalers_now =='Yes'" class="col-sm-12">
        <div class="row border border-secondary">
        <div class="col-auto my-2 col-form-label"> &nbsp; &nbsp; &nbsp; </div>
        <label class="col-auto my-2 col-form-label" for="whichInhal">If yes, which</label>
        <div class="col-auto my-2">
          <input class="form-control" type="text" id="whichInhal" v-model="patient.which_inhaler">
        </div>&nbsp; &nbsp;
        <label class="col-auto my-2 ml-3 col-form-label" for="inhaler_fqy1">Frequency</label>
        <div class="col-auto my-2">
          <input class="form-control" type="text" id="inhaler_fqy1" v-model="patient.inhaler_fqy">
        </div>&nbsp; &nbsp;
        <label class="col-auto my-2 ml-3 col-form-label" for="inhaler_duration">Since how long?</label>
        <div class="col-auto my-2">
          <input class="form-control" type="text" id="inhaler_duration" v-model="patient.inhaler_duration">
        </div>
        </div>
      </div>

    </div>

    <div class="row mb-3">
      <div class="col-sm-12">
        <div class="row border border-secondary">
        <div class="col-auto my-2 col-form-label">Oxygen saturation (%)</div>
        <label class="col-auto my-2 col-form-label" for="oxygen_saturation">Breathing atmospheric air, after &gt;15 minutes of resting:</label>
        <div class="col-auto my-2">
          <input class="form-control" type="text" id="oxygen_saturation" v-model="patient.oxygen_saturation">
        </div>     
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-sm-12">
        <div class="row border border-secondary">
        <label class="col-auto col-xs-12  my-2 col-form-label align-items-center">Spirometry Assessment</label>

            <label class="col-auto col-xs-12 my-2 col-form-label" for="fev1">(i) FEV1 (L):</label>
            <div class="col-auto col-xs-12 my-2">
              <input class="form-control" type="text" id="fev1" v-model="patient.fev1">
            </div>
            <label class="col-auto col-xs-12 my-2 col-form-label" for="fev1_predicted">%predicted</label>
            <div class="col-auto col-xs-12 my-2">
              <input class="form-control" type="text" id="fev1_predicted" v-model="patient.fev1_predicted">
            </div>

            <label class="col-auto my-2 col-form-label" for="fvc">(ii) FVC (L):</label>
            <div class="col-auto my-2">
              <input class="form-control" type="text" id="fvc" v-model="patient.fvc">
            </div>
            <label class="col-auto my-2 col-form-label" for="fvc_predicted">%predicted</label>
            <div class="col-auto my-2">
              <input class="form-control" type="text" id="fvc_predicted" v-model="patient.fvc_predicted">
            </div>

            <div class="row">
            <label class="col-auto my-2 col-form-label" for="fev1_fvc_ratio">(iii) FEV1/FVC ratio:</label>
            <div class="col-auto my-2">
              <input class="form-control" type="text" id="fev1_fvc_ratio" v-model="patient.fev1_fvc_ratio">
            </div>
            </div>

        </div>
      </div>
    </div>


      <button @click.prevent="prev()" class="btn btn-info">Previous</button>
      <button @click.prevent="next()" class="btn btn-info">Next</button>
    </div>
</fieldset>

<fieldset class=""  v-if="step == 4">
  <legend class="mb-3">Page 4 of 4: Screening</legend>
  <hr> <h4>MRC Chronic Bronchitis Questionnaire</h4> <hr>
  <div class="container-fluid">

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">1. Do you usually cough first thing in the morning in the winter? (Y/N)</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Yescough_first_mrng_winter" value="Yes" v-model="patient.cough_first_mrng_winter">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Yescough_first_mrng_winter">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Nocough_first_mrng_winter" value="No" v-model="patient.cough_first_mrng_winter">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Nocough_first_mrng_winter">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">2. Do you usually cough during the day – or at night – in the winter?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Yescough_day_nigh" value="Yes" v-model="patient.cough_day_night_winter">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Yescough_day_nigh">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Nocough_day_night" value="No" v-model="patient.cough_day_night_winter">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Nocough_day_night">No</label>
    </div>

    <div v-if="patient.cough_first_mrng_winter=='Yes' || patient.cough_day_night_winter=='Yes'" >
      <h4>If YES to 1 or 2</h4>
      
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">3. Do you cough like this on most days for as much as three months each year</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Yes3mthYear" value="Yes" v-model="patient.cough_3mths_a_year">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Yes3mthYear">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="No3mthsYear" value="No" v-model="patient.cough_3mths_a_year">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="No3mthsYear">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.cough_3mths_a_year">
    </div>
      
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">4. Do you usually bring up any phlegm form your chest first thing in the morning in the winter</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesPhlegmMg" value="Yes" v-model="patient.bring_phlegm_form_mrng">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesPhlegmMg">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoPhelgmMg" value="No" v-model="patient.bring_phlegm_form_mrng">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoPhelgmMg">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.bring_phlegm_form_mrng">
    </div>
      
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">5. Do you usually bring up any phlegm from your chest during the day – or at night – in the winter?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesPhelgmDyNt" value="Yes" v-model="patient.bring_phlegm_form_day_ngt">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesPhelgmDyNt">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoPhelgmDyNt" value="No" v-model="patient.bring_phlegm_form_day_ngt">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoPhelgmDyNt">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.bring_phlegm_form_day_ngt">
    </div>

    </div>

    <div v-if="patient.bring_phlegm_form_mrng=='Yes' || patient.bring_phlegm_form_day_ngt=='Yes'" >
      <h4>If YES to 4 or 5</h4>
      
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">6. Do you bring up phlegm like this on most days for as much as three month each year?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesPlg3mgaYr" value="Yes" v-model="patient.bring_phlegm_like_3mth_a_year">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesPlg3mgaYr">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoPg3mtaYr" value="No" v-model="patient.bring_phlegm_like_3mth_a_year">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoPg3mtaYr">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.bring_phlegm_like_3mth_a_year">
    </div>
      
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">7. In the past three years have you had a period of (increased) cough and phlegm lasting for three weeks or more?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Yes3YrPg3Wk" value="Yes" v-model="patient.past_3yr_cough_phlegm_3wk">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Yes3YrPg3Wk">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="No3YrPg3Wk" value="No" v-model="patient.past_3yr_cough_phlegm_3wk">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="No3YrPg3Wk">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.past_3yr_cough_phlegm_3wk">
    </div>
    <div v-if="patient.past_3yr_cough_phlegm_3wk=='Yes'">
      <h3>IF YES</h3>
    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">Have you had more than one such period?</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesHmT1" value="Yes" v-model="patient.had_more_than_one">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesHmT1">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoMT1" value="No" v-model="patient.had_more_than_one">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoMT1">No</label>
          <input class="form-check-input m-3" type="radio" id="" value="" v-model="patient.had_more_than_one">
    </div>
    </div>

    </div>

    <hr> <h3>Breathless Questionnaire</h3> <hr>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">I only get breathless with strenuous exercise.</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesBreStre" value="Yes" v-model="patient.breathless_with_strenuous">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesBreStre">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoBreStre" value="No" v-model="patient.breathless_with_strenuous">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoBreStre">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">I get short of breath when hurrying on the level or walking up a slight hill.</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesWalkUp" value="Yes" v-model="patient.short_breath_on_walking_up">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesWalkUp">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoWalkUp" value="No" v-model="patient.short_breath_on_walking_up">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoWalkUp">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">I walk slower than people of the same age on the level because of breathlessness or have to stop for breath when walking at my own-pace on the level.</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesIslow" value="Yes" v-model="patient.iam_slower_walker">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesIslow">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoISlow" value="No" v-model="patient.iam_slower_walker">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoISlow">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">I stop for breath after walking about 100 yards or after a few minutes on the level.</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesIsStop" value="Yes" v-model="patient.istop_breath">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesIsStop">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoIsStop" value="No" v-model="patient.istop_breath">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoIsStop">No</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label">I am too breathless to leave the house.</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="YesTlHse" value="Yes" v-model="patient.iam_breathless_to_leave_house">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="YesTlHse">Yes</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="NoTlHse" value="No" v-model="patient.iam_breathless_to_leave_house">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="NoTlHse">No</label>
    </div>

    <hr> <h4>Main fuel used for cooking (fuels used on most days of a typical week)</h4> <hr>
    
    <h5 class="text-decoration-underline">Current 1:</h5>

    <div class="row mb-3">
      <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Elect1" value="Electricity" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Elect1">Electricity</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="lpg" value="LPG" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="lpg">LPG</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="gobar" value="Gobar gas" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="gobar">Gobar gas</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Kerosene" value="Kerosene" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Kerosene">Kerosene</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Charcoal" value="Charcoal" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Charcoal">Charcoal</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Coal" value="Coal/coke" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Coal">Coal/coke</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Dung" value="Dung cake" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Dung">Dung cake</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Wood" value="Wood" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Wood">Wood</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="CropRes" value="Crop residues" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="CropRes">Crop residues</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="ful1Other" value="Others" v-model="patient.main_fuel1">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="ful1Other">Others</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label" for="fuel1_yr">Current Duration 1: (for current fuel 1 in years)</label>
      <div class="col-auto my-2">
        <input class="form-control" type="text" id="fuel1_yr" v-model="patient.fuel1_yr">
      </div>
    </div>  

    <h5 class="text-decoration-underline">Current 2:</h5>
    <div class="row mb-3">
      <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Elect12" value="Electricity" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Elect12">Electricity</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="lpg12" value="LPG" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="lpg12">LPG</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="gobar12" value="Gobar gas" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="gobar12">Gobar gas</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Kerosene2" value="Kerosene" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Kerosene2">Kerosene</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Charcoal2" value="Charcoal" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Charcoal2">Charcoal</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Coal2" value="Coal/coke" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Coal2">Coal/coke</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Dung2" value="Dung cake" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Dung2">Dung cake</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Wood2" value="Wood" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Wood2">Wood</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="CropRes2" value="Crop residues" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="CropRes2">Crop residues</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="ful2Other2" value="Others" v-model="patient.main_fuel2">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="ful2Other2">Others</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label" for="fuel2_yr">Current Duration 2: (for current fuel 2 in years)</label>
      <div class="col-auto my-2">
        <input class="form-control" type="text" id="fuel2_yr" v-model="patient.fuel2_yr">
      </div>
    </div>  

    <h5 class="text-decoration-underline">Previously 1:</h5>

    <div class="row mb-3">
      <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Elect3" value="Electricity" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Elect3">Electricity</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="lpg3" value="LPG" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="lpg3">LPG</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="gobar3" value="Gobar gas" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="gobar3">Gobar gas</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Kerosene3" value="Kerosene" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Kerosene3">Kerosene</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Charcoa3" value="Charcoal" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Charcoa3">Charcoal</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Coal3" value="Coal/coke" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Coal3">Coal/coke</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Dung3" value="Dung cake" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Dung3">Dung cake</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Wood3" value="Wood" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Wood3">Wood</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="CropRes3" value="Crop residues" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="CropRes3">Crop residues</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="ful1Other3" value="Others" v-model="patient.main_fuel3">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="ful1Other3">Others</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label" for="fuel3_yr">Previous Duration 1: (for previous fuel 1 in years)</label>
      <div class="col-auto my-2">
        <input class="form-control" type="text" id="fuel3_yr" v-model="patient.fuel3_yr">
      </div>
    </div>  

    <h5 class="text-decoration-underline">Previously 2:</h5>
    <div class="row mb-3">
      <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Elect4" value="Electricity" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Elect4">Electricity</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="lpg124" value="LPG" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="lpg124">LPG</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="gobar124" value="Gobar gas" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="gobar124">Gobar gas</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Kerosene24" value="Kerosene" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Kerosene24">Kerosene</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Charcoal4" value="Charcoal" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Charcoal4">Charcoal</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Coal4" value="Coal/coke" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Coal4">Coal/coke</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Dung4" value="Dung cake" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Dung4">Dung cake</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="Wood4" value="Wood" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="Wood4">Wood</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="CropRes4" value="Crop residues" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="CropRes4">Crop residues</label>
        <div class="col-auto my-2">
          <input class="form-check-input m-3" type="radio" id="ful2Other4" value="Others" v-model="patient.main_fuel4">
        </div>
          &nbsp;<label class="col-auto my-2 ml-3 col-form-label" for="ful2Other4">Others</label>
    </div>

    <div class="row mb-3">
      <label class="col-auto my-2 col-form-label" for="fuel4_yr">Previous Duration 2: (for previous fuel 2 in years)</label>
      <div class="col-auto my-2">
        <input class="form-control" type="text" id="fuel4_yr" v-model="patient.fuel4_yr">
      </div>
    </div>  



  <button @click.prevent="prev()" class="btn btn-info">Previous</button>
  <button :disabled="errors.length" class="btn btn-success">Save</button>


  </div>
</fieldset>

</form>

    <div v-if="errors.length" class="alert alert-danger my-3">
        <p>
        <b>Please correct the following error(s):</b>
        <ul>
          <li v-for="error, in errors" :key="error">{{ error }}</li>
        </ul>
      </p>
    </div>

</div>

Data: {{ patient }}

</template>

<script>
export default {
    data() {
        return {
            patient: {},
            errors: [],
            step:1,
            // created_by:'',
            // checkError:true,
        }
    },
    created() {        
      // this.patient.created_by = window.Laravel.user.id;
      this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/patients/${this.$route.params.id}`)
                .then(response => {
                    this.patient = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        checkForm: function () {
        if (this.patient.firstname && this.patient.lastname && this.patient.address) {
          this.errors = [];
          return true;          
        } 
        this.errors = [];
        if (!this.patient.firstname) {
        this.errors.push('First Name required.');
        }
        if (!this.patient.lastname) {
        this.errors.push('Last Name required.');
        }
        if (!this.patient.address) {
          this.errors.push('Address required.');
        }
        // return false;
        // if (!this.patient.type) {
        //   this.errors.push('Type required.');
        // }
        },
         prev() {
           this.step--;
       },
       next() {
        this.step++;
       }, 
        updatePatient() {
          console.log(this.patient);
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.put(`/api/patients/${this.$route.params.id}`, this.patient)
                    .then(response => {
                        // console.log(response.data)
                        this.$router.push({name: 'patients'})
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/lsyt/login";
        }
        next();
    }
}
</script>

<style scoped>
.form-check-input[type=radio] {
    border-radius: 30%;
}
.form-check-input {
    width: 1.5rem;
    height: 1.5rem;
}
</style>
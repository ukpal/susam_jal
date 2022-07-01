<style type="text/css">
	table, td, th {
        border: 1px solid;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    td{
        padding: 5px 0 5px 5px;
    }
</style>
<div class="container">

	<table>
		<tr>
            <td>Ward no.</td>
            <td>{{$data->ward_no}}</td>
        </tr>
		<tr>
            <td>Head of the family</td>
            <td>{{$data->head_of_family}}</td>
        </tr>
		<tr>
            <td>Father Name</td>
            <td>{{$data->father_name}}</td>
        </tr>
		<tr>
            <td>Husband Name</td>
            <td>{{$data->husband_name}}</td>
        </tr>
		<tr>
            <td>Contact No.</td>
            <td>{{$data->contact_number}}</td>
        </tr>
		<tr>
            <td>Nature of resident</td>
            <td>{{$data->nature_of_resident}}</td>
        </tr>
		<tr>
            <td>Holding Number</td>
            <td>{{$data->holding_number}}</td>
        </tr>
		<tr>
            <td>Permanent Resident</td>
            <td>{{$data->permanent_resident}}</td>
        </tr>
		<tr>
            <td>Permanent resident in rented house</td>
            <td>{{$data->permanent_resident_rented}}</td>
        </tr>
		<tr>
            <td>Temporary resident in rented house</td>
            <td>{{$data->temporary_resident_rented}}</td>
        </tr>
		<tr>
            <td>Other Type Resident</td>
            <td>{{$data->other_type_resident}}</td>
        </tr>
		<tr>
            <td>No. of family members</td>
            <td>{{$data->family_members}}</td>
        </tr>
		<tr>
            <td>Only Old Age Family</td>
            <td>{{$data->old_age_family}}</td>
        </tr>
		<tr>
            <td>No. of members (Age between 59 to 20)</td>
            <td>{{$data->members_59_to_20}}</td>
        </tr>
		<tr>
            <td>No. of members (Age between 19 to 20)</td>
            <td>{{$data->members_19_to_20}}</td>
        </tr>
		<tr>
            <td>No. of members (Age below 10)</td>
            <td>{{$data->members_below_10}}</td>
        </tr>
		<tr>
            <td>No. of female members (Age between 14 to 50)</td>
            <td>{{$data->females_14_to_50}}</td>
        </tr>
		<tr>
            <td>Building category</td>
            <td>{{$data->building_category}}</td>
        </tr>
		<tr>
            <td>Toilet type</td>
            <td>{{$data->toilet_type}}</td>
        </tr>
		<tr>
            <td>If, has any septic tank in HHL, Last year of cleaning</td>
            <td>{{$data->septic_tank_cleaning_year}}</td>
        </tr>
		<tr>
            <td>If there have septic tank with sock pit</td>
            <td>{{$data->septic_tank_with_sock_pit}}</td>
        </tr>
		<tr>
            <td>Water connection to HH</td>
            <td>{{$data->water_connection}}</td>
        </tr>
		<tr>
            <td>Member of bulk waste generator (BWG)</td>
            <td>{{$data->bulk_waste_generator}}</td>
        </tr>
		<tr>
            <td>Waste bin received from Municipality, Corporation, NAA</td>
            <td>{{$data->waster_bin_received}}</td>
        </tr>
		<tr>
            <td>Best time for waste collection</td>
            <td>{{$data->waste_collection_time}}</td>
        </tr>
		<tr>
            <td>Present waste collection system is in there?</td>
            <td>{{$data->present_waste_collection}}</td>
        </tr>
		<tr>
            <td>Approx Bio-Degradable (Wet) waste generation</td>
            <td>{{$data->wet_waste_generation}} kg</td>
        </tr>
		<tr>
            <td>Approx Bio-Degradable (Dry) waste generation</td>
            <td>{{$data->dry_waste_generation}} kg</td>
        </tr>
		<tr>
            <td>Any scope of bio-medical waste generation?</td>
            <td>{{$data->bio_medical_waste_scope}}</td>
        </tr>
		<tr>
            <td>Residence with commercial/office setup</td>
            <td>{{$data->residence_of_commercial}}</td>
        </tr>
		<tr>
            <td>Orient on municipal waste collection system?</td>
            <td>{{$data->orient_on_municipal_waste_collection}}</td>
        </tr>
		<tr>
            <td>Orient on source segregation?</td>
            <td>{{$data->orient_on_source_segregation}}</td>
        </tr>
		<tr>
            <td>Name of assign “Nirmal Sathi”</td>
            <td>{{$data->name_of_assign}}</td>
        </tr>
		<tr>
            <td>Other Comments</td>
            <td>{{$data->other_comments}}</td>
        </tr>
		<tr>
            <td>Latitude</td>
            <td>{{$data->latitude}}</td>
        </tr>
		<tr>
            <td>Longitude</td>
            <td>{{$data->longitude}}</td>
        </tr>
	</table>
</div>
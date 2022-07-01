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
            <td>{{$data->ward_number}}</td>
        </tr>
		<tr>
            <td>Location/Market Name:</td>
            <td>{{$data->location_name}}</td>
        </tr>
		<tr>
            <td>Business/Institution Name</td>
            <td>{{$data->business_name}}</td>
        </tr>
		<tr>
            <td>Business owner/Head of institution name</td>
            <td>{{$data->business_owner}}</td>
        </tr>
		<tr>
            <td>Category</td>
            <td>{{$data->category}}</td>
        </tr>
		<tr>
            <td>Address (in short)</td>
            <td>{{$data->short_address}}</td>
        </tr>
		<tr>
            <td>Contact Number</td>
            <td>{{$data->contact_number}}</td>
        </tr>
		<tr>
            <td>Nature of business/Institution</td>
            <td>{{$data->nature_of_business}}</td>
        </tr>
		<tr>
            <td>Office/Type of business/Institution</td>
            <td>{{$data->type_of_business}}</td>
        </tr>
		<tr>
            <td>Total no. of employee/staffs/students/service receiver/others</td>
            <td>{{$data->total_employee}}</td>
        </tr>
		<tr>
            <td>Toilet type</td>
            <td>{{$data->toilet_type}}</td>
        </tr>
		<tr>
            <td>Any retrofitting of toilet required</td>
            <td>{{$data->retrofitting_toilet}}</td>
        </tr>
		<tr>
            <td>In shop/Market/Institution everyday quantity of waste generated (in Kg.)</td>
            <td>{{$data->generated_waste}}</td>
        </tr>
		<tr>
            <td>Vegetable Waste</td>
            <td>{{$data->vegetable_waste}}</td>
        </tr>
		<tr>
            <td>Fish waste generated per day</td>
            <td>{{$data->fish_waste}}</td>
        </tr>
		<tr>
            <td>Meat waste generated per day</td>
            <td>{{$data->meat_waste}}</td>
        </tr>
		<tr>
            <td>Present practices of waste disposal</td>
            <td>{{$data->present_waste_practices}}</td>
        </tr>
		<tr>
            <td>Municipality provide waste collection been</td>
            <td>{{$data->municipality_waste_bin}}</td>
        </tr>
		<tr>
            <td>It is adequate</td>
            <td>{{$data->it_is_adequate}}</td>
        </tr>
		<tr>
            <td>Dustbin available at Institution/Shop/Office</td>
            <td>{{$data->dustbin_available}}</td>
        </tr>
		<tr>
            <td>Institution/Shop/Office: Willing to pay for taking the wastage materials</td>
            <td>{{$data->willing_to_pay_for_taking_waste}}</td>
        </tr>
		<tr>
            <td>Proposed time of waste collection from your Institution/shop/office</td>
            <td>{{$data->waste_collection_time}}</td>
        </tr>
		<tr>
            <td>Carry bag used for products/services</td>
            <td>{{$data->carry_bag_used}}</td>
        </tr>
		<tr>
            <td>Customer/Service receiver can give money for carry bags of your product/services</td>
            <td>{{$data->can_give_money_for_carry}}</td>
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
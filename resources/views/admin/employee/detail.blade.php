<table class="table bg-light">
  @if(isset($employees) && $employees != null)
    <tbody >

    <tr>
        <th scope="row">ID</th>
        <td>{{$employees->id}}</td>

    </tr>
    <tr>
        <th scope="row">First Name</th>
        <td>{{$employees->first_name}}</td>
    </tr> <tr>
        <th scope="row">Last Name</th>
        <td>{{$employees->last_name}}</td>
    </tr>
    <tr>
        <th scope="row">Email</th>
        <td>{{$employees->email}}</td>
    </tr>
    <tr>
        <th scope="row">Company Logo</th>
        <td><img src="{{asset($employees->company->logo)}}" width="250" height="auto"></td>
    </tr>
    <tr>
        <th scope="row">Company Name</th>
        <td>{{$employees->company->name}}</td>
    </tr>
    <tr>
        <th scope="row">Phone Number</th>
        <td>{{$employees->phone_number}}</td>
    </tr>
    @endif
    </tbody>
</table>

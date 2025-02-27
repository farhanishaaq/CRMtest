<table class="table bg-light">
  @if(isset($company) && $company != null)
    <tbody >

    <tr>
        <th scope="row">ID</th>
        <td>{{$company->id}}</td>

    </tr>
    <tr>
        <th scope="row">Name</th>
        <td>{{$company->name}}</td>
    </tr>
    <tr>
        <th scope="row">Email</th>
        <td>{{$company->email}}</td>
    </tr>
    <tr>
        <th scope="row">Logo</th>
        <td><img src="{{asset($company->logo)}}" width="250" height="auto"></td>
    </tr>  <tr>
        <th scope="row">Website</th>
        <td>{{$company->website}}</td>
    </tr>
    @endif
    </tbody>
</table>

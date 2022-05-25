<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap-responsive.min.css" />
<link href="{{asset("assets/admin")}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
@include("home.message")


<table class="table table-bordered data-table">
    <tr>
        <td>ID</td>
        <td>{{ $data->id }}</td>
    </tr>
    <tr>
        <td>Name</td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ $data->email }}</td>
    </tr>
    <div class="control-group">
        <div class="controls">
            <table>
                <tr>
                    <td style="text-align: center" colspan="2">Roles</td>
                </tr>
                @foreach($data->roles as $rl)
                    <tr>
                        <td style="width:200px;">{{$rl->name}}</td>
                        <td><a href="{{ route("admin_user_role_delete",['user_id'=>$data->id,'role_id'=>$rl->id]) }}"
                               onclick="return confirm('Are You Sure To Delete')">Delete</a></td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
    <form action="{{ route('admin_user_role_add',['user_id'=>$data->id]) }}" method="post">
        @csrf
        <select  class="form-control"  name="role_id" id="">
            @foreach($datalist as $rl)
                @if(!$data->roles->pluck('name')->contains($rl->name))
                    <option value="{{$rl->id}}">{{$rl->name}}</option>

                @else
                    <option disabled value="{{$rl->id}}">{{$rl->name}}</option>
                @endif
            @endforeach
        </select>
        <button class="btn btn-success">Add Role</button>
    </form>
</table>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap-responsive.min.css" />
<link href="{{asset("assets/admin")}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
@include("home.message")


<h3 style="margin: 10px;text-align: center;">User Detail</h3>
<form style="margin:20px;" enctype="multipart/form-data" action="{{ route('admin_user_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
    @csrf
    <div class="control-group">
        <label class="control-label">Name</label>
        <div class="controls">
            <input value="{{$data->name}}" required type="text" name="name" class="span6" placeholder="Name" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Email</label>
        <div class="controls">
            <input required value="{{$data->email}}" type="text" name="email" class="span6" placeholder="Email" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Phone</label>
        <div class="controls">
            <input value="{{$data->phone}}" type="text" name="phone" class="span6" placeholder="Phone"  />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Adress</label>
        <div class="controls">

            <input value="{{$data->adress}}" type="text" name="adress" class="span6" placeholder="Adress"  />
        </div>
    </div>
   {{-- <div class="control-group">
        <label class="control-label">Image</label>
        <div class="controls">
            <input  name="profile_photo_path" class="span6" type="file" />
        </div>
        <div class="controls">
        @if($data->profile_photo_path)
            <img width="150px" style="margin:10px;" src="{{ Storage::url($data->profile_photo_path) }}" alt="">
        @endif
        </div>
    </div>--}}
    <div class="control-group">
        <label class="control-label"><b>Roles</b></label>
        <div class="controls">
            <table>
                @foreach($data->roles as $rl)
                    <tr>
                        <td>{{$rl->name}}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
    <br>
    <div class="form-actions">
        <button style="margin-bottom:10px;" type="submit" class="btn btn-success">User Update</button>
    </div>
</form>


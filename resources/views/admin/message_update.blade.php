<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap-responsive.min.css" />
<link href="{{asset("assets/admin")}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
@include("home.message")


<h3 style="margin: 10px;text-align: center;">Message Detail</h3>
<form style="margin:20px;" enctype="multipart/form-data" action="{{ route('admin_message_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
    @csrf
    <div class="control-group">
        <label class="control-label">Name</label>
        <div class="controls">
            <input value="{{ $data->name }}"  type="text" disabled class="span11" placeholder="Name" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Phone</label>
        <div class="controls">
            <input value="{{ $data->phone }}"  type="text" disabled class="span11" placeholder="Phone" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Email</label>
        <div class="controls">
            <input  value="{{ $data->email }}" type="text" disabled class="span11" placeholder="email"  />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Subject</label>
        <div class="controls">
            <input  value="{{ $data->subject }}" type="text" disabled class="span11" placeholder="subject"  />
        </div>
    </div>
    {{--<div class="control-group">
        <label class="control-label">IP Adress</label>
        <div class="controls">
            <input  value="{{ $data->ip }}" type="text" disabled class="span11" placeholder="ip adress"  />
        </div>
    </div>--}}
    <div class="control-group">
        <label class="control-label">Message</label>
        <div class="controls">
            <textarea disabled class="span11"  > {{ $data->message }}
            </textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Note</label>
        <div class="controls">
            <input  value="{{ $data->note }}" type="text" name="note" class="span11" placeholder="note"  />
        </div>
    </div>
    <div class="control-group" >
        <label class="control-label">Status</label>
        <div class="controls">
            <select class="span11" name="status" >
                <option value="Read">Read</option>
                @if($data->status=="New")
                    <option selected value="New">New</option>
                @else
                    <option value="New">New</option>
                @endif
            </select>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Update</button>
    </div>


</form>

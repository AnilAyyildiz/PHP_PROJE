<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap-responsive.min.css" />
<link href="{{asset("assets/admin")}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
@include("home.message")
<h3 style="margin: 10px;text-align: center;">Review Detail</h3>
<form style="margin:20px;" enctype="multipart/form-data" action="{{ route('admin_review_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
    @csrf
    <div class="control-group">
        <label class="control-label">Name</label>
        <div class="controls">
            <input value="{{ $data->user->name }}"  type="text" disabled class="span11" placeholder="Name" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Content</label>
        <div class="controls">
            <input value="{{ $data->product->title }}"  type="text" disabled class="span11" placeholder="Content" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Subject</label>
        <div class="controls">
            <input  value="{{ $data->subject }}" type="text" disabled class="span11" placeholder="subject"  />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Review</label>
        <div class="controls">
            <textarea disabled class="span11"  > {{ $data->review }}
            </textarea>
        </div>
    </div>
    <div class="control-group" >
        <label class="control-label">Status</label>
        <div class="controls">
            <select class="span11" name="status" >
                <option value="True">True</option>
                <option value="False">False</option>
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

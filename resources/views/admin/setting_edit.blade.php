@extends("layouts.admin")
@section('title','Admin Content')
@section("js")
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
@endsection
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_setting")}}" class="current">Setting</a> </div>
            <h1>Setting</h1>
        </div>



        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" action="{{ route('admin_setting_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="widget-box">
                                    <div class="widget-title">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#General">General</a></li>
                                            <li><a data-toggle="tab" href="#Smtp">Smtp</a></li>
                                            <li><a data-toggle="tab" href="#Social">Social</a></li>
                                            <li><a data-toggle="tab" href="#Aboutus">Aboutus</a></li>
                                            <li><a data-toggle="tab" href="#Contact">Contact</a></li>
                                            <li><a data-toggle="tab" href="#Referance">Referance</a></li>
                                        </ul>
                                    </div>
                                    <div class="widget-content tab-content">
                                        <div id="General" class="tab-pane active">
                                            <div class="control-group">
                                                <label class="control-label">Title</label>
                                                <div class="controls">
                                                    <input value="{{$data->title}}" required type="text" name="title" class="span11" placeholder="Title" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Keywords</label>
                                                <div class="controls">
                                                    <input value="{{$data->keywords}}" type="text" name="keywords" class="span11" placeholder="Keywords" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Description</label>
                                                <div class="controls">
                                                    <input value="{{$data->description}}" type="text" name="description" class="span11" placeholder="Description"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Company</label>
                                                <div class="controls">
                                                    <input value="{{$data->company}}" type="text" name="company" class="span11" placeholder="company"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Adress</label>
                                                <div class="controls">
                                                    <input value="{{$data->adress}}" type="text" name="adress" class="span11" placeholder="adress"  />
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="normal" class="control-label">Phone</label>
                                                <div class="controls">
                                                    <input name="phone" type="text" id="mask-phone" class="span8 mask text">
                                                    <span class="help-block blue span8">(999) 999-9999</span> </div>
                                            </div>
                                            <div class="control-group">
                                                <label for="normal" class="control-label">Fax</label>
                                                <div class="controls">
                                                    <input name="fax" type="text" id="mask-phone" class="span8 mask text">
                                                    <span class="help-block blue span8">(999) 999-9999</span> </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Email</label>
                                                <div class="controls">
                                                    <input value="{{$data->email}}" type="email" name="email" class="span11" placeholder="Email"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Logo</label>
                                                <div class="controls">
                                                    <input required type="file" name="logo" class="form-control"/>
                                                    @if($data->logo)
                                                        <img src="{{Storage::url($data->logo)}}" width="200px;" alt="">

                                                    @endif
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">ICON</label>
                                                <div class="controls">
                                                    <input required type="file" name="icon" class="form-control"/>
                                                    @if($data->icon)
                                                        <img src="{{Storage::url($data->icon)}}" width="100px;" alt="">

                                                    @endif
                                                </div>
                                            </div>
                                            <div class="control-group" >
                                                <label class="control-label">Status</label>
                                                <div class="controls">
                                                    <select name="status" >
                                                        <option value="True">True</option>
                                                        @if($data->status=="False")
                                                            <option selected value="False">False</option>
                                                        @else
                                                            <option value="False">False</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Smtp" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">Smtpserver</label>
                                                <div class="controls">
                                                    <input value="{{$data->smtpserver}}" type="text" name="smtpserver" class="span11" placeholder="Smtpserver"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Smtpemail</label>
                                                <div class="controls">
                                                    <input value="{{$data->smtpemail}}" type="email" name="smtpemail" class="span11" placeholder="Smtpemail"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Smtppassword</label>
                                                <div class="controls">
                                                    <input value="{{$data->smtpspassword}}" type="password" name="smtpspassword" class="span11" placeholder="Smtppassword"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Smtpport</label>
                                                <div class="controls">
                                                    <input value="{{$data->smtpport}}" type="number" name="smtpport" class="span11" placeholder="Smtpport"  />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Social" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">Facebook</label>
                                                <div class="controls">
                                                    <input value="{{$data->facebook}}" required type="text" name="facebook" class="span11" placeholder="Facebook" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Twitter</label>
                                                <div class="controls">
                                                    <input value="{{$data->twitter}}" required type="text" name="twitter" class="span11" placeholder="Twitter" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Instagram</label>
                                                <div class="controls">
                                                    <input value="{{$data->instagram}}" required type="text" name="instagram" class="span11" placeholder="Instagram" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Youtube</label>
                                                <div class="controls">
                                                    <input value="{{$data->youtube}}" required type="text" name="youtube" class="span11" placeholder="Youtube" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Aboutus" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">About Us</label>
                                                <div class="controls">
                                    <textarea  class="span11"name="aboutus" >
                                        {{ $data->aboutus }}
                                    </textarea>
                                                    <script>
                                                        CKEDITOR.replace( 'aboutus' );
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="Contact" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">Contact</label>
                                                <div class="controls">
                                    <textarea  class="span11"name="contact" >
                                        {{ $data->contact }}
                                    </textarea>
                                                    <script>
                                                        CKEDITOR.replace( 'contact' );
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                            <div id="Referance" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">Referances</label>
                                                <div class="controls">
                                    <textarea  class="span11"name="referances" >
                                        {{ $data->referances }}
                                    </textarea>
                                                    <script>
                                                        CKEDITOR.replace( 'referances' );
                                                    </script>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
@section("css_end")
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/colorpicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/datepicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/uniform.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/select2.css" />
@endsection
@section("js_end")

    <script src="{{ asset("assets/admin")}}/js/bootstrap-colorpicker.js"></script>
    <script src="{{ asset("assets/admin")}}/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.toggle.buttons.js"></script>
    <script src="{{ asset("assets/admin")}}/js/masked.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.uniform.js"></script>
    <script src="{{ asset("assets/admin")}}/js/select2.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.form_common.js"></script>
    <script src="{{ asset("assets/admin")}}/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.peity.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/bootstrap-wysihtml5.js"></script>

@endsection

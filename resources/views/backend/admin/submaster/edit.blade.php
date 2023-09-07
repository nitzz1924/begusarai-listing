@extends('backend.layouts.master')
@section('content')
<form id='edit' action="{{Route('admin.submaster.update',$submaster->id)}}"  enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
      @csrf
    <div id="status"></div>  {{method_field('PATCH')}}
    <div class="form-row">
        
       
        

        <div class="form-group col-md-12 col-sm-12">

            <label for=""> Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$submaster->title}}"
                      placeholder=""></input>
                      </br>
                  
            @error('title')
            <span id="error_description" class="has-error">{{$message}}</span>
                    @enderror


        </div>

        <div class="form-group col-md-12 col-sm-12">

            <label for=""> Value</label>
            <input type="text" class="form-control" id="value" name="value" value="{{$submaster->value}}"
                      placeholder=""></input>
                      </br>
                  
            @error('value')
            <span id="error_description" class="has-error">{{$message}}</span>
                    @enderror


        </div>



        <div class="clearfix"></div>
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success button-submit"
                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>
</form>
    
@stop
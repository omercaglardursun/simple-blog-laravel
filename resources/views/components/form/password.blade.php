<div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
        {{$isim}}
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::password($name,$value,array_merge(['class'=>'form-control col-md-7 col-xs-12']),$attributes)}}
    </div>
</div>

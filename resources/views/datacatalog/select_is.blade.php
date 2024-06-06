<option value="">{{ trans('app.dc_name_is_select') }}</option>
@foreach($InformationSystems as $InformationSystem)
  <option value="{{ $InformationSystem->id }}" @if($InformationSystem->id == $passport) selected @endif>{{ $InformationSystem->name_ru }}</option>
@endforeach
